    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg">
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>

          <?= $this->session->flashdata('message'); ?>

          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newLokerModal">Tambah Lowongan Kerja</a>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lowongan</th>
                <th scope="col">Syarat</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php ++$start; ?>
              <?php foreach ($loker as $l) : ?>
                <tr>
                  <th scope="row"><?= $start; ?></th>
                  <td><?= $l['nama_lowongan']; ?></td>
                  <td>
                    <?php
                    $input = $l['syarat'];
                    $pecah = explode("\r\n", $input);
                    $text = "";

                    for ($p = 0; $p <= count($pecah) - 1; $p++) {
                      $part = str_replace($pecah[$p], "<p>" . $pecah[$p] . "<p>", $pecah[$p]);
                      $text .= $part;
                    }

                    echo $text;
                    ?>
                  </td>
                  <td><?= $l['status']; ?></td>
                  <td><?= date('d F Y', $l['date_created']); ?></td>
                  <td>
                    <a href="<?= base_url('admin/update/?id=' . $l['id']); ?>" class="badge badge-success">ubah</a>
                    <a href="<?= base_url('admin/delete/' . $id = $l['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus lowongan kerja <?= $l['nama_lowongan']; ?>?')" class="badge badge-danger">hapus</a>
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

    <?php if ($lokerNum->num_rows() > 0) : ?>
      <hr class="sidebar-divider">
      <hr class="sidebar-divider">

      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Lowongan Kerja yang tidak aktif</h1>

        <div class="row">
          <div class="col-lg">
            <!-- Kurang PHP validation error seperti form loker aktif diatas -->

            <?= $this->session->flashdata('message2'); ?>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Lowongan</th>
                  <th scope="col">Syarat</th>
                  <th scope="col">Status</th>
                  <th scope="col">Tanggal Dibuat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($lokerNonaktif as $ln) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $ln['nama_lowongan']; ?></td>
                    <td>
                      <?php
                      $input = $ln['syarat'];
                      $pecah = explode("\r\n", $input);
                      $text = "";

                      for ($p = 0; $p <= count($pecah) - 1; $p++) {
                        $part = str_replace($pecah[$p], "<p>" . $pecah[$p] . "<p>", $pecah[$p]);
                        $text .= $part;
                      }

                      echo $text;
                      ?>
                    </td>
                    <td><?= $ln['status']; ?></td>
                    <td><?= date('d F Y', $ln['date_created']); ?></td>
                    <td>
                      <a href="<?= base_url('admin/update/?id=' . $ln['id']); ?>" class="badge badge-success" x>ubah</a>
                      <a href="<?= base_url('admin/delete/' . $id = $ln['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus lowongan kerja <?= $ln['nama_lowongan']; ?>?')" class="badge badge-danger">hapus</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="newLokerModal" tabindex="-1" aria-labelledby="newLokerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newLokerModalLabel">Tambah Lowongan Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('admin'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="loker" name="loker" placeholder="Lowongan Kerja">
              </div>
              <div class="form-group">
                <label for="">Syarat</label>
                <textarea name="syarat" id="syarat" cols="55" rows="10"></textarea>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="aktif" name="status" id="status" checked>
                  <label class="form-check-label" for="status">
                    Aktif?
                  </label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>