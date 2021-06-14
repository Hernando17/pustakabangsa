<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form ubah Organisasi</h2>
    
    <form action="/Organisasi/update/<?= $organisasi['id'];?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $organisasi['slug'];?>">
    <input type="hidden" name="fotoLama" value="<?= $organisasi['foto'];?>">
    <input type="hidden" name="organisasiLama" value="<?= $organisasi['nama'];?>">


  <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '';?>" id="nama" name="nama" autofocus value= "<?= (old('nama')) ? old('nama') : $organisasi['nama'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('nama');?>
    </div>
    </div>
  </div>


  <div class="row mb-3">
    <label for="foto" class="col-sm-2 col-form-label">Logo Organisasi</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <label for="foto" class="form-label">Masukkan Logo dengan format .PNG</label>
    <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '';?>" type="file" id="foto" name="foto" value="<?= (old('foto')) ? old('foto') : $organisasi['foto'] ;?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('foto');?>
    </div>
    </div>
    </div>
  </div>

<a href="/Organisasi/<?= $organisasi['slug'];?>" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Ubah data Organisasi</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>