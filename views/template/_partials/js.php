    <!--JAVASCRIPT LETAKKAN DISINI SEMUA-->
	
	<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/frontend/assets/jquery/jquery.js');?>"></script>
    <script src="<?php echo base_url('/frontend/assets/bootstrap/js/bootstrap.bundle.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/frontend/assets/jquery-easing/jquery.easing.js');?>"></script>

    <!-- Page level plugin JavaScript-->
    <!--Didefinisikan pada head.php 
	<script src="<?php //echo base_url('/frontend/assets/chart.js/Chart.js');?>"></script>
	-->
    <script src="<?php echo base_url('/frontend/assets/datatables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('/frontend/assets/datatables/dataTables.bootstrap4.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/frontend/js/sb-admin.min.js');?>"></script>

    <!-- Include Froala_Editor JS file. -->
	<script type='text/javascript' src="<?php echo base_url('/frontend/assets/froala_editor/js/froala_editor.min.js');?>"></script>
	<!-- id textEditor diselipkan pada textarea nanti. -->
	<script> 
	$(function() { 
		$('#textEditor').froalaEditor({
			heightMin: 500,
			heightMax: 1000,
			imageUpload: false,
			imagePaste: false
		})
	}); 
	</script>
	
	<!-- Carousel gallery. -->
	<script> 
	$('.carouselExampleIndicators').carousel();
	</script>
	
	<!-- Custom script for dataTable-->
	<script>

    $('#dataTablePendingArticles').DataTable( {
        "order": [[ 4, "desc" ]]
    } );
	 $('#dataTableOtherArticle').DataTable( {
        "order": [[ 6, "desc" ]]
    } );
	 $('#dataTableMyArticle').DataTable( {
        "order": [[ 5, "desc" ]]
    } );
	
//Admin dataTables

	//Admin - Akun aktif
	$('#dataTableActive').dataTable(); 	
	
	//Admin - Akun banned
	$('#dataTableBanned').dataTable();

	//Admin - Akun reset
	$('#dataTableReset').dataTable(); 	
	
//Wartawan dataTables

	//Wartawan - Draft Artikel by wartawan
	$('#dataTableMyDraft').dataTable(); 
	
	//Wartawan - Status proses artikel saya
	$('#dataTableMyArticle').dataTable();
	
	//Wartawan - Seluruh artikel wartawan lain
	$('#dataTableOtherArticle').dataTable();		
	
//Wartawan-images dataTables

	//Wartawan - Draft Artikel by wartawan
	$('#dataTableMyImages').dataTable({
     
    }); 			
	//Wartawan - Status proses artikel saya
	$('#dataTableOtherImages').dataTable({
       
    }); 		
	
//Redaktur dataTables

	//Artikel in process by redaktur
	$('#dataTableMyProcess').dataTable(); 			
	
	//Completed by redaktur
	$('#dataTableCompleted').dataTable(); 			
	
	//Article in pending process. NULL redaktur
	$('#dataTablePendingArticles').dataTable(); 	
	
	//Article in process by other redakturs.
	$('#dataTableClaimedArticles').dataTable(); 	
	
//Laporan dataTables
	//Laporan Wartawan berdasarkan Status
	$('#wartawanStatus').dataTable(); 	
	
	//Laporan Redaktur berdasarkan Status
	$('#redakturStatus').dataTable(); 				
	
	//Laporan Wartawan berdasarkan Section
	$('#wartawanSection').dataTable({
        "scrollX": true
    }); 
	
	//Laporan Redaktur berdasarkan Section
	$('#redakturSection').dataTable({
        "scrollX": true
    }); 

	//Generate laporan
	$('#generateLaporan').dataTable({
        "scrollX": true,
		"paging": false
    }); 	
	</script>
	
	<!-- Custom script for trigger modal popout-->
	<script>
	function bannedConfirm(url){
		$('#btn-banned').attr('href', url);
		$('#bannedModal').modal();
	}
	function unlockConfirm(url){
		$('#btn-unbanned').attr('href', url);
		$('#unlockModal').modal();
	}
	function articleRemoveConfirm(url){
		$('#btn-artRemove').attr('href', url);
		$('#artRemoveModal').modal();
	}
	function leaveCurrentPage(url){
		$('#btn-artRemove').attr('href', url);
		$('#artRemoveModal').modal();
	}
	function articleUnclaimConfirm(url){
		$('#btn-artUnclaim').attr('href', url);
		$('#artUnclaimModal').modal();
	}
	function articleClaimConfirm(url){
		$('#btn-artClaim').attr('href', url);
		$('#artClaimModal').modal();
	}
	function articleSubmitConfirm(url){
		$('#btn-artSubmit').attr('href', url);
		$('#artSubmitModal').modal();
	}
	function articleUnsubmitConfirm(url){
		$('#btn-artUnsubmit').attr('href', url);
		$('#artUnsubmitModal').modal();
	}
	function articleAcceptConfirm(url){
		$('#btn-artAccept').attr('href', url);
		$('#artAcceptModal').modal();
	}
	function articleRejectConfirm(url){
		$('#btn-artReject').attr('href', url);
		$('#artRejectModal').modal();
	}
	function articleDownGradeConfirm(url){
		$('#btn-artDownGrade').attr('href', url);
		$('#artDownGradeModal').modal();
	}
	function resetPasswordConfirm(url){
		$('#btn-resetPassword').attr('href', url);
		$('#resetPasswordModal').modal();
	}
	function resetCompletedConfirm(url){
		$('#btn-resetCompleted').attr('href', url);
		$('#resetCompletedModal').modal();
	}
	function resetFactoryArticle(url){
		$('#btn-resetKonten').attr('href', url);
		$('#resetKontenBerita').modal();
	}
	function discardFile(url){
		$('#btn-hapusFile').attr('href', url);
		$('#hapusFileGambar').modal();
	}
	</script>
	
	<!-- Custom script for tooltip-->
	<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>

	
	