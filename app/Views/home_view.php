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
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produk</h5>
            <div class="row">
                <?php foreach($produks as $index=>$produk): ?> 
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo base_url()."img/".$produk['foto'] ?>" alt="..." width="300px">
                            <h5 class="card-title"><?php echo $produk['nama'] ?><br><?php echo $produk['hrg'] ?></h5>
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