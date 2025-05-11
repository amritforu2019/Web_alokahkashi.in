<?php ob_start(); include('con_base/functions.inc.php'); master_main();
 //include("super_user.php");
if(isset($_POST['submit']))
{
	
	$dup_entry=mysqli_num_rows(mysqli_query($DB_LINK,"select * from tbl_login where user='".$_POST['user']."' and username='User' "));
 
	if($dup_entry==0)
	{
echo "insert into tbl_login set user='".$_POST['user']."', pass='".enc(trim($_POST['pass']))."', username='".$_POST['user']."', mobile='".$_POST['mobile']."', email='".$_POST['email']."', role='User', status=1, userid=".$_SESSION['master_userid'].", ipaddress='".$_SERVER['REMOTE_ADDR']."' "; 
		mysqli_query($DB_LINK,"insert into tbl_login set user='".$_POST['user']."', pass='".enc(trim($_POST['pass']))."', username='".$_POST['user']."', mobile='".$_POST['mobile']."', email='".$_POST['email']."', role='User', regdate='".date("Y-m-d")."', userid=".$_SESSION['master_userid'].", ipaddress='".$_SERVER['REMOTE_ADDR']."' ")or die(mysqli_error());
	
		$_SESSION['suc_msg']="New User Created Succesfully";
		header("Location: user_list");
		exit;		
	}
	else
	{
		$_SESSION['err_msg']="User Already Exists";
		header("Location: user_reg");
		exit;	
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: User Add</title>
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
        <h1> Create New User </h1>
      </div>
      <!-- /.page-header -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form class="form-horizontal" role="form" method="post" action="" target="_parent">
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> User Name </label>
              <div class="col-sm-9">
                <input required name="user" type="text" class="col-xs-10 col-sm-5" id="user" placeholder="Enter User Name">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Password </label>
              <div class="col-sm-9">
                <input name="pass" type="text" class="col-xs-10 col-sm-5" id="pass" placeholder="Enter Password"  required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Email </label>
              <div class="col-sm-9">
                <input name="email" type="email" class="col-xs-10 col-sm-5" id="email" placeholder="Enter Email"  required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right"> Mobile </label>
              <div class="col-sm-9">
                <input name="mobile" type="text" class="col-xs-10 col-sm-5" id="mobile" placeholder="Enter Mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  pattern=".{10}" maxlength="10" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3 control-label no-padding-right"></div>
              <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
                <button class="btn btn-info" type="submit" name="submit" > <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
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