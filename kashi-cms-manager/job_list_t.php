<?php ob_start(); include('con_base/functions.inc.php');   master_main();

if(isset($_GET['del']))
{

   $qry=mysqli_query($DB_LINK,"select attachment from tbl_jobs where id=".$_GET['del']) or die(mysqli_error());
        $row=mysqli_fetch_array($qry);
        if($row['attachment']!='')
        {
        unlink('assets/upload/attachment/'.$row['attachment']);
        }

    mysqli_query($DB_LINK,"delete from tbl_jobs where id=".$_GET['del']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Deleted Successfully');
    header("location:job_list_t");
	exit;
}
if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update tbl_jobs set status=0 where id=".$_GET['ban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Unpublish Successfully');
    header("Location: job_list_t");
	exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update tbl_jobs set status=1 where id=".$_GET['unban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Published Successfully');
    header("Location: job_list_t");
	exit;
}
if(isset($_REQUEST['imp_no']))
{
    mysqli_query($DB_LINK,"update tbl_jobs set imp=0 where id=".$_GET['imp_no']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Marked as Not Importent Successfully');
    header("Location: job_list_t");
	exit;
}
if(isset($_REQUEST['imp_yes']))
{
    mysqli_query($DB_LINK,"update tbl_jobs set imp=1 where id=".$_GET['imp_yes']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Marked as Importent Successfully');
    header("Location: job_list_t");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Trainees Jobs List :: <?php echo $SITE_NAME;?></title>
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
  <div  class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Jobs & Trainees</a></li>
          <li class="active">Trainees Jobs List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1>Trainees Jobs List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="job_reg_t"  class="btn btn-primary" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
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
                      
                      <th>Title</th>
                      <th>Contact Person</th>
                      
                      <th>Address</th>
                       
                      <th>Publish</th>
                      <th>Imp</th>
                      <th>Description</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php
				$i=1; 
				$qry=mysqli_query($DB_LINK,"select * from tbl_jobs where typ='trainees' order by id desc");
				foreach($qry as $row)
				{  
					
					?>
                    <tr class="table-activity">
                      <td><?php echo $i;?></td>
                      <td><strong><?php echo ($row['title']); ?></strong><br>
                      In : <?php echo $row['category'];   if($row['last_date']!='0000-00-00') {  ?><br>
                      <strong>Last Date :</strong> <?php  echo  date('d/m/y', strtotime($row['last_date'])) ;  } ?>
                      <div class="tools action-buttons"> <a href="job_edit_t?edit=<?php echo $row['id'];?>" title="Edit" class="blue"><i class="ace-icon fa fa-pencil bigger-125"></i></a>
                       
                       <?php if($row['status']==1){ ?>
                        <a href="job_list_t?ban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>
                        <?php } else  { ?>
                        <a href="job_list_t?unban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>
                        <?php }?>
                       <a class="red" onClick="return del(<?php echo $row['id'];?>, 'job_list_t')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a> 
                       </div>
                      </td>
                      <td><?php if($row['c_name']!='') echo $row['c_name']; ?>
                      <?php if($row['contact']!='') echo '<br>'.$row['contact']; ?>
                      <?php if($row['email']!='') echo '<br>'.$row['email']; ?>
                      </td>
                      
                      <td><a href="#" title="<?php if($row['addr']!='') echo $row['addr']; ?>">View</a>
                      <?php if($row['city']!='') echo '<br>'.$row['city']; ?>
                      </td>
                       
                      <td><?php echo  date('d/m/y', strtotime($row['autodate'])).'<br>';$time_ago=$row['autodate'];$time_elapsed = timeAgo($time_ago);?></td>
                      
                       
                        
                         <td><?php
					    
					   if($row['imp']==0) 
					   { 
					   echo '<a href="job_list_t.php?imp_yes='.$row['id'].'" class="red"><strong>NO</strong></a>'; 
					   } 
					   else 
					   if($row['imp']==1) 
					   { 
					   echo '<a href="job_list_t.php?imp_no='.$row['id'].'" class="green"><strong>YES</strong></a>'; 
					   } 
					    ?></td>
                        <td><a href="#" title="<?php if($row['addr']!='') echo $row['descr']; ?>">View</a> 
<?php if($row['attachment']!='') 
             { 
             echo '<br><a target="_blank" href="assets/upload/attachment/'.$row['attachment'].'" class="green"><strong>View Attachment</strong></a>';
             } 
              ?>
                        </td> 
                        
                         
                        
                        
                     </tr>
                    <?php $i++; } ?>
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