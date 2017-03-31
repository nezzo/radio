<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);   
/**
 * Description of Model
 *
 * @author nestor
 */
class sqlConnect {
    private $login = "root";
    private $pass = 1111111;
      
    
    function connect (){
        try {
            $db = new PDO('mysql:host=localhost;dbname=radio', $this->login, $this->pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("set names utf8");
            return $db;                       
             }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
$sqlConnect = new sqlConnect();
