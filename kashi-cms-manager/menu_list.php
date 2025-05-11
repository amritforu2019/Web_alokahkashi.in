<?php ob_start(); include('con_base/functions.inc.php');   master_main();

if(isset($_POST['update'])) 
{
    if(mysqli_query($DB_LINK, "update tbl_menu set title='".ucwords($_POST['title'])."', url='$_POST[url]', lastupdate='".date('Y-m-d')."', userid=".$_SESSION['master_userid'].", ipaddress='".$_SERVER['REMOTE_ADDR']."' where id=".$_POST['edit']))
    {
		$_SESSION['msg']=array('success', 'Updated Successfully');
    	header("location:menu_list");
		exit;
	}
	else
	{
		$_SESSION['msg']=array('error', 'Oosp.. Something went wrong');
    	header("location:menu_list");
		exit;
	}
}

if(isset($_GET['del']))
{
    mysqli_query($DB_LINK,"delete from tbl_posts where id=".$_GET['del']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Deleted Successfully');
    header("location:post_list");
	exit;
}
if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update tbl_posts set status=0 where id=".$_GET['ban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Banned Successfully');
    header("Location: post_list");
	exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update tbl_posts set status=1 where id=".$_GET['unban']) or die(mysqli_error());
	$_SESSION['suc_msg']="Unbanned Successfully";
	$_SESSION['msg']=array('success', 'Unbanned Successfully');
    header("Location: post_list");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Post List ::<?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
<script type="text/javascript">
function cp(a,b,c)
{
	window.location.href="cust_list?txtsearch="+a+"&fdt="+b+"&tdt="+c;
}
</script>
</head>
<body class="no-skin">
<?php include('include/header.php');?>
<?php include('include/sidemenu.php');?>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
        <li><a href="">Posts</a></li>
        <li class="active">Post List</li>
      </ul>
      <!-- /.breadcrumb -->
    </div>
    <div class="page-content">
      <!-- /.page-header -->
      <div class="page-content">
        <div class="page-header">
          <h1> Post List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="menu_reg"  class="btn btn-primary various fancybox.iframe" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div class="row">
              <div class="col-sm-12">
                <form class="form-horizontal" id="validation-form" role="form" method="post" action="" enctype="multipart/form-data">
                  <h3 class="row header smaller lighter blue"> <span class="col-xs-6"> Menu List </span>
                    <!-- /.col -->
                  </h3>
                  <div id="accordion" class="accordion-style1 panel-group">
                  <?php
				$i=1; 
				$qry=mysqli_query($DB_LINK,"select * from tbl_menu order by title asc");
				foreach($qry as $row)
				{  
					
					?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['id'];?>"> <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i> &nbsp;<?php echo $row['title'];?> </a> </h4>
                      </div>
                      <div class="panel-collapse collapse" id="<?php echo $row['id'];?>">
                        <div class="panel-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right"> Navigation Label </label>
                            <div class="col-sm-9">
                              <input name="title" type="text" class="form-control text-capitalize" id="title" placeholder="Enter Title" value="<?php echo $row['title'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right"> URL </label>
                            <div class="col-sm-9">
                              <input name="url" type="text" class="form-control" id="url" placeholder="Enter URL" value="<?php echo $row['url'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                    <div class="col-sm-3 control-label no-padding-right"></div>
                    <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
                    <input name="edit" type="hidden" value="<?php echo $row['id'];?>">
                      <button class="btn btn-info" type="submit" name="update" > <i class="ace-icon fa fa-edit bigger-110"></i> Update </button>
                      <button class="btn btn-default" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> Reset</button>
                    </div>
                  </div>
                        </div>
                      </div>
                    </div>
                    <?php $i++; } ?>
                  </div>
                </form>
              </div>
              <!-- /.col -->
            </div>
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