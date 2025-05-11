<?php
global $getCurrentHost,$getCurrentURL;
  $getCurrentHost=$_SERVER['HTTP_HOST'];
$getCurrentURL="";
//echo 'website is under construction... ';
//exit;
$host = "localhost";
if($getCurrentHost=='localhost') {
 $username = "root";
 $password = "";
}
else if($getCurrentHost=='192.168.1.2')
{
	$username = "root";
	$password = "";
}
else
{
	$username = "u144885197_user_kashi";
	$password = "L~tjl*P0";
}

/////////////////////////////////
$db = "u144885197_alokah";
global $DB_LINK;
// Create connection
$DB_LINK = new mysqli($host, $username, $password, $db);
if (!$DB_LINK)
{
	die("Server Busy kindly wait.." . mysqli_connect_error());
	exit;
}


///////@nd DB
///
/*$host1 = "localhost";
if($getCurrentHost=='localhost')
{
    $username1 = "root";
    $password1 = "";
}
else
{
    $username1 = "afct_user";
    $password1 = "bqe5%N48";
}

/////////////////////////////////
$db1 = "afct_db";
global $DB_LINK1;
// Create connection
$DB_LINK1 = new mysqli($host1, $username1, $password1, $db1);
if (!$DB_LINK1)
{
    die("Server Busy kindly wait.." . mysqli_connect_error());
    exit;
}
*/

?>