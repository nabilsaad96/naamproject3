<a href="<?= BASE_URL ?>">Go Back</a>
<div class="row justify-content-md-center">
  <div class="col-6">
    <h1 class="text-center">Output for <?= $q ?></h1><br/><br/>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <?php foreach($keys as $key): ?>
            <th scope="col"><?= $key ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
        <tbody>
          <?php if($rl != null): ?>
            <?php foreach($rl as $r): ?>
              <tr>
                <?php foreach($keys as $key): ?>
                  <td><?= $r[$key] ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
</div>
