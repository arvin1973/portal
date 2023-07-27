 
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Infromasi Berita</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Post Berita</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                  <form action="<?= base_url('berita/setdata')?>"method="POST" enctype="multipart/form-data">
                  <input type="hidden" id="id" name="id" class="form-control" value="<?= $berita['id']?>"/>
                  <input type="hidden" id="foto" name="foto" class="form-control" value="<?= $berita['image']?>"/>
                  <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul berita" value="<?= $berita['judul']?>"/>
                  <?= form_error('judul', '<small class="text-danger pl-3">', '</small>') ?><br/>
                  <div class="container-sm">
                    <img src="<?= base_url('assets/img/berita/'.$berita['image'])?>" class="img-thumbnail mb-3">
                  </div>
                  <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file Max: 3MB</label>
                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
	                <textarea id="edit" name="edit" class="form-control mt-2"><?= $isi?></textarea>
                  <?= form_error('isi', '<small class="text-danger pl-3">', '</small>') ?><br/>
               
                <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                </div>
              </div>
              

        </div> 
      </div>
     
