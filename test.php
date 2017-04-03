<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

$a = array();

for($i = 0; $i<5; $i++){
	$a[] = $i;
}

print_r($a);