<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('templates/header');?>
</head>

<body>

  <!-- ======= Header ======= -->
<?php $this->load->view('templates/navbar');?>
  <!-- End Header -->

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
        <?php foreach ($slider as $data){?>
        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(<?= base_url()?>assets/frontend/slider/<?= $data->picture?>)">
            <div class="carousel-container">
              <div class="container">
                <a href="#" class="btn-get-started scrollto animate__animated animate__fadeInUp"><?= $data->name?></a>
              </div>
            </div>
          </div>

        </div>
        <?php }?>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <?php $this->load->view('templates/tentang');?>
    <div class="reviews-area">
      <div class="row no-gutters">
        <div class="col-lg-6 py-0">
          <img src="<?= base_url()?>/assets/images/fo/<?=$general['picture_1']?>" class="img-fluid">
        </div>
        <div class="col-lg-6 work-right-text d-flex align-items-center">
          <div class="px-5 py-5 py-lg-0">
            <h2>Bondowoso Melesat</h2>
            <h5>Mandiri Ekonomi, Lestari, Sejahtera, Terdepan dalam bingkai iman dan Takwa.</h5>
            <a href="https://www.youtube.com/channel/UCRYrBX18-2rqZknxDBbW4IA" class="ready-btn scrollto">Link Youtube</a>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/portal');?>

    <!-- End Team Section -->

    <!-- ======= Rviews Section ======= -->
    <?php $this->load->view('templates/berita');?>
    <?php $this->load->view('templates/kontak');?>
  </main>
  <?php $this->load->view('templates/footer'); ?>

  <div id="preloader"></div>
  <?php $this->load->view('templates/js'); ?>

</body>

</html>