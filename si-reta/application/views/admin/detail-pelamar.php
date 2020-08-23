    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="card mb-3 col-lg-6">
        <div class="card-body">
          <h5 class="card-title"><?= $detailPelamar['nama']; ?></h5>
          <b>Posisi yang dilamar</b>
          <h6 class="card-subtitle mb-2 text-muted"><?= $detailPelamar['posisi']; ?></h6>
          <b>Pendidikan</b>
          <h6 class="card-subtitle mb-2 text-muted"><?= $detailPelamar['pendidikan']; ?></h6>
          <b>Spesialisasi</b>
          <p class="card-text mb-2"><?= $detailPelamar['spesialisasi']; ?></p>
          <b>Alamat</b>
          <h6 class="card-subtitle mb-2 text-muted"><?= $detailPelamar['alamat']; ?></h6>
          <b>Info</b>
          <p class="card-text mb-2"><?= $detailPelamar['tentang']; ?></p>
          <b>Telepon</b>
          <h6 class="card-subtitle mb-2 text-muted"><?= $detailPelamar['telepon']; ?></h6>
          <b>Email</b>
          <h6 class="card-subtitle mb-2 text-muted"><?= $detailPelamar['email']; ?></h6>
          <b>Curriculum Vitae</b>
          <h6 class="card-subtitle mb-2 text-muted">
            <a class="medium" href="<?= base_url('admin/download/' . $id = $detailPelamar['id']); ?>"><?= $detailPelamar['cv']; ?></a>
          </h6>
          <p class="card-text float-right"><small class="text-muted">Melamar pada <?= date('d F Y', $detailPelamar['date_submitted']); ?></small></p>
        </div>
        <a href="<?= base_url('admin/pelamar'); ?>" class="card-link ml-4 mb-2">Kembali</a>
      </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->