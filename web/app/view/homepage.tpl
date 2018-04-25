<!-- Homepage:-->
<main role="main">
  <!-- Carosel:-->
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Project 3</h1>
      <p class="lead text-muted">By Nabil Saad and Amy Judd</p>
    </div>
  </section>


  <div class="row">
    <div class="col-4">
      <h2 style="margin-left:30px;">Relations</h2>
      <div class="list-group" style="margin-left:30px;">
        <a href="<?= BASE_URL ?>/physicalserverrelation/view/" class="list-group-item list-group-item-action">Physical Servers</a>
        <a href="<?= BASE_URL ?>/virtualserverrelation/view/" class="list-group-item list-group-item-action">Virtual Servers</a>
        <a href="<?= BASE_URL ?>/databaserelation/view/" class="list-group-item list-group-item-action">Databases</a>
        <a href="<?= BASE_URL ?>/dockerswarmrelation/view/" class="list-group-item list-group-item-action">Docker Swarms</a>
        <a href="<?= BASE_URL ?>/hardwareloadbalancerrelation/view/" class="list-group-item list-group-item-action">Hardware Load Balancers</a>
        <a href="<?= BASE_URL ?>/applicationrelation/view/" class="list-group-item list-group-item-action">Applications</a>
      </div>
    </div>

    <div class="col-4">
      <form method="POST" action="<?= BASE_URL ?>/login/process/" class="form-signin text-center">
        <h3>Ad-Hoc Query</h3>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Enter Query" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" onclick="window.location='<?= BASE_URL ?>';" type="button">Clear</button>
            <button type="submit" class="btn btn-outline-secondary" type="button">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <div class="col-4">
      <h2>List Dependencies</h2>
      <div class="list-group" style="margin-right:30px;">
        <a href="<?= BASE_URL ?>/dependency/view/" class="list-group-item list-group-item-action">Depended On</a>
        <a href="<?= BASE_URL ?>/dependent/view/" class="list-group-item list-group-item-action">Dependent Upon</a>
        <a href="<?= BASE_URL ?>/showRecentChanges/" class="list-group-item list-group-item-action">Recent Changes</a>
        <a href="<?= BASE_URL ?>/makeChanges/view/" class="list-group-item list-group-item-action">Docker Swarms</a>
      </div>
    </div>
  </div>



</main>
