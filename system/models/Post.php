<?php

/*
 *  Post Model with all query functions
*/
class Post 
{
    private $db;

    public function __construct() {

        //Creating a new instace of the database object(2 different apis pdo or msqli)
        $this->db = (new PDOClient(DB_DRIVER, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD, DB_ENCODE))->connect();
    }
    
    //A method to fetch all the posts from the database with limit(optional)
    public function get_all_posts($posts_limit = 5) {

        $posts = $this->db->select("SELECT * FROM posts
                            ORDER BY posts.created_date DESC
                            LIMIT {$posts_limit}")->get();

        return $posts;
    }

    //A method to fetch a specific post
    public function get_the_post($post_id) {

        $this->db->query("SELECT * FROM posts
                            WHERE posts.post_id = {$post_id}");

        $post = $this->db->single();

        return $post;
    }

    //A method to fetch the category of the post
    public function get_the_category($post_id) {

        $this->db->query("SELECT categories.*, posts.post_id, posts.category_id FROM categories
                            INNER JOIN posts ON categories.id = posts.category_id
                            WHERE posts.post_id = {$post_id}");

        $category = $this->db->single();

        return $category;
    }

    //A method to fetch the tags of the post
    public function get_the_tags($post_id) {

        $this->db->query("SELECT tags.*, posts.post_id FROM tags
                            LEFT JOIN post_tags ON post_tags.tag_id = tags.tag_id
                            LEFT JOIN posts ON posts.post_id = post_tags.post_id
                            WHERE posts.post_id = {$post_id}");

        $tags = $this->db->resultset();

        return $tags;
    }

    //A method to fetch the latest post by category (optional)
    public function get_the_latest_post($category_id = null) {

        if ($category_id == null) {

            $this->db->query("SELECT * FROM posts
                                ORDER BY posts.created_date DESC
                                LIMIT 1");

            $latest_post = $this->db->single();
        } else {

            $this->db->query("SELECT * FROM posts
                                INNER JOIN categories ON categories.id = posts.category_id
                                WHERE categories.id = {$category_id}
                                ORDER BY posts.created_date DESC
                                LIMIT 1");

            $latest_post = $this->db->single();
        }

        return $latest_post;
    }

}