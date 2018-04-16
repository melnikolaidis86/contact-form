<?php include('./includes/header.php'); ?>

<div class="mt-5" style="background-color: #F8F8F8">
    <div class="container">
    <div class="row">
        
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <h4 class="text-center text-uppercase text-muted mb-3">Επικοινωνια</h4>
            <h5 class="mb-3">Αν θέλετε αν συνεισφέρετε σε αυτή μας την προσπάθεια συμπληρώστε την παρακάτω φόρμα.</h5>
            <form id="form" method="post" action="<?php echo BASE_URI; ?>system/helpers/email-action.php">
                <div class="form-group">
                    <label for="firstName">Όνομα *</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" aria-describedby="firstNameMessage" required>
                    <small id="firstNameMessage" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="lastName">Επώνυμο *</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" aria-describedby="lastNameMessage" required>
                    <small id="lastNameMessage" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="email">E-mail *</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailMessage" required>
                    <small id="emailMessage" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="phone">Τηλέφωνο</label>
                    <input type="text" name="phone" pattern="[0-9]{3}-[0-9]{7}" placeholder="π.χ. 210-1234567" class="form-control" id="phone" aria-describedby="phoneMessage">
                    <small id="phoneMessage" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="subject">Θέμα επικοινωνίας *</label>
                    <input type="text" name="subject" class="form-control" id="subject" aria-describedby="subjectMessage" required>
                    <small id="subjectMessage" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="message">Κείμενο *</label>
                    <textarea class="form-control" name="text_area" id="message" rows="5" required></textarea>
                    <small id="textAreaMessage" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <p class="text-muted"><small>* Υπoχρεωτικά πεδία</small></p>
                </div>
                <button type="submit" name="submit" class="d-block mx-auto btn btn-primary">Αποστολή</button>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- script for js validation -->
<script src="<?php echo BASE_URI ?>application/assets/js/validation.js"></script>

<?php include('./includes/footer.php'); ?>
