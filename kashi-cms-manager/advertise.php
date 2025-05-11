<?php ob_start(); include('con_base/functions.inc.php');   master_main();


require_once 'get_categories.php';
 
if(isset($_GET['del']))
{
 
  
	
	
	$qry=mysqli_query($DB_LINK,"select image from tbl_adv where id=".$_GET['del']) or die(mysqli_error());    
	$row=mysqli_fetch_array($qry);	
	unlink('assets/upload/adv/'.$row['image']);
	
	  mysqli_query($DB_LINK,"delete from tbl_adv where id=".$_GET['del']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Deleted Successfully');
	
	header("location:advertise");
	exit;
}
if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update tbl_adv set status=0 where id=".$_GET['ban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Banned Successfully');
   header("location:advertise");
	exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update tbl_adv set status=1 where id=".$_GET['unban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Unbanned Successfully');
   header("location:advertise");
	exit;
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Advertise :: <?php echo $SITE_NAME;?></title>
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
           
          <li class="active">Advertise</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
        <div class="page-content">
        <div class="page-header">
          <h1> Advertise  </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="advertise_reg"  class="btn btn-primary various fancybox.iframe" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
              <table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>Sr. No.</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>URL</th>
                      <th>Post Date</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php
                $count=1; 
				$qry=mysqli_query($DB_LINK,"select * from tbl_adv  order by id desc") or die(mysqli_error());
                foreach($qry as $row)
                {
                  ?>
                    <tr class="table-activity">
                      <td><?php echo $count;?></td>
                      <td> <?php echo strtoupper($row['title']);?>   
                      <div class="tools action-buttons">  
                       
                       <?php if($row['status']==1){ ?>
                        <a href="advertise.php?ban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>
                        <?php } else  { ?>
                        <a href="advertise.php?unban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>
                        <?php }?>
                       <a class="red" onClick="return del(<?php echo $row['id'];?>, 'advertise')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a> 
                       </div>
                      </td>
                      <td><a class="various fancybox.iframe blue" href="assets/upload/adv/<?php echo $row['image'];?>" ><img src="assets/upload/adv/<?php echo $row['image'];?>"  style="border-radius: 0%;max-width: 100px;"></a></td>
                      <td><?php echo $row['ext_link'];?></td>
                      <td><?php echo date_dm($row['autodate']);?></td>
                        
                     </tr>
                    <?php $count++; 
					 
					
					} ?>
                </tbody>
                
              </table>
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