<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Produk</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <!-- <li class="breadcrumb-item">Pages</li> -->
      <li class="breadcrumb-item active">Produk</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produk</h5>

          <?php
          if(session()->getFlashData('success')){
          ?> 
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
          }
          ?>
          <?php
          if(session()->getFlashData('failed')){
          ?> 
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('failed') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
          }
          ?>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
          Tambah Data
          </button>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Stok</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($produks as $index=>$produk): ?>
              <tr>
                <th scope="row"><?php echo $index+1?></th>
                <td><?php echo $produk['nama'] ?></td> 
                <td><?php echo $produk['hrg'] ?></td> 
                <td><?php echo $produk['keterangan'] ?></td> 
                <td><?php echo $produk['stok'] ?></td> 
                <td><img src="<?php echo base_url()."img/".$produk['foto'] ?>" width="100px"></td> 
                <td>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                    Ubah
                  </button>
                  <a href="<?= base_url('produk/delete/'.$produk['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                    Hapus
                  </a>
                </td>
              </tr>
              <!-- Edit Modal Begin -->
              <div class="modal fade" id="editModal-<?= $produk['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="<?= base_url('produk/edit/'.$produk['id']) ?>" method="post" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" value="<?= $produk['nama'] ?>" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Harga</label>
                      <input type="text" name="hrg" class="form-control" id="hrg" value="<?= $produk['hrg'] ?>" placeholder="Harga Barang" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Jumlah</label>
                      <input type="text" name="stok" class="form-control" id="stok" value="<?= $produk['stok'] ?>" placeholder="Jumlah Barang" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $produk['keterangan'] ?>" placeholder="Keterangan Barang" required>
                    </div>
                    <img src="<?php echo base_url()."img/".$produk['foto'] ?>" width="100px">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="check" name="check" value="1">
                      <label class="form-check-label" for="check">
                      Ceklis jika ingin mengganti foto
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="name">Foto</label>
                      <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
              <!-- Edit Modal End -->
            <?php endforeach ?>   
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->


<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Tambah Data</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form action="<?= base_url('produk') ?>" method="post" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="modal-body">
			<div class="form-group">
				<label for="name">Nama</label>
				<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Harga</label>
				<input type="text" name="hrg" class="form-control" id="hrg" placeholder="Harga Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Jumlah</label>
				<input type="text" name="stok" class="form-control" id="stok" placeholder="Jumlah Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan Barang" required>
			</div>
			<div class="form-group">
				<label for="name">Foto</label>
				<input type="file" class="form-control" id="foto" name="foto">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		</form>
		</div>
	</div>
</div>
<!-- Add Modal End -->

<?= $this->endSection() ?>