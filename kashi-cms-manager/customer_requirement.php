<?php global $PDO_LINK;
ob_start();
include('con_base/functions.inc.php');
master_main();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>Customer Requirements :: <?php echo $SITE_NAME; ?></title>
  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <?php include("include/header_file.php"); ?>
</head>

<body class="no-skin">
  <?php include('include/header.php'); ?>
  <?php include('include/sidemenu.php'); ?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Customer Requirements</a></li>
          <li class="active">Customer Requirements Listing</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
        <div class="page-header">
          <h1> Customer Requirements Listing </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
            <table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>

                  <th>Name</th>
                  <th>Phone</th>
                  <th>Event Name</th>
                  <th>Event Date</th>
                  <th>No. of Guests</th>
                  <th>Message</th>
                  <th>DOR</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $qry = $PDO_LINK->prepare("SELECT * FROM tbl_customer_requirements ORDER BY id ASC");
                $qry->execute();
                foreach ($qry as $row) {
                ?>
                  <tr class="table-activity">
                    <td><?php echo $i; ?></td>
                    <td><?php echo ($row['cus_name']); ?></td>
                    <td><?php echo ($row['cus_phone']); ?></td>
                    <td><?php echo ($row['event_name']); ?></td>
                    <td><?php echo ($row['event_date']); ?></td> 
                    <td><?php echo ($row['guests']); ?></td> 
                    <td><?php echo data_cutter($row['cus_msg'],35); ?></td> 
                    <td><?php echo ($row['DOR']); ?></td> 
                  </tr>
                <?php $i++; 
                 } ?>
              </tbody>

            </table>
            
            <div>

            </div>
          </div>
        </div>

     
      </div>
      <!-- /.page-content -->
    </div>
    <!-- /.main-content -->
    <?php include('include/footer.php'); ?>
    <?php include("include/footer_file.php"); ?>
     
</body>

</html>
 