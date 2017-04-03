<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require_once 'sqlConnect.php';

class Song extends sqlConnect{


    //c помощью того что рандомная выборка идет будут рандомно музыка играть
    public function selectMusic(){
        $stmt = $this->connect()->query("SELECT * FROM songs ORDER BY RAND() LIMIT 1" )->fetchAll(PDO::FETCH_ASSOC);

        $music = array();
        $title = array();
        $poster = array();
        $mas = array();

         foreach($stmt as $row){
	     $id = $row['song_id'];
	     $music = $row['url'];
             $title = $row["name"];
             $poster = $row["img"];
             $mas = $music."|".$title."|".$poster."|".$id;
             echo $mas;
        }
    }

    //Заносим в базу ссылки на песни
    public function insertMusic($jsonUrl, $nameSong, $urlPhoto){
    	//$playlist = file("1.txt");

    	if(!empty($jsonUrl) && !empty($nameSong)){
    		for($s=0; $s<count($jsonUrl); $s++){
    			$stmt = $this->connect()->prepare("INSERT INTO songs (url,name,img) VALUES (:url, :name, :img)");

    			$stmt->bindParam(':url', $jsonUrl);
    			$stmt->bindParam(':name', $nameSong);
    			$stmt->bindParam(':img', $urlPhoto);


    			echo $stmt->execute();
    		}
    	}
    }
    
    //получаем POST запрос и удаляем строку в базе по имени исполнителя
    public function musicDelete(){
    
    //получаем пост запрос по ajax на удаление с базы песни
    $id = $_POST['idDel'];
      
      if(!empty($id)){
	$stmt = $this->connect()->query("DELETE FROM songs WHERE song_id =".$id."");
	  
	  if($stmt == true){
	     echo 1;
	  }else{
	    echo 0;
	  }
      }
      
    }

}

$song = new Song();
$song->selectMusic();
$song->musicDelete();
//$song->insertMusic(); каждый раз при вызове класса дублируются ссылки в базе на песни