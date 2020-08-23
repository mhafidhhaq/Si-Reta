    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg">

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