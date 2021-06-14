<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<title><?= $title; ?></title>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-2">Detail Admin</h2>
      <div class="row g-0">
        <div class="col-md-2.5 img-fluid">
          <img src="<?= base_url(); ?>/assets/img/admin/<?= $akun_admin['foto']; ?>" width="200px" height="200px" alt="..." style="float:left;" class="my-4 ml-2">
        </div>
        <div class="col-md-8 ">
          <div class="card-body">
            <h5 class="card-title "><b>Nama : <?= $akun_admin['username']; ?></b></h5>
            <p class="card-text ">Role : <?= $akun_admin['role']; ?></p>
            <p class="card-text ">Email : <?= $akun_admin['email']; ?></p>
            <p class="card-text "><small class="text-muted">Waktu Pembuatan pertama : <?= $akun_admin['created_at']; ?></small></p>
            <p class="card-text "><small class="text-muted">Update Terakhir : <?= $akun_admin['updated_at']; ?></small></p>
            <a href="/Home/Dashboard" class="btn btn-primary">Kembali</a>
            <a href="/Home/edit/<?= $akun_admin['slug']; ?>" class="btn btn-success">Edit</a>




          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>