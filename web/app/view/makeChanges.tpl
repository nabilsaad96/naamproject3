<a href="<?= BASE_URL ?>">Go Back</a>
<div class="row justify-content-md-center">
  <div class="col-4">
    <h2 class="text-center">Update Administrator of Configuration Item</h2>
    <p class="text-center">Select a configuration item to update the administrator of and enter the name of the new administrator.</p>

    <div class="list-group" style="margin-right:30px;">
      <a href="<?= BASE_URL ?>/physicalserverrelationdept/view/" class="list-group-item list-group-item-action">Physical Servers</a>
      <a href="<?= BASE_URL ?>/virtualserverrelationdept/view/" class="list-group-item list-group-item-action">Virtual Servers</a>
      <a href="<?= BASE_URL ?>/databaserelationdept/view/" class="list-group-item list-group-item-action">Databases</a>
      <a href="<?= BASE_URL ?>/dockerswarmrelationdept/view/" class="list-group-item list-group-item-action">Docker Swarms</a>
      <a href="<?= BASE_URL ?>/hardwareloadbalancerrelationdept/view/" class="list-group-item list-group-item-action">Hardware Load Balancers</a>
      <a href="<?= BASE_URL ?>/applicationrelationdept/view/" class="list-group-item list-group-item-action">Applications</a>
    </div>

    <div class="col-4">
      <form method="POST" action="<?= BASE_URL ?>/adhoc/" class="form-signin text-center">
        <h3 class="text-center">Enter Administrator Name</h3>
        <div class="input-group">
          <input type="text" class="form-control" name="adminName" placeholder="Enter Administrator Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" onclick="window.location='<?= BASE_URL ?>';" type="button">Clear</button>
          </div>
        </div>
      </form>
    </div>

    <button type="submit" class="text-center" type="button">Submit</button>
  </div>
</div>
