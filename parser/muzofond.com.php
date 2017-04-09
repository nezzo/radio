<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
/*Парсим музыку с сайта zaycev.net*/
require_once "./simple_html_dom.php";
require_once "./song.php";
 
class Muzofond extends Song{


	public function muzofondParsing($name,$nameSong,$urlPhoto){

 		$search = "https://muzofond.com/search/".$name;//делаем запрос в поиске
		$nameTag = "href"; //нужный нам тег (в нем хранится ссылка)
 		$newDir = date("d.m.Y");
 		$data = $this->dlPage($search);//file_get_html($search);//получаем html код для парсинга (с помощью поиска получаем весь список песен)
 		
 
 			//удаляем лишние теги 
			foreach($data->find('div[]') as $tmp)$tmp->outertext = '';

 
				// находим все нужные теги где хранятся ссылки на музыку
				if(count($data->find('a.dl'))){
				
 						foreach($data->find('a.dl') as $tag){
						     
							//парсим страницу и находим нужный тег в котором спрятана ссылка
							$url = $tag->$nameTag;

							//получаем первый результат
		 					 if(!empty($url)){

		 					 	
		 					 	$fp=fopen("http://mydiplom.zzz.com.ua/muzik/upload.php?url=".$url."&name=".$name,"r"); 
		 						fclose($fp);

		 						$newUrl = "http://mydiplom.zzz.com.ua/muzik/".$newDir."/".$nameSong.".mp3";


		 						//заносим в базу данные
		 					 	$this->insertMusic($newUrl, $nameSong, $urlPhoto);

 							 	break;
							 }
  						}

					 
			 }

						$data->clear();// подчищаем за собой
						unset($data);
						sleep(5);
	 }
	 
	public  function dlPage($href) {

	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_HEADER, false);
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($curl, CURLOPT_URL, $href);
	    curl_setopt($curl, CURLOPT_REFERER, $href);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246");
	    $str = curl_exec($curl);
	    curl_close($curl);

	    // Create a DOM object
	    $dom = new simple_html_dom();
	    // Load HTML from a string
	    $dom->load($str);

	    return $dom;
      }

}
