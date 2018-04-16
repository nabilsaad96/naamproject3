<div class="pt-5 text-center">
  <?php if($user->file_name != null): ?>
    <img class="img-fluid" src="<?= BASE_URL ?>/public/img/<?= $person->file_name ?>" alt="Portrait of <?= $person->first_name ?>" style="width: 250px"/>
  <?php else: ?>
    <img class="img-fluid" src="<?= BASE_URL ?>/public/img/profile.png" alt="No portrait available" style="width: 250px"/>
    <!--https://pixabay.com/en/blank-profile-picture-mystery-man-973460/-->
  <?php endif; ?>
  <h2 class="my-3"><?= substr($user->first_name,0,60) ?></h2>
</div>
<div class="container">
  <div class="row">
    <div class="col text-center">
      <h3><?=$user->firstName?> <?=$user->lastName?> (@<?=$user->username?>)</h2>
      <h5>Birthday: <?=$user->birthday?></h3>
      <h5>Email: <?=$user->email?></h3>
      <?php if($_SESSION['username'] == $user->username):?>
        <form action="<?= BASE_URL ?>/user/view/<?=$user->username?>/edit/">
            <input type="submit" class="my-2 btn btn-primary" value="Edit Details" />
        </form>
      <?php endif; ?>
      <?php if($_SESSION['username'] != $user->username):?>
        <form action="<?= BASE_URL ?>/user/view/<?=$user->username?>/addfollowerprocess/<?=$_SESSION['username']?>">
            <input type="submit" class="my-2 btn btn-primary" value="Follow User" />
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Followers-->
<div class="my-3 p-3 rounded box-shadow">
  <h6 class="border-bottom border-gray pb-2 mb-0"><?=sizeof($followers)?> Following</h6>
  <?php foreach($followers as $person): ?>
    <a href="<?= BASE_URL ?>/user/view/<?=$person->followee?>">
      <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_162bb438e28%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_162bb438e28%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
      </a>
        <?php if($_SESSION['username'] == $user->username):?>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <a href="<?= BASE_URL ?>/user/view/<?=$user->username?>/deletefollowerprocess/<?=$person->followee?>/"><button type="button" class="close mr-2" aria-label="Close">
              <span aria-hidden="true">&times;</span></a>
            </button>
        <?php endif; ?>
        <a href="<?= BASE_URL ?>/user/view/<?=$person->followee?>">
          <strong class="d-block text-gray-dark">@<?=$person->followee?></strong>
        </a>
        </p>
      </div>
    <?php endforeach; ?>
</div>

<!-- Following -->
<div class="my-3 p-3 rounded box-shadow">
  <h6 class="border-bottom border-gray pb-2 mb-0"><?=sizeof($people)?> Followers</h6>
  <?php foreach($people as $person): ?>
    <a href="<?= BASE_URL ?>/user/view/<?=$person->follower?>">
      <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_162bb438e28%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_162bb438e28%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
    </a>
        <p class="media-body pb-4 mb-0 small lh-125 border-bottom border-gray">
          <a href="<?= BASE_URL ?>/user/view/<?=$person->follower?>">
            <strong class="d-block text-gray-dark">@<?=$person->follower?></strong>
          </a>
        </p>
      </div>
    <?php endforeach; ?>
</div>


<div class="my-3 p-3 rounded box-shadow">
  <h6 class="border-bottom border-gray pb-2 mb-0">Recent Actions</h6>
<?php foreach($events as $event): ?>
<div class="media text-muted pt-3">
  <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_162bb438e28%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_162bb438e28%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.546875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
    <strong class="d-block text-gray-dark">@<?php $user = User::loadById($event->user_id); echo($user->username); echo(' '); echo($event->date_created) ?></strong>
    <?= $event->text ?>
  </p>
</div>
<?php endforeach; ?>
</div>
