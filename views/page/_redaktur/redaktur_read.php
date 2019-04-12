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
	<h6>Status artikel: <?php echo $result['status']?>.</h6>
	<h6>Editor artikel: <a href="<?php echo site_url('access/profile/user/').$result['article_editor']?>"><?php echo $result['redaktur']?></a>.</h6>
	&nbsp;
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
	if($action == TRUE){
		if($result['article_status'] == 3){
			?>
			<hr>
				<div class="container-fluid form-group row" role="group">
					<div class="col">
						<a class="btn btn-danger form-control" href="#" onclick="articleRejectConfirm('<?php echo site_url('access/redaktur/reject/'.$result['article_id'])?>')"><i class="fas fa-window-close"></i> Tolak berita</a>
					</div>
					<div class="col">
						<a class="btn btn-warning form-control" href="#" onclick="articleUnclaimConfirm('<?php echo site_url('access/redaktur/unclaim/'.$result['article_id'])?>')"><i class="fas fa-trash"></i> Batalkan memproses berita</a>
					</div>
					<div class="col">
						<a class="btn btn-primary form-control" href="<?php echo site_url('access/redaktur/update/'.$result['article_id'])?>"><i class="fas fa-edit"></i> Sunting berita</a>
					</div>
					<div class="col">
						<a class="btn btn-success form-control" href="#" onclick="articleAcceptConfirm('<?php echo site_url('access/redaktur/accept/'.$result['article_id'])?>')"><i class="fas fa-check-circle"></i> Setujui berita</a>
					</div>
				</div>
				<hr>
			<?php
		}
		if($result['article_status'] == 4){
			?>
			<hr>
				<div class="container-fluid form-group row" role="group">
					<div class="col">
						<a class="btn btn-primary form-control" href="<?php echo site_url('access/redaktur/update/'.$result['article_id'])?>"><i class="fas fa-edit"></i> Sunting berita</a>
					</div>
					<div class="col">
						<a class="btn btn-danger form-control" href="#" onclick="articleDownGradeConfirm('<?php echo site_url('access/redaktur/downgrade/'.$result['article_id'])?>')"><i class="fas fa-arrow-down"></i> Turunkan status berita</a>
					</div>
				</div>
				<hr>
			<?php
		}
		if($result['article_status'] == 5){
			?>
			<hr>
				<div class="container-fluid form-group row" role="group">
					<div class="col">
						<a class="btn btn-danger form-control" href="#" onclick="articleDownGradeConfirm('<?php echo site_url('access/redaktur/downgrade/'.$result['article_id'])?>')">Turunkan status berita</a>
					</div>
				</div>
				<hr>
			<?php
		}
	}else{
		if($result['article_status'] == 2 && $result['article_editor'] == NULL){
			?>
			<hr>
				<div class="container-fluid form-group" role="group">
					<div class="col">
						<a class="btn btn-primary form-control" href="#" onclick="articleClaimConfirm('<?php echo site_url('access/redaktur/claim/'.$result['article_id'])?>')">Klaim berita</a>
					</div>
				</div>
				<hr>
			<?php
		}
	}
?>

<pre>
<?php //print_r($result);?>
</pre>