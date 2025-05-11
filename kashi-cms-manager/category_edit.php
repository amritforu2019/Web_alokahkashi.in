<?php global $SITE_URL;
ob_start(); include('con_base/functions.inc.php');  master_main();

$qry=mysqli_query($DB_LINK,"select * from tbl_category where id=".$_GET['edit']) or die(mysqli_error());
$row=mysqli_fetch_array($qry);
require_once 'get_categories.php';
$categoryList = fetchCategoryTree();

if(isset($_POST['update'])) 
{
	
	require_once("uploader-file-master.php");
   $i1='';
   if (isset($_FILES['uploaded_file'])) 
   {
    uploadmaster("../upload/category/", 'uploaded_file');
    if ($finame != '') 
    {  
      $qry=mysqli_query($DB_LINK,"select images from tbl_category where id=".$_GET['edit']) or die(mysqli_error());
        $row=mysqli_fetch_array($qry);
        unlink('../upload/category/'.$row['images']);
      
      $f1= $finame;
      $img_url='upload/category/';
      $i1=" , images='$f1',image_url='$img_url'  ";
    }
  }
     $qry="update tbl_category set
					parent_id=".$_POST['parent_id'].", 
					 title='".addslashes(trim(ucwords($_POST['title'])))."', 
					 title_hi='".addslashes(trim(ucwords($_POST['title_hi'])))."', 
					 ext_link='".addslashes(trim($_POST['ext_link']))."',
					 ext_link2='".addslashes(trim($_POST['ext_link2']))."',
					 description='".addslashes(trim($_POST['description']))."',
					 ord='".trim($_POST['ord'])."',  
					 lastupdate='".date('Y-m-d')."',  
					 userid=".$_SESSION['master_userid'].", 
					 ipaddress='".$_SERVER['REMOTE_ADDR']."' $i1
					 where id=".$_GET['edit'] ."";


  
    if(mysqli_query($DB_LINK, $qry))
    {
		$_SESSION['suc_msg']="Updated Successfully";
    	header("location:category_list?parent=".$_POST['parent_id']."");
		exit;
	}
	else
	{
		$_SESSION['msg']=array('error', 'Oops.. Something went wrong');
    	header("location:category_list?parent=".$_POST['parent_id']."");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Category Edit :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<div class="main-container">
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <div class="page-header">
          <h1> Edit Category </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> Category </label>
                <div class="col-sm-9">
                  <select name="parent_id" class="form-control">
                  <?php  if($_SESSION['master_username']=='Developer'){?>
                  <option value="0" >None</option>
                  <?php  }?>
                  <?php
                  $parent=$row['parent_id'];
                     $sql = "SELECT id, title, parent_id FROM tbl_category WHERE 1 AND id = $parent ORDER BY title ASC";
  		            $categoryList = mysqli_query($DB_LINK,$sql);                  
                  foreach($categoryList as $cl) { ?>
                  <option value="<?php echo $cl["id"] ?>" <?php if($row['parent_id']==$cl["id"]) { echo 'selected'; } ?>><?php echo $cl["title"]; ?></option>
                  <?php } ?>                </select>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Title </label>
              <div class="col-sm-9">
                <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo stripslashes($row['title']);?>" required >
              </div>
            </div>
                <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Title Hindi </label>
              <div class="col-sm-9">
                <input type="text" name="title_hi" class="form-control" placeholder="Title Hindi (Optional)" value="<?php echo stripslashes($row['title_hi']);?>"   >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Custom Field 1 </label>
              <div class="col-sm-9">
                <input type="text" name="ext_link" class="form-control" placeholder="Enter Custom data (Optional)" value="<?php echo htmlspecialchars(stripslashes($row['ext_link']));?>"   >
              </div>
            </div>
                <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Custom Field 2 </label>
              <div class="col-sm-9">
                <input type="text" name="ext_link2" class="form-control" placeholder="Enter Custom data (Optional)" value="<?php echo htmlspecialchars(stripslashes($row['ext_link2']));?>"   >
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Ordering </label>
              <div class="col-sm-9">
                <input type="text" name="ord" class="form-control" placeholder="Ordering" value="<?php echo $row['ord'];?>"   >
              </div>
            </div>
            
            
              <div class="form-group">
               
              <div class="col-sm-12">
              Description<br>
                <textarea name="description" class="form-control" id="editor" rows="4" placeholder="Enter Description"><?php echo stripslashes($row['description']);?></textarea>
                
                
                <?php include("assets/main/ckeditor.sc.php");?>
              </div>
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Attachment </label>
                <div class="col-sm-4">
                  <input name="uploaded_file" type="file" id="id-input-file-2" >
                  ( JPG / PNG Files Only)
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3 control-label no-padding-right"></div>
                <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
                  <button class="btn btn-info" type="submit" name="update"> <i class="ace-icon fa fa-edit bigger-110"></i> Update </button>
                  <button class="btn btn-default" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
  </div>
  <!-- /.main-content -->
</div>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>