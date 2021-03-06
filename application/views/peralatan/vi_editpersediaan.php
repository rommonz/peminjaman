a<?php
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
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                    <h3>Peralatan dan Perlengkapan Kantor</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
			<div class="card">
                      <div class="card-header">
                        <strong>Tambah Persediaan</strong>
                      </div>
                <div class="card-body card-block">
					<div class="bootstrap-iso">
                        <form action="<?php echo base_url('peralatan/savepersediaan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Persediaan</label></div>
                            <div class="col col-md-9">
                            <select id="jenis_persediaan" name="jenis_persediaan" class="form-control">
                              <option></option>
                              <?php foreach($jenis_persediaan as $jp) : ?>
                                <option value="<?php echo $jp->id_persediaan_jenis ?>"><?php echo $jp->jenis_persediaan ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                </div>
                <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Persediaan</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="nama_persediaan" name="nama_persediaan" placeholder="mis: merk/tipe" class="form-control" required></div>
                  </div>

						              <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="jumlah_masuk" name="jumlah_masuk" placeholder="mis: 100" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Pembeliaan</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="mis: 100" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="mis: keterangan" class="form-control" ></div>
                          </div>
						  <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Lanjut
							</button>
							<button type="reset" class="btn btn-warning btn-sm" onclick="window.history.back()">
							<i class="fa fa-reply"></i> Kembali
							</button>
							</div>
						  </div>
						</form>
					</div>
				</div>
			</div>

      <?php $this->load->view('foot') ?>
      <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
      <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->

</body>

</html>
