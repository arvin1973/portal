
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Informasi Kontak</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Kontak</h6>
                </div>
                <div class="card-body">
                <form method="POST">
                    
                  <?= $this->session->flashdata('message'); ?>
                <div class="form-group row">
                    <label for="Jam" class="col-sm-2 col-form-label"><?= $kontak['0']['field'] ?></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="jam" name="jam" readonly value="<?= $kontak['0']['isi'] ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id="editjam">Edit</button>
                            </div>
                        </div>
                        <?= form_error('jam', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <script>
                    document.getElementById('editjam').onclick = function() {
                    document.getElementById('jam').removeAttribute('readonly');
                    };
                </script>    
                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"><?= $kontak['1']['field'] ?></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="email" name="email" readonly value="<?= $kontak['1']['isi'] ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id="editemail">Edit</button>
                            </div>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <script>
                    document.getElementById('editemail').onclick = function() {
                    document.getElementById('email').removeAttribute('readonly');
                    };
                </script>    
                <div class="form-group row">
                <label for="tlp" class="col-sm-2 col-form-label"><?= $kontak['2']['field'] ?></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="tlp" name="tlp" readonly value="<?= $kontak['2']['isi'] ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id="edittlp">Edit</button>
                            </div>
                        </div>
                        <?= form_error('tlp', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <script>
                    document.getElementById('edittlp').onclick = function() {
                    document.getElementById('tlp').removeAttribute('readonly');
                    };
                </script> 
                <div class="form-group row">
                <label for="wa" class="col-sm-2 col-form-label"><?= $kontak['3']['field'] ?></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="wa" name="wa" readonly value="<?= $kontak['3']['isi'] ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id="editwa">Edit</button>
                            </div>
                        </div>
                        <?= form_error('wa', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <script>
                    document.getElementById('editwa').onclick = function() {
                    document.getElementById('wa').removeAttribute('readonly');
                    };
                </script> 
                
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
                </div>
              </div>

        </div>
      </div>
     
