<?php

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php'); 

//$pdo = (new PDOClient('mysql', 'localhost', 'custom-cms', 'root', ''))->connect();
$mysqli = (new MySQLiClient('localhost', 'custom-cms', 'root', ''))->connect();

$posts = $mysqli->select("SELECT * FROM posts
                                   INNER JOIN categories ON posts.category_id = categories.id
                                   WHERE categories.category_name LIKE '%poli%'")->get();

//$handler = $mysqli->getConnection();
//$p = $handler->query("Select * from products where id > 6")->fetch_all();

var_dump($posts);