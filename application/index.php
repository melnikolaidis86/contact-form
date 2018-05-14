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
$template->categories = get_all_categories();
$template->latest_post = $post->get_the_latest_post();
$template->posts = $post->get_all_posts(2);

//Variables to display the latest of two categories
$template->latest_post_first_category = $post->get_the_latest_post(1);
$template->latest_post_second_category = $post->get_the_latest_post(2);


//Display template
echo $template;
