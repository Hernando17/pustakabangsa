<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form Tambah List Pustakawan</h2>
    
    <form action="/Pustakawan/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>

  <div class="row mb-3">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '';?>" id="username" name="username" autofocus value= "<?= old('username');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('username');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '';?>" id="jabatan" name="jabatan" autofocus value= "<?= old('jabatan');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('jabatan');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="twitter" class="col-sm-2 col-form-label">Link Twitter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('twitter')) ? 'is-invalid' : '';?>" id="twitter" name="twitter" value= "<?= old('twitter');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('twitter');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="instagram" class="col-sm-2 col-form-label">Link Instagram</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('instagram')) ? 'is-invalid' : '';?>" id="instagram" name="instagram" value= "<?= old('instagram');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('instagram');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="facebook" class="col-sm-2 col-form-label">Link Facebook</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('facebook')) ? 'is-invalid' : '';?>" id="facebook" name="facebook" value= "<?= old('facebook');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('facebook');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="foto" class="col-sm-2 col-form-label">Foto Profile</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <label for="foto" class="form-label">Rekomendasi dan maksimal resolusi Foto adalah 853x1280</label>
    <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '';?>" type="file" id="foto" name="foto" value= "<?= old('foto');?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('foto');?>
    </div>
    </div>
    </div>
  </div>

  <a href="/Pustakawan/index" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Tambah Pustakawan</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>