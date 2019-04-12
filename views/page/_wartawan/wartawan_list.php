		<br/>
		<ul class="nav nav-tabs nav-fill" role="tablist">
			<li class="nav-item active"><a class="nav-link  active" data-toggle="tab" role="tab" href="#draft"><i class="fas fa-cog fa-fw"></i> Draft berita saya</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#status"><i class="fas fa-book fa-fw"></i> Daftar berita saya</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#other"><i class="fas fa-list fa-fw"></i> Seluruh berita lainnya</a></li>
			
		</ul>
		<div class="tab-content" id="nav-tabContent">
		<!--Tab draft start-->
			<div id="draft" class="tab-pane fade show active">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar draft beritaa saya</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableMyDraft" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
							
										<th>Kode Berita</th>
										<th width="300px">Judul Berita</th>
										<th>Domain Berita</th>
										<th>Waktu Terdaftar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($result as $data){
										//Hanya menampilkan artikel yang ditulis oleh pemilik session saat ini
										if($data['article_penulis'] != $this->session->userdata('acc_id') || $data['status'] != 'draft'){
											continue;
										}
										echo "<tr align='center'>";
										echo "<td>".$data['article_id']."</td>";
										echo "<td align='left'><a href='".site_url('access/wartawan/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
										echo "<td>".$data['domain']."</td>";
										echo "<td>".$data['article_time']."</td>";
									?>
										<td>
											<a onclick="articleRemoveConfirm('<?php echo site_url('access/wartawan/remove/'.$data['article_id']); ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash" data-toggle="tooltip" title="Hapus draft"></i> </a>
											<a href="<?php echo site_url('access/wartawan/update/'.$data['article_id']); ?>" class="btn btn-small text-primary"><i class="fas fa-edit" data-toggle="tooltip" title="Sunting draft"></i> </a>
											 <a href="<?php echo site_url('access/wartawan/files/'.$data['article_id']); ?>" class="btn btn-small text-primary"><i class="fas fa-upload" data-toggle="tooltip" title="Pengelolaaan file"></i> </a>
											 <a href="#" onclick="articleSubmitConfirm('<?php echo site_url('access/wartawan/submit/'.$data['article_id'])?>')" class="btn btn-small text-success"><i class="fas fa-paper-plane" data-toggle="tooltip" title="Ajukan draft"></i> </a>
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
			<!--Tab draft end-->
			<!--Tab status start-->
			<div id="status" class="tab-pane fade show">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Status artikel saya</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableMyArticle" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
							
										<th>Kode Artikel</th>
										<th>Judul Artikel</th>
										<th>Editor</th>
										<th>Domain artikel</th>
										<th>Status Artikel</th>
										<th>Waktu Terdaftar</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($result as $data){
										//Hanya menampilkan artikel yang ditulis oleh pemilik session saat ini
										if($data['article_penulis'] != $this->session->userdata('acc_id') || $data['status'] == 'draft'){
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
										echo "<td align='left'><a href='".site_url('access/wartawan/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
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
			<!--Tab draft end-->
			<!--Tab other start-->
			<div id="other" class="tab-pane fade show">
				<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Artikel dari wartawan lain</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableOtherArticle" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										
										<th>Kode Artikel</th>
										<th>Judul Artikel</th>
										<th>Penulis</th>
										<th>Editor</th>
										<th>Domain artikel</th>
										<th>Status Artikel</th>
										<th>Waktu Terdaftar</th>
										
										
									</tr>
								</thead>
								<tbody>
									<?php
		
									foreach($result as $data){
										//Hanya menampilkan artikel yang ditulis orang lain selain dari pemilik session saat ini
										if($data['wartawan'] == $this->session->userdata('acc_name')){
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
										echo "<td align='left'><a href='".site_url('access/wartawan/read/').$data['article_id']."'>".$data['article_judul']."</a></td>";
										echo "<td>".$data['wartawan']."</td>";
										if($data['redaktur'] == NULL){
											$data['redaktur'] = 'Belum diproses';
										}
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
			<!--Tab other end-->
		<pre><?php //echo print_r($result);?></pre>