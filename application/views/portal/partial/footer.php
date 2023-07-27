
  <footer class="page-footer bg-image" style="background-image: url(../assets/img/world_pattern.svg);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-4 py-3">
          <h5>Desa Laksanamekar</h5>
          <p>Jl. Raya Batujajar No.270, Laksanamekar, Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553</p>     
          <a href="https://goo.gl/maps/BEDSajKsLTRNcZWv6" target="#" class="btn btn-primary btn-split">Google Maps<div class="fab"><span class="mai-location-outline"></span></div></a>
        </div>
        <div class="col-lg-4 py-3">
          <h5>Navigasi</h5>
          <ul class="footer-menu">
            <li><a href="<?= base_url('overview')?>">Beranda</a></li>
            <li><a href="<?= base_url('listberita')?>">Berita</a></li>
            <li><a href="<?= base_url('hubungikami')?>">Hubungi Kami</a></li>
            <li><a href="<?= base_url('auth')?>">Login Admin</a></li>
          </ul>
        </div>
        <div class="col-lg-4 py-3">
          <h5>Hubungi Kami</h5>
          <p><i class="far fa-clock"> </i> <?= $kontak['0']['isi']?></p>
          <p><i class="far fa-envelope"> </i> <a href="mailto:<?= $kontak['1']['isi']?>"><?= $kontak['1']['isi']?></a></p>
          <p><i class="fas fa-phone"></i> <?= $kontak['2']['isi']?></p>
          <p><i class="fab fa-whatsapp"> </i> <?= $kontak['3']['isi']?></p>
        </div>
      </div>

      </div>
  </footer>

<script src="<?= base_url('assets/') ?>js/jquery-3.5.1.min.js"></script>

<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/') ?>js/google-maps.js"></script>

<script src="<?= base_url('assets/') ?>vendor/wow/wow.min.js"></script>

<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

<script src="<?= base_url('assets/') ?>js/theme.js"></script>

<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-bar-demo.js"></script>
  
<script>
    var ctx = document.getElementById('Penduduk').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: <?= json_encode($chartrw)?>,
            datasets: [{
                    label: 'Jumlah Warga',
                    backgroundColor: 'rgb(108, 85, 249)',
                    borderColor: 'rgb(108, 85, 249)',
                    data: <?= json_encode($chartjumlah_warga)?>
                },
                {
                    label: 'Jumlah Kartu Keluarga',
                    backgroundColor: 'rgb(162, 189, 213)',
                    borderColor: 'rgb(108, 85, 249)',
                    data: <?= json_encode($chartjumlah_kk)?>
                }

            ]
        },

        // Configuration options go here
        options: {}
    });
</script>

</body>
</html>