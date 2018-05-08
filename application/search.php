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

    //Fetching results based on the search query
    $posts = $mysqli->select("SELECT *  FROM posts
                                        INNER JOIN categories ON posts.category_id = categories.id
                                        WHERE categories.category_name LIKE '%" . $_POST['search'] . "%'")->get();

}

?>

    <?php if(isset($posts)) : ?>

        <?php if($posts) : ?>

            <?php foreach($posts as $post) : ?>

            <li class="list-group-item">
                <div class="media w-100">
                        <div class="media-body">
                            <strong id="search-title"><?php echo $post->post_title; ?></strong>
                            <p id="search-category">@ <?php echo $post->category_name; ?></p>
                        <hr>
                    </div>
                </div>
            </li>

            <?php endforeach; ?>

        <?php else: ?>

            <li class="list-group-item">
                <div class="media w-100">
                    <div class="media-body">
                        <strong id="search-title">Δεν βρέθηκαν αποτελέσματα...</strong>
                        <hr>
                    </div>
                </div>
            </li>

        <?php endif; ?>

    <?php endif; ?>