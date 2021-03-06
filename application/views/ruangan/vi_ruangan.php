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
                            <strong class="card-title">Daftar Ruangan</strong>
                        </div>
                        <div class="card-header">
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('ruangan/add') ?>" ><i class="fa fa-pencil"></i> Add New</a>
                        </div>

                 <div class="card-body">
                   <?php echo $this->session->flashdata ? $this->session->flashdata('inpo')->msg : ""?>
                  <table id="tabelRuangan" class="table table-striped table-bordered">
                    <thead>
                        <tr>

                        <th>Kode Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Fasilitas</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
            if(sizeof($daftar_ruangan) < 1){
              echo "<tr><td colspan='6' align='center'>Data Tidak Tersedia</td></tr>";
            }else{
						foreach($daftar_ruangan as $rg){
						?>
						<tr>

						<td><?php echo $rg->kode_ruangan ?></td>
						<td><?php echo $rg->nama_ruangan ?></td>
            <td><?php echo $rg->kapasitas ?></td>
            <td>

            </td>
						<td><?php echo $rg->keterangan ?></td>
            <td>
              <a class="btn btn-warning btn-sm" href="<?php echo site_url('ruangan/edit/'.$rg->id_ruangan);?>"class="btn btn-small"><i class="fa fa-edit"></i>Edit</a>
              <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#staticModal<?php echo $rg->id_ruangan; ?>" onclick="confirm_modal('<?php echo site_url('ruangan/hapus/'.$rg->id_ruangan);?>','Title');" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
						</td>
						</tr>

          <?php }} ?>
                    </tbody>
                </table>
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
            <?php $this->load->view('foot') ?>
            <script>
              jQuery(document).ready(function(){
                jQuery("#tabelRuangan").dataTable();
              })
            </script>
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
