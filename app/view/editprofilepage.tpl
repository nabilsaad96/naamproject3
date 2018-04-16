<div class="container my-3">
  <div class="row">
    <div class="col">
      <img class="img-fluid border rounded" src="<?= BASE_URL ?>/public/img/profile.png" alt="Profile" width="450 px"/></a>
      <!--https://pixabay.com/en/blank-profile-picture-mystery-man-973460/-->
    </div>
    <div class="col">
      <form method="POST" action="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>/edit/fnameprocess/">
        <input type="text" class="input-group-text d-inline bg-white" name="firstName" placeholder="<?=$user->firstName?>" value="<?=$user->firstName?>">
        <input class="btn btn-outline-secondary my-3" type="submit" name="submit" value="Edit First Name">
      </form>
      <form method="POST" action="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>/edit/lnameprocess/">
        <input type="text" class="input-group-text d-inline bg-white" name="lastName" placeholder="<?=$user->lastName?>" value="<?=$user->lastName?>">
        <input class="btn btn-outline-secondary my-3" type="submit" name="submit" value="Edit Last Name">
      </form>
      <form method="POST" action="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>/edit/pwdprocess/">
        <input type="password" class="input-group-text d-inline bg-white" name="password" placeholder="Password" value="">
        <input class="btn btn-outline-secondary my-3" type="submit" name="submit" value="Edit Password">
      </form>
      <form method="POST" action="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>/edit/emailprocess/">
        <input type="text" class="input-group-text d-inline bg-white" name="email" placeholder="<?=$user->email?>" value="<?=$user->email?>">
        <input class="btn btn-outline-secondary my-3" type="submit" name="submit" value="Edit Email">
      </form>
      <form method="POST" action="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>/edit/bdayprocess/">
        <input type="date" class="input-group-text d-inline bg-white" name="birthday" placeholder="Birth Date" value="">
        <input class="btn btn-outline-secondary my-3" type="submit" name="submit" value="Edit Birthday">
      </form>
      <a href="<?= BASE_URL ?>/user/view/<?=$_SESSION['username']?>"><button class="btn btn-primary my-3">Go Back</button></a>
    </div>
  </div>
</div>
