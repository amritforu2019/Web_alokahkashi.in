<!-- Mainly scripts -->
<script src="assets/plugins/jquery/jquery-2.1.1.js"></script>
<script>
$(document).ready(function(){
						   <?php if(isset($getdata_qry)){foreach($getdata_qry as $row){?>
  $(".hideBtn<?php echo $row['id'];?>").click(function(){
  $(".reply<?php echo $row['id'];?>").hide("fast");
  });

$(".showBtn<?php echo $row['id'];?>").click(function(){
  $(".reply<?php echo $row['id'];?>").show("fast");
  });
<?php }}?>
});
</script>