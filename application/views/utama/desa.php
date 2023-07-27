
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Informasi Desa</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tentang Desa</h6>
                </div>
                <div class="card-body">
                <form method="POST"  enctype="multipart/form-data">
                    
                  <?= $this->session->flashdata('message'); ?>
                  <input type="hidden" id="foto" name="foto" class="form-control" value="<?= $kontak['6']['isi']?>"/>
                <div class="form-group row">
                    <label for="visi" class="col-sm-2 col-form-label"><?= $kontak['4']['field'] ?></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <textarea class="form-control" id="visi" name="visi" rows="5" readonly><?= $kontak['4']['isi'] ?></textarea>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id="editvisi">Edit</button>
                            </div>
                        </div>
                        <?= form_error('visi', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <script>
                    document.getElementById('editvisi').onclick = function() {
                    document.getElementById('visi').removeAttribute('readonly');
                    };
                </script>    
                <div class="form-group row">
                <label for="misi" class="col-sm-2 col-form-label"><?= $kontak['5']['field'] ?></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">
                            <textarea class="form-control" id="misi" name="misi" rows="5" readonly><?= $kontak['5']['isi'] ?></textarea>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" type="button" id="editmisi">Edit</button>
                            </div>
                        </div>
                        <?= form_error('misi', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <script>
                    document.getElementById('editmisi').onclick = function() {
                    document.getElementById('misi').removeAttribute('readonly');
                    };
                </script>
                <div class="row">
                    <label for="struktur" class="col-sm-2 col-form-label"><?= $kontak['6']['field'] ?></label>
                    <div class="col-sm-10">
                        <img src="<?= base_url('assets/img/'.$kontak['6']['isi'])?>" class="img-thumbnail mb-3">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="upload" class="col-sm-2 col-form-label">Upload</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-1">    
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file Max: 3MB</label>
                        </div>
                    </div>
                </div>              
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
                </div>
              </div>

        </div>
      </div>
     
