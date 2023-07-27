
    <div id="carouselExampleCaptions" class="carousel slide wow zoomIn" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('assets/') ?>img/desa.jpg" class="d-block w-100 img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/') ?>img/desa1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="text-center">
      <div class="divider mx-auto"></div>
      <h2 class="title-section">Kantor Desa Laksanamekar</h2>
      
</div>
<div class="container">
  <div class="page-banner home-banner">
    <div class="row align-items-center flex-wrap-reverse h-100">
          <div class="col-md-6 py-5 wow fadeInLeft">
            <h1 class="mb-4">Desa Laksanamekar</h1>
            <p class="text-lg text-grey mb-5">Jl. Raya Batujajar No.270, Laksanamekar, Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553</p>
            <a href="https://goo.gl/maps/BEDSajKsLTRNcZWv6" target="#" class="btn btn-primary btn-split stretched-link">Google Maps<div class="fab"><span class="mai-location-outline"></span></div></a>
          </div>
          <div class="col-md-6 py-5 wow zoomIn">
            <div class="img-fluid text-center">
              <img src="<?= base_url('assets/') ?>img/gbkanan2.png" height="350" alt="">
            </div>
          </div>
        </div>
        <a href="#kontak" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <span class="mai-newspaper"></span>
            </div>
            <div class="body">
              <h5 class="text-secondary">Berita</h5>
              <p>Informasi mengenai berita, dan kegiatan Desa Laksanamekar</p>
              <a href="<?= base_url('listberita')?>" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <span class="mai-newspaper-outline"></span>
            </div>
            <div class="body">
              <h5 class="text-secondary">Visi & Misi</h5>
              <p>Informasi mengenai visi dan misi Desa Laksanamekar</p>
              <a href="<?= base_url('visimisi')?>" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service wow fadeInUp">
            <div class="header">
              <span class="mai-call"></span>
            </div>
            <div class="body">
              <h5 class="text-secondary">Hubungi Kami</h5>
              <p>Informasi mengenai kontak dan lokasi Desa Laksanamekar</p>
              <a href="<?= base_url('hubungikami')?>" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="container">
      <div class="page-banner home-banner" id="kontak">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead"><h3>Desa Laksanamekar</h3></span>
          <div class="divider"></div>

          <p>Desa Laksanamekar mempunyai besar wilayah pemukiman sebesar 105 Ha, persawahan sebesar 40 Ha, perkebunan sebersar 147 Ha, dan pemakaman 4 Ha yang meliputi 16 RW</p>
          <p>Berbatasan dengan Desa Gado Bangkong, Giri Asih, Cibeber, dan Cimerang.</p>
          <p>Berbatasan dengan Kecamatan Ngamprah, Batujajar, dan Cimahi Selatan</p>
          <a href="https://goo.gl/maps/b2nffwVLpMdd8S6e9" target="#" class="btn btn-primary mt-3">Selengkapnya</a>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <div class="maps-container">
              <iframe class="embed-responsive-item" width="400" height="430" src="https://maps.google.com/maps?q=desa%20laksanamekar&t=&z=13&ie=UTF8&iwloc=&output=embed" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Berita</div>
        <h2 class="title-section">Baca berita terbaru kami</h2>
        <div class="divider mx-auto"></div>
      </div>

      <div class="row mt-5">
          <?php if(!$berita) :?>
            <div class="card-service wow fadeInUp">
            <div class="header">
              <span class="mai-newspaper"></span>
            </div>
            <div class="body">
              <h5 class="text-secondary">Informasi Belum Tersedia</h5>
              <p>Mohon Maaf Informasi mengenai berita, dan kegiatan Desa Laksanamekar Belum Tersedia</p>
              <p><b>Terimakasih</b></p>
            </div>
          </div>
          <?php else : ?>
          <?php $i = 1; ?>
          <?php foreach ($berita as $b) : ?>
            <div class="col-lg-4 py-3 wow fadeInUp">
              <div class="card-blog align-items-stretch">
                <div class="header">
                  <div class="post-thumb">
                    <img src="<?= base_url('assets/img/berita/' . $b['image']) ?>" class="img-fluid" alt="">
                  </div>
                </div>
                <div class="body align-items-stretch">
                  <h3 class="post-title"><a href="<?= base_url('listberita/detail/').$b['id']?>"><?= $b['judul'] ?></a></h3>
                  <div class="post-date">
                    <p><?php $text = $b['isi'];
                                if (strlen($text) > 200) {
                                  $text = substr($text, 0, 200);
                                }
                                echo $text ?> </p>
                        </div>
                        <div class="post-date"> <a href="<?= base_url('listberita/detail/').$b['id']?>"> Baca Selengkapnya..</a></div>
                        <?php $tanggal = new DateTime($b['timestamp']);?>
                        <div class="float-left">Oleh :<?= $b['nama']==NULL ? 'admin' : $b['nama'] ?></div>
                      </div>
                      <div class="card-footer mt-3">
                        <small class="text-muted">Publish pada :<?= $stringDate = $tanggal->format('j F Y '); ?></small>
                      </div>
                    </div>
                  </div>
                  
                  
                  <?php if($i++ == 6) : break; ?>
                  <?php endif ?>
                  <?php endforeach ?>
                  
                  
                  <div class="col-12 mt-4 text-center wow fadeInUp">
                    <a href="<?= base_url('listberita')?>" class="btn btn-primary">Liat lebih banyak </a>
                  </div>
                </div>
                <?php endif ?>
              </div>
            </div>