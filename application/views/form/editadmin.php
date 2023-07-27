
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Edit Profile Admin</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile <?= $admin['username']?></h6>
                </div>
                <div class="card-body">
                  
                <?= $this->session->flashdata('message'); ?>
                <form method="POST">
                <input type="hidden" name="id" value="<?= $admin['id']; ?>">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="username" name="username" value="<?= $admin['username']?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>    
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?= $admin['nama']?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select id="role" name="role" class="form-control">
                        <?php foreach( $role as $r ) : ?>
                            <?php if( $r == $admin['role'] ) : ?>
                                    <option value="<?= $r; ?>" selected><?php if($r=='1') :?>
                                                                        <?= 'Administrator' ?>
                                                                        <?php else : ?>
                                                                        <?= 'User' ?>
                                                                        <?php endif ;?>
                                                                        </option>

                                <?php else : ?>
                                    <option value="<?= $r; ?>"><?php if($r=='1') :?>
                                                               <?= 'Administrator' ?>
                                                               <?php else : ?>
                                                               <?= 'User' ?>
                                                               <?php endif ;?></option>
                            
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </select>
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="reset" value="1">
                        <label class="custom-control-label" for="customSwitch1">Reset Password</label>
                        </div>
                    </div>
                </div>
                 
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
                </div>
              </div>

        </div>
      </div>
     
