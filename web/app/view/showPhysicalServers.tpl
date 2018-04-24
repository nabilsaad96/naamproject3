

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
