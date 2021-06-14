<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Daftar Book</h1>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <a href="/Library/create" class="mb-2 btn btn-success" style="float:right;">+</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Persediaan</th>
            <th scope="col">Kode</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (10 * ($currentPage - 1)); ?>
          <?php foreach ($offline as $e) : ?>
            <tr>
              <th scope="row "><?= $i++; ?></th>
              <td><img src="<?= base_url(); ?>/assets/img/sampul/<?= $e['sampul']; ?>" class="fotodashboard" alt=""></td>
              <td><?= $e['judul']; ?></td>
              <td><?= $e['stock']; ?></td>
              <td><?= $e['kode']; ?></td>
              <td><a href="/Library/<?= $e['slug']; ?>" class="btn btn-success ">Detail</a>

                <form action="/Library/<?= $e['id']; ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger fa fa-trash" onclick="return confirm('Apakah anda yakin?');"></button>
                </form>
              </td>

            </tr>
          <?php endforeach; ?>
        </tbody>
        <?= $pager->links('offline', 'book_pagination'); ?></p>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>