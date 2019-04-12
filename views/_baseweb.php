<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("template/_partials/head.php"); ?>
</head>
<body id="page-top">

<?php 
	if(!$this->session->userdata('status_login')){
		$this->load->view("template/_partials/navbar.php");
	}else{
		if($this->session->userdata('acc_role') == 1){
			$this->load->view("template/_partials/navbar/admin_navbar.php");
		}elseif($this->session->userdata('acc_role') == 2){
			$this->load->view("template/_partials/navbar/redaktur_navbar.php");
		}elseif($this->session->userdata('acc_role') == 3){
			$this->load->view("template/_partials/navbar/wartawan_navbar.php");
		}
	}
?>

<div id="wrapper">

	<?php //$this->load->view("template/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

		<?php 
		//breadcrumb.
		$this->load->view("template/_partials/breadcrumb.php"); 
		
		//Feedback aksi. JANGAN DIGANGGU
		$this->load->view("template/_partials/feedback.php"); 
		?>

		<!--RUANGAN UNTUK KONTEN - AWAL-->
			<?php
				echo $view;
			?>
		<!--RUANGAN UNTUK KONTEN - AHIR-->
		<!-- /.container-fluid -->

	

	</div>
	
	<!-- /.content-wrapper -->
<!-- Sticky Footer -->
		<?php $this->load->view("template/_partials/footer.php"); ?>	
</div>
<!-- /#wrapper -->


<?php $this->load->view("template/_partials/scrolltop.php"); ?>
<?php $this->load->view("template/_partials/modal.php"); ?>
<?php $this->load->view("template/_partials/js.php"); ?>
    
</body>
</html>








