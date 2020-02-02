<?php $this->load->view('vendor/inc/header.php'); ?>
<?php $this->load->view('vendor/inc/sidebar.php'); ?>
<?php $this->load->view('vendor/inc/topbar.php'); ?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Data Anggota</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Anggota</li>
      <li class="breadcrumb-item active" aria-current="page">Input Anggota</li>
    </ol>
  </div>

<!-- Horizontal Form -->
<div class="card mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Form Input Data Anggota LiteTekno</h6>
  </div><hr>
  <div class="card-body">
    <?php echo form_open_multipart('vendor/data_anggota/aksi_input', array('role'=>'form')); ?>
      <h6 class="m-0 font-weight-bold text-success"><u>Data Pribadi</u></h6><br>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
        <div class="col-sm-9">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
        <div class="col-sm-9">
          <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-9">
          <input id="datepicker" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="jenis_kelamin" required="required">
            <option>-- Pilih Jenis Kelamin --</option>
            <option value="1">Laki-Laki</option>
            <option value="2">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Agama</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="agama" required="required">
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
          <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
          <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
        </div>
      </div><br>
      <h6 class="m-0 font-weight-bold text-warning"><u>Data LiteTekno</u></h6><br>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Divisi</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="divisi_id" required="required">
              <option>-- Pilih Divisi --</option>
            <?php foreach($divisi->result() as $row){ ?>
              <option value="<?= $row->id_divisi; ?>"><?= $row->nama_divisi; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Jabatan</label>
        <div class="col-sm-9">
          <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Foto</label>
        <div class="col-sm-9">
          <input type="file" name="userfile" class="form-control dropify" required="required" data-width="250">
        </div>
      </div><br>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
<!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>