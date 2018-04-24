<div class="mt-3 p-3 rounded box-shadow">
  <h6 class="border-bottom border-gray pb-2 mb-0">Database Entries</h6>
  <div id="insideInfoBox">
    <?php if($comments != null): ?>
    <?php foreach($comments as $cm): ?>
    <div class="d-flex justify-content-between align-items-center w-100">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <span class="d-block"><?= User::loadById($cm->user_id)->username ?> - <?= $cm->date_created ?></span>
        <?= $cm->comment ?>
      </p>
      <?php if(isset($_SESSION['username'])): ?>
      <?php if($_SESSION['role'] == 2 || $cm->user_id == $_SESSION['user_id']): ?>
        <a href="<?= BASE_URL ?>/stories/view/<?= $story->id ?>"><!--TODO-->
      <button id="<?= $cm->id ?>" type="button" class="fieldOrderDel close" aria-label="Close">
        <span aria-hidden="true">&times;</span></a>
      </button>
      <?php endif; ?>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
<?php if(isset($_SESSION['username'])): ?>
<div class="mx-3">
  <button class="btn btn-secondary my-3" id="showComment">Add a Comment!</button>
  <form id="commentForm" style="display: none;">
    <div class="form-group">
      <textarea class="form-control" id="commentContent" placeholder="Enter Comment"></textarea><br>
      <button class="form-control" id="submitComment">Submit</button>
    </div>
  </form>
</div>
<?php endif; ?>



<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Admin</th>
      <th>Backup Admin</th>
    </tr>
  </thead>
  <tbody>
    <?php if($rl != null): ?>
    <?php foreach($rl as $r): ?>

      <tr>
        <td><?= r->name ?></td>
        <td><?= r->admin ?></td>
        <td><?= r->backupAdmin ?></td>
      </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
