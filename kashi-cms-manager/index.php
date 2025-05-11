<?php ob_start(); include('con_base/functions.inc.php'); master_main();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: Dashboard</title>
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
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index.php">Home</a> </li>
          <li class="active">Dashboard</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1   style="
          padding: 50px !important;
          background: rgb(2,0,36);
          background: linear-gradient(90deg, rgb(255,150,150) 0%, rgba(9,121,19,0.38) 48%, rgba(0,212,255,0.34) 100%);
color: #fff3cd;"  >
											<img src="assets/images/logo.png" alt="<?php echo $SITE_NAME;?>" width="100%">
	          <br>

											Today Date : <?php echo date("l, F jS, Y");?>
              <small  style="color: #ffffff;">
															<!--You will logout --><?php /*echo logout_time(); */echo '<br>Login Time : '.date_time_only(date("j M Y h:i:s A",$_SESSION['CREATED']));?>  </small>
          </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
              <div class="col-sm-6">
                <div class="widget-box  ">
                  <div class="widget-header widget-header-flat">
                    <h4 class="widget-title lighter"> <i class="ace-icon fa fa-bell icon-animated-bell"></i> Top Inquiry Alert</h4>
                    <div class="widget-toolbar"> <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a> </div>
                  </div>
                  <div class="widget-body">
                    <div class="widget-main no-padding">
                      <table class="table table-bordered table-striped">
                      <?php
                       $qry=mysqli_query($DB_LINK,"select * from tbl_customer    order by id desc limit 0,3") ;
					   if(mysqli_num_rows($qry) > 0){
					   ?>
                     
                        <thead class="thin-border-bottom">
                          <tr>
                              <th>#</th>
                              <th>Interest</th>
                              <th>Contact Person</th>
                              <th>On Date</th></tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
				foreach($qry as $row)
				{
					?>
                          <tr>
                              <td><?php echo $i;?></td>
                              <td><?php  echo $row['message']; ?></td>
                              <td><?php if($row['name']!='') echo $row['name']; ?>
                                  <?php if($row['contact']!='') echo '<br>'.$row['contact']; ?>
                                  <?php if($row['email']!='') echo '<br>'.$row['email']; ?>
                               </td>
                              <td><?php echo  date_dmy($row['created_at']);?></td>
                          </tr>
                        <?php $i++; } ?>
                      </tbody>
                      <?php } else{?>
                     <tbody>
                    <tr>
                    <td colspan="4">
                    	<div class="text-center" style="color:#F00;">
                        <?php echo "Currently no record available";?>
                        </div>
                    </td>
                    </tr>
                    </tbody>
                    <?php }?>
                      </table>
                    </div>
                    <!-- /.widget-main -->
                  </div>
                  <!-- /.widget-body -->
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="widget-box">
                    <div class="widget-header widget-header-flat">
                      <h4 class="widget-title smaller"> <i class="ace-icon fa fa-bell icon-animated-bell"></i> Email Subscription Alerts </h4>
                      <div class="widget-toolbar">
                          <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a> </div>
                    </div>
                    <div class="widget-body">
                      <div class="widget-main no-padding">
                        <table class="table table-bordered table-striped">
                      <?php 
					$qry=mysqli_query($DB_LINK,"select * from tbl_newsletter order by id desc limit 0,3") ;
					  if(mysqli_num_rows($qry) > 0){
						  ?>
                        <thead class="thin-border-bottom">
                          <tr>
                              <th>Sr.No.</th>
                              <th>Email</th>
                              <th>On Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
					  foreach($qry as $row)
					  {
					  ?>
                          <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $row['email'];?></td>
                              <td><?php echo date_dmy($row['subscription_date']);?></td>
                          </tr>
                        <?php $i++;}?>
                      </tbody>
                     <?php } else{?>
                     <tbody>
                    <tr>
                    <td colspan="4">
                    	<div class="text-center" style="color:#F00;">
                        <?php echo "Currently no record available";?>
                        </div>
                    </td>
                    </tr>
                    </tbody>
                    <?php }?>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <!-- /.row -->
  </div>
  <!-- /.page-content -->
  <!-- /.main-content -->
  <?php include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
ob_end_flush();
?>