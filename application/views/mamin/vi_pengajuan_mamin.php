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
                    <h3><?php echo $this->judul ?></h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
      <?php $this->load->view('flashdata') ?>
                    <div class="card">
                      <div class="card-header">
                        <strong>Pengajuan Baru</strong>
                      </div>
                      <div class="card-body card-block">
                        <table class="table table-bordered">
                          <tr>
                            <th>Nama Kegiatan</th>
                            <th>Pagu Awal</th>
                            <th>Sisa Pagu</th>
                          </tr>
                          <tr>
                            <td><?php echo $kegiatan->kegiatan ?></td>
                            <td><?php echo number_format($kegiatan->nilai_pagu) ?></td>
                            <td><?php echo number_format($kegiatan->pagu_berjalan) ?></td>
                          </tr>
                        </table>
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo site_url('mamin/pengajuansave'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Informasi Singkat</label></div>
                                <div class="col-12 col-md-9">
                                  <input type="text" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" class="form-control" required>
                                  <input type="hidden" id="id_pagu" value="<?php echo $_GET['k'] ?>" />
                                </div>
                          </div>

                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Lokasi Kegiatan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan" placeholder="Lokasi Kegiatan" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Peserta Kegiatan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="peserta_kegiatan" name="peserta_kegiatan" placeholder="Peserta Kegiatan" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Jumlah Peserta</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="jumlah_peserta" name="jumlah_peserta" placeholder="jumlah peserta" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Nilai Pengajuan</label></div>
                                <div class="col-12 col-md-9">
                                  <input type="text" id="nilai_pengajuan" onchange="cekpagu(<?php echo $kegiatan->pagu_berjalan ?>)" name="nilai_pengajuan" placeholder="Nilai Pengajuan" class="form-control" required>
                                </div>
                          </div>
                          <div class="row form-group">
                                <div class="col col-md-3"><label for="kd" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="form-control" required></div>
                          </div>
                      </div>

                      <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-sm" name="save" value="Save"/>
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('mamin/listmamin')?>" role="button">Kembali</a>
                      </div>
					  </form>
                    </div>


        </div>
    </div>
  <?php $this->load->view('foot'); ?>

</body>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("#kegiatan").on('change',function(){
      alert(this.value);
    })
  })

  function cekpagu(pagu){
    n = jQuery("#nilai_pengajuan").val();
    if(n > pagu){
      alert('Nilai Pangajuan melebihi pagu tersisa sebesar : '+ pagu);
      jQuery("#nilai_pengajuan").focus();
    }else{
      jQuery("#keterangan").focus();
    }
    exit;
  }
</script>
</html>
