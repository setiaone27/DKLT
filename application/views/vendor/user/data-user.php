<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<style>
  .dropify-wrapper {
    width: 100%;
  }
</style>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar User LiteTekno</h6>
        </div><hr>
        <div class="card-header">
          <button type="button" data-toggle="modal" data-target="#tambah" id="#myBtn" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                $no = 1;
                foreach ($list->result() as $row) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nama_lengkap; ?></td>
                <td><?= $row->username; ?></td>
                <td><?= $row->email; ?></td>
                <td><img class="rounded-circle" src="<?= base_url('assets/admin/img/profile/'.$row->foto); ?>" alt="" width="50px" height="50px"></td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#detail<?= $row->id_user; ?>" id="#modalScroll" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                  <button type="button" data-toggle="modal" data-target="#hapus<?= $row->id_user; ?>" id="#myBtn" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

<!-- MODAL TAMBAH -->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah User LiteTekno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <?php echo form_open_multipart('vendor/data_user/aksi_input', array('role'=>'form')); ?>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" name="nama_lengkap" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" name="username" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="email" name="email" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Handphone</label>
              <div class="col-sm-9">
                <input type="text" name="no_hp" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="alamat" class="form-control" cols="10" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
                <input type="file" name="userfile" class="form-control dropify">
              </div>
            </div><hr>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
            <button type="submit" class="btn btn-primary" style="float: right;"><i class="fa fa-save"></i> Simpan</button>
          </form>
        </div>
      </div>        
    </div>
  </div>
</div>


  <?php 
  foreach ($list->result() as $modal) {
    ?>
  <!-- MODAL DETAILS -->
  <div class="modal fade" id="detail<?= $modal->id_user; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail User LiteTekno: <?= $modal->nama_lengkap; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nama_lengkap; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->username; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->email; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Handphone</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->no_hp; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->alamat; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
                <img alt="your image"  width="500" height="500" class="img-thumbnail mr-1" src="<?= base_url('assets/admin/img/profile/'.$modal->foto); ?>">
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php 
foreach ($list->result() as $modalhapus) {
  ?>
<!-- MODAL HAPUS -->
<div class="modal fade" id="hapus<?= $modalhapus->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Yakin Anda Ingin Menghapus User : <?= $modalhapus->nama_lengkap; ?></p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
      <a href="<?= site_url('vendor/data_user/hapususer/'.$modalhapus->id_user); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    </div>
  </div>
</div>
</div>

<?php } ?>


  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>