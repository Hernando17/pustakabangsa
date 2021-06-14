<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>



<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form ubah data E-Book </h2>
    
    <form action="/Buku/update/<?= $buku['id'];?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $buku['slug'];?>">
    <input type="hidden" name="sampulLama" value="<?= $buku['sampul'];?>">
    <input type="hidden" name="isiLama" value="<?= $buku['isi'];?>">
  
  <div class="row mb-3">
    <label for="genre" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : '';?>" id="genre" name="genre" autofocus value= "<?= (old('genre')) ? old('genre') : $buku['genre'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('genre');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : '';?>" id="isbn" name="isbn" autofocus value= "<?= (old('isbn')) ? old('isbn') : $buku['isbn'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('isbn');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '';?>" id="judul" name="judul"  value= "<?= (old('judul')) ? old('judul') : $buku['judul'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('judul');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '';?>" id="penulis" name="penulis" value= "<?= (old('penulis')) ? old('penulis') : $buku['penulis'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penulis');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '';?>" id="penerbit" name="penerbit" value= "<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penerbit');?>
    </div>
    </div>
  </div>

    <div class="row mb-3">
    <label for="penerbitan" class="col-sm-2 col-form-label">Tahun Penerbitan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbitan')) ? 'is-invalid' : '';?>" id="penerbitan" name="penerbitan" value= "<?= (old('penerbitan')) ? old('penerbitan') : $buku['penerbitan'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penerbitan');?>
    </div>
    </div>
  </div>

  <div class="row mb-5">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '';?>" id="deskripsi" name="deskripsi" value= "<?= (old('deskripsi')) ? old('deskripsi') : $buku['deskripsi'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('deskripsi');?>
    </div>
    </div>
  </div>


  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <label for="sampul" class="form-label">Pilih gambar</label>
    <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '';?>" type="file" id="sampul" name="sampul" value="<?= (old('sampul')) ? old('sampul') : $buku['sampul'] ;?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('sampul');?>
    </div>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="isi" class="col-sm-2 col-form-label">Pilih File PDF</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <input class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : '';?>" type="file" id="isi" name="isi" value= "<?= (old('isi')) ? old('isi') : $buku['isi'] ;?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('isi');?>
    </div>
    </div>
    </div>
  </div>

    <a href="/Buku/<?= $buku['slug'];?>" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Ubah data buku</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>