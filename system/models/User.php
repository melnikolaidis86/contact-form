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

        $this->db->query("SELECT users.username, users.email, users.password FROM users
                            WHERE (users.username = '{$username}' OR users.email = '{$username}')
                            LIMIT 1");

        $user = $this->db->single();

        if(password_verify($password, $user->password)) {

            return true;
        } else {

            return false;
        }

    }

    public function register_user($first_name, $last_name, $username, $email, $password) {

        $this->db->query("INSERT INTO users (username, password, email, first_name, last_name, recovery_hash)
                            VALUES (:username, :password, :email, :first_name, :last_name, :recovery_hash)");

        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email);
        $this->db->bind(':first_name', $first_name);
        $this->db->bind(':last_name', $last_name);
        $this->db->bind(':recovery_hash', 0);

        $this->db->execute();
    }

    public function check_if_valid_user_email($email) {

        $this->db->query("SELECT users.email FROM users
                            WHERE users.email = '{$email}'
                            LIMIT 1");

        $user = $this->db->single();

        return $user;
    }

    public function register_recovery_hash($user_email, $recovery_hash) {

        $this->db->query("UPDATE users 
                            SET users.recovery_hash = :recovery_hash
                            WHERE users.email = :user_email");

        $this->db->bind(':user_email', $user_email);
        $this->db->bind(':recovery_hash', $recovery_hash);

        $this->db->execute();
    }

    public function get_user($recovery_hash) {

        $this->db->query("SELECT users.recovery_hash, users.user_id, users.password FROM users
                            WHERE users.recovery_hash = '{$recovery_hash}'
                            LIMIT 1");


        $user = $this->db->single();

        return $user;
    }

    public function update_password($user_id, $password) {

        $this->db->query("UPDATE users
                            SET users.password = :password, users.recovery_hash = :recovery_hash
                            WHERE users.user_id = :user_id");

        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':password', $password);
        $this->db->bind(':recovery_hash', 0);

        $this->db->execute();
    }
}