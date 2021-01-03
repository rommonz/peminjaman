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
                    <h3>Pemeliharaan</h3>
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
                            <strong class="card-title">Daftar Pengajuan Pemeliharaan</strong>
                            <span><a  class="btn btn-primary" href="<?php echo base_url('pemeliharaan/formpemeliharaan') ?>"><i class="fa fa-plus"></i> ADD NEW</a></span>
                        </div>
                        <div class="card-header">
                          <div class="row form-group">
                          <div class="col col-md-2"><label for="text-input" class=" form-control-label">Status</label></div>
                            <div class="col-md-3">
                              <select id="status" class="form-control">
                                <option value="ALL">ALL</option>
                                <option value="PENDING">PENDING</option>
                                <option value="APPROVED">APPROVED</option>
                                <option value="REJECTED">REJECTED</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                            <a class="btn btn-primary" onclick="window.location.replace('<?php echo base_url('pemeliharaan') ?>'+'?s='+$('#status').val())" >GO</a>
                          </div>
                        </div>

                 <div class="card-body">
                  <table id="tabelPeminjaman" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Keterangan</th>
                          <th>Dibuat oleh</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Approval</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php $x=1; foreach($daftar_pemeliharaan as $pr){ ?>

						<tr>

						<td><?php echo $x++; ?></td>
						<td><?php echo $pr->kode_barang ?></td>
						<td><?php echo $pr->nama_barang ?></td>
						<td><?php echo $pr->keterangan ?></td>
						<td><?php echo $pr->created_by ?></td>
						<td><?php echo $pr->created_at ?></td>
            <td class=""><?php echo $pr->approval ?></td>
            <td>
              <a class="btn btn-warning btn-sm" href="<?php echo site_url('pemeliharaan/edit/'.$pr->id_pemeliharaan);?>"class="btn btn-small"><i class="fa fa-edit"></i>Edit</a>
              <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#staticModal<?php echo $pr->id_pemeliharaan; ?>" onclick="confirm_modal('<?php echo site_url('pemeliharaan/hapus/'.$pr->id_pemeliharaan);?>','hapus');" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
						</td>
						</tr>

						<?php } ?>
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
            <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
            <!-- script src="< ?php echo base_url('assets/js/main.js');?>"></script -->


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
