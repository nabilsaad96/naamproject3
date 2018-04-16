<!-- Homepage:-->
<main role="main">
  <!-- Carosel:-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    </ol>
    <div class="carousel-inner">
      <!-- Item:-->
      <div class="carousel-item max-height-664 active">
        <a href="<?= BASE_URL ?>/stories/view/66">
          <img class="first-slide img-fluid d-block" src="<?= BASE_URL ?>/public/img/FourChaplains.jpg" alt="Picture of a WWII funeral">
        </a>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>The Story of The Four Chaplains.</h1>
          </div>
        </div>
      </div>
      <!-- Item:-->
      <div class="carousel-item max-height-664">
        <a href="<?= BASE_URL ?>/stories/view/55">
          <img class="second-slide img-fluid d-block" src="<?= BASE_URL ?>/public/img/Father.jpg" alt="Picture of a WWII funeral">
        </a>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Father John McGovern gives mass in France during World War II.</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Control:-->
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</main>
