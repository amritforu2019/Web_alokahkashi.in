<!-- Data Tables -->
<script type="text/javascript" src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatable/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatable/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true,
			"pageLength": 100
        } );
    } );
</script>