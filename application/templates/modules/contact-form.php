<?php include('../includes/header.php'); ?>

<div class="block" style="background-color: #F8F8F8">
    <div class="container">
    <div class="row">
        
        <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <h6 class="text-center text-uppercase text-muted mb-3">Επικοινωνια</h6>
            <h3 class="lead mb-3">Αν θέλετε αν συνεισφέρετε σε αυτή μας την προσπάθεια συμπληρώστε την παρακάτω φόρμα.</h3>
            <form  method="post" action="<?php echo BASE_URI; ?>email.php">
                <div class="form-group">
                    <label for="firstName">Όνομα</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" aria-describedby="firstNameMessage">
                    <small id="firstNameMessage" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="lastName">Επώνυμο</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" aria-describedby="lastNameMessage">
                    <small id="lastNameMessage" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailMessage">
                    <small id="emailMessage" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phone">Τηλέφωνο</label>
                    <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phoneMessage">
                    <small id="phoneMessage" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="subject">Θέμα επικοινωνίας</label>
                    <input type="text" name="subject" class="form-control" id="subject" aria-describedby="subjectMessage">
                    <small id="subjectMessage" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="message">Κείμενο</label>
                    <textarea class="form-control" name="text_area" id="message" rows="5"></textarea>
                </div>
                <button type="submit" name="submit" class="d-block mx-auto btn btn-primary">Αποστολή</button>
            </form>
        </div>
    </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

