<a href="<?= BASE_URL ?>">Go Back</a>
<div class="row justify-content-md-center">
  <div class="col-6">
    <h1 class="text-center">Pick One</h1><br/><br/>
    <table class="table table-hover table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
        </tr>
      </thead>
        <tbody>
          <?php if($rl != null): ?>
            <?php foreach($rl as $r): ?>
              <tr onclick="window.location='<?= BASE_URL ?>/';">
                <td><?= $r ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
      <?php if($rl == null): ?>
        <h3>Not Dependent on Anything</h3>
      <?php endif; ?>
    </div>
</div>
