<div class="row justify-content-md-center">
  <div class="col-4">
    <h2 class="text-center">View Items that Depend on Selected Item</h2>
    <p class="text-center">Select a configuration item type to see what it depends on.</p>

    <div class="list-group" style="margin-right:30px;">
      <a href="<?= BASE_URL ?>/physicalserverrelationdep/view/" class="list-group-item list-group-item-action">Physical Servers</a>
      <a href="<?= BASE_URL ?>/virtualserverrelationdep/view/" class="list-group-item list-group-item-action">Virtual Servers</a>
      <a href="<?= BASE_URL ?>/databaserelationdep/view/" class="list-group-item list-group-item-action">Databases</a>
      <a href="<?= BASE_URL ?>/dockerswarmrelationdep/view/" class="list-group-item list-group-item-action">Docker Swarms</a>
      <a href="<?= BASE_URL ?>/hardwareloadbalancerrelationdep/view/" class="list-group-item list-group-item-action">Hardware Load Balancers</a>
      <a href="<?= BASE_URL ?>/applicationrelationdep/view/" class="list-group-item list-group-item-action">Applications</a>
    </div>
  </div>
</div>
