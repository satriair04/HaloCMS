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
?>
<div class="col-lg-3">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-list-alt"></i> Detail kinerja <?php if($this->session->userdata('acc_name') == $result['acc_name']){echo 'Kamu';}else{echo $role_str;}?>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="font-weight-bold text-left">Keseluruhan</p>
							</div>
						</div>
						<div class="row">
						<?php if($result['acc_role'] != 2){?>
							<div class="col">
								<p class="bg-primary font-weight-bold text-center text-light" data-toggle="tooltip" title="Draft"><?php echo $overall[0]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-secondary font-weight-bold text-center text-light" data-toggle="tooltip" title="Pending"><?php echo $overall[1]['jumlah']?></p>
							</div>
						<?php }?>
							<div class="col">
								<p class="bg-warning font-weight-bold text-center text-light" data-toggle="tooltip" title="Process"><?php echo $overall[2]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-success font-weight-bold text-center text-light" data-toggle="tooltip" title="Accepted"><?php echo $overall[3]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-danger font-weight-bold text-center text-light" data-toggle="tooltip" title="Rejected"><?php echo $overall[4]['jumlah']?></p>
							</div>
						</div>
					</div>
					<hr>
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="font-weight-bold text-left">Bulan ini (<?php echo date("F-Y")?>)</p>
							</div>
						</div>
						<div class="row">
						<?php if($result['acc_role'] != 2){?>
							<div class="col">
								<p class="bg-primary font-weight-bold text-center text-light" data-toggle="tooltip" title="Draft"><?php echo $thismonth[0]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-secondary font-weight-bold text-center text-light" data-toggle="tooltip" title="Pending"><?php echo $thismonth[1]['jumlah']?></p>
							</div>
						<?php }?>
							<div class="col">
								<p class="bg-warning font-weight-bold text-center text-light" data-toggle="tooltip" title="Process"><?php echo $thismonth[2]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-success font-weight-bold text-center text-light" data-toggle="tooltip" title="Accepted"><?php echo $thismonth[3]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-danger font-weight-bold text-center text-light" data-toggle="tooltip" title="Rejected"><?php echo $thismonth[4]['jumlah']?></p>
							</div>
						</div>
					</div>
					<hr>
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="font-weight-bold text-left">Bulan lalu (<?php echo date("F-Y",strtotime("-1 month"))?>)</p>
							</div>
						</div>
						<div class="row">
						<?php if($result['acc_role'] != 2){?>
							<div class="col">
								<p class="bg-primary font-weight-bold text-center text-light" data-toggle="tooltip" title="Draft"><?php echo $lastmonth[0]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-secondary font-weight-bold text-center text-light" data-toggle="tooltip" title="Pending"><?php echo $lastmonth[1]['jumlah']?></p>
							</div>
						<?php }?>	
							<div class="col">
								<p class="bg-warning font-weight-bold text-center text-light" data-toggle="tooltip" title="Process"><?php echo $lastmonth[2]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-success font-weight-bold text-center text-light" data-toggle="tooltip" title="Accepted"><?php echo $lastmonth[3]['jumlah']?></p>
							</div>
							<div class="col">
								<p class="bg-danger font-weight-bold text-center text-light" data-toggle="tooltip" title="Rejected"><?php echo $lastmonth[4]['jumlah']?></p>
							</div>
						</div>
					</div>
					<hr>
					<?php if($this->session->userdata('acc_role') == 1){?>
					<div class="container form-group">
						<div class="row">
							<div class="col">
								<a href="<?php echo site_url('access/admin/update/'.$result['acc_id']); ?>"><button class="btn btn-primary fill form-control"><i class="fas fa-edit"></i> Edit</button></a>
							</div>
							<div class="col">
								<a onclick="bannedConfirm('<?php echo site_url('access/admin/banned/'.$result['acc_id']); ?>')" href="#"><button class="btn btn-danger fill form-control"><i class="fas fa-lock"></i> Banned</button></a>
							</div>
						</div>
					</div>
					<?php }else{?>
					<div class="container form-group">
						<div class="row">
							<div class="col">
								<a href="<?php echo site_url('access/laporan/'); ?>"><button class="btn btn-primary fill form-control"><i class="fas fa-list"></i> Ke halaman laporan ...</button></a>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				
			</div>
		</div>