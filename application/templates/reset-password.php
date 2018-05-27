<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">

        <!-- div to display hash errro -->
        <?php if(isset($_SESSION['user_hash'])) : ?>
            <div class="alert alert-danger ?> alert-dismissible fade show text-center" role="alert">

                <?php echo $_SESSION['user_hash']; ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

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
        <h4 class="text-muted text-center">
            Παρακαλούμε πληκτρολογήστε το e-mail σας παρακάτω για να σας στείλουμε ένα e-mail επαναφοράς κωδικού πρόσβασης.
        </h4>

        <div class="container-fluid container-fill-height">
            <div class="container-content-middle">

                <form role="form" method="POST" action="<?php echo BASE_URI ?>application/reset.php?recovery=<?php echo $recovery_hash; ?>" class="mx-auto text-center app-login-form">

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Νέος κωδικός πρόσβασης">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirm" placeholder="Επιβεβαίωση κωδικού πρόσβασης">
                </div>

                <div class="mb-5">
                    <button class="btn btn-primary" type="submit" name="reset">Επαναφορά κωδικού</button>
                </div>

                </form>
            
            </div>
        </div>

</div>

<?php include('./includes/footer.php'); ?>