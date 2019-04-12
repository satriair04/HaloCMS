<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<!--Title bisa dimodif dengan PHP agar lebih dinamis dan cantik-->
    <title><?php echo "Sistem pengolahan artikel - Laman " .": ". ucfirst($this->uri->segment(2)) ." - ". ucfirst($this->uri->segment(3)) ?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('/frontend/assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/frontend/assets/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('/frontend/assets/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/frontend/css/sb-admin.css');?>" rel="stylesheet">
	
	<!-- Include Froala_Editor style. -->
	<link href="<?php echo base_url('/frontend/assets/froala_editor/css/froala_editor.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('/frontend/assets/froala_editor/css/froala_style.min.css');?>" rel="stylesheet" type="text/css" />
	
	<!-- Include Chart.js -->
	<script src="<?php echo base_url('/frontend/assets/chart.js/Chart.js');?>"></script>
	<!--CUSTOM CSS DISINI SAJA-->
	
	<style type="text/css">
	table{
	  margin: 0 auto;
	  width: 100%;
	  clear: both;
	  border-collapse: collapse;
	  word-wrap:break-word;
	}
	
	<!--Overiding class dari file sb-admin.css aslinya. Agar full lebar footer-->
	.footer-style {
	  display: -webkit-box;
	  display: -ms-flexbox;
	  display: flex;
	  position: absolute;
	  right: 0;
	  bottom: 0;
	  width: 100%;
	  height: 80px;
	  background-color: #e9ecef;
	}

	</style>
</head>