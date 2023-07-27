
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Edit Kependudukan Rukun Warga</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Rukun Warga (RW.<?= $penduduk['rw'] ?>) </h6>
                </div>
                <div class="card-body">
                  
                <?= $this->session->flashdata('message'); ?>
                <form method="POST">
                <input type="hidden" name="id" value="<?= $penduduk['id'] ?>">
                <div class="form-group row">
                    <label for="rw" class="col-sm-2 col-form-label">No Rukun Warga</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="rw" name="rw" value="<?= $penduduk['rw'] ?>">
                    <?= form_error('rw', '<small class="text-danger pl-3">', '</small>') ?>    
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ketua" class="col-sm-2 col-form-label">Nama Ketua RW</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="ketua" name="ketua" value="<?= $penduduk['ketua_rw'] ?>">
                    <?= form_error('ketua', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-2 col-form-label">Nama Lokasi RW</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $penduduk['lokasi_rw'] ?>">
                    <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="warga" class="col-sm-2 col-form-label">Jumlah Penduduk</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="warga" name="warga" value="<?= $penduduk['jumlah_warga'] ?>">
                    <?= form_error('warga', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kk" class="col-sm-2 col-form-label">Jumlah Kartu Keluarga</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="kk" name="kk" value="<?= $penduduk['jumlah_kk'] ?>">
                    <?= form_error('kk', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rt" class="col-sm-2 col-form-label">Jumlah RT</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="rt" name="rt" value="<?= $penduduk['jumlah_rt'] ?>">
                    <?= form_error('rt', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                 
                <button type="submit" class="btn btn-primary float-right">Simpan</button>

                </form>
                </div>
              </div>

        </div>
      </div>
     
