<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>

<!-- page js -->
<!-- <script src="<?= base_url() ?>assets/vendors/apexcharts/dist/apexcharts.min.js"></script> -->
<script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>
    <!-- page js -->
    <script src="<?= base_url() ?>assets/vendors/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/mail.js"></script>

<script src="<?= base_url() ?>assets/js/app.min.js"></script>
<!-- Core JS -->

<script src="<?= base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
    $('#data-table').DataTable();
    <?php if ($this->session->flashdata('status')['status'] == 'success') { ?>
		setInterval(function() { 
            $('.alert').hide('slow', function () {
                        $(this).remove();
                    });
        }, 3000);
	<?php } else if ($this->session->flashdata('status')['status'] == 'error') {  ?>
		setInterval(function() { 
            $('.alert').hide('slow', function () {
                        $(this).remove();
                    });
        }, 3000);
	<?php } ?>
</script>
<script src="<?= base_url() ?>assets/js/ckeditor.js"></script>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor1' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
