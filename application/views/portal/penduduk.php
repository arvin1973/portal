<div class="page-section">
    <div class="container">
    <nav aria-label="Breadcrumb" class="mb-4">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="<?= base_url('overview')?>">Beranda</a></li>
          <li class="breadcrumb-item active">Kependudukan</li>
        </ul>
    </nav>
</div>
    <div class="page-section bg-light">
    <div class="container">
    <div class="text-center wow fadeInUp">
        <div class="subhead">Kependudukan</div>
        <h2 class="title-section">Data Kependudukan Desa Laksanamekar</h2>
        <div class="divider mx-auto"></div>
      </div>
        <div class="table-responsive wow fadeInUp">
            <table class="table table-striped" id="rw" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr >
                        <th scope="col">Rukun Warga</th>
                        <th scope="col">Ketua RW</th>
                        <th scope="col">Lokasi RW</th>
                        <th scope="col">Jumlah Penduduk</th>
                        <th scope="col">Jumlah Kartu Keluarga</th>
                        <th scope="col">Jumlah Rukun Tetangga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penduduk as $w) : ?>
                        <tr>
                            <td><?= 'RW. '. $w['rw'] ?></td>
                            <td><?= $w['ketua_rw'] ?></td>
                            <td><?= $w['lokasi_rw'] ?></td>
                            <td><?= number_format($w['jumlah_warga']).' Jiwa' ?></td>
                            <td><?= number_format($w['jumlah_kk']).' Keluarga' ?></td>
                            <td><?= number_format($w['jumlah_rt']).' RT' ?></td>
                            <?php $i++; ?>
                            <?php endforeach ?>    
                            <tr class="bg-primary text-white">
                                <td colspan="3  ">Jumlah : <?= number_format($rw)?> Rukun Warga</td>
                                <td><?= number_format($sum['jumlah_warga'])?> Jiwa</td>
                                <td><?= number_format($sum['jumlah_kk'])?> Kartu Keluarga</td>
                                <td colspan="2"><?= number_format($sum['jumlah_rt'])?> Rukun Tetangga</td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
    <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Chart Kependudukan</div>
        <h2 class="title-section">Penduduk Desa Laksanamekar</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="chart-bar">
            <canvas id="Penduduk"></canvas>
        </div>

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

    

  
        