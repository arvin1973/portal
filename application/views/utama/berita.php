
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Infromasi Berita</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Publish Berita</h6>
                </div>
                <div class="card-body">
                <a href="<?= base_url('berita/tambah') ?>" class="btn btn-success btn-icon-split mb-3" >
                    <span class="icon text-white-50">
                    <i class="fas fa-folder-plus"></i>
                    </span>
                    <span class="text">Tambah Berita</span>
                  </a>
                  <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                <table class="table table-bordered" id="admin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Judul</th>
                      <th scope="col">Isi</th>
                      <th scope="col">Gambar</th>
                      <th scope="col">Author</th>
                      <th scope="col">Tanggal Publish</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($berita as $b) : ?>
                      <tr>
                      <th scope="row"><?= $i ?></th>
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['isi'] ?></td>
                        <td><img src="<?= base_url("assets/img/berita/"). $b['image'];?>" style="width:300px;height:200px;"></td>
                        <td><?= $b['nama']==NULL ? 'admin' : $b['nama'] ?></td>
                        <td><?= $b['timestamp'] ?></td>
                        <td>
                          <a href="<?= base_url('berita/ubah/') ?><?= $b['id'] ?>" class="btn btn-warning btn-circle mb-1">
                            <i class="fas fa-pen"></i>
                          </a>
                          <a href="" class="btn btn-danger btn-circle mb-1" data-toggle="modal" onclick="confirm_modal('<?= base_url('berita/hapus/') ?><?= $b['id'] ?>/<?= $b['image']?>','title');" data-target="modal_delete_m_n">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach ?>  
                  </tbody>   
                </table>
              </div>
              <div class="modal fade" id="modal_delete_m_n" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data berita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk menghapus berita?</div>
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

                </div>
          </div>
        </div>
      </div>
     
