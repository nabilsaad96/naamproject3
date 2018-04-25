<a href="<?= BASE_URL ?>">Go Back</a>
<div class="row justify-content-md-center">
  <div class="col-6">
    <h1 class="text-center">Output</h1><br/><br/>
    <table class="table table-striped table-dark">
      <thead>
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
</div>
