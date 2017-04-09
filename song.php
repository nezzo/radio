<?php
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require_once 'sqlConnect.php';

class Song extends sqlConnect{


    //c помощью того что рандомная выборка идет будут рандомно музыка играть
    public function selectMusic(){
        $stmt = $this->connect()->query("SELECT * FROM songs ORDER BY RAND() LIMIT 1" )->fetchAll(PDO::FETCH_ASSOC);

        
	 foreach($stmt as $row){
         
         //проверяем что бы песни по name не повторялись
	  if($_SESSION["name"] != $row['name']){
	  
	     //создаем сессию по name  музыки
	     $_SESSION["name"] = $row['name'];
	     $id = $row['song_id'];
	     $music = $row['url'];
             $title = $row["name"];
             $poster = $row["img"];
             $mas = $music."|".$title."|".$poster."|".$id;
             echo $mas;
	  }
	     
        }
    }

    //получаем по GET параметру данные и заносим их в базу на удаленном сервере
    public function insertGetMusic(){
      
      //ловим GET параметром данные и отправляем в метод insertMusic для занесение в базу данных
      if(!empty($_GET['url']) && !empty($_GET['name']) && !empty($_GET['photo'])){
          $this->insertMusic($_GET['url'], $_GET['name'], $_GET['photo']);
       }


    }

    //Заносим в базу ссылки на песни
    public function insertMusic($jsonUrl, $nameSong, $urlPhoto){
    	//$playlist = file("1.txt");
      
      if(!empty($jsonUrl) && !empty($nameSong)){
    	
     			$stmt = $this->connect()->prepare("INSERT INTO songs (url,name,img) VALUES (:url, :name, :img)");

    			$stmt->bindParam(':url', $jsonUrl);
    			$stmt->bindParam(':name', $nameSong);
    			$stmt->bindParam(':img', $urlPhoto);


    			echo $stmt->execute();
    		
    	}
    }
    
    //получаем POST запрос и удаляем строку в базе по имени исполнителя
    public function musicDelete(){
    
    //получаем пост запрос по ajax на удаление с базы песни
    $id = $_POST['idDel'];
      
      if(!empty($id)){
	$stmt = $this->connect()->query("DELETE FROM songs WHERE song_id =".(int)$id."");
	  
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
$song->insertGetMusic();

//$song->insertMusic(); каждый раз при вызове класса дублируются ссылки в базе на песни