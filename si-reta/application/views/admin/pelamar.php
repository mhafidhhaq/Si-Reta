    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
        <div class="col-md-4">
          <form action="<?= base_url('admin/pelamar'); ?>" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari Keyword" name="keyword" autocomplete="off" autofocus>
              <div class="input-group-append">
                <input class="btn btn-primary" type="submit" name="cari">
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-lg">
          <h5>Hasil : <?= $total_rows; ?></h5>
          <?= $this->session->flashdata('message'); ?>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi yang dilamar</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">CV</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($pelamar)) : ?>
                <tr>
                  <td colspan="7">
                    <div class="alert alert-danger" role="alert">
                      Data tidak ditemukan!
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
              <?php ++$start; ?>
              <?php foreach ($pelamar as $p) : ?>
                <tr>
                  <th scope="row"><?= $start; ?></th>
                  <td><?= $p['nama']; ?></td>
                  <td><?= $p['posisi']; ?></td>
                  <td><?= $p['telepon']; ?></td>
                  <td><?= $p['email']; ?></td>
                  <td><a class="medium" href="<?= base_url('admin/download/' . $id = $p['id']); ?>"><?= $p['cv']; ?></a></td>
                  <td>
                    <a href="<?= base_url('admin/detailpelamar/' . $id = $p['id']); ?>" class="badge badge-warning">detail</a>
                    <a href="<?= base_url('admin/deletePelamar/' . $id = $p['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus data pelamar <?= $p['nama']; ?>?')" class="badge badge-danger">hapus</a>
                  </td>
                </tr>
                <?php $start++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?= $this->pagination->create_links(); ?>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->