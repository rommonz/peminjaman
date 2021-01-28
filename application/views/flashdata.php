<?php if($this->session->flashdata('msg')){ ?>
  <?php $state =  $this->session->flashdata('state') ?>
<div class="col-sm-12">
    <div class="alert  alert-<?php echo $this->session->flashdata('state') ?> alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-<?php echo $state ?>"><?php echo $state ?></span> <?php echo $this->session->flashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php } ?>
