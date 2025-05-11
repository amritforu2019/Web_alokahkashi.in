<script>
<?php if(isset($_SESSION['msg'])){ if($_SESSION['msg']!='')
{
    $result = alert_msg($_SESSION['msg'][0], 'User');
?>
swal({
    title: "<?php echo $_SESSION['msg'][1];?>",
    //text: "You clicked the button!",
    type: "<?php echo $result[1];?>"
});
<?php $_SESSION['msg']=''; } }?>
</script>

<script>
function del(delId, table)
{
    swal({
          title: "Are you sure want to remove?",
          text: "You will not be able to recover this item",
          type: "warning",
          showCancelButton: true,
		  /*confirmButtonColor: '#3085d6',
  	      cancelButtonColor: '#d33',*/
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Confirm",
          cancelButtonText: "Cancel",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm) {
          if (isConfirm) {
            //swal("Deleted!", "Your item deleted.", "success");
			window.location.href = table+"?del="+delId;
          } else {
            swal("Cancelled", "You Cancelled", "error");
          }
      });
}



</script>



