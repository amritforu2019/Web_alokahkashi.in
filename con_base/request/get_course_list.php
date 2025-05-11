<?php
include("../functions.inc.php");
      $type_name=$_POST['type_name'];  ?>
     <select class="form-control  text-uppercase" name="hcourse" id="hcourse"   required  onChange="onchangeajax_for_course(this.value);">
                                          <option value="">--Select Course--</option>
                                          <?php $sql=mysqli_query($DB_LINK1,"select * from tbl_master_course where status='1' and c_typ='$type_name' order by c_name asc") or die(mysqli_error());
                                          foreach($sql as $state)
                                          {
                                            ?>
                                            <option value="<?php echo $state['c_code'];?>" <?php  if(isset($_GET['edit']))  if($edit_data['course_id']==$state['c_code']) { echo 'selected';   } ?>><?php echo $state['c_sort_name'];?> - <?php echo $state['c_name'];?></option>
                                          <?php } ?>
                                        </select>


<!--[<?php /*echo $state['c_code'];*/?>] - -->