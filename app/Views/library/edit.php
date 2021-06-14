<?= $this->extend('layout/templates');?>
<?= $this->section('content');?>



<div class="container">
  <div class="row">
    <div class="col-8">
    <h2 class="my-3">Form ubah data Book</h2>
    
    <form action="/Library/update/<?= $offline['id'];?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $offline['slug'];?>">
    <input type="hidden" name="sampulLama" value="<?= $offline['sampul'];?>">
    

      <div class="row mb-3">
    <label for="stock" class="col-sm-2 col-form-label">Persediaan</label>
    <div class="col-sm-10">
    <select name="stock" id="">
          <option hidden value="<?= (old('stock')) ? old('stock') : $offline['stock'] ;?>"><?= $offline['stock'] ;?></option>
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
      <input type="text" class="form-control <?= ($validation->hasError('genre')) ? 'is-invalid' : '';?>" id="genre" name="genre" autofocus value= "<?= (old('genre')) ? old('genre') : $offline['genre'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('genre');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="kode" class="col-sm-2 col-form-label">Kode Buku</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : '';?>" id="kode" name="kode"  value= "<?= (old('kode')) ? old('kode') : $offline['kode'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('kode');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('isbn')) ? 'is-invalid' : '';?>" id="isbn" name="isbn"  value= "<?= (old('isbn')) ? old('isbn') : $offline['isbn'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('isbn');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '';?>" id="judul" name="judul"  value= "<?= (old('judul')) ? old('judul') : $offline['judul'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('judul');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="tglpenerbitan" class="col-sm-2 col-form-label">Tahun Penerbitan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('tglpenerbitan')) ? 'is-invalid' : '';?>" id="tglpenerbitan" name="tglpenerbitan"  value= "<?= (old('tglpenerbitan')) ? old('tglpenerbitan') : $offline['tglpenerbitan'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('tglpenerbitan');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '';?>" id="penulis" name="penulis" value= "<?= (old('penulis')) ? old('penulis') : $offline['penulis'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penulis');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '';?>" id="penerbit" name="penerbit" value= "<?= (old('penerbit')) ? old('penerbit') : $offline['penerbit'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('penerbit');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : '';?>" id="deskripsi" name="deskripsi" value= "<?= (old('deskripsi')) ? old('deskripsi') : $offline['deskripsi'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('deskripsi');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="tglpenerbitan" class="col-sm-2 col-form-label">Tanggal Penerbitan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('tglpenerbitan')) ? 'is-invalid' : '';?>" id="tglpenerbitan" name="tglpenerbitan" value= "<?= (old('tglpenerbitan')) ? old('tglpenerbitan') : $offline['tglpenerbitan'] ;?>">
      <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('tglpenerbitan');?>
    </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-10">
    <div class="mb-3">
    <label for="sampul" class="form-label">Pilih gambar</label>
    <input class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : '';?>" type="file" id="sampul" name="sampul" value="<?= (old('sampul')) ? old('sampul') : $offline['sampul'] ;?>">
    <div id="validationServer05Feedback" class="invalid-feedback">
      <?= $validation->getError('sampul');?>
    </div>
    </div>
    </div>
  </div>

    <a href="/Library/<?= $offline['slug'];?>" class="btn btn-primary">Kembali</a>
  <button type="submit" class="btn btn-success">Ubah data buku</button>
</form>

    </div>
  </div>
</div>




<?= $this->endSection();?>