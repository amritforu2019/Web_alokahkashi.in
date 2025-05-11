<?php
include("../functions.inc.php");
 $ins_id=$_POST['ins_id'];
  $sqlst = mysqli_query($DB_LINK, "select *  from tbl_master_institute where t_code='" . $_POST['ins_id'] . "'") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
<div class="card text-center">
  <div class="card-header bg-gradient-success  text-white">
    <?php echo $datas_name['t_code'];?>
  </div>
  <div class="card-body">
    <h5 class="card-title"> <?php echo $datas_name['t_name']?></h5>
    <p class="card-text"> Address : <?php echo $datas_name['address'];?><br>
      <?php echo $datas_name['city_name'];?> - <?php echo $datas_name['state_name'];?>
    Pin : <?php echo $datas_name['pincode'];?></p>
  </div>

</div>
<?php } else echo "<span class='text-danger'>No record found !!!</span>";?>


