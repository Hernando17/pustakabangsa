<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form ubah List Pustakawan</h2>
    
    <form action="/Pustakawan/update/<?= $pustakawan['id'];?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $pustakawan['slug'];?>">
    <input type="hidden" name="fotoLama" value="<?= $pustakawan['foto'];?>">
    <input type="hidden" name="pustakawanLama" value="<?= $pustakawan['username'];?>">


  <div class="row mb-3">
    <label for="username" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '';?>" id="username" name="username" autofocus value= "<?= (old('username')) ? old('username') : $pustakawan['username'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('username');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '';?>" id="jabatan" name="jabatan" autofocus value= "<?= (old('jabatan')) ? old('jabatan') : $pustakawan['jabatan'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('jabatan');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('twitter')) ? 'is-invalid' : '';?>" id="twitter" name="twitter" value= "<?= (old('twitter')) ? old('twitter') : $pustakawan['twitter'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('twitter');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('instagram')) ? 'is-invalid' : '';?>" id="instagram" name="instagram" value= "<?= (old('instagram')) ? old('instagram') : $pustakawan['instagram'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('pustakawan');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('facebook')) ? 'is-invalid' : '';?>" id="facebook" name="facebook" value= "<?= (old('facebook')) ? old('facebook') : $pustakawan['facebook'] ;?>">
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
    <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '';?>" type="file" id="foto" name="foto" value="<?= (old('foto')) ? old('foto') : $pustakawan['foto'] ;?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('foto');?>
    </div>
    </div>
    </div>
  </div>

<a href="/Pustakawan/<?= $pustakawan['slug'];?>" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Ubah data Pustakawan</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>