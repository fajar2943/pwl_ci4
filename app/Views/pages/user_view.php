<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Data User</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <!-- <li class="breadcrumb-item">Pages</li> -->
      <li class="breadcrumb-item active">User</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User</h5>

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
                <th scope="col">Email</th>
                <th scope="col">Telp</th>
                <th scope="col">Role</th>
                <th scope="col">Is Active</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($users as $index=>$user): ?>
              <tr>
                <th scope="row"><?php echo $index+1?></th>
                <td><?php echo $user['nama'] ?></td> 
                <td><?php echo $user['email'] ?></td> 
                <td><?php echo $user['telp'] ?></td> 
                <td><?php echo $user['user_role'] ?></td> 
                <td><?= ($user['is_active']) ? 'Yes' : 'No' ?></td>  
                <td>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $user['user_id'] ?>">
                    Ubah
                  </button>
                  <a href="<?= base_url('produk/delete/'.$user['user_id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                    Hapus
                  </a>
                </td>
              </tr>
              <!-- Edit Modal Begin -->
              <div class="modal fade" id="editModal-<?= $user['user_id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="<?= base_url('user/edit/'.$user['user_id']) ?>" method="post" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama'] ?>" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Email</label>
                      <input type="text" name="email" class="form-control" id="hrg" value="<?= $user['email'] ?>" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Telp</label>
                      <input type="text" name="telp" class="form-control" id="telp" value="<?= $user['telp'] ?>" placeholder="Telp" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Role</label>
                      <select name="user_role" class="form-select">
                        <option value="Customer" <?= ($user['user_role']) ? 'selected' : '' ?>>Customer</option>
                        <option value="Admin" <?= (!$user['user_role']) ? 'selected' : '' ?>>Admin</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Is Active</label>
                      <select name="is_active" class="form-select">
                        <option value="1" <?= ($user['is_active']) ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= (!$user['is_active']) ? 'selected' : '' ?>>Inactive</option>
                      </select>
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
		<form action="<?= base_url('user') ?>" method="post" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="modal-body">
			<div class="form-group">
				<label for="name">Nama</label>
				<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama User" required>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="form-group">
				<label for="telp">Telp</label>
				<input type="text" name="telp" class="form-control" placeholder="Telp" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="text" name="password" class="form-control" placeholder="Password" required>
			</div>
      <div class="form-group">
          <label for="user_role">User Role</label>
          <select name="user_role" class="form-select">
          <option value="Customer">Customer</option>
          <option value="Admin">Admin</option>
          </select>
      </div>
      <div class="form-group">
          <label for="is_active">Is Active</label>
          <select name="is_active" class="form-select">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
          </select>
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