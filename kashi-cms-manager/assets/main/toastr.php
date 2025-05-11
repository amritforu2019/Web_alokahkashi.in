<?php 
if(isset($_SESSION['msg'])) { if($_SESSION['msg']!='')
{
	$result = alert_msg($_SESSION['msg'][0], 'User');
?>
<script>
$(document).ready(function() {
	setTimeout(function() {
        toastr.options = {
			closeButton: true,
			debug : true,
			progressBar: true,
			showDuration: "400",
			hideDuration: "1000",
			timeOut: "2000",
			extendedTimeOut: "1000",
			showEasing: "swing",
			hideEasing: "linear",
			showMethod: "fadeIn",
			hideMethod: "fadeOut"
		};
    	toastr.<?php echo $_SESSION['msg'][0];?>('<?php echo $_SESSION['msg'][1];?>', '<?php echo $result[0];?>');
    }, 1300);
});
</script>
<?php $_SESSION['msg']=''; }}?> 
