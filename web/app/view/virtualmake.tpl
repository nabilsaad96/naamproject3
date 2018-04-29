<a href="<?= BASE_URL ?>">Go Back</a>
<div class="row justify-content-md-center">
  <div class="col-6">
    <h2 class="text-center">Update Administrator of Configuration Item</h2>
    <p class="text-center">Select a configuration item to update the administrator of and enter the name of the new administrator.</p>
    <table class="table table-hover table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Admin</th>
          <th scope="col">Backup Admin</th>
        </tr>
      </thead>
        <tbody>
          <?php if($rl != null): ?>
            <?php foreach($rl as $r): ?>
              <?php $s = $r ?>
              <tr onclick="window.location='<?= BASE_URL ?>/makeChanges/virtual/<?=$r->name?>/view/';">
                <td><?= $r->name ?></td>
                <td><?= $r->admin ?></td>
                <td><?= $r->backupAdmin ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="col-4" style="upper-margin:75px">
      <form method = "POST" action= '<?= BASE_URL ?>/makeChanges/virtual/<?= $s->name ?>/view/changes/'>
        <div class="input-group">
          <!--Enter Administrator Name: <input name="admin" type="text" placeholder="Enter Admin Name"> -->
          <input name="admin" type="text" placeholder="Enter Admin Name">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="reset">Clear</button>
          </div>
          <input type="hidden" name="name" type="text" placeholder="<?= $s->name ?>" value="<?= $s->name ?>">
        </div>
        <button type="submit" class="text-center" type="button" <?php if(count($rl) > 1): ?> disabled <?php endif; ?>>Submit</button>
      </form>
    </div>
</div>
