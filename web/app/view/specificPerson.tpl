<div class="container">
  <h2 class="my-3"><?= substr($story->title,0,60) ?></h2>
  <div class="row">
    <div class="col">
      <?php if($story->file_name != null): ?>
        <img src="<?= BASE_URL ?>/public/img/<?= $story->file_name ?>" alt="Portrait of <?= $story->title ?>" width="475px"/>
      <?php else: ?>
        <svg height="225" class="octicon octicon-note" viewBox="0.5 1 13 13" version="1.1" width="100%" aria-hidden="true">
          <path fill-rule="evenodd" d="M3 10h4V9H3v1zm0-2h6V7H3v1zm0-2h8V5H3v1zm10 6H1V3h12v9zM1 2c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h12c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H1z"></path>
        </svg>
      <?php endif; ?>
    </div>
    <div class="col">
      <p class="lead"><p><?= $story->text ?></p></p>

      <?php if(isset($_SESSION['username'])): ?>
        <div>
          <button class="btn btn-secondary my-3" id="editUserButton">Edit</button>
        </div>

        <div id="showinfo">
          <form id="editInfo" action="<?= BASE_URL ?>/stories/view/<?= $story->id ?>/edit/process/" method="POST" style="display: none;">
            <!--<textarea class="form-control" id="summary" name="summary" placeholder="Summary" class="text"></textarea><br> -->
            <textarea class="form-control" id="text" name="text" placeholder="Description" class="text" value=''></textarea><br>
            <button class="btn btn-secondary" id="submitButton">Submit</button>
          </form>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="mt-3 p-3 rounded box-shadow">
  <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>
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
