<?php ob_start();

require_once("con_base/functions.inc.php");

include "app/config.php";

include "app/detect.php";

//echo 'Pg'.$page_name;
$isHide=0;
if ($page_name=='')
{ include $browser_t.'/index.php'; exit; }

else if ($page_name=='index.html')
{ include $browser_t.'/index.php'; exit; }

else if ($page_name=='home')
{ include $browser_t.'/index.php'; exit; }

else if ($page_name=='about.html')
{ include $browser_t.'/about.php'; exit; }

 else if ($page_name=='room.html')
{ include $browser_t.'/room.php'; exit; }

 else if ($page_name=='restaurant.html')
{ include $browser_t.'/restaurant.php'; exit; }

 else if ($page_name=='banquet_hall.html')
{ include $browser_t.'/banquethall.php'; exit; }

 
 else if ($page_name=='gallery.html')
{ include $browser_t.'/gallery.php'; exit; }
 else if ($page_name=='room_details.html')
{ include $browser_t.'/room_details.php'; exit; }

 else if ($page_name=='contact.html')
{ include $browser_t.'/contact.php'; exit; }

 

 

$getdata_qry_common_page=mysqli_query($DB_LINK,"select * from tbl_category where status=1 and parent_id=307");
while($get_data_common_page=mysqli_fetch_array($getdata_qry_common_page))
{
    if ($page_name==$get_data_common_page['url'])
    {
        include $browser_t.'/common-page.php';
        exit;
    }
}

$getdata_qry_common_page=mysqli_query($DB_LINK,"select * from tbl_category where status=1 and parent_id=262");
while($get_data_common_page=mysqli_fetch_array($getdata_qry_common_page))
{
    if ($page_name==$get_data_common_page['url'])
    {
        include $browser_t.'/common-page.php';
        exit;
    }
}


$getdata_qry_common_page=mysqli_query($DB_LINK,"select * from tbl_category where status=1 and parent_id=367");
while($get_data_common_page=mysqli_fetch_array($getdata_qry_common_page))
{
    if ($page_name==$get_data_common_page['url'])
    {
        include $browser_t.'/common-page.php';
        exit;
    }
}

$qry_blog="select * from tbl_category where parent_id=125 and status=1 ";
$sql_blog=mysqli_query($DB_LINK,$qry_blog) or die(mysqli_error($DB_LINK));
foreach($sql_blog as $data_blog)
{

         if ($page_name==$data_blog['url'])
        {

            $parent_id_for_blog=$data_blog['id'];
            include $browser_t.'/blog-page.php';
            exit;
        }

}

$qry_blog="select * from tbl_category where parent_id=154 and status=1 ";
$sql_blog=mysqli_query($DB_LINK,$qry_blog) or die(mysqli_error($DB_LINK));
foreach($sql_blog as $data_blog)
{

    $qry_blog_data = "select * from tbl_category where parent_id='" . $data_blog['id'] . "' and status='1'  ";
    $sql_blog_data = mysqli_query($DB_LINK, $qry_blog_data) or die(mysqli_error($DB_LINK));
    foreach ($sql_blog_data as $data_blog_data) {
        if ($page_name==$data_blog_data['url'])
        {
            include $browser_t.'/blog-details-page.php';
            exit;
        }
    }
}


$qry_services = "select * from tbl_rooms where status=1 ";
$sql_services = mysqli_query($DB_LINK, $qry_services) or die(mysqli_error($DB_LINK));
foreach ($sql_services as $data_services) {
    if ($page_name==$data_services['url'])
    {
        include $browser_t.'/room_details.php';
        exit;
    }
}



mysqli_close($DB_LINK);
ob_end_flush();
?>