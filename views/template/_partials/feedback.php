<?php if ($this->session->flashdata('welcome')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('welcome'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('sayonara')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<?php echo $this->session->flashdata('sayonara'); ?> <strong>Bye!</strong> 
		</div>
	<?php } ?>

<?php // KHUSUS ADMIN
if ($this->session->flashdata('account_create_error')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('account_create_error'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('extreme_reset')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Perhatian!</strong> <?php echo $this->session->flashdata('extreme_reset'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('pwd_reset_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('pwd_reset_success'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('pwd_reset_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('pwd_reset_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('account_create_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('account_create_success'); ?>
		</div>
	<?php } ?>


<?php if ($this->session->flashdata('account_update_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('account_update_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('banned_success')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Berhasil!</strong> <?php echo $this->session->flashdata('banned_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('unbanned_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Berhasil!</strong> <?php echo $this->session->flashdata('unbanned_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('toggling_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('toggling_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('account_not_found')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Maaf!</strong> <?php echo $this->session->flashdata('account_not_found'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('account_update_error')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('account_update_error'); ?>
		</div>
	<?php } // KHUSUS ADMIN - END ?>
	
<?php // KHUSUS REDAKTUR
if ($this->session->flashdata('article_submit_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('article_submit_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('update_draft_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('update_draft_failed'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('update_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Tersimpan!</strong> <?php echo $this->session->flashdata('update_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('claim_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('claim_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('accepting_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('accepting_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('rejection_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Selesai.</strong> <?php echo $this->session->flashdata('rejection_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('downgrade_success')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Berhasil.</strong> <?php echo $this->session->flashdata('downgrade_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('unclaim_success')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Berhasil.</strong> <?php echo $this->session->flashdata('unclaim_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('double_claim')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Terjadi kesalahan.</strong> <?php echo $this->session->flashdata('double_claim'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('claim_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error.</strong> <?php echo $this->session->flashdata('claim_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('accepting_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error.</strong> <?php echo $this->session->flashdata('accepting_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('rejection_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Maaf!</strong> <?php echo $this->session->flashdata('rejection_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('downgrade_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error.</strong> <?php echo $this->session->flashdata('downgrade_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('unclaim_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Maaf.</strong> <?php echo $this->session->flashdata('unclaim_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('rollback_error')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Maaf!</strong> <?php echo $this->session->flashdata('rollback_error'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('update_error')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Maaf!</strong> <?php echo $this->session->flashdata('update_error'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('update_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Gagal!</strong> <?php echo $this->session->flashdata('update_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('rollback_success')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Reset berhasil.</strong> <?php echo $this->session->flashdata('rollback_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('rollback_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Terjadi kesalahan.</strong> <?php echo $this->session->flashdata('rollback_success'); ?>
		</div>
	<?php } // KHUSUS REDAKTUR - END ?>
	
<?php // KHUSUS AUTH
	if ($this->session->flashdata('acc_locked')) { ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Maaf!</strong> <?php echo $this->session->flashdata('acc_locked'); ?>
			</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('request_success')) { ?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Berhasil!</strong> <?php echo $this->session->flashdata('request_success'); ?>
			</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('request_failed')) { ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Maaf!</strong> <?php echo $this->session->flashdata('request_failed'); ?>
			</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('wrong_password')) { ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Maaf!</strong> <?php echo $this->session->flashdata('wrong_password'); ?>
			</div>
	<?php } // END AUTH?>
	
<?php // KHUSUS PROFILE - PASSWORD
	if ($this->session->flashdata('pwd_change_failed')) { ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Maaf!</strong> <?php echo $this->session->flashdata('pwd_change_failed'); ?>
			</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('pwd_change_success')) { ?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Berhasil!</strong> <?php echo $this->session->flashdata('pwd_change_success'); ?>
			</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('pwd_confirm_failed')) { ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Maaf!</strong> <?php echo $this->session->flashdata('pwd_confirm_failed'); ?>
			</div>
	<?php } ?>

<?php // KHUSUS WARTAWAN
	if ($this->session->flashdata('create_draft_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('create_draft_success'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('create_draft_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('create_draft_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('update_draft_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('update_draft_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('read_article_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('read_article_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('submit_draft_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('submit_draft_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('unsubmit_draft_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('unsubmit_draft_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('remove_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Failed!</strong> <?php echo $this->session->flashdata('remove_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('files_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Maaf!</strong> <?php echo $this->session->flashdata('files_failed'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('remove_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('remove_success'); ?>
		</div>
	<?php } ?>
	
<?php // WARTAWAN - FILES
if ($this->session->flashdata('upload_sukses')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Hore!</strong> <?php echo $this->session->flashdata('upload_sukses'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('upload_gagal')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('upload_gagal'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('img_discard_failed')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('img_discard_failed'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('img_discard_sukses')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Berhasil.</strong> <?php echo $this->session->flashdata('img_discard_sukses'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('edit_draft_success')) { ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Tersimpan!</strong> <?php echo $this->session->flashdata('edit_draft_success'); ?>
		</div>
	<?php } ?>

<?php if ($this->session->flashdata('article_unsubmit_success')) { ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Berhasil dibatalkan.</strong> <?php echo $this->session->flashdata('article_unsubmit_success'); ?>
		</div>
	<?php } ?>
	
<?php if ($this->session->flashdata('edit_draft_error')) { ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $this->session->flashdata('edit_draft_error'); ?>
		</div>
	<?php } ?>








	
