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
                     <dt class="col-sm-3">Ruangan</dt>
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
                   <dl class="row">
                   <?php
                      foreach ($fasilitas as $fas) {
                        echo '<dt class="col-sm-3">Nama Barang</dt>';
                        echo '<dd class="col-sm-9">'.$fas->nama_barang.'</dd>';
                      }
                   ?>
                 </dl>
				         </div>
                 <div class="card-footer">
                   <div class="col-12 col-md-9">
                   <button type="submit" class="btn btn-primary btn-sm" onclick="window.history.back()">
                   <i class="fa fa-reply"></i> Kembali
                   </button>
                   <button type="reset" class="btn btn-danger btn-sm">
                   <i class="fa fa-ban"></i> Reset
                   </button>
                   </div>
                 </div>


				     </div>
			   </div>
		  </div>

		</div>
	</div>
	</div>
						<div class="modal fade" id="modal_delete_m_n" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticModalLabel">Konfirmasi Hapus</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
										Yakin ingin menghapus ini?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" id="delete_link_m_n">Ya, Hapus</a>
									</div>
								</div>
							</div>
						</div>
						<script>
    	function confirm_modal(delete_url,title)
    	{
    		jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
    		jQuery("#modal_delete_m_n .grt").text(title);
    		document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
    		document.getElementById('delete_link_m_n').focus();
    	}
    	</script>



</body>

</html>
