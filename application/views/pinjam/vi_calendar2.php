<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('head'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
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
                <div id="calendarIO"></div>

				</div>
				</div>
			</div>
		</div>

		</div>
	</div>
	</div>
						<div class="modal fade" id="modal_show" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="" data-backdrop="static">
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


    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/moment.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    <!-- script type="text/javascript" src="< ?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script -->
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>


    <script>
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {

        //$('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    //$('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    //$('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    //$('#create_modal').modal('show');
                    //save();
                  //  $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    //editDropResize(event);
                    alert(event.title);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    //editDropResize(event);
                    alert(event.title);
                },
                eventClick: function(event, element)
                {
                  show_detail();
                  //alert(event.title);
                  //console.log(event);
                },
                events: JSON.parse(get_data)
            });
    });

    function show_detail(){
      $("#modal_show").modal('show');
      //alert("test");
      //jQuery('#modal_show').modal('show', {backdrop: 'static',keyboard :false});
    }
    </script>

</body>

</html>
