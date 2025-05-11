<?php ob_start(); include('con_base/functions.inc.php');master_main();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>View Comments ::<?php echo $SITE_NAME?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<div class="main-container">
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <h3 class="header smaller lighter blue">View Comments</h3>
            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
              <table id="no-more-tables" style="width: 100%">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                <form action="" method="post" name="cform">
                  <?php $count=1;
				if(isset($_GET['view']))
				{
					$qry=mysqli_query($DB_LINK,"select * from tbl_comment_detail where uid=".$_GET['view']) ;
				}
				if(mysqli_num_rows($qry) > 0){
				foreach($qry as $row)
				{ 
					$ct=mysqli_query($DB_LINK,"select * from tbl_comment co, tbl_customer cu where co.uid=cu.id and co.uid=".$_GET['customer']) ;
					$usr=mysqli_fetch_array($ct);
					mysqli_query($DB_LINK, "update tbl_comment_detail set adm_read_flag=1 where uid=".$_GET['view']);
				?>
                  <tr>
                    <td><?php echo $count;?></td>
                    <td><?php if($row['cfrom']==$_GET['customer']){echo $usr['name'];}else{echo $row['cfrom'];}?></td>
                    <td><?php if($row['cto']==$_GET['customer']){echo $usr['name'];}else{echo $row['cto'];}?></td>
                    <td><?php echo $row['msg'];?></td>
                    <td><?php echo date_dm($row['regdate']);?></td>
                  </tr>
                  <?php  $count++;} } else{?>
                  <tr>
                    <td colspan="10"><div class="text-center" style="color:#F00;"> <?php echo "Currently no record available";?> </div></td>
                  </tr>
                  <?php }?>
                </form>
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
</div>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>