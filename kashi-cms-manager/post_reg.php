<?php ob_start(); include('con_base/functions.inc.php'); master_main();

if(isset($_POST['submit']))
{
	require_once("uploader-file-master.php");
	$i1='';
	// restricting duplicate entry
	$dup_entry=mysqli_num_rows(mysqli_query($DB_LINK,"select * from tbl_posts where title='".$_POST['title']."'"));
 
	if($dup_entry==0)
	{
		if (isset($_FILES['uploaded_file'])) 
		{
        	uploadmaster("assets/upload/posts/", 'uploaded_file');
        	if ($finame != '') 
			{
             	$f1= $finame;
			 	$i1="image='$f1', ";
        	}
    	}
		$category_id= $_POST['category_id'] ;
	$sub_category_id= $_POST['sub_category_id'] ;
	
	$url = strtolower(clean($_POST['title']).'.html'); 
		 
		$q=mysqli_query($DB_LINK,"INSERT INTO `tbl_posts` set $i1
						title='$_POST[title]', 
						url='$url', 
						body='$_POST[body]', 
						category_id='$category_id', 
						sub_category_id='$sub_category_id',					
						regdate='".date('Y-m-d')."', 
						userid=".$_SESSION['master_userid'].", 
						ipaddress='".$_SERVER['REMOTE_ADDR']."',
						status=0,
						posted_by='".$_POST['posted_by']."',
						other='".$_POST['other']."' ");
		if(mysqli_insert_id($DB_LINK))
		{
			$_SESSION['msg']=array('success', 'Inserted Successfully');
    		header("location:post_list");
    		exit;
		}
		else
		{
			$_SESSION['msg']=array('error', 'Oops. Something went wrong');
    		header("location:post_list");
			exit;
		}
	}
	else
	{
		$_SESSION['msg']=array('warning', 'Already Exist');
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
<title> Project Add :: <?php echo $SITE_NAME;?></title>
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
          <li><a href="">Project</a></li>
          <li class="active">Add New Project</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Add New Project </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Title </label>
                <div class="col-sm-9">
                  <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Image </label>
                <div class="col-sm-4">
                  <input name="uploaded_file" type="file" id="id-input-file-2" >
                  ( Image Resolution 800 X 600 )
                </div>
              </div>
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" >Category </label>
                    <div class="col-sm-9"><!--multiple=""-->
                      <select  name="category_id" class="chosen-select form-control" id="form-field-select-4" required >
                        <option value="" selected>Select Category</option>
                        <?php $sql=mysqli_query($DB_LINK,"select * from tbl_category where   parent_id=16 order by title") or die(mysqli_error());
                     foreach($sql as $cat)
                     {
					 ?>
                        <option value="<?php echo $cat['id'];?>"><?php echo ucwords(strtolower($cat['title']));?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <?php /*?><div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" >Sub Category </label>
                    <div class="col-sm-9"><!--multiple=""-->
                      <select  name="sub_category_id" class="chosen-select form-control" id="form-field-select-4"  required>
                        <option value="" selected>Select Sub Category</option>
                   
                <?php 
				$qry=mysqli_query($DB_LINK,"select * from tbl_category where parent_id=58 order by title")or die(mysqli_error());
				  foreach($qry as $cat){
					  ?>
                    <option value="<?php echo $cat['id'];?>"  ><?php echo $cat['title'];?></option>                   <?php }?>
                      </select>
                    </div>
                  </div><?php */?>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Description </label>
                <div class="col-sm-9">
                  <textarea name="body" class="form-control" id="editor" placeholder="Enter Project Description"></textarea>
                  <?php include("assets/main/ckeditor.sc.php");?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Posted By </label>
                <div class="col-sm-9">
                 <select   name="posted_by" class="chosen-select form-control" id="posted_by" required  onChange="upd_data(this.value)">
                 <option value="" selected>POSTED BY</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="OTHER">OTHER</option>                     
                      </select>
                      
                </div>
              </div>
              
              <div class="form-group" id="post_upd" style="display:none;">
                <label class="col-sm-2 control-label no-padding-right"> OTHER </label>
                <div class="col-sm-9">
                  
                      <input name="other" type="text" class="form-control" id="other" placeholder="Enter Others Name"  >
                       
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-3 control-label no-padding-right"></div>
              <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
              <input type="hidden" name="category" value="page" >
                <button class="btn btn-info" type="submit" name="submit" data-last="Finish"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
                <button class="btn btn-default" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> Reset</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.col -->
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
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