<?php ob_start(); include('con_base/functions.inc.php'); master_main();

if(isset($_POST['submit'])) 
{
    $dup_entry=mysqli_num_rows(mysqli_query($DB_LINK,"select * from tbl_menu where title='".$_POST['title']."'"));
 
	if($dup_entry==0)
	{
    	mysqli_query($DB_LINK, "insert into tbl_menu set title='".ucwords($_POST['title'])."', url='$_POST[url]', regdate='".date('Y-m-d')."', userid=".$_SESSION['master_userid'].", ipaddress='".$_SERVER['REMOTE_ADDR']."'");
		if(mysqli_insert_id($DB_LINK))
		{
			$_SESSION['msg']=array('success', 'Inserted Successfully');
    		header("location:menu_list");
    		exit;
		}
		else
		{
			$_SESSION['msg']=array('error', 'Oops.. Something went wrong');
    		header("location:menu_list");
			exit;
		}
	}
	else
	{
		$_SESSION['msg']=array('warning', 'Already Exist');
    	header("location:menu_list");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Category Add :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<?php //include('include/header.php');?>
<?php //include('include/sidemenu.php');?>
<div class="main-content">
  <div class="main-content-inner">
    <!--  <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Master Management</a></li>
          <li class="active">Create New User</li>
        </ul>
        <!-- /.breadcrumb -- 
      </div> -->
    <div class="page-content">
      <div class="page-header">
        <h1> Add New Category </h1>
      </div>
      <!-- /.page-header -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Navigation Label </label>
              <div class="col-sm-9">
                <input type="text" name="title" class="form-control text-capitalize" placeholder="Navigation Label" required >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> URL </label>
              <div class="col-sm-9">
                <input type="text" name="url" class="form-control" placeholder="URL" required >
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3 control-label no-padding-right"></div>
              <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
                <button class="btn btn-info" type="submit" name="submit" > <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
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
<?php //include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>