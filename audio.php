<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require ("simple_html_dom.php");
require ("song.php");

$param = [
	'owner_id' =>"-26515827",
	'offset' => 0, //c какой позиции начинать
	'count' => 10,
 ];

$urlAPI = "https://api.vk.com/method/wall.get?" . http_build_query($param);
$res = file_get_contents($urlAPI);
$mas = json_decode($res, true);
$n = 2;
$i = 1;
$s = 0;

//["response"][1]  - номер поста (по порядку) получать с переменной значение скок постов охватить
/*["attachments"][9] - номер песни в посте (макс до 9 (9 песен в посте максимум, ставить счетчик до 9) ),  ["attachments"][0]["photo"]["src"] -url photo
*/


//print_r(count($mas["response"][1]["attachments"]));
 
for($a = 0; $a<count($mas["response"][3]["attachments"]); $a++){

	$artist = $mas["response"][3]["attachments"][$a]["audio"]["artist"];
	$nameMusic = $mas["response"][3]["attachments"][$a]["audio"]["title"];

	$name = urlencode($artist." - ".$nameMusic);
	$search = "http://zaycev.net/search.html?query_search=".$name;
	$data = file_get_html($search);
	$nameTag = "data-url";
	
	 //$searchNode = $xmlDoc->getElementsByTagName("data-url"); 
	foreach($data->find('div[]') as $tmp)$tmp->outertext = '';


	// находим все изображения на странице
	if(count($data->find('[data-rbt-content-id]'))){
	  
	  foreach($data->find('[data-rbt-content-id]') as $img){
	    // выводим на экран изображение
	    //echo file_get_contents($img);
	     $url = 'http://zaycev.net'.$img->$nameTag;
	    // и скачиваем его в файл
	     $jsonUrl = json_decode(file_get_contents($url),true);
		  
	    
	  }
	}
 	$data->clear();// подчищаем за собой
	unset($data);

}
	






