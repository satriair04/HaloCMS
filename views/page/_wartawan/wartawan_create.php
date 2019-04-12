<form action "access/wartawan/create" method="post">	
<div class="form-group">
	<label for="Artikel" data-toggle="tooltip" title="Judul tidak dapat diubah nantinya. Harap dideskripsikan dengan detail">Judul berita</label>
	<input type="text" name="title" class="form-control" id="Artikel" value="<?php echo set_value('title');?>">
</div>
<div class="form-group">
    <label for="boxDomain" data-toggle="tooltip" title="Untuk memudahkan pengelompokkan. Harap tentukan lokasi dimana berita didapatkan">Kelompok berita</label>
    <select class="form-control" id="boxDomain" name="section">
      <?php
			foreach($section as $data){
				if($data['section_id'] == 15){
					echo "<option value=".$data['section_id']." selected>".$data['section_id']." - ".$data['section_name']."</option>";
					continue;
				}
				echo "<option value=".$data['section_id'].">".$data['section_id']." - ".$data['section_name']."</option>";
			}
		?>
    </select>
</div>
<div class="form-group">
    <label for="textEditor" data-toggle="tooltip" title="Mohon deskripsikan kejadian sejelas - jelasnya sesuai fakta di lapangan">Konten berita</label>
	<textarea name="content" class="form-control" id="textEditor" aria-describedby="editingHelp"><?php echo set_value('content');?></textarea>
</div>
<div class="form-group">  
	<button class="btn btn-primary form-control" type="submit" name="btnSubmit">Simpan draft berita</button>
</div>	
	
</form>
<!--Original: <textarea name="content"><?php //echo set_value('content');?></textarea><br>-->