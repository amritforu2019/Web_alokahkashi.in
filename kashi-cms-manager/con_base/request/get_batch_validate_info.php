<?php
include("../functions.inc.php");
    $course_id=$_POST['course_id'];
    $batch_id=$_POST['batch_id'];
  $sqlst = mysqli_query($DB_LINK, "select *  from tbl_master_batch where c_code='".$course_id."' and id='$batch_id'") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
    <label>Select Batch</label>
    <select class="form-control  text-uppercase" name="batch_id" id="batch_id"  onchange="validate_batch_by_course(this.value,c_code.value)" required>
      <option value="">--Select Batch--</option>
      <!--where created_by='".$_SESSION['a_userid']."'<option value="0">All State</option>-->
      <?php $sql=mysqli_query($DB_LINK,"select * from  tbl_master_batch   order by t_name") or die(mysqli_error());
      foreach($sql as $state)
      {
        ?>
        <option value="<?php echo $state['id'];?>" <?php   if($batch_id==$state['id']) { echo 'selected';   } ?>><?php echo $state['t_name'];?></option>
      <?php } ?>
    </select>

    <span class='text-success'> This Batch is belong to Selected Course !!!</span>
  <?php } else { ?>
    <label>Select Batch</label>
    <select class="form-control  text-uppercase" name="batch_id" id="batch_id"  onchange="validate_batch_by_course(this.value,c_code.value)" required>
      <option value="">--Select Batch--</option>
      <!-- where created_by='".$_SESSION['a_userid']."'<option value="0">All State</option>-->
      <?php $sql=mysqli_query($DB_LINK,"select * from  tbl_master_batch  order by t_name") or die(mysqli_error());
      foreach($sql as $state)
      {
        ?>
        <option value="<?php echo $state['id'];?>"  ><?php echo $state['t_name'];?></option>
      <?php } ?>
    </select>

    <span class='text-danger'>Sorry This Batch is not belong to Selected Course !!!</span>
  <?php } ?>


