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
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('vendor/dashboard'); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
  </div>
<?php echo $this->session->flashdata('message');?>
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body">
          <?php foreach($profile->result_array() as $row){ ?>
            <?php echo form_open_multipart('vendor/profile/update', array('role'=>'form','class'=>'form-horizontal form-material')); ?>
          <center class="m-t-30"> <!-- <img src="<= base_url('assets/admin/img/profile/'.$this->session->userdata('foto_user')); ?>" class="rounded-circle" /> -->
            <input type="file" name="userfile" class="dropify" data-default-file="<?= base_url('assets/admin/img/profile/'.$this->session->userdata('foto_user')); ?>">
            <h4 class="card-title m-t-10"><?= $row['nama_lengkap']; ?></h4>
            <h6 class="card-subtitle">Administrator</h6>
            <!-- <div class="row text-center justify-content-md-center">
              <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
              <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
            </div> -->
          </center>
        </div>
        <div>
          <hr> </div>
          <div class="card-body"> <small class="text-muted">Email </small>
            <h6><?= $row['email']; ?></h6> <small class="text-muted p-t-30 db">No. Handphone</small>
            <h6><?= $this->session->userdata('nohp_user') ; ?></h6> <small class="text-muted p-t-30 db">Alamat</small>
            <h6><?= $this->session->userdata('alamat_user') ; ?></h6>
            <!-- <div class="map-box">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div> --> <!-- <small class="text-muted p-t-30 db">Social Profile</small>
            <br/>
            <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
            <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
            <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> -->
          </div>
        </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
          <div class="card-body">
            
              <div class="form-group">
                <label class="col-md-12">Nama Lengkap</label>
                <div class="col-md-12">
                  <input type="text" name="nama_lengkap" value="<?= $this->session->userdata('full_name') ; ?>" class="form-control form-control-line">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Username</label>
                <div class="col-md-12">
                  <input type="text" name="username" value="<?= $this->session->userdata('last_name') ; ?>" class="form-control form-control-line">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Password</label>
                <div class="col-md-12">
                  <input type="password" value="<?= $this->session->userdata('pass_word') ; ?>" class="form-control form-control-line" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Password Baru</label>
                <div class="col-md-12">
                  <input type="password" name="newpassword" class="form-control form-control-line">
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Email</label>
                <div class="col-md-12">
                  <input type="email" name="email" value="<?= $this->session->userdata('email_user') ; ?>" class="form-control form-control-line" name="example-email" id="example-email">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">No Handphone</label>
                <div class="col-md-12">
                  <input type="text" name="no_hp" value="<?= $this->session->userdata('nohp_user') ; ?>" class="form-control form-control-line">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Alamat</label>
                <div class="col-md-12">
                  <textarea rows="5" name="alamat" class="form-control form-control-line"><?= $this->session->userdata('alamat_user') ; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <button class="btn btn-success" type="submit">Update Profile</button>
                </div>
              </div>
            </form>
          <?php } ?>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div><br>
    <!-- Row -->



  </div>
  <!---Container Fluid-->

  <?php $this->load->view('vendor/inc/footer.php'); ?>