<?php include('./includes/header.php'); ?>

<!-- Main Content will -->
<div class="mt-5" style="background-color: #F8F8F8">

    <div class="container">

        <!-- Latest post of a single category -->
        <div class="jumbotron p-3 p-md-5 text-white rounded" style="height: 400px; background-image: url('<?php echo BASE_URI; ?>assets/img/posts/<?php echo $latest_post->post_image; ?>'); background-position: center">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic"><?php echo $latest_post->post_title; ?></h1>
                <p class="lead my-3"><?php echo getExcerpt($latest_post->post_content); ?></p>
                <p class="lead mb-0"><a href="#" class="text-warning font-weight-bold">Continue reading...</a></p>
            </div>
        </div>

        <div class="row mb-2">

            <!-- Latest post of a single category -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white text-center text-capitalize">
                        <?php echo $latest_post_first_category->category_name; ?>  
                    </div>
                    <div class="card-body d-flex align-items-end" style="height: 400px; background-image: url('<?php echo BASE_URI; ?>assets/img/posts/<?php echo $latest_post_first_category->post_image; ?>'); background-size: cover;">
                        <div>
                            <h5 class="card-title text-white text-center mt-2 px-3"><?php echo $latest_post_first_category->post_title; ?></h5>
                            <p class="card-text text-white px-3"><?php echo getExcerpt($latest_post_first_category->post_content); ?></p>
                            <a class="btn btn-pill btn-secondary w-25 d-block mx-auto mb-5">Περισσότερα</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest post of a single category -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-warning text-white text-center text-capitalize">
                        <?php echo $latest_post_second_category->category_name; ?>  
                    </div>
                    <div class="card-body d-flex align-items-end" style="height: 400px; background-image: url('<?php echo BASE_URI; ?>assets/img/posts/<?php echo $latest_post_second_category->post_image; ?>'); background-size: cover;">
                        <div>
                            <h5 class="card-title text-white text-center mt-2 px-3"><?php echo $latest_post_second_category->post_title; ?></h5>
                            <p class="card-text text-white px-3"><?php echo getExcerpt($latest_post_second_category->post_content); ?></p>
                            <a class="btn btn-pill btn-secondary w-25 d-block mx-auto mb-5">Περισσότερα</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
        
            <div class="col-md-8">

            <!-- Other posts from archive -->
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Παλαιότερα άρθρα
             </h3>

            <?php if(isset($posts)) : ?>

                <?php foreach($posts as $post) : ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $post->post_title; ?></h2>
                    <p class="blog-post-meta"><?php echo formatDate($post->created_date); ?> by <a href="#"><?php echo $post->first_name; ?> <?php echo $post->last_name; ?></a></p>

                    <p><?php echo $post->post_content; ?></p>

                    <h6>Κατηγορία: <span class="text-muted"><?php echo $post->category_name; ?></span></h6>

                    <hr>
                </div>
                <?php endforeach; ?>

            <?php else: ?>

            <div class="blog-post">
                Δεν υπάρχουν άρθρα ακόμα...

                 <hr>
            </div>  
           

            <?php endif; ?>
            </div>

            <?php include('./includes/sidebar.php'); ?>
            
        </div>

    </div>

</div>

<?php include('./includes/footer.php'); ?>