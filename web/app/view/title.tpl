<!DOCTYPE html>
<html lang="en">
<head>
  <title>WWII Chaplains | Home</title>
  <meta charset="utf-8"/>
  <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/styles.css" />
  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/scripts-jquery.js"></script>
  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/Comments.js"></script>
  <script type="text/javascript">
    var base_url = '<?= BASE_URL ?>';
  </script>
</head>
<body>


  <div id="crest">
    <img src="<?= BASE_URL ?>/public/img/ChaplainLogo.png" alt="Royal Family Crest" />
    <!-- http://www.fvsu.edu/about-fort-valley-state-university/academics/college-of-arts-and-sciences/the-reserve-officers-training-corps-rotc-military-science/army-branches/chaplaincorps/ -->
  </div>
  <h1>WWII Chaplains</h1>

  <!-- Navigation: -->
  <ul class='nav' id='menubar'>
    <li><a href="<?= BASE_URL ?>">Home</a></li>
    <?php if(isset($_SESSION['username'])): ?>
    <li><a href="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>">Profile</a></li>
  <?php endif; ?>
    <li><a href="<?= BASE_URL ?>/stories/">Stories</a></li>
    <?php if(isset($_SESSION['username'])): ?>
      <li>Logged in as <strong><?= $_SESSION['username'] ?></strong></li>
      <li><a href="<?= BASE_URL ?>/logout/">Logout</a></li>
    <?php else: ?>
      <li><a href="<?= BASE_URL ?>/login/">Login</a></li>
    <?php endif; ?>
  </ul>
