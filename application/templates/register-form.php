<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">

<!-- div to display form errros -->
<?php if(isset($_SESSION['form_errors'])) : ?>

    <?php foreach($_SESSION['form_errors'] as $form_error) : ?>
        <div class="alert alert-danger ?> alert-dismissible fade show text-center" role="alert">

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
            <input type="text" class="form-control" name="first_name" placeholder="Όνομα">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Επώνυμο">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Όνομα χρήστη">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-mail">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password_confirm" class="form-control" placeholder="Επιβεβαίωση Κωδικού πρόσβασης">
        </div>

        <div class="mb-5">
            <button class="btn btn-primary" type="submit" name="register">Εγγραφή</button>
        </div>

        <footer class="screen-login">
            <p>Είμαι ήδη μέλος. Πίσω στην</p><a href="<?php echo BASE_URI ?>application/login.php" class="text-muted">Είσοδο</a>
        </footer>

        </form>
    
    </div>
</div>

</div>

<?php include('./includes/footer.php'); ?>