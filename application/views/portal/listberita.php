<div class="page-section">
    <div class="container">
    <nav aria-label="Breadcrumb" class="mb-4">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="<?= base_url('overview')?>">Beranda</a></li>
          <li class="breadcrumb-item active">List Berita</li>
        </ul>
      </nav>
      <div class="row">
        <div class="col-lg">
          <form action="" class="form-search-blog" method="post">
          <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari berita.." name="keyword1" value=<?= $key?>>
                    <div class="input-group-append" id="button-addon4">
                        <a class="btn btn-outline-primary" href="<?= base_url('listberita') ?>"><i class="fas fa-redo"></i></a>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
          </form>
        </div>
      </div>

      <div class="row my-5">
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
              
              <div class="col-lg-4 py-3  wow fadeInUp">
                <div class="card-blog">
                  <div class="header">
                    <div class="post-thumb">
                      <img src="<?= base_url('assets/img/berita/' . $b['image']) ?>" class="img-fluid" alt="">
                    </div>
                  </div>
                  <div class="body align-items-stretch" >
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
                        <div class="float-left">Oleh : <?= $b['nama']==NULL ? 'admin' : $b['nama'] ?> </div>
                      </div>
                      
                      <div class="card-footer mt-3">
                        <small class="text-muted">Publish pada :<?= $stringDate = $tanggal->format('j F Y '); ?></small>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ?>
                  
                </div>
                <div class="wow fadeInUp">
                  <?= $this->pagination->create_links()?>
                </div>
                <?php endif ?>  
      
      
    </div>
  </div>
  