<?php ob_start(); include('con_base/functions.inc.php');

master_main();
if(isset($_POST['submit']))
{
	$sql = "select * from tbl_login where user='".$_SESSION['session_master']."' "; 
	$result=mysqli_query($DB_LINK,$sql);
	$line=mysqli_fetch_array($result);
	if($line['pass']==enc(trim($_POST['opass'])))
	{
		if(mysqli_query($DB_LINK," update tbl_login set pass='".enc(trim($_POST['cpass']))."' where user='".$_SESSION['session_master']."' and pass='".enc(trim($_POST['opass']))."'"))
		{
			$_SESSION['msg']=array('success', 'Password Updated Succesfully');
			header("Location: password");
			exit;
		}
		else
		{
			$_SESSION['msg']=array('error', 'Oops.. Something went wrong');
 			header("Location: password");
			exit;
		}
	}
	else
	{
		$_SESSION['msg']=array('warning', 'Old Password not correct');
 		header("Location: password");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: Change Password</title>
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
          <li class="active">Change Password</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Change Password </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="">
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Old Password </label>
                <div class="col-sm-9">
                  <input required name="opass" type="text" class="col-xs-10 col-sm-5" id="opass" placeholder="Enter Old Password" value="<?php if(isset($_POST['opass'])) echo $_POST['opass'];?>"   >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> New Password </label>
                <div class="col-sm-9">
                  <input name="npass" type="password" class="col-xs-10 col-sm-5" id="npass" placeholder="Enter New Password" value="<?php if(isset($_POST['npass']))  echo $_POST['npass'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Confirm Password </label>
                <div class="col-sm-9">
                  <input name="cpass" type="password" class="col-xs-10 col-sm-5" id="cpass" placeholder="Enter Confirm Password" value="<?php if(isset($_POST['cpass']))  echo $_POST['cpass'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3 control-label no-padding-right"></div>
                <div class="col-md-9 no-padding-right">
                  <button class="btn btn-info" type="submit" name="submit" onClick="return Validate()"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
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
<script type="text/javascript">
    function Validate() {
        var npass = document.getElementById("npass").value;
        var cpass= document.getElementById("cpass").value;
        if (npass != cpass) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>