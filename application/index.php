<?php 

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php');

//Requiring appopriate model for current page
require_once('../system/models/Post.php');

//Creating instance of the Post model class
$post = new Post();

//Get template and assign variables
$template = new Template('templates/front-page.php');

//Assign variables
$template->title = "ΑΡΧΙΚΗ";
$template->active_page = "homepage";
$template->posts = $post->get_all_posts();
$template->category = $post->get_the_category(1);
$template->tags = $post->get_the_tags(2);
$template->post = $post->get_the_post(2);

//Display template
echo $template;
