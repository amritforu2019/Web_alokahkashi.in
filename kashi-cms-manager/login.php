<?php ob_start();
require_once "con_base/functions.inc.php";

if(isset($_POST['Login']))
{
	$previous_pg=trim($_POST['previous_pg']);
	if($previous_pg=='') { 	$previous_pg="index";  }
	
	$tmpuserid=$_POST['loginid'];
	$tmppassword=enc($_POST['password']);
	  $sql = "select * from tbl_login where user='$tmpuserid' ";
 //and pass='$tmppassword' and (role='Admin' or role='Developer' or role='User')
	$result=mysqli_query($DB_LINK,$sql);
	$GetRows=mysqli_num_rows($result);
 
	if($GetRows>0)
	{	
		$line=mysqli_fetch_array($result);			
		if($tmppassword==$line['pass'])
	    {		 

         ///// For 30 Min Login Validation'//////
		 $_SESSION['CREATED'] = time();

		 
		//ip_store($line['role'], $_POST['loginid']); 
		  $sess_admin_id=strtolower($tmpuserid);
		$_SESSION['session_master']=$sess_admin_id;
		$_SESSION['master_username']=$line['username'];
		$_SESSION['master_role']=$line['role'];
		$_SESSION['master_role_id']=$line['rolid'];
		$_SESSION['master_userid']=$line['id'];
		//ip_store($ip);
		
		$_SESSION['msg']=array('info', 'Login Successfully');
		header("location:".$previous_pg);
		exit();
	}
	else
	{   
		$_SESSION['msg']=array('warning', 'Please Enter Valid Username/Password');
		header("location:sign-in");
		exit();
	}
}
else
{   
	$_SESSION['msg']=array('warning', 'Please Enter Valid Username/Password');
	header("location:sign-in");
	exit();
}
}
mysqli_close($DB_LINK);
ob_end_flush();
?>