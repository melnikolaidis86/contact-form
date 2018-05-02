<?php

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php'); 

$pdo = (new PDOClient('mysql', 'localhost', 'custom-cms', 'root', ''))->connect();
//$mysqli = (new MySQLiClient('localhost', 'custom-cms', 'root', ''))->connect();

$users = $pdo->select("SELECT * FROM users")->get();

//$handler = $mysqli->getConnection();
//$p = $handler->query("Select * from products where id > 6")->fetch_all();

foreach ($users as $user){
    echo $user->username . '<br>';
}