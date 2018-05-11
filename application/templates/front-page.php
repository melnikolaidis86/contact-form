<?php include('./includes/header.php'); ?>

<!-- Main Content will -->
<div class="mt-5" style="background-color: #F8F8F8">

    <div class="container">

        <div class="jumbotron p-3 p-md-5 text-white rounded" style="height: 400px; background-image: url('<?php echo BASE_URI; ?>assets/img/posts/<?php echo $latest_post->post_image; ?>'); background-position: center">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic"><?php echo $latest_post->post_title; ?></h1>
                <p class="lead my-3"><?php echo getExcerpt($latest_post->post_content); ?></p>
                <p class="lead mb-0"><a href="#" class="text-warning font-weight-bold">Continue reading...</a></p>
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white text-center text-capitalize">
                        <?php echo $latest_post_first_category->category_name; ?>  
                    </div>
                    <img class="card-img-top img-fluid px-3" src="<?php echo BASE_URI; ?>assets/img/posts/<?php echo $latest_post_first_category->post_image; ?>" style="height: 250px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-muted mt-2 px-3"><?php echo $latest_post_first_category->post_title; ?></h5>
                        <p class="card-text px-3"><?php echo getExcerpt($latest_post_first_category->post_content); ?></p>
                        <a class="btn btn-pill btn-secondary w-25 d-block mx-auto mb-5">Περισσότερα</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header bg-warning text-white text-center text-capitalize">
                        <?php echo $latest_post_second_category->category_name; ?>  
                    </div>
                    <img class="card-img-top img-fluid px-3" src="<?php echo BASE_URI; ?>assets/img/posts/<?php echo $latest_post_second_category->post_image; ?>" style="height: 250px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-muted mt-2 px-3"><?php echo $latest_post_second_category->post_title; ?></h5>
                        <p class="card-text px-3"><?php echo getExcerpt($latest_post_second_category->post_content); ?></p>
                        <a class="btn btn-pill btn-secondary w-25 d-block mx-auto mb-5">Περισσότερα</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
        
            <div class="col-md-8">

            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Όλα τα άρθρα μας
             </h3>

            <div class="blog-post">
                <h2 class="blog-post-title">Sample blog post</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
                <hr>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <h2>Heading</h2>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                <h3>Sub-heading</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <pre><code>Example code block</code></pre>
                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                <h3>Sub-heading</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              </div><!-- /.blog-post -->

            </div>

            <?php include('./includes/sidebar.php'); ?>
            
        </div>

    </div>

</div>

<?php include('./includes/footer.php'); ?>