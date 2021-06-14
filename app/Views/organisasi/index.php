<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Daftar Organisasi</h1>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <a href="/Organisasi/create" class="mb-2 btn btn-success" style="float:right;">+</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 + (10 * ($currentPage - 1)); ?>
          <?php foreach ($organisasi as $o) : ?>
            <tr>
              <th scope="row "><?= $i++; ?></th>
              <td><img src="<?= base_url(); ?>/assets/img/clients/<?= $o['foto']; ?>" class="fotodashboard" alt=""></td>
              <td><?= $o['nama']; ?></td>
              <td><a href="/Organisasi/<?= $o['slug']; ?>" class="btn btn-success ">Detail</a>
                <form action="/Organisasi/<?= $o['id']; ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger fa fa-trash" onclick="return confirm('Apakah anda yakin?');"></button>
                </form>
              </td>

            </tr>
          <?php endforeach; ?>
        </tbody>
        <?= $pager->links('organisasi', 'book_pagination'); ?></p>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>