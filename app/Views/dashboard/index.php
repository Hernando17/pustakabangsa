<?php if (allow('master')) : ?>
  <?= $this->extend('layout/templates'); ?>
  <?= $this->section('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="mt-2">Daftar Admin</h1>
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>

        <a href="/Home/create" class="mb-2 btn btn-success" style="float:right;">+</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Foto Profile</th>
              <th scope="col">Level</th>
              <th scope="col">Nama Pengguna</th>
              <th scope="col">Email</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
            <?php foreach ($akun_admin as $k) : ?>
              <tr>
                <th scope="row "><?= $i++; ?></th>
                <td><img src="<?= base_url(); ?>/assets/img/admin/<?= $k['foto']; ?>" class="fotodashboard rounded-circle" alt=""></td>
                <td><?= $k['role']; ?></td>
                <td><?= $k['username']; ?></td>
                <td><?= $k['email']; ?></td>
                <td><a href="/Home/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                <td><a href="/Home/editpassword/<?= $k['slug']; ?>" class="btn btn-warning fa fa-unlock"></a>

                  <form action="/Home/<?= $k['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger k fa fa-trash " onclick="return confirm('Apakah anda yakin?');"></button>
                  </form>
                </td>

              </tr>
            <?php endforeach; ?>
          </tbody>
          <?= $pager->links('akun_admin', 'book_pagination'); ?></p>
        </table>
      </div>
    </div>
  </div>
  <?= $this->endSection(); ?>
<?php endif; ?>