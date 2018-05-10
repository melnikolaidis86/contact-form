<?php

//Requiring main initiliasation file to load all required files and libraries
require_once('../system/init.php'); 

//Calling a connection with database through the mysliClient
$mysqli = (new MySQLiClient(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD))->connect();

//Setting charset to UTF8 through the connection with the database
$mysqli_connection = $mysqli->getConnection();
mysqli_set_charset($mysqli_connection, "utf8");

//Getting the search query
if(isset($_POST['search'])) {

    //Fetching results based on the search query looking up for posts per category
    $posts_per_category = $mysqli->select("SELECT posts.post_id, posts.post_title, posts.created_date, categories.category_name FROM posts
                                        INNER JOIN categories ON posts.category_id = categories.id
                                        WHERE categories.category_name LIKE '%{$_POST['search']}%'
                                        ORDER BY posts.created_date DESC")->get();

    //Fetching results based on the search query looking up for posts per tag
    $posts_per_tag = $mysqli->select("SELECT posts.post_id, posts.post_title, posts.created_date, tags.tag_name FROM posts
                                        LEFT JOIN post_tags ON post_tags.post_id = posts.post_id
                                        LEFT JOIN tags ON tags.tag_id = post_tags.tag_id
                                        WHERE tags.tag_name LIKE '%{$_POST['search']}%'
                                        ORDER BY posts.created_date DESC")->get();

}

?>
    <!-- Fetching the results from the search and display them in list items -->

    <?php if(isset($posts_per_category) || isset($posts_per_tag)) : ?>

        <?php if($posts_per_category || $posts_per_tag) : ?>

            <?php foreach($posts_per_category as $post_per_category) : ?>

            <li class="list-group-item">
                <div class="media w-100">
                        <div class="media-body">
                            <strong id="search-title"><?php echo $post_per_category->post_title; ?></strong>
                            <p id="search-category"><strong>Κατηγορία:</strong> <?php echo $post_per_category->category_name; ?></p>
                    </div>
                </div>
            </li>

            <?php endforeach; ?>

            <?php foreach($posts_per_tag as $post_per_tag) : ?>

            <li class="list-group-item">
                <div class="media w-100">
                        <div class="media-body">
                            <strong id="search-title"><?php echo $post_per_tag->post_title; ?></strong>
                            <p id="search-category"><strong>Ετικέτα:</strong> <?php echo $post_per_tag->tag_name; ?></p>
                    </div>
                </div>
            </li>

            <?php endforeach; ?>

        <?php else: ?>

            <li class="list-group-item">
                <div class="media w-100">
                    <div class="media-body">
                        <strong id="search-title">Δεν βρέθηκαν αποτελέσματα...</strong>
                    </div>
                </div>
            </li>

        <?php endif; ?>

    <?php endif; ?>