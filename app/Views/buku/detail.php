<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>



<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-2">Detail E-Book</h2>
      <div class="row g-0">
        <div class="col-md-2.5 img-fluid">
          <img src="<?= base_url(); ?>/assets/img/sampul/<?= $buku['sampul']; ?>" width="150px" height="200px" alt="..." style="float:left;" class=" my-4 ml-2">
        </div>
        <div class="col-md-8 ">
          <div class="card-body">
            <h5 class="card-title "><b>Judul : <?= $buku['judul']; ?></b></h5>
            <hr>
            <p class="card-text ">ISBN : <?= $buku['isbn']; ?></p>
            <p class="card-text ">Kategori : <?= $buku['genre']; ?></p>
            <p class="card-text ">Penulis : <?= $buku['penulis']; ?></p>
            <p class="card-text ">Penerbit : <?= $buku['penerbit']; ?></p>
            <p class="card-text ">Deskripsi : <?= $buku['deskripsi']; ?></p>
            <hr>
            <p class="card-text "><small class="text-muted">Tahun Penerbitan : <?= $buku['penerbitan']; ?></small></p>
            <p class="card-text "><small class="text-muted">Waktu Upload : <?= $buku['created_at']; ?></small></p>
            <p class="card-text "><small class="text-muted">Update Terakhir : <?= $buku['updated_at']; ?></small></p>
            <a href="/Buku/index" class="btn btn-primary">Kembali</a>
            <a href="/Buku/edit/<?= $buku['slug']; ?>" class="btn btn-success">Edit</a>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>