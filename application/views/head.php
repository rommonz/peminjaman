<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->session->userdata('nama') ? $user = $this->session->userdata('nama'):redirect('login/masuk','refresh'); 
?>

<script type="text/javascript"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Peminjaman Barang</title>
<meta name="description" content="Peminjaman Barang - Dinas Kesehatan Kota Bogor">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="<?php echo base_url('assets/images/kujangkotabogor.png')?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css')?>">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/scss/style.css')?>">
<link href="<?php echo base_url('assets/css/lib/vector-map/jqvmap.min.css')?>" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
