<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
 
require_once 'sqlConnect.php';

class Song extends sqlConnect{


    //c помощью того что рандомная выборка идет будут рандомно музыка играть
    public function selectMusic(){
        $stmt = $this->connect()->query("SELECT * FROM songs ORDER BY RAND() LIMIT 1" )->fetchAll(PDO::FETCH_ASSOC);

        $music = array();

         foreach($stmt as $row){
             $music = $row['url']."|";
             echo $music;
        }
    }

    //Заносим в базу ссылки на песни
    public function insertMusic(){
    	$playlist = file("1.txt");

    	if(!empty($playlist)){
    		for($s=0; $s<count($playlist); $s++){
    			$stmt = $this->connect()->prepare("INSERT INTO songs (url) VALUES (:url)");

    			$stmt->bindParam(':url', $playlist[$s]);

    			echo $stmt->execute();
    		}
    	}
    }

}

$song = new Song();
$song->selectMusic();
