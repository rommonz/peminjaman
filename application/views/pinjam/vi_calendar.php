<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
      <?php $this->load->view('head'); ?>
    <!-- link rel="stylesheet" type="text/css" href="< ?php echo base_url().'assets/css/bootstrap.min.css'; ?>" -->
    <!-- link rel="stylesheet" type="text/css" href="< ?php echo base_url().'assets/css/style.css'; ?>" -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">
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
                  <h3>Ruangan</h3>
                  </div>
      </div>
    </div>
      </header><!-- /header -->
      <!-- Header-->

<div class="container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="alert notification" style="display: none;">
                <button class="close" data-close="alert"></button>
                <p></p>
            </div>
            <div class="row">
              <div class="card">
                    <div class="card-header">
                      <strong>Kalender Ruangan</strong>
                    </div>
                    <div class="card-header">
                      <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pilih Ruangan</label></div>
                        <div class="col-12 col-md-6">
                          <select id="pilihruangan" class="form-control" required>
                            <option></option>
                            <?php foreach($listruangan as $ruang){ ?>
                            <option <?php echo $this->uri->segment(3) == $ruang->id_ruangan ? 'selected' : '' ?>
                                    value="<?php echo $ruang->id_ruangan ?>">
                                    <?php echo $ruang->kode_ruangan ?>
                            </option>
                          <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <a class="btn btn-primary"
                              onclick="window.location = '<?php echo base_url('pinjam/formpinjamruangan/') ?>'+$('#pilihruangan').val()">Book Ruangan</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body card-block">
                    <div class="bootstrap-iso">



                      <!-- place -->
                      <div id="calendarIO"></div>

                      <!-- end place -->
                    </div>
                </div>
              </div>


    </div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/moment.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<!-- script type="text/javascript" src="< ?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script -->
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>
<script type="text/javascript">
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
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
                select: function(start, end) {},
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
                  show_detail(event.id);
                  //alert(event.title);
                  console.log(event);
                },
                events: JSON.parse(get_data)
            });


    });

    $("#pilihruangan").on('change',function(){
      //alert($("#pilihruangan").val());
      window.location.replace('<?php echo base_url("pinjam/calendar/") ?>'+$("#pilihruangan").val());
    });

    function show_detail(id){
      window.location = '<?php echo base_url('pinjam/detail/') ?>'+id;
      //alert("test");
      //jQuery('#modal_show').modal('show', {backdrop: 'static',keyboard :false});
    }

</script>
</body>
</html>
