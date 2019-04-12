		<br/>
		<ul class="nav nav-tabs nav-fill" role="tablist">
			<li class="nav-item active"><a class="nav-link  active" data-toggle="tab" role="tab" href="#list"><i class="fas fa-users fa-fw"></i> Daftar Akun</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#banned"> <i class="fas fa-user-times fa-fw"></i> Daftar Banned</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#reset"><i class="fas fa-undo fa-fw"></i> Permohonan reset password</a></li>
		</ul>
		<div class="tab-content" id="nav-tabContent">
			<div id="list" class="tab-pane fade show active">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar seluruh pengguna aplikasi</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableActive" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										<th>ID Akun</th>
										<th>Username</th>
										<th>Nama</th>
										<th>E-Mail</th>
										<th>Role</th>
										<th>Waktu Terdaftar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($result as $data){ ?>
									<?php
									if($data['banned'] == 1){
										continue;
									}
									switch($data['acc_role']){
										case 1: $role_str = "Administrator";
										break;
										case 2: $role_str = "Redaktur";
										break;
										case 3: $role_str = "Wartawan";
										break;
									}
									?>
									<tr align="center">
										<td width="150">
											<?php echo $data['acc_id']; ?>
										</td>
										<td>
											<?php echo $data['acc_username']; ?>
										</td>
										<td>
											<?php echo $data['acc_name']; ?>
										</td>
										<td>
											<?php echo $data['acc_email']; ?>
										</td>
										<td>
											<?php echo $role_str; ?>
										</td>
										<td width="150px">
											<?php echo $data['acc_date']; ?>
										</td>
										<td width="250">
											<?php
											if($role_str == "Administrator" && $this->session->userdata('acc_id') == $data['acc_id']){
												$ref = site_url('access/admin/update/'.$data['acc_id']);
												echo "<a href='".$ref."' class='btn btn-small text-primary'><i class='fas fa-edit text-primary'></i> Edit</a>";
											}elseif($role_str == "Administrator" && $this->session->userdata('acc_id') != $data['acc_id']){
												echo "<a href='#' class='btn btn-small text-primary'><i class='fas fa-ban text-primary'></i> Tidak ada aksi</a>";
											}else{?>
											<a href="<?php echo site_url('access/admin/update/'.$data['acc_id']); ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="bannedConfirm('<?php echo site_url('access/admin/banned/'.$data['acc_id']); ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-lock"></i> Banned</a>
											<?php }?>
										</td>
									</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
			<div id="banned" class="tab-pane fade show">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar pengguna yang tidak dapat mengakses sistem</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableBanned" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										<th>ID Akun</th>
										<th>Username</th>
										<th>Nama</th>
										<th>E-Mail</th>
										<th>Role Pengguna</th>
										<th>Waktu Terdaftar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$acc_counter = 0;
									foreach ($result as $data){ ?>
									<?php
									if($data['banned'] == 0){
										continue;
									}
									switch($data['acc_role']){
										case 1: $role_str = "Administrator";
										break;
										case 2: $role_str = "Redaktur";
										break;
										case 3: $role_str = "Wartawan";
										break;
									}
									?>
									<tr align="center">
										<td width="150">
											<?php echo $data['acc_id']; ?>
										</td>
										<td>
											<?php echo $data['acc_username']; ?>
										</td>
										<td>
											<?php echo $data['acc_name']; ?>
										</td>
										<td>
											<?php echo $data['acc_email']; ?>
										</td>
										<td>
											<?php echo $role_str; ?>
										</td>
										<td>
											<?php echo $data['acc_date']; ?>
										</td>
										<td width="250">
											<a onclick="unlockConfirm('<?php echo site_url('access/admin/banned/'.$data['acc_id']); ?>')"
											 href="#!" class="btn btn-small text-warning"><i class="fas fa-unlock"></i> Unlock</a>
										</td>
									</tr>
									<?php 
									$acc_counter++;
									} ?>

								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
			<div id="reset" class="tab-pane fade">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar pengguna yang lupa password mereka</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableReset" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										<th>ID Akun</th>
										<th>Username</th>
										<th>Nama</th>
										<th>E-Mail</th>
										<th>Role Pengguna</th>
										<th>Waktu Terdaftar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$acc_counter = 0;
									foreach ($result as $data){ ?>
									<?php
									if($data['reset'] == 0){
										continue;
									}
									switch($data['acc_role']){
										case 1: $role_str = "Administrator";
										break;
										case 2: $role_str = "Redaktur";
										break;
										case 3: $role_str = "Wartawan";
										break;
									}
									?>
									<tr align="center">
										<td width="150">
											<?php echo $data['acc_id']; ?>
										</td>
										<td>
											<?php echo $data['acc_username']; ?>
										</td>
										<td>
											<?php echo $data['acc_name']; ?>
										</td>
										<td>
											<?php echo $data['acc_email']; ?>
										</td>
										<td>
											<?php echo $role_str; ?>
										</td>
										<td>
											<?php echo $data['acc_date']; ?>
										</td>
										<td width="250">
											<a onclick="resetCompletedConfirm('<?php echo site_url('access/admin/pwd_reset/'.$data['acc_id']); ?>')"
											 href="#!" class="btn btn-small text-warning"><i class="fas fa-undo"></i> Reset password</a>
										</td>
									</tr>
									<?php 
									$acc_counter++;
									} ?>

								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
		</div>
		
		