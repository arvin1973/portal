 
        <div class="container-fluid">
            
            <h1 class="h3 mb-0 text-gray-800 mb-3">Infromasi Berita</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Post Berita</h6>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                <form action="<?= base_url('berita/tambah')?>" method="post" enctype="multipart/form-data">
	            <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul berita"/>
                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>') ?><br/>
	            <textarea id="isi" name="isi" class="ckeditor"></textarea>
                <?= form_error('isi', '<small class="text-danger pl-3">', '</small>') ?><br/>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file Max: 3MB</label>
                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
                </div>
              </div>
              

        </div>
      </div>
     
