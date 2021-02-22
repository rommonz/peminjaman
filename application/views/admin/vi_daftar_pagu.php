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
                    <h3>Pagu Makan Minum</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
        <!-- TABEL-->
                <div class="content mt-3">
                    <?php $this->load->view('flashdata') ?>
                    <div class="animated fadeIn">
                        <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Daftar pagu makan minum</strong>
                                </div>
                                <div class="card-header">
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/addpagumamin') ?>" ><i class="fa fa-pencil"></i> Add New</a>
                              </div>

                         <div class="card-body">
                          <table id="table-pengguna" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Unit Kerja</th>
                                <th>Kegiatan</th>
                                <th>Nilai Pagu</th>
                                <th>Tahun Pagu</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                    						<?php
                    						foreach($daftar_pagu as $p){
                    						?>
                    						<tr>
                                <td><?php echo $p->nama_unit_kerja ?></td>
                                <td><?php echo $p->kegiatan ?></td>
                                <td style="text-align:right;"><?php echo number_format($p->nilai_pagu) ?></td>
                                <td><?php echo $p->tahun_pagu ?></td>
                    						<td>
                                  <a class="btn btn-warning btn-sm" href="<?php echo site_url('admin/editpagu/'.$p->id_pagu);?>"class="btn btn-small"><i class="fa fa-edit"></i>Edit</a>
                                  <a class="btn btn-danger btn-sm"   onclick="hapus(<?php echo $p->id_pagu ;?>)" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
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
        						<script>

              function hapus(id_pagu){

                c = confirm("apakah ada yakin menghapus data ini ? "+id_pagu);
                if(c){
                  jQuery.post('<?php echo base_url('admin/hapuspagumamin') ?>',{'id_pagu':id_pagu})
                  .done(function(res){
                    if(res == 'SUCCESS'){
                      window.location.reload();
                    }else{
                      alert('Data Gagal dihapus');
                    }
                  });
                }
              }

            	function confirm_modal(delete_url,title)
            	{
            		jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static',keyboard :false});
            		jQuery("#modal_delete_m_n .grt").text(title);
            		document.getElementById('delete_link_m_n').setAttribute("href" , delete_url );
            		document.getElementById('delete_link_m_n').focus();
            	}
            	</script>
              <?php $this->load->view('foot') ?>
            <script>
            $(document).ready(function() {
                jQuery('#table-pengguna').DataTable();
              } );
            </script>

        </body>

        </html>
