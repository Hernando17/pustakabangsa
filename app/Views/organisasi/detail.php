<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<title><?= $title; ?></title>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-2">Detail Organisasi</h2>
      <div class="row g-0">
        <div class="col-md-2.5 img-fluid">
          <img src="<?= base_url(); ?>/assets/img/clients/<?= $organisasi['foto']; ?>" width="200px" height="200px" alt="..." style="float:left;" class="my-4 ml-2">
        </div>
        <div class="col-md-8 ">
          <div class="card-body">
            <h5 class="card-title "><b>Nama : <?= $organisasi['nama']; ?></b></h5>
            <p class="card-text "><small class="text-muted">Waktu Upload : <?= $organisasi['created_at']; ?></small></p>
            <p class="card-text "><small class="text-muted">Update Terakhir : <?= $organisasi['updated_at']; ?></small></p>
            <a href="/Organisasi/index" class="btn btn-primary">Kembali</a>
            <a href="/Organisasi/edit/<?= $organisasi['slug']; ?>" class="btn btn-success">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>