<?php
include("../functions.inc.php");
    $session=$_POST['session'];
    $course_id=$_POST['course_id'];




    $i=0;
        $sqlst = mysqli_query($DB_LINK, "select *  from tbl_team_student_session   where  
        session= '" . $session . "' and c_code='$course_id' and   status='1'") or die(mysqli_error());
        if (mysqli_num_rows($sqlst) > 0) {
          foreach($sqlst as $datas_name )
          {

         $sqlst_adm_card = mysqli_query($DB_LINK, "select *  from tbl_admit_card_assign    where  
        session = '" . $datas_name['session'] . "' and roll_no='".$datas_name['roll_no']."'  ") or die(mysqli_error());
        if (mysqli_num_rows($sqlst_adm_card) <1)
        {
          $i++;

          ?>
          <div class="card text-center">
            <div class="card-header   <?php if($i%3==0) echo 'bg-gradient-danger'; else { if($i%2==0) echo 'bg-gradient-success' ; else echo "bg-gradient-info"; } ?>  text-white">
              <?php echo $datas_name['roll_no']; ?>
                <input type="checkbox" value="<?php echo $datas_name['roll_no']; ?>" name="chk_roll[]" checked/>

            </div>
            <div class="card-body">
              <h6  >  <?php echo get_student_data($datas_name['user'],'t_name'); ?> <?php echo get_student_data($datas_name['user'],'m_name'); ?> <?php echo get_student_data($datas_name['user'],'l_name'); ?></h6>
              <input type="hidden" value="<?php echo $datas_name['user']; ?>" name="enr_no[]">
              <p class="card-text">Enrollment number : <?php echo $datas_name['user']; ?><br>Session : <?php echo $datas_name['session']; ?></p>
            </div>

          </div>
        <?php } } } else echo "<span class='text-danger'>No record found !!!</span>";
         ?>


