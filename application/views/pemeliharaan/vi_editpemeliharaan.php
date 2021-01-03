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
                        <strong>Ubah Pengajuan Pemeliharaan</strong>
                      </div>
                <div class="card-body card-block">
					<div class="bootstrap-iso">
                        <form action="<?php echo base_url('pemeliharaan/update'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Barang</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="kodebarang" name="kodebarang" placeholder="Kode Barang" class="form-control" value="<?php echo $pemeliharaan->kode_barang ?>" required></div>

							                     <div class="col-12 col-md-9"><input type="hidden" id="idpb" name="idpb" value="<?php echo $pemeliharaan->id_pemeliharaan ?>" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Barang</label></div>
                            <div class="col-12 col-md-9"><input type="text" value="<?php echo $pemeliharaan->nama_barang ?>" id="namabarang" name="namabarang" placeholder="Nama Barang" class="form-control" required></div>
                          </div>

						              <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><textarea id="keterangan" name="keterangan" placeholder="Keterangan Pemeliharaan" class="form-control" ><?php echo htmlspecialchars($pemeliharaan->keterangan) ?></textarea></div>
                          </div>
						  <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-save"></i> Update
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
