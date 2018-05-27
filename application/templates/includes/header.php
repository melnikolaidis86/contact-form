<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <!-- Custom Fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'> -->

    <!-- Include the CSS -->
    <link href="<?php echo BASE_URI ?>assets/css/toolkit.css" rel="stylesheet">

    <link href="<?php echo BASE_URI ?>assets/css/application.css" rel="stylesheet">

  </head>

<?php if(isset($no_navigation)) : ?>

  <body>

  <div>

<?php else: ?>

  <body class="with-top-navbar">

  <div class="growl" id="app-growl"></div>

<nav class="navbar navbar-toggleable-sm fixed-top navbar-inverse bg-primary app-navbar">
  <button
    class="navbar-toggler navbar-toggler-right hidden-md-up"
    type="button"
    data-toggle="collapse"
    data-target="#navbarResponsive"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" href="<?php echo BASE_URI ?>application/index.php">
    <img src="<?php echo BASE_URI ?>assets/img/logo.png" alt="OakPine" style="width: 126px">
  </a>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($active_page == 'homepage') echo 'active'; ?>">
        <a class="nav-link text-uppercase" href="<?php echo BASE_URI ?>application/index.php">Αρχικη <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if($active_page == 'contact') echo 'active'; ?>">
        <a class="nav-link text-uppercase" href="<?php echo BASE_URI ?>application/contact.php">Επικοινωνια</a>
      </li>
      <li class="nav-item hidden-md-up">
        <form class="form-inline hidden-sm-up">
          <input class="form-control" type="text" data-action="grow" placeholder="Αναζήτηση...">
        </form>
      </li>

      <!-- This will be added later with login functionality
      <li class="nav-item hidden-md-up">
        <a class="nav-link" href="notifications/index.html">Notifications</a>
      </li>
      <li class="nav-item hidden-md-up">
        <a class="nav-link" data-action="growl">Growl</a>
      </li>
      <li class="nav-item hidden-md-up">
        <a class="nav-link" href="login/index.html">Logout</a>
      </li> -->

    </ul>

    <ul class="nav navbar-nav float-right mr-0 hidden-sm-down">
      <li class="nav-item">
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#searchModal">
          <span class="icon icon-magnifying-glass"></span>
            Αναζήτηση
        </button>
      </li>
    </ul>

    <!-- Will be added later if the application uses avatar img
    <ul id="#js-popoverContent" class="nav navbar-nav float-right mr-0 hidden-sm-down">
      <li class="nav-item ml-2">
        <button class="btn btn-default navbar-btn navbar-btn-avatar" data-toggle="popover">
          <img class="rounded-circle" src="assets/img/avatar-dhg.png">
        </button>
      </li>
    </ul> -->

    <!-- Will be used later with login functionality
    <ul class="nav navbar-nav hidden-xs-up" id="js-popoverContent">
      <li class="nav-item"><a class="nav-link" href="#" data-action="growl">Growl</a></li>
      <li class="nav-item"><a class="nav-link" href="login/index.html">Logout</a></li>
    </ul>
  </div>
  -->

</nav>

<!-- Searh Modal -->

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Αναζήτηση</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>

      <div class="modal-body p-0">
        <div class="modal-body-scroller">
        <ul class="media-list media-list-users list-group">
          <li class="list-group-item">
              <div class="media w-100">
              <div class="media-body">
                  <form class="form-inline" id="search-form" method="POST" action="<?php echo BASE_URI ?>application/search.php">
                  <input id="search-query" name="search" class="form-control w-100" type="text" placeholder="Πληκτρολογείστε μία λέξη κλειδί..">
                  </form>
              </div>
              </div>
          </li>
        </ul>
        <ul class="media-list media-list-users list-group" id="search-result">
        </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>