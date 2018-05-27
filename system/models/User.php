<?php

/*
 *  User Model with all query functions
*/
class User 
{
    private $db;

    public function __construct() {

        //Creating a new instace of the database object(2 different apis pdo or msqli)
        $this->db = (new PDOClient(DB_DRIVER, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD,DB_ENCODE))->connect();
    }
    
    public function get_all_users() {

        $users = $this->db->select("SELECT * FROM users")->get();

        return $users;
    }

    public function authenticate_user($username, $password) {

        $this->db->query("SELECT * FROM users
                            WHERE (users.username = '{$username}' OR users.email = '{$username}')
                            AND users.password = '{$password}'
                            LIMIT 1");

        $user = $this->db->single();

        if($user) {

            return true;
        } else {

            return false;
        }

    }

    public function register_user($first_name, $last_name, $username, $email, $password) {

        $this->db->query("INSERT INTO users (users.username, password, email, first_name, last_name)
                            VALUES (:username, :password, :email, :first_name, :last_name)");

        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email);
        $this->db->bind(':first_name', $first_name);
        $this->db->bind(':last_name', $last_name);

        $this->db->execute();
    }
}