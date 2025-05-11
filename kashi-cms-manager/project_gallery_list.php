<?php global $PDO_LINK;
ob_start(); include('con_base/functions.inc.php');  
master_main();

if (isset($_GET['del'])) {
 try {
  $qry = $PDO_LINK->prepare("SELECT project_id, image_url, image FROM tbl_project_gallery WHERE id = :id");
  $qry->execute(['id' => $_GET['del']]);
  $row = $qry->fetch(PDO::FETCH_ASSOC);

  if ($row) {
   unlink('../' . $row['image_url'] . $row['image']);

   $stmt = $PDO_LINK->prepare("DELETE FROM tbl_project_gallery WHERE id = :id");
   $stmt->execute(['id' => $_GET['del']]);

   $_SESSION['msg'] = array('success', 'Deleted Successfully');
   header("location:project_gallery_list?project_id=" . $row['project_id']);
   exit;
  } else {
   $_SESSION['msg'] = array('error', 'Record not found');
   header("location:project_gallery_list?project_id=" . $_GET['project_id']);
   exit;
  }
 } catch (Exception $e) {
  $_SESSION['msg'] = array('error', 'An error occurred: ' . $e->getMessage());
  header("location:project_gallery_list?project_id=" . $_GET['project_id']);
  exit;
 }
} 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Project Gallery List :: <?php echo $SITE_NAME;?></title>
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
          <li><a href="">Projects</a></li>
          <li class="active">Project Gallery List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1> Project Gallery List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="project_gallery?project_id=<?php echo $_GET['project_id'];?>"
                                                class="btn
          btn-primary"  > <i
             class="fa fa-plus"></i> Add New </a> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div><table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>#</th>
                      
                   
                      <th><i class="menu-icon fa fa-image"></i> Image</th>
                   <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php
				$i=1;
                $qry = $PDO_LINK->prepare("SELECT * FROM tbl_project_gallery WHERE project_id = :project_id ORDER BY project_id DESC");
                $qry->execute(['project_id' => $_GET['project_id']]);
                foreach ($qry as $row) {
                 ?>
                 <tr class="table-activity">
                  <td><?php echo $i; ?></td>
                  <td>
                   <?php
                   if ($row['image'] == '') {
                    echo 'No Image..';
                   } else {
                    echo '<a class="various fancybox.iframe blue" href="' . $row['image_url'] . $row['image'] . '" ><img
          src="' . $row['image_url'] . $row['image'] . '"  style="border-radius: 0%;max-width: 100px;"></a>';
                   }
                   ?>
                  </td>
                  <td>
                   <a class="red" onClick="return del(<?php echo $row['id']; ?>, 'project_gallery_list')"> <i class="ace-icon
         fa fa-times bigger-125" title="Delete"></i> Delete Image </a>
                  </td>
                 </tr>
                 <?php $i++;
                } ?>
                </tbody>
                
              </table>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
              
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