<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

        <title>Sistem pengolahan berita - Laman : Login</title>


    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('/frontend/assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/frontend/assets/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/frontend/css/sb-admin.css');?>" rel="stylesheet">

  </head>

  <body class="bg-dark">
	
    <div class="container">
	
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login pengguna</div>
        <div class="card-body">
		
		<?php 
		//Feedback aksi. JANGAN DIGANGGU
		$this->load->view("template/_partials/feedback.php"); 
		?>
	
          <form action="<?php echo site_url('auth/check/');?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="usr_name" id="inputUsername" class="form-control" placeholder="Username" required="required">
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="usr_pass" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small" href="#" onclick="resetPasswordConfirm('<?php echo site_url('Auth/forgot')?>')" >Lupa password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/frontend/assets/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('/frontend/assets/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/frontend/assets/jquery-easing/jquery.easing.min.js');?>"></script>
	<?php $this->load->view("template/_partials/modal.php"); ?>
	<?php $this->load->view("template/_partials/js.php"); ?>
  </body>

</html>


