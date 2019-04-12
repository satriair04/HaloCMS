<div class="card">
	<div class="card-header">
		<i class="fas fa-user-plus"></i> Tambah pengguna baru
	</div>
		<div class="card-body">
<form action "access/admin/create" method="post">
	
  <div class="form-group">
    <label for="Nama">Pemilik akun</label>
    <input type="text" name="name" class="form-control" id="Nama" aria-describedby="namaHelp" placeholder="Masukkan nama pengguna" value="<?php echo set_value('name');?>" required>
    <small id="namaHelp" class="form-text text-muted">Mengidentifikasi pemilik akun. Gunakan nama asli sesuai KTP.</small>
  </div>
  <div class="form-group">
    <label for="Email">Alamat E-mail</label>
    <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Masukkan E-mail" required>
    <small id="emailHelp" class="form-text text-muted">Gunakan email yang digunakan dalam organisasi.</small>
  </div>
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" name="usrname" class="form-control" id="Username" placeholder="Masukkan Username" aria-describedby="usrHelp" value="<?php echo set_value('usrname');?>" required>
	<small id="usrHelp" class="form-text text-muted">Nama pengguna untuk mengakses sistem.</small>
  </div>
  <div class="form-group">
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="2">
    <label class="form-check-label" for="inlineRadio1">Redaktur</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="3" checked>
    <label class="form-check-label" for="inlineRadio2">Wartawan</label>
  </div>
  <small id="usrHelp" class="form-text text-muted">Peran pengguna terhadap sistem.</small>
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
	




