<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">

<!-- div to display form errros -->
<?php if(isset($_SESSION['form_errors'])) : ?>

    <?php foreach($_SESSION['form_errors'] as $form_error) : ?>
        <div class="alert alert-danger ?> alert-dismissible fade show" role="alert">

                <?php echo $form_error; ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

<div class="container-fluid container-fill-height">
    <div class="container-content-middle">

        <form role="form" method="POST" action="<?php echo BASE_URI ?>application/register.php" class="mx-auto text-center app-login-form">

        <a href="<?php echo BASE_URI ?>application/index.php" class="app-brand mb-5">
            <img src="<?php echo BASE_URI ?>assets/img/logo.png" alt="OakPine">
        </a>

        <div class="form-group">
            <input type="text" class="form-control" name="first_name" placeholder="First Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password">
        </div>

        <div class="mb-5">
            <button class="btn btn-primary" type="submit" name="register">Sign up</button>
        </div>

        <footer class="screen-login">
            <p>If you are already a member go back</p><a href="#" class="text-muted"> Log in</a>
        </footer>

        </form>
    
    </div>
</div>

</div>

<?php include('./includes/footer.php'); ?>