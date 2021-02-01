<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('head') ?>
</head>

<body>


        <!-- Left Panel -->

        <?php $this->load->view('menu') ?>
      <!-- #Left Panel -->



    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                    <h3>Profil <?php echo $this->session->userdata('nama') ?></h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
          <?php $this->load->view('flashdata') ?>
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit Profil</strong>
                      </div>
                      <div class="card-body card-block">

                        <form action="<?php echo site_url('profil/updateprofil'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">NIP/Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nip" name="username" value="<?php echo $profil->username ?>" placeholder="Username" class="form-control"></div>
                                <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>" />
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="nb" class=" form-control-label">Nama Pegawai</label></div>
                               <div class="col-12 col-md-9"><input type="text" id="nama_pengguna" value="<?php echo $profil->nama ?>" name="nama" placeholder="Nama Pegawai" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Password" class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                               <div class="col col-md-3"><label for="merk" class=" form-control-label">Ulangi Password</label></div>
                               <div class="col-12 col-md-9"><input type="password" id="ulangipassword" name="ulangipassword" placeholder="Ulangi Password" class="form-control" required></div>
                          </div>


                          <div class="row form-group">
                          </div>

                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/pengguna')?>" role="button">Kembali</a>
                      </div>
					  </form>
                    </div>


        </div>
    </div>
<?php $this->load->view('foot'); ?>
</body>

</html>
