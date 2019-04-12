<div class="container">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<i class="fas fa-chart-bar"></i>
					  Jumlah seluruh artikel berdasarkan status proses pengerjaan
				</div>
				<div class="card-body">
					<div class="chartjs-size-monitor" style="height:300px">
						<canvas id="statusBar" class="chartjs-render-monitor"></canvas>
					</div>
				</div>
				<div class="card-footer small text-muted">Total artikel pada database: <strong><?php echo $global_count_article[0]['total_artikel'];?></strong>, Terhitung pada <?php echo date("d-M-Y");?></div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<i class="fas fa-chart-bar"></i>
					Jumlah seluruh artikel berdasarkan section artikel
				</div>
				<div class="card-body">
					
					<div class="chartjs-size-monitor" style="height:300px">
						<canvas id="sectionBar" class="chartjs-render-monitor"></canvas>
					</div>
				</div>
				<div class="card-footer small text-muted">Total artikel pada database: <strong><?php echo $global_count_article[0]['total_artikel'];?></strong>, Terhitung pada <?php echo date("d-M-Y");?></div>
			</div>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="card">
		<div class="card-header">
					<i class="fas fa-table"></i>
					  Rangkuman keseluruhan kinerja pegawai berdasarkan status proses pengerjaan
		</div>
		<div class="card-body">
			<ul class="nav nav-tabs mb-3 nav-fill" id="nav-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="wartawanStatusTab" data-toggle="tab" href="#wartawan_status" role="tab" aria-controls="wartawan_status" aria-selected="true">Wartawan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="redakturStatusTab" data-toggle="tab" href="#redaktur_status" role="tab" aria-controls="redaktur_status" aria-selected="false">Redaktur</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="wartawan_status" role="tabpanel" aria-labelledby="wartawan_status">
					<!--Datatable Wartawan status _ START-->
					<div class="table-responsive">
						<table class="table table-hover" id="wartawanStatus" width="100%" cellspacing="0">
							<thead>
								<tr align="center">
									<th width="200px">Nama Wartawan</th>
									<th>Draft</th>
									<th>Pending</th>
									<th>Process</th>
									<th>Accepted</th>
									<th>Rejected</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$count1 = 0;
									$count2 = 0;
									$count3 = 0;
									$count4 = 0;
									$count5 = 0;
									foreach($wartawan_count_status_total as $data){
										if($data['banned'] == 1){
											continue;
										}
										echo "<tr align='center'>";
										echo "<td title='te'><a href='".site_url('access/profile/user/').$data['acc_id']."'>".$data['acc_name']."</a></td>";
										echo "<td>".$data['draft']."</td>";
										echo "<td>".$data['pending']."</td>";
										echo "<td>".$data['process']."</td>";
										echo "<td>".$data['accepted']."</td>";
										echo "<td>".$data['rejected']."</td>";
										echo "<td>".$data['total']."</td>";
										echo "</tr>";
										$count1 = $count1 + $data['draft'];
										$count2 = $count2 + $data['pending'];
										$count3 = $count3 + $data['process'];
										$count4 = $count4 + $data['accepted'];
										$count5 = $count5 + $data['rejected'];
									}
								?>
							</tbody>
						</table>
					</div>
					<!--Datatable Wartawan status _ END-->
				</div>
				<div class="tab-pane fade" id="redaktur_status" role="tabpanel" aria-labelledby="redaktur_status">
					<!--Datatable Redaktur status _ START-->
					<div class="table-responsive">
						<table class="table table-hover" id="redakturStatus" width="100%" cellspacing="0">
							<thead>
								<tr align="center">
									<th width="200px">Nama Redaktur</th>
									<th>Process</th>
									<th>Accepted</th>
									<th>Rejected</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
									
									foreach($redaktur_count_status_total as $data){
										if($data['banned'] == 1){
											continue;
										}
										echo "<tr align='center'>";
										echo "<td title='te'><a href='".site_url('access/profile/user/').$data['acc_id']."'>".$data['acc_name']."</a></td>";
										echo "<td>".$data['process']."</td>";
										echo "<td>".$data['accepted']."</td>";
										echo "<td>".$data['rejected']."</td>";
										echo "<td>".$data['total']."</td>";
										echo "</tr>";
									}
									?>
							</tbody>
						</table>
					</div>
					<!--Datatable Redaktur status _ END-->
				</div>
			</div>			
		</div>
		<div class="card-footer small text-muted">
			Total artikel pada database: <strong><?php echo $global_count_article[0]['total_artikel'];?></strong>. Belum diproses: <strong><?php echo $count1+$count2;?></strong>. Sedang diproses: <strong><?php echo $count3;?></strong>. Selesai diproses: <strong><?php echo $count4+$count5;?></strong>. Terhitung pada <?php echo date("d-M-Y");?>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="card">
		<div class="card-header">
					<i class="fas fa-table"></i>
					  Rangkuman keseluruhan kinerja pegawai berdasarkan section artikel
		</div>
		<div class="card-body">
			<ul class="nav nav-tabs mb-3 nav-fill" id="nav-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="wartawanSectionTab" data-toggle="tab" href="#wartawan_section" role="tab" aria-controls="wartawan_section" aria-selected="true">Wartawan</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="redakturSectionTab" data-toggle="tab" href="#redaktur_section" role="tab" aria-controls="redaktur_section" aria-selected="false">Redaktur</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="wartawan_section" role="tabpanel" aria-labelledby="wartawan_section">
					<!--Datatable Wartawan status _ START-->
					<div class="table-responsive">
						<table class="table table-hover" id="wartawanSection" width="100%" cellspacing="0">
							<thead>
								<tr align="center">
									<th width="200px">Nama wartawan</th>
									<th>Pekanbaru</th>
									<th>Dumai</th>
									<th>Ingragiri Hulu</th>
									<th>Kuansing</th>
									<th>Ingragiri Hilir</th>
									<th>Kampar</th>
									<th>Pelalawan</th>
									<th>Rokan Hulu</th>
									<th>Bengkalis</th>
									<th>Siak</th>
									<th>Rokan Hilir</th>
									<th>Meranti</th>
									<th>Indonesia</th>
									<th>Internasional</th>
									<th>Uncategorized</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($wartawan_count_section_total as $data){
										if($data['banned'] == 1){
											continue;
										}
										echo "<tr align='center'>";
										echo "<td><a href='".site_url('access/profile/user/').$data['acc_id']."'>".$data['acc_name']."</a></td>";
										echo "<td align='center'>".$data['pekanbaru']."</td>";
										echo "<td align='center'>".$data['dumai']."</td>";
										echo "<td align='center'>".$data['indragiri_hulu']."</td>";
										echo "<td align='center'>".$data['kuansing']."</td>";
										echo "<td align='center'>".$data['indragiri_hilir']."</td>";
										echo "<td align='center'>".$data['kampar']."</td>";
										echo "<td align='center'>".$data['pelalawan']."</td>";
										echo "<td align='center'>".$data['rokan_hulu']."</td>";
										echo "<td align='center'>".$data['bengkalis']."</td>";
										echo "<td align='center'>".$data['siak']."</td>";
										echo "<td align='center'>".$data['rokan_hilir']."</td>";
										echo "<td align='center'>".$data['meranti']."</td>";
										echo "<td align='center'>".$data['indonesia']."</td>";
										echo "<td align='center'>".$data['internasional']."</td>";
										echo "<td align='center'>".$data['uncategorized']."</td>";
										echo "<td align='center'>".$data['total']."</td>";
										
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<!--Datatable Wartawan status _ END-->
				</div>
				<div class="tab-pane fade" id="redaktur_section" role="tabpanel" aria-labelledby="redaktur_section">
					<!--Datatable Redaktur status _ START-->
					<div class="table-responsive">
						<table class="table table-hover" id="redakturSection" width="100%" cellspacing="0">
							<thead>
								<tr align="center">
									<th width="200px">Nama wartawan</th>
									<th>Pekanbaru</th>
									<th>Dumai</th>
									<th>Ingragiri Hulu</th>
									<th>Kuansing</th>
									<th>Ingragiri Hilir</th>
									<th>Kampar</th>
									<th>Pelalawan</th>
									<th>Rokan Hulu</th>
									<th>Bengkalis</th>
									<th>Siak</th>
									<th>Rokan Hilir</th>
									<th>Meranti</th>
									<th>Indonesia</th>
									<th>Internasional</th>
									<th>Uncategorized</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach($redaktur_count_section_total as $data){
										if($data['banned'] == 1){
											continue;
										}
										echo "<tr align='center'>";
										echo "<td><a href='".site_url('access/profile/user/').$data['acc_id']."'>".$data['acc_name']."</a></td>";
										echo "<td align='center'>".$data['pekanbaru']."</td>";
										echo "<td align='center'>".$data['dumai']."</td>";
										echo "<td align='center'>".$data['indragiri_hulu']."</td>";
										echo "<td align='center'>".$data['kuansing']."</td>";
										echo "<td align='center'>".$data['indragiri_hilir']."</td>";
										echo "<td align='center'>".$data['kampar']."</td>";
										echo "<td align='center'>".$data['pelalawan']."</td>";
										echo "<td align='center'>".$data['rokan_hulu']."</td>";
										echo "<td align='center'>".$data['bengkalis']."</td>";
										echo "<td align='center'>".$data['siak']."</td>";
										echo "<td align='center'>".$data['rokan_hilir']."</td>";
										echo "<td align='center'>".$data['meranti']."</td>";
										echo "<td align='center'>".$data['indonesia']."</td>";
										echo "<td align='center'>".$data['internasional']."</td>";
										echo "<td align='center'>".$data['uncategorized']."</td>";
										echo "<td align='center'>".$data['total']."</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<!--Datatable Redaktur status _ END-->
				</div>
			</div>			
		</div>
		<div class="card-footer small text-muted">
			Total artikel pada database: <strong><?php echo $global_count_article[0]['total_artikel'];?></strong>, Terhitung pada <?php echo date("d-M-Y");?>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="card">
		<div class="card-header">
			<i class="fas fa-cog"></i>
			Generate laporan per periode
		</div>
		<div class="card-body">
			<form action="<?php echo site_url('access/laporan/generate/');?>" method="post" target="_blank">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Kelompok berdasarkan: </label>
					<select class="form-control" id="type" name="type">
						<option value="status" selected>Status proses artikel</option>
						<option value="section">Section artikel</option>  
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Role pengguna: </label>
					<select class="form-control" id="role" name="role">
						<option value="3" selected>Wartawan</option>
						<option value="2">Redaktur</option>  
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Pada bulan: </label>
					<select class="form-control" id="month" name="month">
						<option value="1">Januari</option>
						<option value="2">Februari</option>
						<option value="3">Maret</option>
						<option value="4">April</option> 
						<option value="5">Mei</option>
						<option value="6">Juni</option>
						<option value="7">Juli</option>
						<option value="8">Agustus</option> 
						<option value="9">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>  						
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Pada tahun: </label>
					<select class="form-control" id="year" name="year">
						<?php
							
							for($yearnow = (int)date("Y"); $yearnow>=2015; $yearnow--){
								echo "<option value='$yearnow'>$yearnow</option>";
							}
						?> 						
					</select>
				</div>
				<br>	
			
		</div>
		<div class="card-footer small text-muted">
			<button class="btn btn-primary form-control" type="submit">Generate laporan</button></form>
		</div>
	</div>
</div>

<br>
<?php
//Atur nilai max dengan modulus
$value = $global_count_article[0]['total_artikel'];
for($i = 1; $i<6; $i++){
	$check = $value % 5;
	if($check == 0){
		break;
	}
	$value++;
}
?>
<script>
	Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = '#292b2c';

	var ctx = document.getElementById("sectionBar").getContext('2d');
	var sectionBar = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: [
			<?php
			$counter = 0;
			foreach($global_count_section as $section){ 
				echo '"'.$section['section_name'].'"';
				if($counter != 14){
					echo ",";
				}else{
					echo "";
				}
				$counter++;
			}?>
			],
			datasets: [{
				
				data: [
				<?php
				$counter = 0;
				foreach($global_count_section as $section){ 
					echo $section['jumlah'];
					if($counter != 14){
						echo ",";
					}else{
						echo "";
					}
					$counter++;
				}?>
				],
				backgroundColor: [
				<?php
				$counter = 0;
				foreach($global_count_section as $section){ 
					echo '"'.'rgba(91, 192, 222, 1)'.'"';
					if($counter != 14){
						echo ",";
					}else{
						echo "";
					}
					$counter++;
				}?>
				],
				borderColor: [
				<?php
				$counter = 0;
				foreach($global_count_section as $section){ 
					echo '"'.'rgba(91, 192, 222, 1)'.'"';
					if($counter != 14){
						echo ",";
					}else{
						echo "";
					}
					$counter++;
				}?>
				],
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			"scales": {
				"xAxes": [{
					"ticks": {
						"max" : <?php echo $value;?>,
						"scaleOverride" : true,
						"scaleSteps" : 10,
						"scaleStepWidth" : 50,
						"beginAtZero": true
					}
				}]
			},
			legend: {
				display: false
			}
		}
	});
</script>
<script>
	Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = '#292b2c';

	var ctx2 = document.getElementById("statusBar").getContext('2d');
	var statusBar = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: [
			<?php
			$counter = 0;
			foreach($global_count_status as $section){ 
				echo '"'.$section['status_name'].'"';
				if($counter != 14){
					echo ",";
				}else{
					echo "";
				}
				$counter++;
			}?>
			],
			datasets: [{
				label: '',
				data: [
				<?php
			$counter = 0;
			foreach($global_count_status as $section){ 
				echo $section['jumlah'];
				if($counter != 14){
					echo ",";
				}else{
					echo "";
				}
				$counter++;
			}?>
				],
				backgroundColor: [
				'rgba(91, 192, 222, 1)',
				'rgba(221, 221, 221, 1)',
				'rgba(240, 173, 78, 1)',
				'rgba(92, 184, 92, 1)',
				'rgba(217, 83, 79, 1)'
				],
				borderColor: [
				'rgba(91, 192, 222, 1)',
				'rgba(221, 221, 221, 1)',
				'rgba(240, 173, 78, 1)',
				'rgba(92, 184, 92, 1)',
				'rgba(217, 83, 79, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			"scales": {
				"yAxes": [{
					"ticks": {
						"max" : <?php echo $value;?>,
						"scaleOverride" : true,
						"scaleSteps" : 10,
						"scaleStepWidth" : 50,
						"beginAtZero": true
					}
				}]
			},
			legend: {
				display: false
			}
		}
	});
</script>
