<?php
include("../functions.inc.php");
    $id=$_POST['id'];
    $batch_id=$_POST['batch_id'];
    $c_code=$_POST['c_code'];
    if ($id!='') {
      $sqlct = mysqli_query($DB_LINK, "select  * from  tbl_master_batch_assign  where 
    `batch_id`='$batch_id' and `user_id`='$id' ") or die(mysqli_error());
      if (mysqli_num_rows($sqlct) < 1) {
        //study_center_code like '%" . $_POST['id'] . "%' or
        $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_student  where  user like '%" . $_POST['id'] . "%' and c_code='$c_code' and   reg_typ='online'") or die(mysqli_error());
        if (mysqli_num_rows($sqlst) > 0) {
          $datas_name = mysqli_fetch_assoc($sqlst);

          ?>
          <div class="card text-center">
            <div class="card-header bg-gradient-info text-white">
              <?php echo $datas_name['user']; ?>

            </div>
            <div class="card-body">
              <h5 class="card-title">  <?php echo $datas_name['t_name']; ?></h5>
              <input type="hidden" value="<?php echo $datas_name['t_name']; ?>" name="user_name">
              <p class="card-text"> <?php echo $datas_name['c_code']; ?> - <?php echo $datas_name['c_name']; ?></p>
            </div>

          </div>
        <?php } else echo "<span class='text-danger'>No record found !!!</span>";
      } else echo "<span class='text-danger'>This Associate is already assign in this batch</span>";
    }?>


