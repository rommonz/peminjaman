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
                    <h3>Dashboard</h3>
                    </div>
				</div>
			</div>
        </header><!-- /header -->
        <!-- Header-->
		<div class="container">
			<div class="card">
                      <div class="card-header">
                        <strong>Form Peminjaman</strong>
                      </div>
                      <div class="card-body card-block">
					  <div class="bootstrap-iso">
                        <form action="<?php echo site_url('crudpinjambarang/todetail'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<?php
                            //foreach($tbl_pinjambarang as $detail){
                        ?>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor Peminjaman</label></div>
                            <div class="col-12 col-md-9"><input type="text" value="<?php // echo $detail->no_pb; ?>" disabled="" class="form-control" required></div>
							<div class="col-12 col-md-9"><input type="hidden" id="idpb" name="idpb" value="<?php // echo $detail->id_pb; ?>" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nomor SPT</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nospt" name="nospt" value="<?php echo $detail->no_spt; ?>" disabled="" class="form-control" required></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tanggal" name="tanggal" value="<?php echo $detail->tanggal; ?>" disabled="" class="tanggal" required></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama 1</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama1" name="nama1" value="<?php echo $detail->nama1; ?>" disabled="" class="form-control" required></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama 2</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama2" name="nama2" value="<?php //echo $detail->nama2; ?>" disabled="" class="form-control" required></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tujuan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama3" name="nama3" value="<?php //echo $detail->tujuan; ?>" disabled="" class="form-control" required></div>
                          </div>
		<div class="animated fadeIn">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Barang</label></div>
                            <div class="col-12 col-md-9">
                              <select name="select" id="select" class="form-control">
                                <?php //foreach($tb_barang as $row) { ?>
								<option value="<?php //echo $row->id_barang ?>"><?php //echo $row->nama_barang ?></option>
								<?php // } ?>
                              </select>
                            </div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Unit</label></div>
                            <div class="col-12 col-md-9"><input type="number" min="0" id="unit" name="unit" placeholder="Unit" class="form-control" required></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="form-control"></div>
                          </div>
						  <div class="row form-group">
						    <div class="col col-md-3"></div>
							<div class="col-12 col-md-9">
							<button type="submit" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Tambah
							</button>
							</div>
						  </div>
					  <div class="content mt-3">

                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Barang Pilihan</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Merk/Type</th>
                        <th>No Seri</th>
                        <th>Kondisi Barang</th>
                        <th>Unit</th>
						<th>Keterangan</th>
						<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						//foreach($view_barang as $br){
						?>
						<tr>

						<td><?php //echo $br->kode_barang ?></td>
						<td><?php //echo $br->nama_barang ?></td>
						<td><?php //echo $br->merk ?></td>
						<td><?php //echo $br->no_seri ?></td>
						<td><?php //echo $br->kondisi_barang ?></td>
						<td><?php //echo $br->unit ?></td>
						<td><?php //echo $br->keterangan ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="<?php // echo site_url('crudpinjambarang/hapus/'.$br->id_barang.'/'.$br->id_pb); ?>" class="btn btn-small"><i class="fa fa-trash-o"></i>Hapus</a>
						</td>
						</tr>
						<?php //} ?>
                    </tbody>
                </table>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>




					</form>
					<div class="card-footer">
                        <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#staticModal2" class="btn btn-small">
                          <i class="fa fa-dot-circle-o"></i> Selesai
                        </button>
                        <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#staticModal<?php echo $detail->id_pb; ?>" class="btn btn-small">
                          <i class="fa fa-ban"></i> Batal
                        </button>
                      </div>
					</div>
					</div>
			</div>
		</div>
	</div>
						<?php
                        //    }
                         ?>

						<div class="modal fade" id="staticModal2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticModalLabel">Konfirmasi Selesai</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
										Yakin ingin menyelesaikan ini?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" href="<?php echo site_url('crudpinjambarang/kepinjambarang'); ?>">Ya, Selesai</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="staticModalhome" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
										Data akan otomatis tersimpan. ingin pindah halaman?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" href="<?php echo site_url('Admin/index'); ?>">Ya, pindah</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="staticModaldaftar" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
										Data akan otomatis tersimpan. ingin pindah halaman?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" href="<?php echo site_url('Crudbarang/kebarang'); ?>">Ya, pindah</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="staticModallaporan" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
										Data akan otomatis tersimpan. ingin pindah halaman?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" href="<?php echo site_url('Laporanbarang/kelaporan'); ?>">Ya, pindah</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="staticModalkeluar" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
										Data akan otomatis tersimpan. ingin keluar?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" href="<?php echo site_url('Login/keluar'); ?>">Ya, keluar</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="staticModal<?php echo $detail->id_pb; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticModalLabel">Konfirmasi Batal</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
										Yakin ingin membatalkan proses ini?
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a type="button" class="btn btn-primary" href="<?php echo site_url('crudpinjambarang/hapusall/'.$detail->id_pb); ?>">Ya, Batal</a>
									</div>
								</div>
							</div>
						</div>


    <script src="<?php echo base_url('assets/js/vendor/jquery-2.1.4.min.js');?>"</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/chart-js/Chart.bundle.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('assets/js/widgets.js')?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/jquery.vmap.sampledata.js');?>"></script>
    <script src="<?php echo base_url('assets/js/lib/vector-map/country/jquery.vmap.world.js');?>"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
    <script>
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>

</body>

</html>
