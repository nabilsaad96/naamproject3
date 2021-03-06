<a href="<?= BASE_URL ?>">Go Back</a>
<div class="row justify-content-md-center">
  <div class="col-4">
    <h2 class="text-center">Update Administrator of Configuration Item</h2>
    <p class="text-center">Select a configuration item to update the administrator of and enter the name of the new administrator.</p>
    <div class="list-group" style="margin-right:30px;">
      <a href="<?= BASE_URL ?>/makeChanges/physical/view/" class="list-group-item list-group-item-action">Physical Servers</a>
      <a href="<?= BASE_URL ?>/makeChanges/virtual/view/" class="list-group-item list-group-item-action">Virtual Servers</a>
      <a href="<?= BASE_URL ?>/makeChanges/database/view/" class="list-group-item list-group-item-action">Databases</a>
      <a href="<?= BASE_URL ?>/makeChanges/docker/view/" class="list-group-item list-group-item-action">Docker Swarms</a>
      <a href="<?= BASE_URL ?>/makeChanges/hardware/view/" class="list-group-item list-group-item-action">Hardware Load Balancers</a>
      <a href="<?= BASE_URL ?>/makeChanges/application/view/" class="list-group-item list-group-item-action">Applications</a>
    </div>
  </div>

  <div class="col-4" style="upper-margin:75px">
    <div class="input-group">
      <input name="admin" type="text" placeholder="Enter Admin Name">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="reset">Clear</button>
      </div>
    </div>
    <button type="submit" class="text-center" type="button" disabled>Submit</button>
  </div>
</div>
