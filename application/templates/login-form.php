<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">

<div class="container-fluid container-fill-height">
<div class="container-content-middle">
    <form role="form" method="POST" action="<?php echo BASE_URI ?>application/login.php" class="mx-auto text-center app-login-form">

    <a href="<?php echo BASE_URI ?>application/index.php" class="app-brand mb-5">
        <img src="<?php echo BASE_URI ?>assets/img/logo.png" alt="OakPine">
    </a>

    <div class="form-group">
        <input class="form-control" name="username" placeholder="Username">
    </div>

    <div class="form-group mb-3">
        <input type="password" class="form-control" placeholder="Password">
    </div>

    <div class="mb-5">
        <button class="btn btn-primary">Log In</button>
        <button class="btn btn-secondary">Sign up</button>
    </div>

    <footer class="screen-login">
        <a href="#" class="text-muted">Forgot password</a>
    </footer>
    </form>
</div>
</div>

</div>


<?php include('./includes/footer.php'); ?>