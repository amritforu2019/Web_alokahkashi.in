<?php ob_start(); include('con_base/functions.inc.php');  master_main();
 //include("super_user.php");
$qry=mysqli_query($DB_LINK,"select * from tbl_login where id=".$_GET['edit']) or die(mysqli_error());
$row=mysqli_fetch_array($qry);
if(isset($_POST['submit']))
{
	if(mysqli_query($DB_LINK,"update tbl_login set user='".$_POST['user']."', pass='".enc(trim($_POST['pass']))."', username='".$_POST['user']."', mobile='".$_POST['mobile']."', email='".$_POST['email']."', role='User', lastupdate='".date("Y-m-d")."', userid=".$_SESSION['master_userid'].", ipaddress='".$_SERVER['REMOTE_ADDR']."' where role='User' and id=".$_GET['edit']))
	{
		$_SESSION['suc_msg']="Updated Successfully";
    	header("location:user_list");
		exit;
	}
	else
	{
		$_SESSION['err_msg']="Not Updated. Something went wrong !!!";
    	header("location:user_list");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: User Edit</title>
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
          <h1> Edit User </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" target="_parent">
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> User Name </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter User Name" class="col-xs-10 col-sm-5" name="user" value="<?php echo $row['user'];?>" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> Password</label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Password" class="col-xs-10 col-sm-5" name="pass" value="<?php echo dec($row['pass']);?>" required/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> Email </label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="col-xs-10 col-sm-5" id="email" placeholder="Enter Email" value="<?php echo $row['email'];?>"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> Mobile </label>
                <div class="col-sm-9">
                  <input name="mobile" type="text" class="col-xs-10 col-sm-5" id="mobile" placeholder="Enter Mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  pattern=".{10}" maxlength="10" value="<?php echo $row['mobile'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3 control-label no-padding-right"></div>
                <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
                  <button class="btn btn-info" type="submit" name="submit"> <i class="ace-icon fa fa-edit bigger-110"></i> Update </button>
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