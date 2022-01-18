<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('templates/header');?>
</head>

<body>
<?php $this->load->view('templates/navbar');?>
  <main id="main">
    <div class="header-bg page-area">
        <div class="home-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content text-center">
                        <div class="header-bottom">
                            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                <h1 class="title2">Tentang</h1>
                            </div>
                            <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                <h2 class="title3">KOMINFO</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="struktur" class="about-area area-padding" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Struktur Organisasi</h2>
            </div>
          </div>
        </div>
        <?php foreach($struktur as $data){?>
        <div class="row">        
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="well-left" style="text-align:center;">
                <div class="single-well">
                    <img src="<?= base_url()?>/assets/upload/struktur/<?=$data->picture?>"/>
                </div>
                <br>
                <h4><?= $data->name?></h4>
                <p class= "justify"> <?= $data->isi?>
              </div>
            </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php $this->load->view('templates/kontak');?>
  </main>
  <?php $this->load->view('templates/footer'); ?>

  <div id="preloader"></div>
  <?php $this->load->view('templates/js'); ?>

</body>

</html>