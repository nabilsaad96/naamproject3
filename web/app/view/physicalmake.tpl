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
              <tr>
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
      <form action="<?= BASE_URL ?>/applicationrelationdep/<?=$r->name?>" method = "post">
        <div class="input-group">
          Enter Administrator Name: <input name="name" type="text">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="reset">Clear</button>
          </div>
        </div>
        <button type="submit" class="text-center" type="button">Submit</button>
      </form>
    </div>
</div>
