<?php
 
		/*
		полученый запрос по GET и условие если песен в папке больше 30 то мы удаляем старые записи и скачиваем новые песни, если меньше 30 то просто дописываем
		*/
 		if(!empty($_GET['del'])){
 			$newDir = date("d.m.Y");

 			//подсчитываем количество файлов в папке
 			delFile($newDir);
		}


/* получаем по гет параметрам название и ссылку для скачивания*/
if(!empty($_GET["url"]) && !empty($_GET["name"])){

 		//создаем название новой папки для музыки
		$newDir = date("d.m.Y");

		//получаем имена всех папок в которой должна  лежать музыка [0] - так как там одна папка
		$oldDir = glob('*', GLOB_ONLYDIR);

		$fileUrl = $_GET["url"];
		//$name = $_GET["name"]."mp3";
		$name = $_GET["name"].".mp3";

		//проверяем не пуста ли папка
		 if(!empty($oldDir[0])){

		 	//проверяем существует ли папка со сегоднешней датой если нет то создаем,а со старой удаляем
			 if($newDir != $oldDir[0]){
	 			//rmdir($oldDir[0]);

			 	//удаляет директорию с содержимым
	 			dirDel($oldDir[0]);
	 			mkdir($newDir,0777);
			 	}

			 	//получаем файлы
			 	getFile($fileUrl, $name, $newDir);

 		}else{
 		 	//текущая директория музыки
			 mkdir($newDir,0777);

			 //получаем файлы
			 getFile($fileUrl, $name, $newDir);
 		 }
} 		 


		//функция по удалению файлов и папок
 		 function dirDel ($dir) 
		{  
		    $d=opendir($dir);  
		    while(($entry=readdir($d))!==false) 
		    { 
		        if ($entry != "." && $entry != "..") 
		        { 
		            if (is_dir($dir."/".$entry)) 
		            {  
		                dirDel($dir."/".$entry);  
		            } 
		            else 
		            {  
		                unlink ($dir."/".$entry);  
		            } 
		        } 
		    } 
		    closedir($d);  
		    rmdir ($dir);  
		} 

		//по ссылке скачиваем файлы
		function getFile($url, $name, $newDir){
			if (!copy($url, $newDir."/".$name)) {
    			return false;
    		}


		}

		

		//функция по удалению песен и подсчету их в папке
		function delFile($newDir){
			$file = scandir($newDir);

			//если больше 30 песен то удаляем
			if(30<count($file)){
				array_map("unlink", glob($newDir."/*.mp3"));
			}
		}

		