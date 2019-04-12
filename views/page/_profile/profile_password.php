<div class="col-lg-4">
			<div class="card mb-3">
				<div class="card-header">
					<span data-toggle="tooltip" title="Perhatian : Untuk keamanan akun. Gantilah password secara berkala. Jagalah kerahasiaan username dan password kamu."><i class="fas fa-lock"></i> Ubah password</span>
				</div>
				<div class="card-body">
					<form action "<?php echo site_url('access/profile/index')?>" method="post">
						<div class="form-group">
							<label for="Username">Username</label>
							<input type="text" name="oldname" class="form-control form-control-sm" id="Username" placeholder="Masukkan username">
						</div>
						<div class="form-group">
							<label for="oldPassword">Password lama</label>
							<input type="password" name="oldpass" class="form-control form-control-sm" id="oldPassword" placeholder="Masukkan password kamu saat ini">
						</div>
						<div class="form-group">
							<label for="newPassword">Password baru</label>
							<input type="password" name="newpass" class="form-control form-control-sm" id="newPassword" placeholder="Masukkan password baru yang akan digunakan">
						</div>
						<div class="form-group">
							<label for="comparePassword">Konfirmasi password baru</label>
							<input type="password" name="conpass" class="form-control form-control-sm" id="comparePassword" placeholder="Konfirmasi password baru">
						</div>
						<br>
						<div class="form-group">
							<button type="submit" name="btnSubmit" class="btn btn-primary form-control" >Ubah Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>