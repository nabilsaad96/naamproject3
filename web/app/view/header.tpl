<!DOCTYPE html>
<html lang="en">
<head>
  <title>Database | Home</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Nabil Saad, Amy Judd">

  <!-- Fonts: -->
  <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>

  <!-- Styling: -->
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/styles.css" />

  <!-- Favicon -->
  <link rel="icon" href="<?= BASE_URL ?>/public/img/icon/favicon.ico">

  <!-- Functionallity: -->
  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/scripts-jquery.js"></script>
  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/Comments.js"></script>
  <!-- Popper & Bootstap framworks: -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navigation Bar: -->
  <nav class="navbar navbar-expand-lg navbar-light border-bottom" class="navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- Logo/Chaplains: -->
    <a class="navbar-brand" href="<?= BASE_URL ?>">
      <!-- https://octicons.github.com/-->
      <svg height="32" class="align-top mr-1" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true">
        <path fill-rule="evenodd" d="M3 5h4v1H3V5zm0 3h4V7H3v1zm0 2h4V9H3v1zm11-5h-4v1h4V5zm0 2h-4v1h4V7zm0 2h-4v1h4V9zm2-6v9c0 .55-.45 1-1 1H9.5l-1 1-1-1H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h5.5l1 1 1-1H15c.55 0 1 .45 1 1zm-8 .5L7.5 3H2v9h6V3.5zm7-.5H9.5l-.5.5V12h6V3z"></path>
      </svg>
      Database
    </a>
    <!-- Responsive collapse:-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Main Navbar viewable by anyone:-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>/getRandom/process">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>/stories/">Stories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>/help/">Help</a>
        </li>
      </ul>
      <?php if(isset($_SESSION['username'])): ?>
        <!-- Logged in:-->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @<?= $_SESSION['username'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>">Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= BASE_URL ?>/logout">Logout</a>
            </div> <!--dropdown-meny dropdown-meny-right-->
          </li>
        </ul>
      <?php else: ?>
        <!-- Logged out:-->
        <form action="<?= BASE_URL ?>/signup" class="form-inline mr-2">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Sign up</button>
        </form>
        <form action="<?= BASE_URL ?>/login" class="form-inline">
          <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Login</button>
        </form>
      <?php endif; ?>
    </div> <!-- collapse navbar-collapse-->
  </nav>
