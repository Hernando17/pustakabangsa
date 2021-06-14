<?php if(allow('master')) : ?>
<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form Tambah data Admin </h2>
    
    <form action="/Home/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>

  <div class="row mb-3">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
          <select name="role" id="">
          <option value="master">Master</option>
          <option value="admin">Admin</option>
          </select>
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('role');?>
    </div>
    </div>
  </div>

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
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '';?>" id="email" name="email" value= "<?= old('email');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('email');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '';?>" id="password" name="password" value= "<?= old('password');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('password');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="foto" class="col-sm-2 col-form-label">Foto Profile</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <label for="foto" class="form-label">Pilih gambar</label>
    <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '';?>" type="file" id="foto" name="foto">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('foto');?>
    </div>
    </div>
    </div>
  </div>

  <a href="/Home/index" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Tambah Data Pengguna</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>
<?php endif; ?>