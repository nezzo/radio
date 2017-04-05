<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
/*Парсим музыку с сайта zaycev.net*/
require_once "./simple_html_dom.php";
require_once "./song.php";
 
class Muzofond extends Song{


	public function muzofondParsing($name,$nameSong, $urlPhoto){

 		$search = "https://muzofond.com/search/".$name;//делаем запрос в поиске
		$nameTag = "href"; //нужный нам тег (в нем хранится ссылка)
		$data = file_get_html($search);//получаем html код для парсинга (с помощью поиска получаем весь список песен)
 


 			//удаляем лишние теги 
			foreach($data->find('div[]') as $tmp)$tmp->outertext = '';

 
				// находим все нужные теги где хранятся ссылки на музыку
				if(count($data->find('a.dl'))){
				
 						foreach($data->find('a.dl') as $tag){
						     
							//парсим страницу и находим нужный тег в котором спрятана ссылка
							$url = $tag->$nameTag;

		 					//получаем первый результат
		 					 if(!empty($url)){
		 					 	
		 					 	//заносим в базу данные
		 					 	$this->insertMusic($url, $nameSong, $urlPhoto);
 							 	break;
							 }
  						}

					 
			 }

						$data->clear();// подчищаем за собой
						unset($data);
	 }

}