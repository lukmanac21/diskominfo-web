<div id="pricing" class="pricing-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>WEBSITE OPD</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($opd as $data){?>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="<?= base_url()?>/assets/upload/file/<?= $data->picture?>" alt="">
                </a>
              </div>
              <div class="team-content text-center">
                <h4><?= $data->judul?></h4>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>