<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <!-- <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Produk</li> -->
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <?php
    if (session()->getFlashData('success')) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produk</h5>
            <div class="row">
                <?php foreach($produks as $index=>$produk): ?> 
                <div class="col-lg-3">
                  <?= form_open('keranjang') ?>
                  <?php
                  echo form_hidden('id', $produk['id']);
                  echo form_hidden('nama', $produk['nama']);
                  echo form_hidden('hrg', $produk['hrg']);
                  echo form_hidden('foto', $produk['foto']);
                  ?>
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo base_url()."img/".$produk['foto'] ?>" alt="..." width="300px">
                            <h5 class="card-title"><?php echo $produk['nama'] ?><br><?php echo number_to_currency($produk['hrg'], 'IDR') ?></h5>
                            <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                        </div>
                    </div> 
                </div>
                <?php endforeach ?> 
            </div>

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

<?= $this->endSection() ?>