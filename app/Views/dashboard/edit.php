<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form ubah data Admin </h2>
    
    <form action="/Home/update/<?= $akun_admin['id'];?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $akun_admin['slug'];?>">
    <input type="hidden" name="fotoLama" value="<?= $akun_admin['foto'];?>">

  <?php if(allow('master')) : ?>
  <div class="row mb-3">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
    <select name="role" id="">
          <option hidden value="<?= (old('role')) ? old('role') : $akun_admin['role'] ;?>"><?= $akun_admin['role'] ;?></option>  
          <option value="master">Master</option>
          <option value="admin">Admin</option>
          </select>
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('role');?>
    </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="row mb-3">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '';?>" id="username" name="username" autofocus value= "<?= (old('username')) ? old('username') : $akun_admin['username'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('username');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '';?>" id="email" name="email" value= "<?= (old('email')) ? old('email') : $akun_admin['email'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('email');?>
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

  
  <a href="/Home/<?= $akun_admin['slug'];?>" class="btn btn-primary">Kembali</a>


  <button type="submit" class="btn btn-success">Ubah Data Admin</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>