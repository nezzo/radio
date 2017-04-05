<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

 require_once 'sqlConnect.php';

class Proxy  extends sqlConnect{

	public function __construct(){
		$this->insertListProxy();
	}

	//парсим лист прокси https://hidemy.name/ru/proxy-list/?type=hs&anon=34#list
	public function insertListProxy(){
	  $proxyList = file("Proxy_List/adress.txt");

		//открываем файл считываем количество proxy и заносим в базу
	  for ($i = 0; $i<count($proxyList); $i++){
	  	if(!empty($proxyList)){
    	
     			$stmt = $this->connect()->prepare("INSERT INTO proxy (adress) VALUES (:adress)");

    			$stmt->bindParam(':adress', $proxyList[$i]);
    			 
    			$stmt->execute();
    		
    	}
	  }

	}


	//рандомно получаем 1 адресс (каждый раз за запрос)
	public function getProxy(){
		$stmt = $this->connect()->query("SELECT * FROM proxy ORDER BY RAND() LIMIT 1" )->fetchAll(PDO::FETCH_ASSOC);

		foreach($stmt as $row){
         
	         //проверяем что бы прокси не повторялось
		  	if($_SESSION["adress"] != $row['adress']){
		  
		     //создаем сессию по name  музыки
		     $_SESSION["adress"] = $row['adress'];
		     $adress = $row['adress'];
		     echo $adress;

		  }
	     
        }


	}
	 
}

$proxy = new Proxy();
 


//https://hidemy.name/ru/proxy-list/?type=hs&anon=34#list  ссылка с нужными мне  параметрами прокси
/* проверка прокси сервера на валидность если гуд то заносим в базу, этот же код надо заюзать перед парсером музыки, если гуд парсим иначе удаляем с базы  и запускаем рандомно другой прокси. Крон запускать раз в час перед парсом музыки, что бы были адреса для парса, можно парсить 
адресса прокси через прокси если есть в списке, что бы так же не спалили. 

curl_setopt($ch, CURLOPT_PROXY, "http://CHECKED_PROXY");
...
$val=curl_exec($ch);
...
if ($val)
{
echo "proxy ok";
}
else
{
echo "proxy not ok ";
}
*/
