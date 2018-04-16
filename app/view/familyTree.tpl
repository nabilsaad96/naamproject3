<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Articles</h1>
      <p class="lead text-muted">Articles on Chaplains of the Second World War!</p>
      <p>
        <?php if(isset($_SESSION['username'])): ?>
          <a href="<?= BASE_URL ?>/stories/add" class="btn btn-primary my-2">Add Article</a>
        <?php endif; ?>
      </p>
    </div>
  </section>

  <div class="album py-5">
    <div class="container">
      <div class="row">
        <?php foreach($stories as $story): ?>
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
              <?php if($story->file_name != null): ?>
                <img class="article-image" src="<?= BASE_URL ?>/public/img/<?= $story->file_name ?>" alt="Photo of <?= $story->title ?>" />
              <?php else: ?>
                <svg height="225" class="octicon octicon-note" viewBox="0.5 1 13 13" version="1.1" width="100%" aria-hidden="true">
                  <path fill-rule="evenodd" d="M3 10h4V9H3v1zm0-2h6V7H3v1zm0-2h8V5H3v1zm10 6H1V3h12v9zM1 2c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h12c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H1z"></path>
                </svg>
              <?php endif; ?>
            <div class="card-body">
              <p class="card-text"><?= substr($story->title,0,28).'...' ?></a></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?= BASE_URL ?>/stories/view/<?= $story->id ?>">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </a>
                  <?php if(isset($_SESSION['username'])): ?>
                    <a class="ml-2" href="<?= BASE_URL ?>/stories/delete/process/<?= $story->id ?>">
                      <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="container my-5">
    <h2>Recent News</h2>
    <?php
      $data = apiController::getNews();
      echo '<a href="'.$data['a0u'].'">'.substr($data['a0t'],0,70).'...'.'</a></br>';
      echo '<a href="'.$data['a1u'].'">'.substr($data['a1t'],0,70).'...'.'</a></br>';
      echo '<a href="'.$data['a2u'].'">'.substr($data['a2t'],0,70).'...'.'</a></br>';
      echo '<a href="'.$data['a3u'].'">'.substr($data['a3t'],0,70).'...'.'</a></br>';
    ?>
  </div>
</main>
