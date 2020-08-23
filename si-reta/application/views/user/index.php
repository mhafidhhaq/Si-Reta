<!-- User Homepage-->
<section class="page-section bg-light" id="services">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase mt-3">Lowongan Kerja</h2>
      <h3 class="section-subheading text-muted">Kami membuka lowongan kerja tenaga ahli sebagai berikut.</h3>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
      <?php foreach ($loker as $l) : ?>
        <div class="col-sm-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title d-inline"><?= $l['nama_lowongan']; ?></h5>
              <a href="<?= base_url('user/lamar/') . $id = $l['id']; ?>" class="btn btn-primary float-right">Lamar</a>
              <p class="card-text">
                <?php
                $input = $l['syarat'];
                $pecah = explode("\r\n", $input);
                $text = "";

                for ($i = 0; $i <= count($pecah) - 1; $i++) {
                  $part = str_replace($pecah[$i], "<p>" . $pecah[$i] . "<p>", $pecah[$i]);
                  $text .= $part;
                }

                echo $text;
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>