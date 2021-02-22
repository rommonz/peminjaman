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
                    <h3>Mamin</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
      <?php $this->load->view('flashdata') ?>
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Pagu Mamin</strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('admin/updatepagu'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Unit Kerja</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="id_unit_kerja" class="form-control" name="id_unit_kerja">
                                    <option value="0">Pilih</option>
                                    <?php foreach($daftar_unit_kerja as $uk) { ?>
                                      <option <?php echo $pagu->id_unit_kerja == $uk->id_unit_kerja ? 'Selected' : '' ?>
                                              value="<?php echo $uk->id_unit_kerja ?>"><?php echo $uk->nama_unit_kerja ?>
                                      </option>
                                    <?php } ?>
                                    </select>
                                    <input type="hidden" value="<?php echo $pagu->id_pagu ?>" name="id_pagu" id="id_pagu" />
                                </div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Nama Kegiatan</label></div>
                                <div class="col-12 col-md-9">
                                  <input type="text" id="nama_kegiatan" value="<?php echo $pagu->kegiatan ?>" name="nama_kegiatan" placeholder="Nama Kegiatan" class="form-control" required>
                                </div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Nilai Pagu</label></div>
                                <div class="col-12 col-md-9">
                                  <input type="text" id="nilai_pagu" value="<?php echo $pagu->nilai_pagu ?>" name="nilai_pagu" placeholder="Nilai Pagu" class="form-control" required>
                                </div>
                          </div>
                          <div class="row form-group"> <!--dibuat dropdown-->
                            <div class="col col-md-3">
                               <label class="form-control-label" for="kb">Tahun Anggaran</label>
                            </div>
                               <div class="col-12 col-md-9">
                                    <select id="tahun_pagu" class="form-control" name="tahun_pagu">
                                    <option>Pilih</option>
                                    <?php $x=2020; while($x<=2030){ ?>
                                      <option <?php echo $pagu->tahun_pagu == $x ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x++ ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                          </div>
                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="update" value="Update"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/pagumamin')?>" role="button">Kembali</a>
                      </div>
					  </form>
                    </div>


        </div>
    </div>




  <?php $this->load->view('foot'); ?>

</body>

</html>
