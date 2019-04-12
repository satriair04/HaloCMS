<?php 
$role_str = 'Administrator';
if($result['acc_role']==2){
	$role_str = 'Redaktur';
}
if($result['acc_role']==3){
	$role_str = 'Wartawan';
}
?>
<div class="card">
	<div class="card-header">
		<i class="fas fa-edit"></i> Update pengguna
	</div>
		<div class="card-body">
			<form action "access/admin/update" method="post">
			  <div class="form-group">
				<label for="ID">Kode akun</label>
				<input type="text" class="form-control" id="ID" value="<?php echo $result['acc_id']?>" readonly disabled>
			  </div>
			  <div class="form-group">
				<label for="Role">Peran pengguna</label>
				<input type="text" class="form-control" id="Role" value="<?php echo $role_str;?>" readonly disabled>
			  </div>
			  <div class="form-group">
				<label for="Waktu">Akun dibuat pada</label>
				<input type="text" class="form-control" id="Waktu" value="<?php echo $result['acc_date']?>" readonly disabled>
			  </div>
			  <div class="form-group">
				<label for="usr">Username</label>
				<input type="text" class="form-control" id="usr" value="<?php echo $result['acc_username'];?>" readonly disabled>
			  </div>
			  <div class="form-group">
				<label for="Nama">Nama Pengguna</label>
				<input type="text" name="change_name" class="form-control" id="Nama" aria-describedby="namaHelp" value="<?php echo $result['acc_name'];?>" required>
				<small id="namaHelp" class="form-text text-muted">Mengidentifikasi pemilik akun. Gunakan nama asli sesuai KTP. Biarkan jika tidak diubah</small>
			  </div>
			  <div class="form-group">
				<label for="Email">Alamat E-mail</label>
				<input type="text" name="change_email" class="form-control" id="Email" aria-describedby="emailHelp" value="<?php echo $result['acc_email']?>" required>
				<small id="emailHelp" class="form-text text-muted">Gunakan email yang digunakan dalam organisasi. Biarkan jika tidak diubah</small>
			  </div>
			  <div class="container-fluid row form-group" role="group">
					<div class="col">	
						<button class="btn btn-warning form-control" type="reset">Reset</button>
					</div>
					<div class="col">
						<button class="btn btn-primary form-control" type="submit" name="btnSubmit">Submit</button>
					</div>
			  </div>
			</form>
		</div>
</div>
<br>
