
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Profile</h1>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ganti password</h6>
              </div>
              <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                <form method="POST">
                <div class="form-group row">
                    <label for="current_password" class="col-sm-2 col-form-label">Password Saat Ini</label>
                    <div class="col-sm-10">
                    <input type="password"  class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new_password1" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new_password2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
                </div>
              </div>

        </div>
      </div>
     
