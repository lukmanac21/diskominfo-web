<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <!-- <h1><a href="index.html"><span>e</span>Business</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?= base_url()?>assets/frontend/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto" href="<?= base_url()?>Home/index">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url()?>Home/visimisi">Visi Misi</a></li>
              <li><a href="<?= base_url()?>Home/tupoksi">Tupoksi</a></li>
              <li><a href="<?= base_url()?>Home/struktur">Struktur Organisasi</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Egoverment</a></li>
              <li><a href="#">PPID</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Pengumuman</a></li>
              <li><a href="#">Berita</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Foto</a></li>
              <li><a href="#">Video</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#about">Portal</a></li>
          <li><a class="nav-link scrollto" href="#services">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->