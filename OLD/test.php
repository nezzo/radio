<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

 $param = [
						'owner_id' =>"-26515827",
						'offset' => 0, //c какой позиции начинать
						'count' => 10,
					 ];

$urlAPI = "https://api.vk.com/method/wall.get?" . http_build_query($param);
$res = file_get_contents($urlAPI);
$mas = json_decode($res, true);

print_r($mas["response"][2]["attachments"][0]["photo"]);