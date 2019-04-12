<div class="card">
	<div class="card-header">
		<i class="fas fa-table"></i>
			<?php
			$total_counter = 0;
			$pre_role = $role;
			if($role == 2){
				$role = 'redaktur';
			}else{
				$role = 'wartawan';
			}
			?>
			Rangkuman catatan jumlah kinerja <?php echo $role;?> berdasarkan <?php echo $type;?> artikel pada <?php echo date("F", mktime(0, 0, 0, $bulan, 10));?> <?php echo $tahun;?>
	</div>
	<div class="card-body">
		<table class="table table-hover" id="generateLaporan" width="100%" cellspacing="0">
			<thead>
				<tr align='center'>
					<th width="200px">Nama <?php echo $role;?></th>
					<?php
					//Loop pertama : Untuk mengambil seluruh data pada index pertama saja [0] yang masih memiliki array didalamnya
					//Array dimensi pertama yang berisikan array lagi
					//$row mengacu pada index dimensi pertama : [0],[1],[2], dst. 
					//$data mengacu kepada nilai dari array dimensi pertama yang berupa array lagi, seperti : [acc_id],[acc_name], ... dst 
					foreach($result as $row => $data){
						//Loop kedua : Untuk mengambil nama index array dimensi kedua. 
						foreach($data as $key => $value){
							//Lewati beberapa nama index agar tidak ditampilkan
							if($key == 'acc_id' || $key == 'acc_role' || $key == 'banned' || $key == 'acc_name'){
								//Note : 'acc_name' Tidak ditampilkan karena diganti dengan kolom 'th = Nama pengguna' [cek diatas]
								continue;
							}
							//Khusus untuk redaktur status. index berikut tidak ditampilkan
							if($pre_role == 2 && $type == 'status'){
								if($key == 'draft' || $key == 'pending' || $key == 'process'){
									continue;
								}
							}
							//Tampilkan nama indexnya saja
							echo "<th>".$key."</th>";
						}
						//Jika loop kedua diatas selesai maka akhiri perulangan agar tidak mengulang index.
						//Jika dibiarkan maka baris table-header akan berulang sebanyak row data yang ada
						break;
					}
					//Perulangan diatas bertujuan untuk membuat table header saja.
					?>
				</tr>
			<thead>
			<tbody>
				<?php
				//Loop pertama : Melakukan perulangan pembuatan baris sebanyak jumlah baris yang ada. 
				//Array dimensi pertama yang berisikan array lagi
				//$row mengacu pada index dimensi pertama : [0],[1],[2], dst. 
				//$data mengacu kepada nilai dari array dimensi pertama yang berupa array lagi, seperti : [acc_id],[acc_name], ... dst 
				foreach($result as $row => $data){
					//Membuat table-row
					echo "<tr align='center'>";
					$temp = NULL;
					//Loop kedua : Untuk mengambil nilai array dimensi kedua sebagai isian untuk table-data <td>
					foreach($data as $key => $value){
						//Jika pada $data['banned'] ditemukan pengguna yang sedang dibanned maka lewati looping
						if($data['banned'] == 1){
							continue;
						}
						//Lewati beberapa nama index agar tidak ditampilkan
						if($key == 'acc_role' || $key == 'banned'){
							continue;
						}
						//Khusus untuk redaktur status. index berikut tidak ditampilkan
						if($pre_role == 2 && $type == 'status'){
							if($key == 'draft' || $key == 'pending' || $key == 'process'){
								continue;
							}
						}
						//Tidak menampilkan index acc_id. Simpan ke variabel tampungan untuk referensi link 
						if($key == 'acc_id'){
							$temp = $value;
							continue;
						}	
					//Tampilkan nilainya saja
					
					if($key == 'acc_name'){
						//variabel acc_id yang tersimpan digunakan disini, untuk membuka profile
						echo "<td align='left'><a href='".site_url('access/profile/user/').$temp."'>".$value."</a></td>";
						continue;
					}
					if($key == 'total'){
						//Menghitung total artikel pada bulan tertentu
						$total_counter = $total_counter + $value;
					}
					echo "<td>".$value."</td>";
						
					}
					//Tutup tag table-row dan ulangi loop pertama
					echo "</tr>";	
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="card-footer small text-muted">
		Jumlah artikel : <strong><?php echo $total_counter;?></strong>. Laporan ini digenerate pada <?php echo date("l, d-F-Y. H:i:s")?> oleh <?php echo $this->session->userdata('acc_name')?>
	</div>
</div>
<br>

<pre>
	<?php //print_r($result);?>
</pre>
