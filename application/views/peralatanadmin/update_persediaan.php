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
                        <strong>Persediaan <?php echo $persediaan->nama_persediaan ?></strong>
                      </div>
                <div class="card-body card-block">
                <table class="table table-bordered">
                  <tr>
                    <th>Jenis</th>
                    <th>Nama Persediaan</td>
                    <th>Jumlah Persediaan</th>
                    <th>Keterangan</th>
                  </tr>
                  <tr>
                    <td><?php echo $persediaan->jenis_persediaan ?></td>
                    <td><?php echo $persediaan->nama_persediaan ?></td>
                    <td><?php echo $persediaan->jumlah_persediaan ?></td>
                    <td><?php echo $persediaan->keterangan ?></td>
                  </tr>
                </table>
					<div class="bootstrap-iso">
                        <form action="<?php echo base_url('peralatanadmin/saveupdatepersediaan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" value="<?php echo $persediaan->id_persediaan ?>" name="id_persediaan"/>
                            <input type="hidden" name="jenis_persediaan" value="<?php echo $persediaan->id_persediaan_jenis ?>" />
						                <input type="hidden" value="<?php echo $persediaan->nama_persediaan ?>" id="nama_persediaan" name="nama_persediaan" />
                            <input type="hidden" value="<?php echo $persediaan->jumlah_persediaan ?>" id="jumlah_persediaan" name="jumlah_persediaan" />
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

<!-- history transaksi -->
<div class="row">
  <div class="col-md-6">
<div class="card">
                <div class="card-header">
                  <strong>History Penambahan Persediaan <?php echo $persediaan->nama_persediaan ?></strong>
                </div>
          <div class="card-body card-block">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Pembeliaan</th>
          <th>Tanggal Transaksi</th>
          <th>Jumlah</th>
          <th>Dibuat oleh</th>
        </tr>
      </thead>
      <tbody>

        <?php $x=1; foreach($transaksi_history as $his){ ?>
          <tr>
          <td><?php echo $x++ ?></td>
          <td><?php echo $his->tgl_pembelian ?></td>
          <td><?php echo $his->tgl_transaksi ?></td>
          <td><?php echo $his->jumlah ?></td>
          <td><?php echo $his->created_by ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<div class="col-md-6">
  <div class="card">
                  <div class="card-header">
                    <strong>History Permintaan Persediaan <?php echo $persediaan->nama_persediaan ?></strong>
                  </div>
            <div class="card-body card-block">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Jumlah Permintaan</th>
            <th>Jumlah disetujui</th>
            <th>Pemohon</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $x=1; foreach($transaksi_permintaan as $tp){ ?>
            <td><?php echo $x++ ?></td>
            <td><?php echo $tp->tgl_transaksi ?></td>
            <td><?php echo $tp->jumlah_permintaan ?></td>
            <td><?php echo $tp->jumlah_disetujui ?></td>
            <td><?php echo $tp->id_user ?></td>
            <td><?php echo $tp->status_transaksi ?></td>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</div>
      <?php $this->load->view('foot') ?>
      <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
      <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->

</body>

</html>
