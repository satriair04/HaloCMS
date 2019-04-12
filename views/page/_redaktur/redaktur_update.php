
<form action "access/redaktur/update" method="post">
	<div class="form-group">
		<label for="boxJudul" data-toggle="tooltip" title="Mohon perbaiki judul berita bila rasanya kurang menarik">Judul berita</label>
		<input type="text" name="title" class="form-control" id="boxJudul" value="<?php echo $result['article_judul'];?>" required>
	</div>
	<div class="form-group">
		<label for="boxDomain" data-toggle="tooltip" title="Demi keabsahan lokasi berita, kamu tidak dapat mengubah kelompok berita">Kelompok berita</label>
		<select class="form-control" id="boxDomain" name="section" disabled>
		  <?php
				foreach($section as $data){
					$counter = 1;
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
		<label for="textEditor" data-toggle="tooltip" title="Bila terjadi kesalahan jangan sungkan untuk melakukan reset berita ke kondisi original wartawannya :)">Konten berita</label>
		<textarea name="content" class="form-control" id="textEditor" aria-describedby="editingHelp" required><?php echo $result['article_konten'];?></textarea>
	</div>

	<div class="form-group row">
		<div class="col">
			<a class="btn btn-warning form-control" onclick="resetFactoryArticle('<?php echo site_url('access/redaktur/original/'.$result['article_id'])?>')" href="#">Reset isi berita</a>
		</div>
		<div class="col">
			<button type="submit" name="btnSubmit" class="btn btn-primary form-control">Simpan perubahan</button>
		</div>
	</div>
</form>