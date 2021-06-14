<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<title><?= $title; ?></title>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-2">Detail Book</h2>
      <div class="row g-0">
        <div class="col-md-2.5 img-fluid">
          <img src="<?= base_url(); ?>/assets/img/sampul/<?= $offline['sampul']; ?>" width="150px" height="200px" alt="..." style="float:left;" class="my-4 ml-2">
        </div>
        <div class="col-md-8 ">
          <div class="card-body">
            <h5 class="card-title "><b>Judul : <?= $offline['judul']; ?></b></h5>
            <hr>
            <p class="card-text ">Kode Buku : <?= $offline['kode']; ?></p>
            <p class="card-text ">ISBN : <?= $offline['isbn']; ?></p>
            <p class="card-text ">Kategori : <?= $offline['genre']; ?></p>
            <p class="card-text ">Penulis : <?= $offline['penulis']; ?></p>
            <p class="card-text ">Penerbit : <?= $offline['penerbit']; ?></p>
            <p class="card-text ">Persediaan : <?= $offline['stock']; ?></p>
            <p class="card-text ">Deskripsi : <?= $offline['deskripsi']; ?></p>
            <hr>
            <p class="card-text "><small class="text-muted">Tahun Penerbitan : <?= $offline['tglpenerbitan']; ?></small></p>
            <p class="card-text "><small class="text-muted">Waktu Upload : <?= $offline['created_at']; ?></small></p>
            <p class="card-text "><small class="text-muted">Update Terakhir : <?= $offline['updated_at']; ?></small></p>
            <a href="/Library/index" class="btn btn-primary">Kembali</a>
            <a href="/Library/edit/<?= $offline['slug']; ?>" class="btn btn-success">Edit</a>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>