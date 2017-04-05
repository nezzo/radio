<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);
/*Парсим музыку с сайта zaycev.net*/
require_once "simple_html_dom.php";
//подключаем файл с прокси
require_once "./Proxy.php";

class Zaycev{


	public function zaycevParsing($name){

		
		//объявляем объект
		$proxy = new Proxy();
 

		$search = "http://zaycev.net/search.html?query_search=".$name;//делаем запрос в поиске
		
		$ch = curl_init($search);

		if(!empty($ch)){
			// ПОДГОТОВКА ЗАГОЛОВКОВ
			$agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36";
			curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
			curl_setopt ($ch, CURLOPT_PROXY, trim($proxy->getProxy())); 
	        curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP); 
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt ($ch, CURLOPT_FAILONERROR, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

			$result = curl_exec($ch);
			$nameTag = "data-url"; //нужный нам тег (в нем хранится ссылка)
			$data = str_get_html($result);//получаем html код для парсинга (с помощью поиска получаем весь список песен)


 			//echo $result;
 			if($result){
 				echo $proxy->getProxy();
 			}
 			
 			//удаляем лишние теги 
			foreach($data->find('div[]') as $tmp)$tmp->outertext = '';


				// находим все нужные теги где хранятся ссылки на музыку
				if(count($data->find('[data-rbt-content-id]'))){
				
					 if(!empty($proxy->getProxy())){
						foreach($data->find('[data-rbt-content-id]') as $tag){
						     
							//парсим страницу и находим нужный тег в котором спрятана ссылка
							$url = 'http://zaycev.net'.$tag->$nameTag;
		 					
		 					//разбираем json  и получаем url на песню
							$jsonUrl = json_decode(file_get_contents($url),true);
							     
							//удаляем не нужный кусок кода ccылки
							$wrong = "?dlKind=play&format=json";
		 					$rep = trim(str_replace($wrong," ",$jsonUrl["url"]));

		 					//echo $rep;
						}

					}
				    



		}
						$data->clear();// подчищаем за собой
						unset($data);



			curl_close ($ch);

		}
		



			


	}

}