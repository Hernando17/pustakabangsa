<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>


<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form Tambah data Book </h2>
    
    <form action="/Library/save" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>

      <div class="row mb-3">
    <label for="stock" class="col-sm-2 col-form-label">Persediaan</label>
    <div class="col-sm-10">
          <select name="stock" id="">
          <option value="Akan Datang">Akan Datang</option>
          <option value="Tersedia">Tersedia</option>
          <option value="Tidak Tersedia">Tidak Tersedia</option>
          </select>
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('stock');?>
    </div>
    </div>
  </div>


  <div class="row mb-3">
    <label for="genre" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : '';?>" id="genre" name="genre" autofocus value= "<?= old('genre');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('genre');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="kode" class="col-sm-2 col-form-label">Kode Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : '';?>" id="kode" name="kode" autofocus value= "<?= old('kode');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('kode');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('isbn')) ? 'is-invalid' : '';?>" id="isbn" name="isbn" autofocus value= "<?= old('isbn');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('isbn');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '';?>" id="judul" name="judul"  value= "<?= old('judul');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('judul');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="tglpenerbitan" class="col-sm-2 col-form-label">Tahun Penerbitan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('tglpenerbitan')) ? 'is-invalid' : '';?>" id="tglpenerbitan" name="tglpenerbitan"  value= "<?= old('tglpenerbitan');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('tglpenerbitan');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '';?>" id="penulis" name="penulis" value= "<?= old('penulis');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penulis');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '';?>" id="penerbit" name="penerbit" value= "<?= old('penerbit');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penerbit');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '';?>" id="deskripsi" name="deskripsi" value= "<?= old('deskripsi');?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('deskripsi');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <label for="sampul" class="form-label">Hanya mendukung format file JPG/JPEG</label>
    <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '';?>" type="file" id="sampul" name="sampul" value= "<?= old('sampul');?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('sampul');?>
    </div>
    </div>
    </div>
  </div>

  <a href="/Library/index" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Tambah Buku</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>