<?php

$s = fopen("1.txt", "rt");

$a = file("1.txt");

$v = explode("https://", $a);

print_r($a);