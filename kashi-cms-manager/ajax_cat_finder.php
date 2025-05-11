<?php ob_start(); include('con_base/functions.inc.php');

$val=trim($_REQUEST['cat_id']); 
 ?>  
 <select  name="sub_category_id" class="chosen-select form-control" id="form-field-select-4"  required>
                        <option value="" selected>Select Sub Category</option>
                   
                <?php 
				$qry=mysqli_query($DB_LINK,"select * from tbl_category where parent_id='$val' order by title")or die(mysqli_error());
				  foreach($qry as $cat){
					  ?>
                    <option value="<?php echo $cat['id'];?>"  ><?php echo $cat['title'];?></option>                   <?php }?>
                      </select>                 

