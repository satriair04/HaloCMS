<!-- Sticky Footer -->
<?php
$role_str = "";
	switch($this->session->userdata('acc_role')){
		case 1: $role_str = "Administrator";
			break;
		case 2: $role_str = "Redaktur";
			break;
		case 3: $role_str = "Wartawan";
			break;
	}
?>
<div class="footer-style sticky-bottom" style="display: -webkit-box; display: -ms-flexbox; display: flex; position: absolute; right: 0; bottom: 0; width: 100%; height: 80px; background-color: #e9ecef;">
  <div class="container my-auto">
	<p class="text-center my-auto">Anda login sebagai <?php echo $role_str;?></p>
    <div class="copyright text-center my-auto">
      <span>Copyright © <?php echo "S1stem4KP"." ". Date('Y') ?></span>
    </div>
  </div>
</div>