<?php ob_start(); include('con_base/functions.inc.php');  master_main();

$qry=mysqli_query($DB_LINK,"select * from tbl_posts where id=".$_GET['edit']) or die(mysqli_error());
$row=mysqli_fetch_array($qry);

if(isset($_POST['update'])) 
{
    require_once("uploader-file-master.php");
	$i1='';
	if (isset($_FILES['uploaded_file'])) 
	{
		uploadmaster("assets/upload/posts/", 'uploaded_file');
        if ($finame != '') 
		{  
			$qry=mysqli_query($DB_LINK,"select image from tbl_posts where id=".$_GET['edit']) or die(mysqli_error());
    		$row=mysqli_fetch_array($qry);
    		unlink('assets/upload/Posts/'.$row['image']);
			
			$f1= $finame;
			$i1="image='$f1', ";
		}
	}
	
	
	$i2='';
	if (isset($_FILES['uploaded_file2'])) 
	{
		uploadmaster("assets/upload/posts/", 'uploaded_file2');
        if ($finame != '') 
		{  
			$qry=mysqli_query($DB_LINK,"select image2 from tbl_posts where id=".$_GET['edit']) or die(mysqli_error());
    		$row=mysqli_fetch_array($qry);
    		unlink('assets/upload/Posts/'.$row['image2']);
			
			$f2= $finame;
			$i2="image2='$f2', ";
		}
	}
	
	
	
	$category_id= $_POST['category_id'] ;
	$sub_category_id= $_POST['sub_category_id'] ;
	
	
	$url = strtolower(clean($_POST['title']).'.html');
	if(mysqli_query($DB_LINK, "update tbl_posts set $i1  $i2
					title='$_POST[title]', 
					url='$url', 
					body='$_POST[body]', 
					category_id='$category_id',
					sub_category_id='$sub_category_id',
					lastupdate='".date('Y-m-d')."', 
					userid=".$_SESSION['master_userid'].", 
					ipaddress='".$_SERVER['REMOTE_ADDR']."',
					posted_by='".$_POST['posted_by']."', 
					other='".$_POST['other']."',
					s_addr='".$_POST['s_addr']."',
					amenities='".$_POST['amenities']."',
					about='".$_POST['about']."',
					highlight='".$_POST['highlight']."',
					connectivity ='".$_POST['connectivity']."',
          sqft_rate='".$_POST['sqft_rate']."'					
					where id=".$_GET['edit']))
    {
		$_SESSION['msg']=array('success', 'Updated Successfully');
    	header("location:post_list");
		exit;
	}
	else
	{
		$_SESSION['msg']=array('error', 'Oops.. Something went wrong');
    	header("location:post_list");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Project  Edit :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Projects</a></li>
          <li class="active">Edit Project</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Edit Post </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Title </label>
                <div class="col-sm-9">
                  <input name="title" type="text" class="form-control" id="title" value="<?php echo $row['title'];?>"  required placeholder="Enter Title" >
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Sort Address </label>
                <div class="col-sm-9">
                  <input name="s_addr" type="text" class="form-control" id="s_addr" value="<?php echo $row['s_addr'];?>"  required placeholder="Enter Sort Address" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> SQFT Rate  </label>
                <div class="col-sm-9">
                  <input name="sqft_rate" type="text" class="form-control" id="sqft_rate" value="<?php echo $row['sqft_rate'];?>"  required placeholder="Enter Sqft Rate" >
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Image List Page </label>
                <div class="col-sm-9">
                  <input name="uploaded_file" type="file" id="uploaded_file"   >
                  ( Image Resolution 320 X 320 )
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Image Details  Page</label>
                <div class="col-sm-9">
                  <input name="uploaded_file2" type="file" id="uploaded_file2"   >
                  ( Image Resolution 1920 X 700 )
                </div>
              </div>
              
              
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" >Category </label>
                    <div class="col-sm-9"><!--multiple=""-->
                      <select  name="category_id" class="chosen-select form-control" id="form-field-select-4" >
                        <option value="">Select Category</option>
                 
                <?php 
				$qry=mysqli_query($DB_LINK,"select * from tbl_category where parent_id=16 order by title")or die(mysqli_error());
				  foreach($qry as $cat){
					  ?>
                    <option value="<?php echo $cat['id'];?>" <?php  if($cat['id']==$row['category_id']) { echo 'selected'; } ?>><?php echo $cat['title'];?></option>
                    <?php }?>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" >Sub Category </label>
                    <div class="col-sm-9"><!--multiple=""--> 
                      <select  name="sub_category_id" class="chosen-select form-control" id="form-field-select-4" >
                        <option value="">Select Sub Category</option>
                   
                <?php 
				$qry=mysqli_query($DB_LINK,"select * from tbl_category where parent_id=65 order by title")or die(mysqli_error());
				  foreach($qry as $cat){
					  ?>
                    <option value="<?php echo $cat['id'];?>" <?php  if($cat['id']==$row['sub_category_id']) { echo 'selected'; } ?>><?php echo $cat['title'];?></option>                   <?php }?>
                      </select>
                    </div>
                  </div> <?php /*?> <!----><?php */?>
                  
                  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> About </label>
                <div class="col-sm-9">
                  <textarea name="about" rows="5"    class="form-control" id="editor" placeholder="Enter about"><?php echo $row['about'];?></textarea>
                   <?php include("assets/main/ckeditor.sc.php");?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Amenities </label>
                <div class="col-sm-9">
                  <textarea name="amenities" rows="5"   class="form-control" id="editor1" placeholder="Enter Amenities"><?php echo $row['amenities'];?></textarea>
                   <?php include("assets/main/ckeditor.sc.php");?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Highlight </label>
                <div class="col-sm-9">
                  <textarea name="highlight" rows="5"   class="form-control" id="editor2" placeholder="Enter Highlight"><?php echo $row['highlight'];?></textarea>
                    <?php include("assets/main/ckeditor.sc.php");?>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Connectivity </label>
                <div class="col-sm-9">
                  <textarea name="connectivity" multiple="" class="form-control" id="editor3" placeholder="Enter Page Connectivity"><?php echo $row['connectivity'];?></textarea>
                  <?php include("assets/main/ckeditor.sc.php");?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Description </label>
                <div class="col-sm-9">
                  <textarea name="body" multiple="" class="form-control" id="editor4" placeholder="Enter Page Description"><?php echo $row['body'];?></textarea>
                  <?php include("assets/main/ckeditor.sc.php");?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Posted By </label>
                <div class="col-sm-9">
                 <select   name="posted_by" class="chosen-select form-control" id="posted_by" required  onChange="upd_data(this.value)">
                 <option value="" selected>POSTED BY</option>
                        <option <?php if($row['posted_by']=='ADMIN')  echo 'selected'; ?> value="ADMIN">ADMIN</option>
                        <option value="OTHER" <?php if($row['posted_by']=='OTHER')  echo 'selected'; ?>>OTHER</option>                     
                      </select>
                      
                </div>
              </div>
              <div class="form-group" id="post_upd" <?php if($row['posted_by']=='ADMIN' || $row['posted_by']=='') {?> style="display:none;" <?php } ?>>
                <label class="col-sm-2 control-label no-padding-right"> OTHER </label>
                <div class="col-sm-9">
                  
                      <input name="other" type="text" class="form-control" id="other" placeholder="Enter Others Name"  >
                       
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-3 control-label no-padding-right"></div>
              <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
              <input type="hidden" name="category" value="page" >
                <button class="btn btn-info" type="submit" name="update" > <i class="ace-icon fa fa-edit bigger-110"></i> Update </button>
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
  <?php include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
<script>
function upd_data(vals)
{
	if(vals!='')
	{
		if(vals=='ADMIN')
		{
			document.getElementById("post_upd").style.display='none';
		}
		if(vals=='OTHER')
		{
			document.getElementById("post_upd").style.display='block';
		}
	}
	else
	document.getElementById("post_upd").style.display='none';
}
</script>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>