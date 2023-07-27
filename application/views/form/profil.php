
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Profile</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                </div>
                <div class="card-body">
                  
                <?= $this->session->flashdata('message'); ?>
                <form method="POST">
                <div class="form-group row">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="username" name="username" value="<?= $user['username'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
                </div>
              </div>

        </div>
      </div>
     
