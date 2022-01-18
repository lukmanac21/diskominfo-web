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
    <div id="visimisi" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>VISI MISI</h2>
            </div>
          </div>
        </div>
        <div class="row">        
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="well-left" style="text-align:center;">
                <div class="single-well">
                    <?php foreach($vimi as $data){?>
                      <h4 class="sec-head" style="color:#03254C" ><?= $data->tahun?></h4><br>
                      <h5 class="sec-head" style="color:#FFA500">Visi</h5>
                      <p class= "justify"> <?= $data->visi?>
                        <h5 class="sec-head" style="color:#FFA500">Misi</h5>
                      <p class= "justify">  <?= $data->misi?>
                    <?php } ?>
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