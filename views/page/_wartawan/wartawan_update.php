<form action "access/wartawan/update" method="post">
<div class="form-group">
	<label for="boxJudul" data-toggle="tooltip" title="Gunakan judul yang memperjelas konteks isi berita">Judul artikel</label>
	<input type="text" name="artitle" class="form-control" id="boxJudul" value="<?php echo $result['article_judul'];?>">
</div>
<div class="form-group">
    <label for="boxDomain" data-toggle="tooltip" title="Kode domain artikel sebelumnya adalah <?php echo $result['article_section'];?>">Kelompok artikel</label>
    <select class="form-control" id="boxDomain" name="section">
      <?php
			foreach($section as $data){
				if($data['section_id'] == $result['article_section']){
					echo "<option value=".$data['section_id']." selected>".$data['section_id']." - ".$data['section_name']."</option>";
					continue;
				}
				echo "<option value=".$data['section_id'].">".$data['section_id']." - ".$data['section_name']."</option>";
			}
		?>
    </select>
  </div>
<div class="form-group">
    <label for="textEditor" data-toggle="tooltip" title="Mohon deskripsikan kejadian sejelas - jelasnya sesuai fakta di lapangan">Konten artikel</label>
	<textarea name="content" class="form-control" id="textEditor" aria-describedby="editingHelp"><?php echo $result['article_konten'];?></textarea>
	
</div>
	<div class="container-fluid row form-group" role="group">
		<div class="col">
			<button class="btn btn-primary form-control" type="submit" name="btnSubmit" >Simpan perubahan</button>
		</div>
	</div>
  
</form>

