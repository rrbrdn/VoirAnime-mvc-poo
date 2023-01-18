<?php ob_start() ?>


<div class="d-flex justify-content-center mt-5">
  <div id="carouselWithControls" class="carousel slide pointer-event" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://static.crunchyroll.com/fms/landscape_poster/960x540/100/png/4eb8686c-7ed6-4514-8f47-1145cd5cacab.webp" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="https://static.crunchyroll.com/fms/landscape_poster/960x540/100/png/60e81b04-545e-4faa-83ab-27dcf788986a.webp" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="https://static.crunchyroll.com/fms/landscape_poster/960x540/100/png/7ec2c6f5-59d2-495f-b79c-a4fe104a8348.webp" class="d-block w-100" alt="Slide 3">
      </div>
      <div class="carousel-item">
        <img src="https://static.crunchyroll.com/fms/landscape_poster/960x540/100/png/610f885a-1215-430f-817a-342584954416.webp" class="d-block w-100" alt="Slide 4">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselWithControls" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselWithControls" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>
</div>

<div class="wrapper">
  <h2><strong>Animes</strong></h2>

  <div class="container">
    <div class="cards">
      <?php foreach ($myAnimes as $anime) : ?>
        <a href="<?= URL ?>accueil/showAnime/<?= $anime['id'] ?>">
          <figure class="card">
            <img src="./asset/img/<?= $anime['img'] ?>">
          </figure>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>


<?php

$class = "container-fluid";

$content = ob_get_clean();

require_once "view/base.html.php";
?>