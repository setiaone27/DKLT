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
    <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Anggota</li>
      <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota LiteTekno</h6>
        </div><hr>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
                $no = 1;
                foreach ($list as $row) {
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->nama_divisi; ?></td>
                <td><?= $row->jabatan; ?></td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#detail<?= $row->id_anggota; ?>" id="#modalScroll" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                  <button type="button" data-toggle="modal" data-target="#edit<?= $row->id_anggota; ?>" id="#myBtn" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                  <button type="button" data-toggle="modal" data-target="#hapus<?= $row->id_anggota; ?>" id="#myBtn" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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

  <?php 
  foreach ($list as $modal) {
    ?>
  <!-- MODAL DETAILS -->
  <div class="modal fade" id="detail<?= $modal->id_anggota; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Anggota LiteTekno: <?= $modal->nama; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nama; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Divisi</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->nama_divisi; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jabatan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->jabatan; ?>" readonly="readonly">
              </div>
            </div>
            <?php $tanggal = $modal->tanggal_lahir; ?>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">TTL</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->tempat_lahir; ?>, <?= tgl_indo($tanggal); ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <?php if($modal->jenis_kelamin == '1'){ ?>
                  <input type="text" class="form-control" value="Laki-Laki" readonly="readonly">
                <?php }elseif($modal->jenis_kelamin == '2'){ ?>
                  <input type="text" class="form-control" value="Perempuan" readonly="readonly">
                <?php } ?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" readonly="readonly"><?= $modal->alamat; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Agama</label>
              <div class="col-sm-9">
                <?php if($modal->agama == '1'){ ?>
                  <input type="text" class="form-control" value="Islam" readonly="readonly">
                <?php }elseif($modal->agama == '2'){ ?>
                  <input type="text" class="form-control" value="Kristen" readonly="readonly">
                <?php }elseif($modal->agama == '3'){ ?>
                  <input type="text" class="form-control" value="Hindu" readonly="readonly">
                <?php }elseif($modal->agama == '4'){ ?>
                  <input type="text" class="form-control" value="Budha" readonly="readonly">
                <?php }elseif($modal->agama == '5'){ ?>
                  <input type="text" class="form-control" value="Khongcucu" readonly="readonly">
                <?php } ?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Pekerjaan</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" value="<?= $modal->pekerjaan; ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
                <img alt="your image"  width="500" height="500" class="img-thumbnail mr-1" src="<?= base_url('assets/admin/img/anggota/'.$modal->foto); ?>">
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
  foreach ($list as $modal) {
    ?>
  <!-- Modal EDIT -->
  <div class="modal fade" id="edit<?= $modal->id_anggota; ?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Anggota LiteTekno: <?= $modal->nama; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <?php echo form_open_multipart('vendor/data_anggota/aksi_edit/'.$modal->id_anggota, array('role'=>'form')); ?>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" value="<?= $modal->nama; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Divisi</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="divisi_id" style="width: 100%;">
                  <option>-- Pilih Divisi --</option>
                  <?php foreach($divisi->result() as $row){ ?>
                    <option <?php if($modal->divisi_id == $row->id_divisi) echo 'selected'; ?> value="<?php echo $row->id_divisi; ?>"><?php echo $row->nama_divisi; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jabatan</label>
              <div class="col-sm-9">
                <input type="text" name="jabatan" class="form-control" value="<?= $modal->jabatan; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tempat Lahir</label>
              <div class="col-sm-9">
                <input type="text" name="tempat_lahir" class="form-control" value="<?= $modal->tempat_lahir; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-9">
                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $modal->tanggal_lahir; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="jenis_kelamin" style="width: 100%;">
                  <?php
                  if($modal->jenis_kelamin == '1'){ 
                    $kelamin = "Laki-Laki";
                  }elseif($modal->jenis_kelamin == '2'){ 
                    $kelamin = "Perempuan";
                  } ?>
                  <option value="<?= $modal->jenis_kelamin; ?>"><?= $kelamin; ?></option>
                  <option>-- Pilih Jenis Kelamin --</option>
                  <option value="1">Laki-Laki</option>
                  <option value="2">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Agama</label>
              <div class="col-sm-9">
                <select class="form-control select2" name="agama" style="width: 100%;">
                  <?php if($modal->agama == '1'){ 
                    $agama = "Islam";
                  }elseif($modal->agama == '2'){ 
                    $agama = "Kristen";
                  }elseif($modal->agama == '3'){
                    $agama = "Hindu";
                  }elseif($modal->agama == '4'){
                    $agama = "Budha";
                  }elseif($modal->agama == '5'){
                    $agama = "Khongcucu";
                  } ?>
                  <option value="<?= $modal->agama; ?>"><?= $agama; ?></option>
                  <option>-- Pilih Agama --</option>
                  <option value="1">Islam</option>
                  <option value="2">Kristen</option>
                  <option value="3">Hindu</option>
                  <option value="4">Budha</option>
                  <option value="5">Khongcucu</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Pekerjaan</label>
              <div class="col-sm-9">
                <input type="text" name="pekerjaan" class="form-control" value="<?= $modal->pekerjaan; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="alamat" class="form-control"><?= $modal->alamat; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
                <input type="file" name="userfile" class="form-control dropify" data-default-file="<?= base_url('assets/admin/img/anggota/'.$modal->foto); ?>">
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
<?php } ?>


<?php 
foreach ($list as $modalhapus) {
  ?>
<!-- MODAL HAPUS -->
<div class="modal fade" id="hapus<?= $modalhapus->id_anggota; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
      <p>Yakin Anda Ingin Menghapus Anggota : <?= $modalhapus->nama; ?></p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i> Tutup</button>
      <a href="<?= site_url('vendor/data_anggota/hapusanggota/'.$modalhapus->id_anggota); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    </div>
  </div>
</div>
</div>

<?php } ?>


  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>