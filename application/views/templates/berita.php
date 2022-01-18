<div id="blog" class="blog-area">
      <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Berita Terbaru</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <?php foreach($berita as $data){?>
            <!-- Start Left Blog -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="blog.html">
                    <img src="<?= base_url()?>assets/upload/file/<?=$data->picture?>" alt="">
                  </a>
                </div>
                <div class="blog-meta">
                  <span class="date-type">
                    <i class="fa fa-calendar"></i><?= $data->date?>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="blog.html"><?= $data->judul?></a>
                  </h4>
                  <p>
                    <?= substr($data->isi, 30);?>
                  </p>
                </div>
                <span>
                  <a href="<?= site_url('detail/'.$data->id)?>" class="ready-btn">Lebih Banyak</a>
                </span>
              </div>
              <!-- Start single blog -->
            </div>
            <!-- End Left Blog-->
            <?php }?>
          </div>
        </div>
      </div>
    </div>