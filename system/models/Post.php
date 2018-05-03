<?php

/*
 *  Post Model with all query functions
*/
class Post 
{
    private $db;

    public function __construct() {

        //Creating a new instace of the database object(2 different apis pdo or msqli)
        //$this->db = (new PDOClient(DB_DRIVER, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD))->connect();
        //$this->db = (new MySQLiClient(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD))->connect();
    }
    
    public function get_all_posts() {

        // Posts functionality will enter here...
    }
}