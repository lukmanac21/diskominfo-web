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
    <div id="tupoksi" class="about-area area-padding" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Tugas Pokok Dan Fungsi</h2>
              <div class="well-left">
                <div class="single-well">
                  <?php foreach($tupoksi as $data){?>
                  <h5 class="sec-head" style="color:#FFA500">Tugas</h5>
                  <p class= "justify"> <?= $data->tugas?>
                  <br><br><br>
                  <h5 class="sec-head" style="color:#FFA500">Fungsi</h5>
                  <p class= "justify"> <?= $data->fungsi?>
                  <?php }?>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/kontak');?>
  </main>
  <?php $this->load->view('templates/footer'); ?>

  <div id="preloader"></div>
  <?php $this->load->view('templates/js'); ?>

</body>

</html>