<?php ob_start(); include('con_base/functions.inc.php');validate();  master_main();
$qry=mysqli_query($DB_LINK,"select * from tbl_setting")or die(mysqli_error());
$row=mysqli_fetch_array($qry)or die(mysqli_error());
if(isset($_POST['submit'],$_SESSION['master_role']))
{
	$site_name=trim($_POST['site_name']);
	$site_short_name=trim($_POST['site_short_name']);
	$site_title=trim($_POST['site_title']);
	$site_admin_title=trim($_POST['site_admin_title']);
	$title=trim($_POST['title']);
	$email=trim($_POST['email']);
	$address=trim($_POST['address']);
	$fax=trim($_POST['fax']);
	$google_map=trim($_POST['google_map']);
	
	$site_url_admin=trim($_POST['site_url_admin']);
	$site_url_user=trim($_POST['site_url_user']);
	$site_url_staff=trim($_POST['site_url_staff']);
	$site_url_associate=trim($_POST['site_url_associate']);
	$site_url_accountant=trim($_POST['site_url_accountant']);
	
	$f=trim($_POST['f']);
	$l=trim($_POST['l']);
	$t=trim($_POST['t']);
	$y=trim($_POST['y']);
	$g=trim($_POST['g']);
	$webmail=trim($_POST['webmail']);
	$mpass=trim($_POST['mpass']);
	$host=trim($_POST['host']);
	$port=trim($_POST['port']);
	$msg_typ=trim($_POST['msg_typ']);
	$msg_contact=trim($_POST['msg_contact']);
	$msg_pass=trim($_POST['msg_pass']);
	$msg_sender_id=trim($_POST['msg_sender_id']);
	
	$rate_of_interest=trim($_POST['rate_of_interest']);
	$gst=trim($_POST['gst']);
	if($_SESSION['master_role']=='Developer')
	{ 
    //echo "update tbl_setting  set site_url_admin='".trim($_POST['site_url_admin'])."', site_url_user='$site_url_user', site_url_staff='$site_url_staff', site_url_associate='$site_url_associate', site_url_accountant='$site_url_accountant', site_url='".trim($_POST['site_url'])."', site_name='$site_name', site_short_name='$site_short_name',  site_admin_title='$site_admin_title', email='$email', title='$title', mobile='".$_POST['mobile']."', phone='".$_POST['phone']."', address='".$address."', fax='".$fax."', google_map='".$google_map."', f='".$f."', l='".$l."', t='".$t."', y='".$y."', g='".$g."', webmail='$webmail', mpass='$mpass', host='$host',port='$port',  `msg_typ`='$msg_typ' , `msg_contact`='$msg_contact', `msg_pass` ='$msg_pass',  `msg_sender_id` ='$msg_sender_id' , rate_of_interest='$rate_of_interest' , gst='$gst'";
		$qr=mysqli_query($DB_LINK,"update tbl_setting  set site_url_admin='".trim($_POST['site_url_admin'])."', site_url_user='$site_url_user', site_url_staff='$site_url_staff', site_url_associate='$site_url_associate', site_url_accountant='$site_url_accountant', site_url='".trim($_POST['site_url'])."', site_name='$site_name', site_short_name='$site_short_name',  site_admin_title='$site_admin_title', email='$email', title='$title', mobile='".$_POST['mobile']."', phone='".$_POST['phone']."', address='".$address."', fax='".$fax."', google_map='".$google_map."', f='".$f."', l='".$l."', t='".$t."', y='".$y."', g='".$g."', webmail='$webmail', mpass='$mpass', host='$host',port='$port',  `msg_typ`='$msg_typ' , `msg_contact`='$msg_contact', `msg_pass` ='$msg_pass',  `msg_sender_id` ='$msg_sender_id' , rate_of_interest='$rate_of_interest' , gst='$gst'");
 		
		$_SESSION['suc_msg']="Updated successfully";
 		header("Location: setting");
		exit;
	}
	else if($_SESSION['master_role']=='Admin')
	{
		$qr=mysqli_query($DB_LINK,"update tbl_setting  set site_name='$site_name', email='$email', title='$title', mobile='".$_POST['mobile']."', phone='".$_POST['phone']."', address='".$address."', fax='".$fax."', f='".$f."', l='".$l."', t='".$t."', y='".$y."', g='".$g."', rate_of_interest='$rate_of_interest' , gst='$gst' ");
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
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Name </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Name" class="form-control" name="site_name" value="<?php if(isset($row['site_name'])) echo ($row['site_name']); ?>" required   />
                </div>
              </div>
              <?php if($_SESSION['master_role']=='Developer'){ ?>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Short Name </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Short Name" class="form-control" name="site_url_user" value="<?php if(isset($row['site_url_user'])) echo ($row['site_url_user']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Title Admin </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Title Admin" class="form-control" name="site_url_user" value="<?php if(isset($row['site_url_user'])) echo ($row['site_url_user']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Title(Homepage) </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Title(Homepage)" class="form-control" name="title" value="<?php if(isset($row['title'])) echo ($row['title']); ?>" required   />
                </div>
              </div>
              <?php }?>
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
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Phone </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Phone" class="form-control" name="phone" value="<?php if(isset($row['phone'])) echo ($row['phone']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Fax </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Fax" class="form-control" name="fax" value="<?php if(isset($row['fax'])) echo ($row['fax']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Address </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Address" class="form-control" name="address" value="<?php if(isset($row['address'])) echo ($row['address']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" >EMI ( Rate of Interest ) <i class="ace-icon fa fa-percent bigger-110"></i> </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Rate of Interest" class="form-control" name="rate_of_interest" value="<?php if(isset($row['rate_of_interest'])) echo ($row['rate_of_interest']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > GST <i class="ace-icon fa fa-percent bigger-110"></i> </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter GST" class="form-control" name="gst" value="<?php if(isset($row['gst'])) echo ($row['gst']); ?>" required   />
                </div>
              </div>
              <?php if($_SESSION['master_role']=='Developer'){ ?>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Google Map Code </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Google Map Code" class="form-control" name="google_map" value="<?php if(isset($row['google_map'])) echo ($row['google_map']); ?>" />
                </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Url" class="form-control" name="site_url" value="<?php if(isset($row['site_url'])) echo ($row['site_url']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Admin Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Admin Url" class="form-control" name="site_url_admin" value="<?php if(isset($row['site_url_admin'])) echo ($row['site_url_admin']); ?>" required   />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site User Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site User Url" class="form-control" name="site_url_user" value="<?php if(isset($row['site_url_user'])) echo ($row['site_url_user']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Accountant Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Accountant Url" class="form-control" name="site_url_accountant" value="<?php if(isset($row['site_url_accountant'])) echo ($row['site_url_accountant']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Staff Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Staff Url" class="form-control" name="site_url_staff" value="<?php if(isset($row['site_url_staff'])) echo ($row['site_url_staff']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Site Associate Url </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Site Associate Url" class="form-control" name="site_url_associate" value="<?php if(isset($row['site_url_associate'])) echo ($row['site_url_associate']); ?>" />
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
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Webmail Email Id </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Webmail Email Id" class="form-control" name="webmail" value="<?php if(isset($row['webmail'])) echo ($row['webmail']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Password </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Password" class="form-control" name="mpass" value="<?php if(isset($row['mpass'])) echo ($row['mpass']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Host </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Host" class="form-control" name="host" value="<?php if(isset($row['host'])) echo ($row['host']); ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" > Port </label>
                <div class="col-sm-9">
                  <input type="text" placeholder="Enter Port" class="form-control" name="port" value="<?php if(isset($row['port'])) echo ($row['port']); ?>" />
                </div>
              </div>
              <?php }?>
              <div class="hr-line-dashed"></div>
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