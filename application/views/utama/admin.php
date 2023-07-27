<div class="container">
<h1 class="h3 mb-2 text-gray-800">Kelola Admin</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data admin</h6>
              
            </div>
            <div class="card-body">
            <a href="#" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah User</span>
                  </a>
                  <?= $this->session->flashdata('message'); ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="admin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Role</th>
                      <th scope="col">Tanggal Masukan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($admin as $w) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $w['username'] ?></td>
                            <td><?= $w['nama'] ?></td>
                            <td><?php if($w['role'] == '1') :?>
                                <?= 'Administrator' ?>
                                <?php else :?>
                                <?= 'User' ?>
                                <?php endif; ?>  
                            </td>
                            <td><?= $w['timestamp'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/ubah/') ?><?= $w['id'] ?>" class="btn btn-warning btn-circle mb-1">
                                <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle mb-1" data-toggle="modal" onclick="confirm_modal('<?= base_url('admin/hapus/') ?><?= $w['id'] ?>','title');" data-target="modal_delete_m_n">
                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>  
                </table>
              </div>
            </div>
          </div>

        <div class="modal fade" id="modal_delete_m_n" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus data admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk menghapus admin?</div>
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
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah'); ?>" method="POST">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" name="role" class="form-control">
                              <option value="1">Administrator</option>
                              <option value="2">User</option>
                        </select>
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