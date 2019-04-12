<!-- DataTables -->
				<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-image"></i>
              Daftar file gambar pada artikel ini</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTableMyImages" width="100%" cellspacing="0">
								<thead>
									<tr align="center">
										<th>Kode</th>
										<th>Nama file</th>
										<th width="400px">Komentar</th>
										<th>Waktu</th>
										<?php
										if($artikel['article_status'] == 1){
										echo "<th>Aksi</th>";
										}
										?>
										
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($result as $data){
										//START - Pewarnaan dan penamaan status
										if($artikel['article_penulis'] != $this->session->userdata('acc_id')){
											continue;
										}
										//END - Pewarnaan dan penamaan status
										echo "<tr align='center'>";
										echo "<td align='center'>".$data['image_id']."</td>";
										echo "<td data-toggle='tooltip' title='".$data['image_name']."'><a href='".base_url('/uploads/'.$artikel['article_id'].'/'.$data['image_name'])."' target='_blank'>".substr($data['image_name'], 0, 12)."...".substr($data['image_name'], -3)."</a></td>";
										echo "<td align='left'>".substr($data['image_komentar'], 0, 200)."..."."</td>";
										echo "<td>".$data['image_time']."</td>";
										if($artikel['article_status'] == 1){
										?>	
										<td><a onclick="discardFile('<?php echo site_url('access/wartawan/discard/'.$data['image_id']); ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus file</a></td>
										<?php
										}
										
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
            </div>
			<div class="card-footer small text-muted"><a href="<?php echo site_url('access/wartawan/read/'.$kode)?>" target="_blank"><button type="button" class="btn btn-primary form-control" >Lihat artikel</button></a></div>
          </div>
		  
				<!--END-->

<h2>Form unggah gambar</h2>
<hr>
<div class="container">
	<div class="row">
		<div class="col-sm" height="500px">
			<form action="<?php echo site_url('access/wartawan/upload/');?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="boxArtikel">Kode artikel</label>
					<input type="text" id="boxArtikel" class="form-control" value="<?php echo $kode?>" disabled readonly>
				</div>
				<div class="form-group">
					<label for="btnKomentar">Keterangan file gambar</label>
					<textarea name="komentar" class="form-control" id="btnKomentar" rows="3"></textarea>
					<small id="uploadHelp" class="form-text text-muted">Mohon deskripsikan file gambar kamu.</small>
				</div>
				<div class="form-group">
					<label for="btnUpload">Unggah file gambar</label>
					<input type="file" name="fileUpload" enctype="multipart/form-data" class="form-control-file" id="btnUpload" aria-describedby="uploadHelp" onchange="readURL(this);">
					<small id="uploadHelp" class="form-text text-muted">File yang diunggah harus dengan format jpg atau png.</small>
				</div>	
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<button type="submit" class="btn btn-primary form-control">Tambahkan file</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm" height="500px">
			<img id="blah" src="<?php echo base_url('/notfound.png')?>" alt="your image" style='max-width:100%; max-height:auto; margin:auto; display:block;'/>
		</div>
	</div>
</div>
<hr>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#btnUpload").change(function() {
  readURL(this);
});
</script>


<pre><?php //echo print_r($result);?></pre><br>
