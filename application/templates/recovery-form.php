<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">

    <!-- div to display the error message and the error message type -->
    <?php if(isset($_SESSION['email_msg'])) : ?>

    <div class="alert alert-<?php echo $_SESSION['email_msg_type']; ?> alert-dismissible fade show text-center" role="alert">

            <?php echo $_SESSION['email_msg']; ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <h4 class="text-muted text-center">
        Παρακαλούμε πληκτρολογήστε το e-mail σας παρακάτω για να σας στείλουμε ένα e-mail επαναφοράς κωδικού πρόσβασης.
    </h4>


<div class="container-fluid container-fill-height">
    <div class="container-content-middle">

        <form role="form" method="POST" action="<?php echo BASE_URI ?>application/recover.php" class="mx-auto text-center app-login-form">

        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="E-mail">
        </div>

        <div class="mb-5">
            <button class="btn btn-primary" type="submit" name="recover">Επαναφορά κωδικού</button>
        </div>

        </form>
    
    </div>
</div>

</div>

<?php include('./includes/footer.php'); ?>