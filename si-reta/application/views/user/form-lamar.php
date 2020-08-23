<!-- User Homepage-->
<section class="page-section bg-light" id="services">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase mt-3">Form Lamar Lowongan Kerja</h2>
      <h3 class="section-subheading text-muted">Silahkan isi form berikut ini.</h3>
    </div>
    <div class="row">
      <div class="form-v10-content" style="height: 500px;">
        <form class="form-detail" action="<?= base_url('user/lamar/') . $posisi; ?>" enctype="multipart/form-data" method="post" id="myform">
          <div class="form-left">
            <h2>Infomasi Umum</h2>
            <div class="form-row">
              <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $lowongan[0]['nama_lowongan']; ?>" readonly>
            </div>
            <div class="form-row">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row">
              <select id="pendidikan" name="pendidikan">
                <option value="">Pendidikan</option>
                <option value="SMA">SMA</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
              <span class="select-btn">
                <i class="fas fa-caret-down"></i>
              </span>
              <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row">
              <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Spesialisasi" value="<?= set_value('spesialisasi'); ?>">
              <?= form_error('spesialisasi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row">
              <div class="col-sm-3">
                <p>Unggah CV</p>
              </div>
              <div class="custom-file col-sm-9">
                <input type="file" id="cv" name="cv" class="form-control-file border">
                <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="form-left">
            <h2>Detail Kontak</h2>
            <div class="form-row">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?= set_value('alamat'); ?>">
              <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row">
              <input type="text" class="form-control" id="tentang" name="tentang" placeholder="Tentang Anda" value="<?= set_value('tentang'); ?>">
              <?= form_error('tentang', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row">
              <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon" value="<?= set_value('telepon'); ?>">
              <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-row-last ml-2">
              <button class="btn btn-primary ml-5" type="submit">Masukkan Lamaran</button>
            </div>
          </div>
      </div>
    </div>
    </form>
  </div>
  </div>
  </div>
</section>