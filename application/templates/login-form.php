<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">

<!-- div to display the error message and the error message type -->
<?php if(isset($_SESSION['message'])) : ?>

<div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show text-center" role="alert">

        <?php echo $_SESSION['message']; ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<div class="container-fluid container-fill-height">
    <div class="container-content-middle">

        <form role="form" method="POST" action="<?php echo BASE_URI ?>application/login.php" class="mx-auto text-center app-login-form">

        <a href="<?php echo BASE_URI ?>application/index.php" class="app-brand mb-5">
            <img src="<?php echo BASE_URI ?>assets/img/logo.png" alt="OakPine">
        </a>

        <div class="form-group">
            <input class="form-control" name="username" placeholder="Όνομα χρήστη">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης">
        </div>

        <div class="mb-5">
            <button class="btn btn-primary" type="submit" name="log_in">Είσοδος</button>
            <a href="<?php echo BASE_URI ?>application/register.php" class="btn btn-secondary">Εγγραφή νέου χρήστη</a>
        </div>

        <footer class="screen-login">
            <a href="<?php echo BASE_URI ?>application/recover.php" class="text-muted">Ξέχασα τον κωδικό πρόσβασης</a>
        </footer>
        </form>
    
    </div>
</div>

</div>


<?php include('./includes/footer.php'); ?>