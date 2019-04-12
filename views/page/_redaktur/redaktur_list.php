		<br/>
		<ul class="nav nav-tabs nav-fill" role="tablist">
			<li class="nav-item active"><a class="nav-link active" data-toggle="tab" role="tab" href="#process"><i class="fas fa-cog fa-fw"></i> Sedang diproses</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#completed"><i class="fas fa-book fa-fw"></i> Selesai diproses</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#pending"><i class="fas fa-list fa-fw"></i> Daftar draft tertunda</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#claimed"><i class="fas fa-cogs fa-fw"></i> Diproses redaktur lain</a></li>
		</ul>
	<!--Tab content _ START-->
		<div class="tab-content" id="nav-tabContent">
		<!--Tab 'process' start-->
			<div id="process" class="tab-pane fade show active">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar berita yang sedang kamu proses</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableMyProcess" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
							
										<th>Kode Berita</th>
										<th width="300px">Judul Berita</th>
										<th>Domain Berita</th>
										<th>Penulis</th>
										<th>Waktu Terdaftar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($result as $data){
										//Lewati bila statusnya bukan berkode 3 atau bukan diproses oleh pemilik session saat ini
										if($data['article_editor'] != $this->session->userdata('acc_id') || $data['article_status'] != 3){
											continue;
										}
										echo "<tr align='center'>";
										echo "<td>".$data['article_id']."</td>";
										echo "<td align='left' title='te'><a href='".site_url('access/redaktur/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
										echo "<td>".$data['domain']."</td>";
										echo "<td>".$data['wartawan']."</td>";
										echo "<td>".$data['article_time']."</td>";
									?>
									<td>
										<a href="#" onclick="articleRejectConfirm('<?php echo site_url('access/redaktur/reject/'.$data['article_id'])?>')" class="btn btn-small text-danger"><i class="fas fa-window-close" data-toggle="tooltip" title="Tolak berita"></i> </a>
										<a href="#" onclick="articleUnclaimConfirm('<?php echo site_url('access/redaktur/unclaim/'.$data['article_id'])?>')" class="btn btn-small text-warning"><i class="fas fa-trash" data-toggle="tooltip" title="Batalkan memproses berita"></i> </a>
										 <a href="<?php echo site_url('access/redaktur/update/'.$data['article_id'])?>" class="btn btn-small text-primary"><i class="fas fa-edit" data-toggle="tooltip" title="Sunting berita"></i> </a>
										 <a href="#" onclick="articleSubmitConfirm('<?php echo site_url('access/wartawan/submit/'.$data['article_id'])?>')" class="btn btn-small text-success"><i class="fas fa-check-circle" data-toggle="tooltip" title="Setujui berita"></i> </a>
										</td>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
			<!--Tab 'process' end-->
			<!--Tab 'completed' start-->
			<div id="completed" class="tab-pane fade show">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar berita yang telah kamu selesaikan</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableCompleted" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
							
										<th>Kode Berita</th>
										<th>Judul Berita</th>
										<th>Domain Berita</th>
										<th>Penulis</th>
										<th>Status Berita</th>
										<th>Waktu Terdaftar</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($result as $data){
										//Lewati bila artikel bukan diproses oleh pemilik session saat ini atau status artikelnya bukan 4 atau 5
										if($data['article_editor'] != $this->session->userdata('acc_id') || $data['article_status'] < 4){
											continue;
										}
										$color = "table-success";
										if($data['status'] == 'rejected'){
											$color = "table-danger";
										}elseif($data['status'] == 'pending'){
											$color = "table-light";
										}elseif($data['status'] == 'process'){
											$color = "table-warning";
										}elseif($data['status'] == 'draft'){
											$color = "table-info";
										}
										echo "<tr align='center' class='".$color."'>";
										echo "<td>".$data['article_id']."</td>";
										echo "<td align='left'><a href='".site_url('access/redaktur/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
										if($data['redaktur'] == NULL){
											$data['redaktur'] = 'Belum dibaca';
										}
										echo "<td>".$data['redaktur']."</td>";
										echo "<td>".$data['domain']."</td>";
										echo "<td>".$data['status']."</td>";
										echo "<td>".$data['article_time']."</td>";
									}
									?>
								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
			<!--Tab 'draft' end-->
			<!--Tab 'pending' start-->
			<div id="pending" class="tab-pane fade show">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Berita segar yang belum dipinang redaktur manapun</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTablePendingArticles" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										
										<th>Kode Berita</th>
										<th>Judul Berita</th>
										<th>Penulis</th>
										<th>Domain Berita</th>
										<th>Waktu Terdaftar</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php
		
									foreach($result as $data){
										//Lewati artikel jika statusnya bukan pending atau sudah memiliki editor
										if($data['article_editor'] != NULL || $data['article_status'] != 2){
											continue;
										}
										echo "<tr>";
										echo "<td align='center'>".$data['article_id']."</td>";
										echo "<td><a href='".site_url('access/redaktur/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
										echo "<td>".$data['wartawan']."</td>";
										echo "<td>".$data['domain']."</td>";
										echo "<td>".$data['article_time']."</td>";
										echo "</tr>";
									}
									
										
									?>
								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
			<!--Tab 'pending' end-->
			<!--Tab 'claimed' start-->
			<div id="claimed" class="tab-pane fade show">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Berita yang sedang dikelola oleh redaktur lain</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableClaimedArticles" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										
										<th>Kode Berita</th>
										<th>Judul Berita</th>
										<th>Penulis</th>
										<th>Redaktur</th>
										<th>Domain Berita</th>
										<th>Status Berita</th>
										<th>Waktu Terdaftar</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php
		
									foreach($result as $data){
										//Lewati artikel jika statusnya bukan proses atau editornya adalah pemilik sesi saat ini
										if($data['article_editor'] == $this->session->userdata('acc_id') || $data['article_status'] < 3){
											continue;
										}
										$color = "table-success";
										if($data['status'] == 'rejected'){
											$color = "table-danger";
										}elseif($data['status'] == 'pending'){
											$color = "table-light";
										}elseif($data['status'] == 'process'){
											$color = "table-warning";
										}elseif($data['status'] == 'draft'){
											$color = "table-info";
										}
										echo "<tr align='center' class='".$color."'>";
										echo "<td>".$data['article_id']."</td>";
										echo "<td align='left'><a href='".site_url('access/redaktur/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
										echo "<td>".$data['wartawan']."</td>";
										echo "<td>".$data['redaktur']."</td>";
										echo "<td>".$data['domain']."</td>";
										echo "<td>".$data['status']."</td>";
										echo "<td>".$data['article_time']."</td>";
										echo "</tr>";
									}
									
										
									?>
								</tbody>
							</table>
						</div>
            </div>
          </div>
				<!--END-->
			</div>
			<!--Tab 'claimed' end-->
		</div>
	<!--Tab content _ END-->
	<pre>
	<?php //print_r($result);?>
	</pre>
		
		