<?php ob_start(); include('con_base/functions.inc.php'); master_main();

if(isset($_POST['submit']))
{
	if(mysqli_query($DB_LINK, "update tbl_comment set reply_id='".$_SESSION['master_userid']."', reply='$_POST[msg]', lastupdate='".date('Y-m-d')."' where id=".$_GET['reply']))
	
	/*mysqli_query($DB_LINK, "insert into tbl_comment_detail set uid='".$_GET[ 'reply' ]."', cfrom='".$_SESSION['master_userid']."', cto='".$_GET[ 'email' ]."', msg='$_POST[msg]', adm_read_flag=1, regdate='".date('Y-m-d')."', userid='".$_SESSION['master_userid']."', ipaddress='".$_SERVER['REMOTE_ADDR']."'");*/
    //if(mysqli_insert_id($DB_LINK))
	{
		$_SESSION['msg']=array('success', 'Submitted Successfully');
    	header("location:comment_list");
		exit;
	}
	else
	{
		$_SESSION['msg']=array('error', 'Oops.. Something went wrong');
    	header("location:comment_list");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Reply on Comment ::<?php echo $SITE_NAME?></title>
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
          <h1> Reply on Comment</h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" target="_parent">
              <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="attachment"> Message </label>
                <div class="col-sm-9">
                  <textarea rows="5" name="msg" class="form-control" placeholder="Message" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3 control-label no-padding-right"></div>
                <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
                  <button class="btn btn-info" type="submit" name="submit"> <i class="ace-icon fa fa-reply bigger-110"></i> Reply </button>
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