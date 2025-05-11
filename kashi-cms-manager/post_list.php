<?php ob_start(); include('con_base/functions.inc.php');   master_main();

if(isset($_GET['del']))
{
	
	$qry=mysqli_query($DB_LINK,"select image from tbl_posts where id=".$_GET['del']) or die(mysqli_error());    
	$row=mysqli_fetch_array($qry);	
	unlink('assets/upload/posts/'.$row['image']);
	
    mysqli_query($DB_LINK,"delete from tbl_posts where id=".$_GET['del']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Deleted Successfully');
    header("location:post_list");
	exit;
}
if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update tbl_posts set status=0 where id=".$_GET['ban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Unpublish Successfully');
    header("Location: post_list");
	exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update tbl_posts set status=1 where id=".$_GET['unban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Published Successfully');
    header("Location: post_list");
	exit;
}
if(isset($_REQUEST['imp_no']))
{
    mysqli_query($DB_LINK,"update tbl_posts set imp=0 where id=".$_GET['imp_no']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Marked as Not Importent Successfully');
    header("Location: post_list");
	exit;
}
if(isset($_REQUEST['imp_yes']))
{
    mysqli_query($DB_LINK,"update tbl_posts set imp=1 where id=".$_GET['imp_yes']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Marked as Importent Successfully');
    header("Location: post_list");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Post List :: <?php echo $SITE_NAME;?></title>
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
          <div class="page-header">
          <h1> Post List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="post_reg"  class="btn btn-primary" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
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
                      <th>Author / Cate.</th>
                      
                      <th><i class="menu-icon fa fa-image"></i> Gallery</th>
                      <th>Date</th>
                      <th>Publish</th>
                     <!-- <th>Imp</th>-->
                      <th>Image</th>
                       <th>Image 2</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				$i=1; 
				$qry=mysqli_query($DB_LINK,"select * from tbl_posts order by id desc");
				foreach($qry as $row)
				{  
					if($row['month']=='0')
					{
 mysqli_query($DB_LINK,"update tbl_posts set month='".date('m',strtotime($row['regdate']))."' where id=".$row['id']);
					}
					if($row['year']=='0')
					{
 mysqli_query($DB_LINK,"update tbl_posts set year='".date('Y',strtotime($row['regdate']))."' where id=".$row['id']) ;
					}
					?>
                    <tr class="table-activity">
                      <td><?php echo $i;?></td>
                      <td><?php echo data_cutter($row['title'],60); ?>
                      <div class="tools action-buttons"> <a href="post_edit?edit=<?php echo $row['id'];?>" title="Edit" class="blue"><i class="ace-icon fa fa-pencil bigger-125"></i></a>
                       
                       <?php if($row['status']==1){ ?>
                        <a href="post_list?ban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>
                        <?php } else  { ?>
                        <a href="post_list?unban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>
                        <?php }?>
                       <a class="red"onClick="return del(<?php echo $row['id'];?>, 'post_list')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a> 
                       </div>
                      </td>
                      <td>By : 
					  <?php
					  if($row['posted_by']=='ADMIN')
					  {
						  echo 'Admin';
					  }
					  if($row['posted_by']=='OTHER')
					  {
						  echo $row['posted_by'].'-'.$row['other'];
					  }
					  
					  /*if(isset($row['userid'])){
					  $sql=mysqli_query($DB_LINK,"select * from tbl_login where id=".$row['userid']) or die(mysqli_error());
					  $get_data=mysqli_fetch_array($sql);
					  echo $get_data['username'];
					  }*/
					  ?><br>
                      <?php  
					$qry=mysqli_query($DB_LINK,"select * from tbl_category where id='".$row['category_id']."' ")or die(mysqli_error());
				  	foreach($qry as $ct){
						 echo '<strong>Cate. : </strong>'.ucwords($ct['title']) ;
					}
					?>
                     <?php  
					$qry=mysqli_query($DB_LINK,"select * from tbl_category where id='".$row['sub_category_id']."' ")or die(mysqli_error());
				  	foreach($qry as $ct){
						 echo '<br><strong>Sub Cate. : </strong>'.ucwords($ct['title']) ;
					}
					?>
                      </td>
                      
                      <td>
                      <?php
					  $sql=mysqli_query($DB_LINK,"select * from tbl_comment where post_id=".$row['id']) or die(mysqli_error());
					  $count=mysqli_num_rows($sql);
					  $get_data=mysqli_fetch_array($sql);
					  if($count>0){echo '<a href=comment_list?cmt='.$get_data['id'].' title="Comment"><i class="menu-icon fa fa-comment"></i> '.$count.'</a>';}
					  ?>
                      
                      <br>
                      <a href="image_list?cmt=<?php echo $row['id'];?>">Add More</a>
                      </td>
                      <td><?php echo  date('d/m/y', strtotime($row['regdate'])).'<br>';$time_ago=$row['autodate'];$time_elapsed = timeAgo($time_ago);?></td>
                      
                      <td><?php
					    
					   if($row['status']==0) 
					   { 
					   echo '<a href="post_list.php?unban='.$row['id'].'" class="red"><strong>NO</strong></a>'; 
					   } else if($row['status']==1) 
					   { 
					   echo '<a href="post_list.php?ban='.$row['id'].'" class="green"><strong>YES</strong></a>'; 
					   } 
					    ?></td>
                        
                         <?php /*?><td><?php
					    
					   if($row['imp']==0) 
					   { 
					   echo '<a href="post_list.php?imp_yes='.$row['id'].'" class="red"><strong>NO</strong></a>'; 
					   } 
					   else 
					   if($row['imp']==1) 
					   { 
					   echo '<a href="post_list.php?imp_no='.$row['id'].'" class="green"><strong>YES</strong></a>'; 
					   } 
					    ?></td><?php */?>
                        
                        <td><?php
					    
					   if($row['image']=='') 
					   { 
					   echo 'No Image..'; 
					   } 
					   else 					    
					   { 
					   echo '<a class="various fancybox.iframe blue" href="assets/upload/posts/'.$row['image'].'" ><img src="assets/upload/posts/'.$row['image'].'"  style="border-radius: 0%;max-width: 100px;"></a>';
					   } 
					    ?></td>
                        
                        <td><?php
					    
					   if($row['image2']=='') 
					   { 
					   echo 'No Image..'; 
					   } 
					   else 					    
					   { 
					   echo '<a class="various fancybox.iframe blue" href="assets/upload/posts/'.$row['image2'].'" ><img src="assets/upload/posts/'.$row['image2'].'"  style="border-radius: 0%;max-width: 100px;"></a>';
					   } 
					    ?></td>
                        
                        
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