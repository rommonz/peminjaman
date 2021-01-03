<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('head'); ?>

</head>

<body>


        <!-- Left Panel -->
        <?php $this->load->view('menu'); ?>
        <!-- #Left Panel -->
        <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-plus"></i></a>
                    <div class="header-left">
                    <h3><?php echo strtoupper($this->uri->segment(1)) ?></h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
<!-- TABEL-->
        <div class="content mt-3">
            <div class="animated fadeIn">
              <div class="row">

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <strong class="card-title"><?php echo $detail->title ?></strong>
                    </div>


                 <div class="card-body">
                   <dl class="row">
                     <dt class="col-sm-3">Ruangan </dt>
                     <dd class="col-sm-9">: <?php echo $detail->nama_ruangan ?></dd>
                     <dt class="col-sm-3">Deskripsi</dt>
                     <dd class="col-sm-9">: <?php echo $detail->description ?></dd>
                     <dt class="col-sm-3">Status Approval</dt>
                     <dd class="col-sm-9">: <?php echo $detail->approval ?></dd>
                     <dt class="col-sm-3">Tanggal Mulai </dt>
                     <dd class="col-sm-9">: <?php echo $detail->start_date ?></dd>
                     <dt class="col-sm-3">Tanggal Selesai</dt>
                     <dd class="col-sm-9">: <?php echo $detail->end_date ?></dd>
                     <dt class="col-sm-3">Status Approval</dt>
                     <dd class="col-sm-9">: <?php echo $detail->approval ?></dd>
                     <dt class="col-sm-3">Dibuat Oleh</dt>
                     <dd class="col-sm-9">: <?php echo $detail->create_by ?></dd>
                   </dl>
                   <hr/>
                   <h4>Fasilitas Ruangan</h4>
                   <table class="table">
                     <thead>
                       <tr>
                         <th>No.</th>
                         <th>Nama Barang</th>
                         <th>Kode Barang</th>
                         <th>Foto</th>
                       </tr>
                     </thead>
                   <?php $x=1; foreach ($fasilitas as $fas) : ?>
                        <tr>
                          <td><?php echo $x++ ?></td>
                          <td><?php echo $fas->nama_barang ?></td>
                          <td><?php echo $fas->kode_barang ?></td>
                          <td><img src="<?php echo base_url('assets/uploads/'.$fas->foto) ?>" width="100" alt="foto barang"></td>
                        </tr>
                   <?php endforeach;?>
                 </table>
				         </div>
                 <div class="card-footer">
                   <div class="col-12 col-md-9">
                   <button type="submit" class="btn btn-primary btn-sm" onclick="window.history.back()">
                   <i class="fa fa-reply"></i> Kembali
                   </button>
                  <?php if($this->session->userdata('role') <= 2 && $detail->approval == 'PENDING') : ?>
                    <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#accModal<?php echo $detail->id; ?>" onclick="confirm_modal('<?php echo $this->uri->segment(3) ?>');" class="btn btn-small"><i class="fa fa-check"></i>Proses</a>
                  <?php endif; ?>
                   </div>
                 </div>


				     </div>
			   </div>
		  </div>

		</div>
	</div>
	</div>

  <div class="modal fade" id="modal_acc" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticModalLabel">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          Setujui permohonan peminjaman ruangan ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <a type="button" class="btn btn-primary"  onclick="proses('APPROVED')" id="btnProsesApproved">Ya, Setujui</a>
          <a type="button" class="btn btn-danger" onclick="proses('REJECTED')" id="btnProsesRejected">Tolak</a>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('foot') ?>
  <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
	<script>
  function confirm_modal(id)
  {
    jQuery('#modal_acc').modal('show', {backdrop: 'static',keyboard :false});
    $("#btnProsesApproved").attr('idnya',id);
    $("#btnProsesRejected").attr('idnya',id);
  }

  function proses(status){
    var id;
    if(status == 'APPROVED'){
      id = $("#btnProsesApproved").attr('idnya');
    }else{
      id = $("#btnProsesRejected").attr('idnya');
    }
    $.post('<?php echo base_url('pinjam/proses/') ?>',{id : id, status:status})
      .done(function(data){
          if(data == 'SUCCESS'){
            window.location.reload();
          }
      })


  }
</script>



</body>

</html>
