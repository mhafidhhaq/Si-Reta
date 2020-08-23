<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <form action="<?= base_url('admin/update/?id=' . $_GET["id"]); ?>" method="post">
    <div class="form-group row">
      <div class="col-sm-10">
        <input type="hidden" class="col-sm-3 form-control" id="id" name="id" value="<?= $loker['id']; ?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Lowongan Kerja</label>
      <div class="col-sm-10">
        <input type="text" class="col-sm-3 form-control" id="nama" name="nama" value="<?= $loker['nama_lowongan']; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="syarat" class="col-sm-2 col-form-label">Syarat</label>
      <div class="col-sm-10">
        <textarea name="syarat" id="syarat" cols="35" rows="10"><?= $loker['syarat']; ?></textarea>
        <?= form_error('syarat', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
        <div class="col-sm-10">
          <?php if ($loker['status'] == 'aktif') : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridStatus" id="gridStatus1" value="aktif" checked>
              <label class="form-check-label" for="gridStatus1">
                Aktif
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridStatus" id="gridStatus2" value="nonaktif">
              <label class="form-check-label" for="gridStatus2">
                Nonaktif
              </label>
            </div>
          <?php else : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridStatus" id="gridStatus1" value="aktif">
              <label class="form-check-label" for="gridStatus1">
                Aktif
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridStatus" id="gridStatus2" value="nonaktif" checked>
              <label class="form-check-label" for="gridStatus2">
                Nonaktif
              </label>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </fieldset>
    <div class="form-row-last">
      <button class="btn btn-primary" type="submit">Ubah</button>
    </div>
  </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->