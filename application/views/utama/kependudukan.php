<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Informasi Kependudukan</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Rukun Warga Laksanamekar</h6>
              
            </div>
            <div class="card-body">
            <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah Rukun Warga</span>
                  </a>
                  <?= $this->session->flashdata('message'); ?>
                <table class="table table-bordered table-striped" id="penduduk">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Rukun Warga</th>
                      <th>Ketua RW</th>
                      <th>Lokasi RW</th>
                      <th>Jumlah Penduduk</th>
                      <th>Jumlah Kartu Keluarga</th>
                      <th>Jumlah RT</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($penduduk as $w) : ?>
                        <tr>
                        <th scope="row"><?= $i ?></th>
                            <td><?= 'RW. '.$w['rw'] ?></td>
                            <td><?= $w['ketua_rw'] ?></td>
                            <td><?= $w['lokasi_rw'] ?></td>
                            <td><?= $w['jumlah_warga'] ?></td>
                            <td><?= $w['jumlah_kk'] ?></td>
                            <td><?= $w['jumlah_rt'] ?></td>
                            <td>
                            <a href="<?= base_url('kependudukan/ubah/') ?><?= $w['id'] ?>" class="btn btn-warning btn-circle mb-1">
                                <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle mb-1" data-toggle="modal" onclick="confirm_modal('<?= base_url('kependudukan/hapus/') ?><?= $w['id'] ?>','title');" data-target="modal_delete_m_n">
                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <?php $i++; ?>
                            <?php endforeach ?>    
                  </tbody>
                  </tbody>
                </table>
            </div>
          </div>

        <div class="modal fade" id="modal_delete_m_n" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kependudukan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk Kependudukan Rukun Warga?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" id="delete_cancel_link">Batal</button>
                    <a class="btn btn-primary" id="delete_link_m_n">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirm_modal(delete_url, title) {
            jQuery('#modal_delete_m_n').modal('show', {
                backdrop: 'static',
                keyboard: false
            });
            jQuery("#modal_delete_m_n .grt").text(title);
            document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
            document.getElementById('delete_link_m_n').focus();
        }
    </script>

          <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Rukun Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kependudukan/tambah'); ?>" method="POST">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="rw">Rukun Warga</label>
                            <input type="number" class="form-control" id="rw" name="rw" placeholder="Rukun Warga">
                            <?= form_error('rw', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="ketua">Nama Ketua Rukun Warga</label>
                            <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Nama Ketua">
                            <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Nama Lokasi Rukun Warga</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Nama Lokasi">
                            <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="warga">Jumlah Penduduk</label>
                            <input type="number" class="form-control" id="warga" name="warga" placeholder="Jumlah Penduduk">
                            <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kk">Jumlah Kartu Keluarga</label>
                            <input type="number" class="form-control" id="kk" name="kk" placeholder="Jumlah Kartu Keluarga">
                            <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="rt">Jumlah Rukun Tetangga</label>
                            <input type="number" class="form-control" id="rt" name="rt" placeholder="Jumlah Rukun Tetangga">
                            <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>

    </div>
</div>
                                </div>
      </div>
      </div>