<?php if(allow('master')) : ?>
<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Reset Password Admin</h2>
    
    <form action="/Home/updatepassword/<?= $akun_admin['id'];?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $akun_admin['slug'];?>">
    <input type="hidden" name="fotoLama" value="<?= $akun_admin['foto'];?>">


  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '';?>" id="password" name="password" autofocus value= "<?= old('password');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('password');?>
    </div>
    </div>
  </div>

  <a href="/Home/index" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Ubah Password</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>
<?php endif; ?>