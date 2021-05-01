<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- meta data & title -->
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="https://kit.fontawesome.com/5e59a4bfec.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet" />
        
        <style>
            @media (min-width: 768px) {
              /* show 3 items */
              .carousel-inner .active,
              .carousel-inner .active + .carousel-item,
              .carousel-inner .active + .carousel-item + .carousel-item {
                display: block;
              }

              .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
              .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
              .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
                transition: none;
              }

              .carousel-inner .carousel-item-next,
              .carousel-inner .carousel-item-prev {
                position: relative;
                transform: translate3d(0, 0, 0);
              }

              .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item {
                position: absolute;
                top: 0;
                right: -33.3333%;
                z-index: -1;
                display: block;
                visibility: visible;
              }

              /* left or forward direction */
              .active.carousel-item-left + .carousel-item-next.carousel-item-left,
              .carousel-item-next.carousel-item-left + .carousel-item,
              .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
              .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
                position: relative;
                transform: translate3d(-100%, 0, 0);
                visibility: visible;
              }

              /* farthest right hidden item must be abso position for animations */
              .carousel-inner .carousel-item-prev.carousel-item-right {
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                display: block;
                visibility: visible;
              }

              /* right or prev direction */
              .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
              .carousel-item-prev.carousel-item-right + .carousel-item,
              .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
              .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
                position: relative;
                transform: translate3d(100%, 0, 0);
                visibility: visible;
                display: block;
                visibility: visible;
              }
            }
        </style>
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/custom1.css">
        <base target="_parent">
    </head>
  <body id="bg_general" class="animated fadein" data-spy="scroll" data-target="wrapper" data-offset="50">

      <!-- <div id="loader"></div> -->

      <div id="wrapper" style="" class="animate-bottom">
        <div class="container-fluid">
  <!-- <h1 class="text-center mb-3">Bootstrap Multi-Card Carousel</h1> -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner row w-100 mx-auto">
      <div class="carousel-item col-md-4 active">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f44242/fff" alt="Card image cap">
          <div class="card-body">
            <a href="<?= base_url('news');?>"><h4 class="card-title">Card 1</h4></a>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/418cf4/fff" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card 2</h4>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/3ed846/fff" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card 3</h4>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/42ebf4/fff" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card 4</h4>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f49b41/fff" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card 5</h4>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f4f141/fff" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card 6</h4>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="http://placehold.it/800x600/8e41f4/fff" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card 7</h4>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="text-dark" aria-hidden="true"><i class="fas fa-chevron-circle-left fa-3x"></i></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="text-dark" aria-hidden="true"><i class="fas fa-chevron-circle-right fa-3x"></i></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});
    </script> 

</body>
</html>