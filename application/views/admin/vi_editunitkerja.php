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
                    <h3>Pengguna</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
      <?php $this->load->view('flashdata') ?>
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Pengguna</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('admin/unitkerjaupdate'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Nama Unit Kerja</label></div>
                                <div class="col-12 col-md-9">
                                  <input value="<?php echo $unit->nama_unit_kerja ?>" type="text" id="nama_unit_kerja" name="nama_unit_kerja" placeholder="Nama Unit Kerja" class="form-control" required>
                                  <input value="<?php echo $unit->id_unit_kerja ?>" name="id_unit_kerja" type="hidden" />
                                </div>
                          </div>

                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Ordinat</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="id_ordinat" class="form-control" name="id_ordinat">
                                    <option value="0">Pilih</option>
                                    <?php foreach($daftar_unitkerja as $uk) { ?>
                                      <option <?php echo $unit->id_ordinat == $uk->id_unit_kerja ? 'Selected' : '' ?> value="<?php echo $uk->id_unit_kerja ?>">
                                          <?php echo $uk->nama_unit_kerja ?>
                                      </option>
                                    <?php } ?>
                                    </select>
                                </div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?php echo $unit->keterangan ?>" class="form-control" required></div>
                          </div>

                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/unitkerja')?>" role="button">Kembali</a>
                      </div>
					  </form>
                    </div>


        </div>
    </div>




  <?php $this->load->view('foot'); ?>

</body>

</html>
