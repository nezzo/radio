#!/usr/bin/php
<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);


require_once "song.php";
//подключаем парсер
//require_once "parser/zaycev.net.php";
require_once "parser/muzofond.com.php";


class Audio extends Song{

	//id  групп с музыкой
	//public $group = array("-26515827","-22866546","-28446706", "-68629392", "-27895931", "-25757367", "-33918856","-40897649");
	public $group = array("-26515827");
	public $param = array();


	//узнаем сколько групп в массиве и с каждой группы в цикле тянем данные
	public function getGroup(){

		for ($i = 0; $i<count($this->group); $i++){

			$this->param = [
						'owner_id' => $this->group[$i],
						'offset' => 0, //c какой позиции начинать
						'count' => 10,//количество записей
					 ];

			//передаем параметры в метод		 
			$this->audioAPI($this->param);
			
			 		 
		}

		

	}

	public function __construct(){
		
		//вызываем метод который генерит группы
		$this->getGroup();
	}				 
					 

	public function audioAPI($param){
		$urlAPI = "https://api.vk.com/method/wall.get?" . http_build_query($param);
		$res = file_get_contents($urlAPI);
		$mas = json_decode($res, true);
		$n = 2;
		$i = 1;
		$s = 0;
  
//["response"][1]  - номер поста (по порядку) получать с переменной значение скок постов охватить
/*["attachments"][9] - номер песни в посте (макс до 9 (9 песен в посте максимум, ставить счетчик до 9))
["attachments"][0]["photo"]["src"] -url photo
*/			
			//идем цыклом по всем постам в группе
			for ($indexPost = 0; $indexPost<$param["count"]; $indexPost++){
			
			$urlPhoto = $mas["response"][$indexPost]["attachments"][0]["photo"]["src_big"];//фото
				  //создаем цыкл по количеству песен в посте (обычно с 0 до 9)
				for($a = 0; $a<count($mas["response"][$indexPost]["attachments"]); $a++){
				
					$artist = $mas["response"][$indexPost]["attachments"][$a]["audio"]["artist"];//получаем имя исполнителя
					$nameMusic = $mas["response"][$indexPost]["attachments"][$a]["audio"]["title"]; //получаем имя песни
					$nameSong = $artist." - ".$nameMusic; //склеиваем имена исполнителя и песни
					$name = urlencode($artist." - ".$nameMusic); //склеиваем и делаем имя и название песни похожим на ссылку

 
							//определяем объект
							//$zaycev = new Zaycev();
							$muzofond = new Muzofond();

 							//передаем имя исполнителя и песни для парсинга
							//$rep = $zaycev->zaycevParsing($name);

							//проверяем существует ли песня по имени
							if(!empty($artist) && !empty($nameMusic)){
							 $rep = $muzofond->muzofondParsing($name,$nameSong, $urlPhoto);
							 echo "|||||";
							 var_dump($rep);

							//проверяем существует ли файл по ссылке, если да то заносим в базу
							// $this->insertMusic($rep, $nameSong, $urlPhoto);

						} 
								
			 			   
					 	
						
					   sleep(5);
					}
			}

     

	}				  

}

$audio = new Audio();


	






