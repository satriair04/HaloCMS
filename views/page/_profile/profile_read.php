<?php
	$role_str = "";
	switch($result['acc_role']){
		case 1: $role_str = "Administrator";
			break;
		case 2: $role_str = "Redaktur";
			break;
		case 3: $role_str = "Wartawan";
			break;
	}
	$edit_pwd = FALSE;
	if($this->session->userdata('acc_id') == $result['acc_id']){
		$edit_pwd = TRUE;
	}
?>

	<div class="row">
		<div class="col">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-user"></i> Profil <?php if($this->session->userdata('acc_name') == $result['acc_name']){echo 'Kamu';}else{echo 'Pengguna';}?>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nomor akun pengguna</label>
						<input type="text" class="form-control form-control-sm" placeholder="<?php echo $result['acc_id']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama pengguna</label>
						<input type="text" class="form-control form-control-sm" placeholder="<?php echo $result['acc_name']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Alamat Email</label>
						<input type="text" class="form-control form-control-sm" placeholder="<?php echo $result['acc_email']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Peran pengguna</label>
						<input type="text" class="form-control form-control-sm" placeholder="<?php echo $role_str; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Waktu terdaftar</label>
						<input type="text" class="form-control form-control-sm" placeholder="<?php echo $result['acc_date']; ?>" readonly>
					</div>
				</div>
				
			</div>
		</div>
		<?php 
		if($edit_pwd){
			$this->load->view('page/_profile/profile_password');
		}
		if($result['acc_role'] != 1){
			$this->load->view('page/_profile/profile_report');
		}
			
		
		?>
	</div>