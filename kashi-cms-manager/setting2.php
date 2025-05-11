<?php ob_start(); include('con_base/functions.inc.php');validate();  master_main();
$qry=mysqli_query($DB_LINK,"select * from tbl_setting")or die(mysqli_error());
$row=mysqli_fetch_array($qry)or die(mysqli_error());
if(isset($_POST['submit']))
{
	require_once("uploader-file-master.php");
	$i1='';
	if (isset($_FILES['avatar'])) 
		{
        	uploadmaster("assets/upload/Posts/", 'avatar');
        	if ($finame != '') 
			{
             	$f1= $finame;
			 	$i1="logo='$f1', ";
        	}
    	}
	$site_name=trim($_POST['site_name']);
	$site_admin_title=trim($_POST['site_admin_title']);
	$site_url=trim($_POST['site_url']);
	$email=trim($_POST['email']);
	$mobile=trim($_POST['mobile']);
	
	$f=trim($_POST['f']);
	$l=trim($_POST['l']);
	$t=trim($_POST['t']);
	$y=trim($_POST['y']);
	$g=trim($_POST['g']);
	
	if(mysqli_query($DB_LINK,"update tbl_setting set $i1 site_url='$site_url', site_name='$site_name', site_admin_title='$site_admin_title', email='$email', mobile='".$_POST['mobile']."', f='".$f."', l='".$l."', t='".$t."', y='".$y."', g='".$g."'"))
 	{	
		$_SESSION['suc_msg']="Updated successfully";
		header("Location: setting");
		exit;
	}
	else
	{
		$_SESSION['err_msg']="Not Updated. Something went wrong !!!";
		header("Location: site-setting");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: Global Setting</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
<style type="text/css">
.hr-line-dashed {
	border-top: 1px dashed #e7eaec;
	color: #ffffff;
	background-color: #ffffff;
	height: 1px;
	margin: 20px 0;
}
</style>
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li class="active">Global Setting</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Global Setting </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="">
            <div class="widget-box transparent" id="recent-box">
              <div class="widget-header">
                <h4 class="widget-title lighter smaller action-buttons"> <a href="#" data-action="reload"> <i class="ace-icon fa fa-refresh blue"></i> </a></h4>
                <div class="widget-toolbar no-border">
                  <ul class="nav nav-tabs" id="recent-tab">
                    <li class="active"> <a data-toggle="tab" href="#basic">Basic</a> </li>
                    <li> <a data-toggle="tab" href="#logo">Logo</a> </li>
                  </ul>
                </div>
              </div>
              <div class="widget-body">
                <div class="widget-main padding-4">
                  <div class="tab-content padding-8">
                    <div id="basic" class="tab-pane active">
                      <h4 class="smaller lighter green"> Basic Setting </h4>
                      
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Name </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Name" class="form-control" name="site_name" value="<?php if(isset($row['site_name'])) echo ($row['site_name']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Title Admin </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Title Admin" class="form-control" name="site_admin_title" value="<?php if(isset($row['site_admin_title'])) echo ($row['site_admin_title']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Url" class="form-control" name="site_url" value="<?php if(isset($row['site_url'])) echo ($row['site_url']); ?>" required   />
                </div>
              </div>
               <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Email </label>
                <div class="col-sm-9">
                  <input type="email" placeholder="Enter Email" class="form-control" name="email" value="<?php if(isset($row['email'])) echo ($row['email']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Mobile </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Mobile" class="form-control" name="mobile" value="<?php if(isset($row['mobile'])) echo ($row['mobile']); ?>" required   />
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Facebook </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Facebook" class="form-control" name="f" value="<?php if(isset($row['f'])) echo ($row['f']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > LinkedIn </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter LinkedIn" class="form-control" name="l" value="<?php if(isset($row['l'])) echo ($row['l']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Twitter </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Twitter" class="form-control" name="t" value="<?php if(isset($row['t'])) echo ($row['t']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Youtube </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Youtube" class="form-control" name="y" value="<?php if(isset($row['y'])) echo ($row['y']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Google_Plus </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Google_Plus" class="form-control" name="g" value="<?php if(isset($row['g'])) echo ($row['g']); ?>" />
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              
                    </div>
                    <div id="logo" class="tab-pane">
                    <h4 class="smaller lighter green"> Logo Setting </h4>
                      <span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/themes/theme2.2/images/avatars/profile-pic.jpg" />
												</span>
                      <div class="hr-line-dashed"></div>
                    </div>
                  </div>
                </div>
                <!-- /.widget-main -->
              </div>
              <!-- /.widget-body -->
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label no-padding-right"></div>
                <div class="col-md-9 no-padding-right" >
                  <button class="btn btn-info" type="submit" name="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
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
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>