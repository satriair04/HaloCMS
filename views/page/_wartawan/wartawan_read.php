<?php
	if($result['redaktur'] == NULL){
		$result['redaktur'] = "Belum ada";
	}
	//Pemberian warna
	$color = "text-success";
	if($result['status'] == 'rejected'){
		$color = "text-danger";
	}elseif($result['status'] == 'pending'){
		$color = "text-dark";
	}elseif($result['status'] == 'process'){
		$color = "text-warning";
	}elseif($result['status'] == 'draft'){
		$color = "text-info";
	}
?>
<div class="container-fluid">
	<h1 class="display-4" data-toggle="tooltip" data-placement="top" title="Kode artikel: <?php echo $result['article_id']?>"><?php echo $result['article_judul']?></h1>
	<h6>Oleh: <a href="<?php echo site_url('access/profile/user/').$result['article_penulis']?>"><?php echo $result['wartawan']?></a>. Pada : <?php echo $result['article_time']?>.</h6>


	<!--class fr-view untuk melihat hasil editing dari froala editor-->
	<div class="fr-view"><?php echo $result['article_konten']?></div><br>
	<h6>Domain artikel: <?php echo $result['domain']?>.</h6>
	<h6>Status artikel: <span class="<?php echo $color;?>"><?php echo $result['status']?>.</span></h6>
	<h6>Editor artikel: <a href="<?php echo site_url('access/profile/user/').$result['article_editor']?>"><?php echo $result['redaktur']?></a>.</h6>
</div>

<!--Gallery start--> 
<?php 
if($img_gallery){
?>
<div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel" style="max-width: 100%; max-height: 600px; margin: 0 auto; position: relative">
	<ol class="carousel-indicators">
		<?php
		foreach($img_gallery as $key => $value){
			if($key == 0){
				echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$key."'></li>";
				continue;
			}
			echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$key."'></li>";
		}
		?>
	</ol>
	<div class="carousel-inner" style=" width:100%; height: 600px !important;">
		<?php
		$counter = 0;
		foreach($img_gallery as $data){
		if($counter == 0){
			echo "<div class='carousel-item active' style='position: absolute;'>";
			$counter++;
		}else{
			echo "<div class='carousel-item' style='position: absolute;'>";
		}
		?>  
		<img class="d-block w-100" src="<?php echo base_url('/uploads/'.$data['article_source'].'/'.$data['image_name']);?>" alt="Kode gambar: <?php echo $data['image_id']?>">
			<div class="carousel-caption d-md-block" style="top: 0; bottom: auto ;">
				<h5>File: <a href="<?php echo base_url('/uploads/'.$data['article_source'].'/'.$data['image_name']);?>" target="_blank"><?php echo $data['image_name']?></a>. Diupload pada: <?php echo $data['image_time']?></h5>
				<p><?php echo $data['image_komentar']?></p>
			</div>
		</div>
		<?php
		}
		?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<?php
}
?>
<!--Gallery end-->

<?php
	//$action didapatkan dari controller. menentukan hak seseorang terhadap artikel
	if($action == TRUE){
		if($result['article_status'] == 1){
			?>
				<hr>
				<div class="container-fluid row form-group" role="group">
					<div class="col">
						<a onclick="articleRemoveConfirm('<?php echo site_url('access/wartawan/remove/'.$result['article_id']); ?>')" href="#!">
							<button class="btn btn-danger form-control">Hapus draft</button>
						</a>
					</div>
					<div class="col">
						<a href="<?php echo site_url('access/wartawan/update/'.$result['article_id'])?>">
							<button class="btn btn-primary form-control">Sunting draft</button>
						</a>
					</div>
					<div class="col">
						<a href="<?php echo site_url('access/wartawan/files/'.$result['article_id']); ?>">
							<button class="btn btn-primary form-control">Pengelolaan file</button>
						</a>
					</div>
					<div class="col">
						<a href="#" onclick="articleSubmitConfirm('<?php echo site_url('access/wartawan/submit/'.$result['article_id'])?>')"><button class="btn btn-success form-control">Ajukan draft</button></a>
					</div>
				</div>
			
			<?php
		}
		if($result['article_status'] == 2){
			?>
				<hr>
				<div class="container-fluid row form-group" role="group">
					<div class="col">
						<a href="#" onclick="articleUnsubmitConfirm('<?php echo site_url('access/wartawan/unsubmit/'.$result['article_id'])?>')"><button class="btn btn-danger form-control">Batalkan pengajuan draft</button></a>
					</div>
				</div>
			
			<?php
		}
	}
?>
<hr>
<!--Original:<textarea class="form-control" rows="20"><?php //echo $result['article_konten']?></textarea>

<pre><?php //echo print_r($result);?></pre>
<pre><?php //echo print_r($img_gallery);?></pre>-->