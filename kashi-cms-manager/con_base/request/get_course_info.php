<?php
include("../functions.inc.php");
    $course_id=$_POST['course_id'];
  $sqlst = mysqli_query($DB_LINK, "select *  from tbl_master_course where c_code='".$_POST['course_id']."'") or die(mysqli_error());
  if(mysqli_num_rows($sqlst)>0)
  {
  $datas_name = mysqli_fetch_assoc($sqlst);

   ?>
      <button type="button" class="btn m-1 btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal2">
          View Course Summary
      </button>

      <div class="modal   fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class=" modal-dialog modal-xl" role="document">
              <div class="modal-content ">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Course Info</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="card text-center">
                          <div class="card-header bg-gradient-success  text-white">
                              <?php echo $datas_name['c_sort_name'];?> - <?php echo $datas_name['c_code'];?> [<?php echo $datas_name['c_typ'];?>]
                          </div>
                          <div class="card-body">
                              <h5 class="card-title"> <?php echo $datas_name['c_name']?></h5>
                              <p class="card-text"> Eligibility  : <?php echo $datas_name['eligi'];?> Duration : <?php echo $datas_name['c_dur'];?> <?php echo course_dur_data($datas_name['c_dur_typ']);?>  Fee : <?php echo $datas_name['c_fee'];?>  <br>
                              <pre> <?php echo $datas_name['detail'];?></pre>
                              </pre>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  </div>
              </div>
          </div>
      </div>


<?php } else echo "<span class='text-danger'>No record found !!!</span>";?>


