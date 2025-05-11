<?php
session_start();
include("db.config.inc.php");
date_default_timezone_set("Asia/Kolkata");
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
//header("Cache-Control: no-store, must-revalidate");
//header("Pragma: no-cache");
 
//// each client should remember their session id for EXACTLY 1 hour

 
$qry_global=mysqli_query($DB_LINK,"select * from tbl_setting")or die(mysqli_error($DB_LINK));
$global_fetch=mysqli_fetch_array($qry_global);
$SITE_NAME= stripslashes($global_fetch['site_name']);
$SITE_URL= stripslashes($global_fetch['site_url']);
$EMAIL_ID=stripslashes($global_fetch['email']); 
$EMAIL_ID_2=stripslashes($global_fetch['email2']);
$MOBILE=stripslashes($global_fetch['mobile']);
$MOBILE2=stripslashes($global_fetch['mobile2']); 
//$fax=stripslashes($global_fetch['fax']);
$ADDRESS=stripslashes($global_fetch['address']);
$MAP=stripslashes($global_fetch['google_map']);
$F=stripslashes($global_fetch['f']);
$I=stripslashes($global_fetch['l']);
$T=stripslashes($global_fetch['t']);
$Y=stripslashes($global_fetch['y']);
$W=stripslashes($global_fetch['g']);
//$WEBMAIL=stripslashes($global_fetch['webmail']);
//$MPASS=stripslashes($global_fetch['mpass']);
//$HOST=stripslashes($global_fetch['host']);
//$PORT=stripslashes($global_fetch['port']);
//$IS_MENU=stripslashes($global_fetch['is_menu']);
//$msg_contact=stripslashes($global_fetch['msg_contact']);
//$msg_pass=stripslashes($global_fetch['msg_pass']);
//$msg_sender_id=stripslashes($global_fetch['msg_sender_id']);
//$msg_type=stripslashes($global_fetch['msg_typ']);
$SESSION_MIN = 10;
$current_year = date('Y'); 
$ADMIN_HTML_TITLE=stripslashes($global_fetch['site_admin_title']);

//$LAST_BINARY_ID=stripslashes($global_fetch['binary_last_ac']);

function  update_bin_id($m_id)
{
	global $DB_LINK;

	$qry=mysqli_query($DB_LINK,"update tbl_setting set binary_last_ac='$m_id' ");
}

function  update_bin_id_pre($m_id)
{
	global $DB_LINK;

	$qry=mysqli_query($DB_LINK,"update tbl_setting set binary_last_ac_pre='$m_id' ");
}



function  update_bin_id_mem_table($m_id)
{
 global $DB_LINK;
 $qry=mysqli_query($DB_LINK,"update tbl_staff_profile set is_binary_calc='1' where id='$m_id' ");  
}


// function for admin login validation
function validate()
{
	if (time() - $_SESSION['CREATED'] > 1800) 
    {
   		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		header("location:sign-in");
		exit();
	}
}


function master_main()
{
	if(!isset($_SESSION['session_master']))
	{
        session_destroy();
        header("location:sign-in");
		exit();
	}
    if (time() - $_SESSION['CREATED'] > 30) {
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
    }


    if (time() - $_SESSION['CREATED'] > 60)
    {
        // session started more than 30 minutes ago
        session_destroy();
        header("location:sign-in");
        exit();
    }

}

function logout_time()
{
    $endTime = strtotime("+1 minutes", $_SESSION['CREATED']);
    echo date('h:i:s', $endTime);
}

//$_SESSION['CREATED'] = time();  // update creation time

function master_developer()
{
  if("amritforu8896935191"!=$_SESSION['session_master'])
  {
    $_SESSION['msg']=array('error', 'Server error!!');
    header("location:index.php");
    exit;
  }
}


// function for user login validation
function validate_user()
{
	if (time() - $_SESSION['CREATED_USER'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:sign-in");
		exit();
	}
}
function master_user()
{
	if(!isset($_SESSION['session_user']))
	{
		header("location:../login.html");
		exit();
	}
}
// function for staff login validation
function validate_staff()
{
	if (time() - $_SESSION['CREATED_STAFF'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:../login.html");
		exit();
	}
}
function master_staff()
{
	if(!isset($_SESSION['session_staff']))
	{
		//header("location:sign-in");
		//exit();
		header("location:../login.html");
		exit();
	}
}
// function for user login validation
function validate_branch()
{
	if (time() - $_SESSION['CREATED_BRANCH'] > 1800) 
  	{
  		// session started more than 30 minutes ago
    	//session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    	//$_SESSION['CREATED'] = time();  // update creation time
		session_destroy(); 
		header("location:sign-in");
		exit();
	}
}
function master_branch()
{
	if(!isset($_SESSION['session_branch']))
	{
		header("location:sign-in");
		exit();
	}
}
function master_member()
{
if(!isset($_SESSION['session_user'])) {  header("location:../");  exit(); }
}
function master_recruiters()
{
 if(!isset($_SESSION['session_recruiters'])) { header("location:sign-in");  exit(); }
}
function update_kyc()
{
	if($_SESSION['user_uid']=='')
	{
		$_SESSION[ 'warn_msg' ] = "Kindly complete the profile";
		header("Location: ../profile_edit");
		exit;
	}
}
function update_bank()
{
	if($_SESSION['user_bank']=='')
	{
		$_SESSION['warn_msg'] = "Kindly complete the Bank Details";
		header("Location: ../bank_details_edit");
		exit;
	}
}
//SEO URL Friendly
function clean($string) 
{
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

//SEO URL Friendly
function clean_witout_underscore($string)
{
    //$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
// function for filter the string
function normal_filter($val)
{
	return ucfirst(stripslashes($val));
}
function strip_filter($val, $size)
{
	return substr(stripslashes(strip_tags($val)),0,$size);
}
function caps_filter($val)
{
	return strtoupper(stripslashes($val));
}
function normalall_filter($val)
{
	return ucwords(stripslashes($val));
}
function date_dmy($date)
{
	if($date!='' || $date!='0000-00-00 00:00:00')
  	{
  		return date("j M Y h:i A", strtotime($date));
  	}
}

function date_time_only($date)
{
    if($date!='' || $date!='0000-00-00 00:00:00')
    {
        return date("h:i:s A", strtotime($date));
    }
}
function date_dmy_small($date)
{
  	if($date!='' && $date!='0000-00-00')
  	{
  		 return date("j M Y", strtotime($date));
  	}
}
// function to access description form content table
function enc($val)
{
	if($val!='')
	{
		$new_val=base64_encode(base64_encode(base64_encode(base64_encode($val))));
		return $new_val;
	}
}
function dec($val)
{
	if($val!='')
	{
		$org_val=base64_decode(base64_decode(base64_decode(base64_decode($val))));
		return $org_val;
	}
}
function enc_normal($val)
{
	if($val!='')
	{
		$new_val=base64_encode(base64_encode($val));
		return $new_val;
	}
}
function dec_normal($val)
{
	if($val!='')
	{
		$org_val=base64_decode(base64_decode($val));
		return $org_val;
	}
}
 
function show_content($id,$row_name,$DB_LINK)
{
	$grs=mysqli_query($DB_LINK,"select $row_name from tbl_category where id='$id'");
	$row=mysqli_fetch_array($grs);
	return $row[$row_name];
}
 
function data_cutter($data,$cut)
{
	if(strlen(stripslashes($data))>$cut)
	{
		$cutdata=ucfirst(substr(stripslashes($data),0,$cut)).".."; 
	}
	else 
	{
		$cutdata=stripslashes($data); 
	}
	return $cutdata;
}
function data_cutter_clean($data,$cut)
{
	if(strlen(stripslashes($data))>$cut)
	{
		$cutdata=ucfirst(substr(stripslashes($data),0,$cut)); 
	}
	else 
	{
		$cutdata=stripslashes($data); 
	}
	return $cutdata;
}
function date_dm($date)
{
  	if($date!='' && $date!='0000-00-00 00:00:00' && $date!='0000-00-00')
  	{
		return date("j M Y",strtotime($date));
  	}
}
function curPageName() 
{
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$currentPG=curPageName(); 
//session_destroy();
function get_client_ip() 
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function get_ip() 
{
	//Just get the headers if we can or else use the SERVER global
	if ( function_exists( 'apache_request_headers' ) ) 
	{
		$headers = apache_request_headers();
	} else 
	{
			$headers = $_SERVER;
	}
	//Get the forwarded IP if it exists
	if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) 			    {
		$the_ip = $headers['X-Forwarded-For'];
	} 
	elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) 
	{
		$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
	} 
	else 
	{
			
		$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
	}
	return $the_ip;
}
	
function ip_store($log_type,$log_id)
{ 
  	global $DB_LINK;
	$ip=get_ip();
	/*$qry_ip=mysqli_query($DB_LINK,"select * from log_data where ip='$ip'");
	$count_ip=mysqli_num_rows($qry_ip);
	if($count_ip>0)
	{
    	$global_ip=mysqli_fetch_array($qry_ip);
		$ip_open=$global_ip['count']+1;
   		mysqli_query($DB_LINK,"update log_data set count='$ip_open',dt='".date("Y-m-d")."' where ip='$ip'");
	}
	else
	{}*/
 // echo "insert into log_data set  ip='$ip',log_typ='$log_type',log_id='$log_id' "; exit;
	mysqli_query($DB_LINK, "insert into log_data set ip='$ip', log_typ='$log_type', log_id='$log_id'");
	
}
	
// Numbetr to words
/*class number_to_words
{
    public function __construct()
    {
             // initialization values
        $this->_hyphen      = '-';
        $this->_separator   = ', ';
        $this->_negative    = 'negative ';
        $this->_space       = ' ';
        $this->_conjunction = ' ';
        $this->_decimal     = 'point ';
        $this->_rupees      = ' rupees';
        $this->_only        = ' only';
            
        // call array of words
        $this->arr_words();           
    }
    protected function arr_words()
    {
        // array words
        $this->_dictionary   = array(
          "0"                   => 'zero',
          "1"                   => 'one',
          "2"                   => 'two',
          "3"                   => 'three',
          "4"                   => 'four',
          "5"                   => 'five',
          "6"                   => 'six',
          "7"                   => 'seven',
          "8"                   => 'eight',
          "9"                   => 'nine',
          "00"                  => 'zero zero',
          "01"                  => 'zero one',
          "02"                  => 'zero two',
          "03"                  => 'zero three',
          "04"                  => 'zero four',
          "05"                  => 'zero five',
          "06"                  => 'zero six',
          "07"                  => 'zero seven',
          "08"                  => 'zero eight',
          "09"                  => 'zero nine',
          "10"                  => 'ten',
          "11"                  => 'eleven',
          "12"                  => 'twelve',
          "13"                  => 'thirteen',
          "14"                  => 'fourteen',
          "15"                  => 'fifteen',
          "16"                  => 'sixteen',
          "17"                  => 'seventeen',
          "18"                  => 'eighteen',
          "19"                  => 'nineteen',
          "20"                  => 'twenty',
          "30"                  => 'thirty',
          "40"                  => 'fourty',
          "50"                  => 'fifty',
          "60"                  => 'sixty',
          "70"                  => 'seventy',
          "80"                  => 'eighty',
          "90"                  => 'ninety',
          "100"                 => 'hundred',
          "1000"                => 'thousand',
          "1000000"             => 'million',
          "1000000000"          => 'billion',
          "1000000000000"       => 'trillion',
          "1000000000000000"    => 'quadrillion',
          "1000000000000000000" => 'quintillion'
      );
   } // end function arr_words
                                

    public function convert_number_to_words($number, $first=true) 
    {
       //check number is number or not
       if (!is_numeric($number)) {
          return false;
       }
            
       if (($number >= 0 && intval($number )< 0) || intval($number) < 0 - PHP_INT_MAX) 
	   {
          // overflow
          trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
                 return false;
       }
        
       //check number whether is negative or not
       //if it is negative then call the function with positive number
       if ($number < 0) 
	   {
          return $this->_negative . $this->convert_number_to_words(abs($number));
       }
       //assign null value to variables
       $string = $fraction = null;
            
       // check Decimal place in number
       if (strpos($number, '.') !== false) 
	   {
           list($number, $fraction) = explode('.', $number);
       }
           
       switch (true) 
       {
           case $number < 21:
                    
             $string = $this->_dictionary["$number"];
             break;
                    
           case $number < 100:
                     
              $tens   = (intval($number / 10)) * 10;
              $units  = $number % 10;
              $string = $this->_dictionary["$tens"];
                   
              if ($units) 
			  {
                 $string .= $this->_space . $this->_dictionary["$units"];
              }
              break;
                    
           case $number < 1000:
                    
               $hundreds  = intval($number / 100);
               $remainder = $number % 100;
$string = $this->_dictionary["$hundreds"] . ' ' .$this->_dictionary["100"];
                    
               if ($remainder) 
			   {
                        $string .= $this->_conjunction . $this->convert_number_to_words($remainder, false);
               }
               break;
                    
           default:
                   
              $baseUnit = pow(1000, floor(log($number, 1000)));                
              $numBaseUnits = intval($number / $baseUnit);
              $remainder = $number % $baseUnit;
              $string = $this->convert_number_to_words($numBaseUnits, false) . ' ' . $this->_dictionary["$baseUnit"];
                    
              if ($remainder) 
			  {
                 $string .= $this->_conjunction;
                 $string .= $this->convert_number_to_words($remainder, false);
              }
              break;
      }
    
     // start - decimal place
     if (null !== $fraction && is_numeric($fraction)) 
	 {
     	$string .= $this->_rupees . $this->_conjunction . $this->_decimal;
        		

       if ($fraction < 10) $fraction = $fraction . '0';
        		   
          $string .= $this->convert_number_to_words($fraction, false);
              //add only
          $string .= $this->_only;
       }
       // end  - decimal place
            
       //first time only this condition would execute.
       //without decimal place.
        if ($fraction === null && $first == true) 
		{
            $string .= $this->_rupees . $this->_only;
        }
            
      return $string;
            
   } // end function convert_number_to_words
        
}
//Date ago time*/
function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        echo "Just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1)
		{
            echo "One minute ago";
        }
        else
		{
            echo "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24)
	{
        if($hours==1){
            echo "An hour ago";
        }else{
            echo "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7)
	{
        if($days==1){
            echo "Yesterday";
        }else{
            echo "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
	{
        if($weeks==1){
            echo "A week ago";
        }else{
            echo "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12)
	{
        if($months==1){
            echo "A month ago";
        }else{
            echo "$months months ago";
        }
    }
    //Years
    else
	{
        if($years==1)
		{
            echo "One year ago";
        }else{
            echo "$years years ago";
        }
    }
} 
function my_data($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title,name from staff where m_id='$m_id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'].' '.$data_get['name'];       
}
  
function my_data_id($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select title,name from tbl_customer where id='$m_id' ");
 
    $data_get=mysqli_fetch_array($qry);
    return $data_get['title'].' '.$data_get['name'];       
}
function rec($m_id)
{
	global $DB_LINK;
	$qry=mysqli_query($DB_LINK,"select m_id,r_id,p_id from staff where p_id='$m_id' ");
  
	if(mysqli_num_rows($qry)>0)
    {
    	$data_get=mysqli_fetch_array($qry);
        return $data_get['m_id'];
    }
    else
        return 'No data';
}
function rec_anyleg($m_id,$place)
{
	  global $DB_LINK,$placer_id;
	  $placer_id= $m_id;   
          $qry=mysqli_query($DB_LINK,"select login_id from tbl_staff where p_id='".$m_id."' and placing='".$place."' ");  
   if(mysqli_num_rows($qry)>0)
    {      
       $data_get=mysqli_fetch_array($qry);
        rec_anyleg($data_get['login_id'],$place); 
    }
    else 
    {  
      $_SESSION['placer_id']=$placer_id;
      return $placer_id;  
    }
}
global  $placer_id_all, $tempTree,$exclude, $depth; 
function rec_anyleg_all($m_id,$place)
{
	global $DB_LINK;
	$tempTree='';
  	$depth='0';
  	$placer_id= $m_id; 
  	$placer_id_all='';
  	$qry=mysqli_query($DB_LINK,"select m_id from tbl_staff where p_id='$m_id'     and placing='$place'");
	 
	 
	
  	if(mysqli_num_rows($qry)>0)
    {          
		$data_get=mysqli_fetch_array($qry);
		$placer_id=$data_get['m_id'];
		$placer_id_all .= $data_get['m_id'].'~';
		$placer_id_all.=totaldownlinemembers($DB_LINK,$placer_id); 
	  	return $placer_id_all;		  
    }
    else 
	{  
           
        return $placer_id_all;   
    }            
}
function totaldownlinemembers($DB_LINK,$a)
{  
           
	global $DB_LINK;
           
	$depth=0;
	$tempTree='';
	$child_query = mysqli_query($DB_LINK,"SELECT login_id, r_id FROM tbl_staff WHERE r_id='".$a."'   ");
           
	while ( $child = mysqli_fetch_array($child_query) )
	{
		if ( $child['login_id'] != $child['r_id'] )
		{
			for ( $c=0;$c<$depth;$c++ ) 
			{ $tempTree .= ""; }
			$tempTree .= $child['login_id'].'~';
			$depth++;	
			$tempTree .= totaldownlinemembers($DB_LINK,$child['login_id']);	
		}
	} 
	return $tempTree;
}
function totaldownlinemembers_approved($DB_LINK,$a)
{  
           
	global $DB_LINK;
           
	$depth=0;
	$tempTree='';
	$child_query = mysqli_query($DB_LINK,"SELECT login_id, r_id FROM tbl_staff WHERE r_id='".$a."'      ");
           
	while ( $child = mysqli_fetch_array($child_query) )
	{
		if ( $child['login_id'] != $child['r_id'] )
		{
			for ( $c=0;$c<$depth;$c++ ) 
			{ $tempTree .= ""; }
           
                        if(ac_typ($child['login_id'])>0)
                        {
			$tempTree .= $child['login_id'].'~';
                        }
			$depth++;	
			$tempTree .= totaldownlinemembers_approved($DB_LINK,$child['login_id']);	
		} 
	} 
	return $tempTree;
}

 function    ac_typ($m_id)
{
	global $DB_LINK;
	$c_query = mysqli_query($DB_LINK,"SELECT account_typ FROM tbl_staff_profile WHERE login_id='".$m_id."' ");
	$c_data = mysqli_fetch_array($c_query);
	if($c_data['account_typ']!='Registered')
	{

        $c_query = mysqli_query($DB_LINK, "SELECT status FROM tbl_staff WHERE login_id='" . $m_id . "' ");
        $c_data = mysqli_fetch_array($c_query);
        if($c_data['status']==1)
        return 1;
        else
        return 0;
    }
	else return 0;



}
function mem_status($m_id)
{
	global $DB_LINK;
	$c_query = mysqli_query($DB_LINK,"SELECT status FROM staff WHERE m_id=".$m_id);
	$c_data = mysqli_fetch_array($c_query);
	return $c_data['status'];
}
function sum_of_payout($m_id)
{ 
	global $DB_LINK;
	$paid=0;
	$c_query = mysqli_query($DB_LINK,"SELECT sum(lev) as paid FROM tbl_target WHERE m_id=".$m_id);
	$c_data = mysqli_fetch_array($c_query);
	if($c_data['paid']!='')
	{ 
		$paid=$c_data['paid'];
	}
	return $paid;
	
}
function yearCalculator($dt, $y){
    if(!empty($dt)){
        $dt=strtotime($dt);
		$end = strtotime('+'. $y .'year', $dt);
		$year=date('Y-m-d',$end);
		//$year=date('d M Y',$end);
		return $year;
    }else{
        return 0;
    }
}
function simpleInterest($p, $r, $t){
	
	$si = ($p*$r*$t)/100;
	
	$amt=$p+$si;
	
	return $amt;
}
function refresh_wallet($userid, $byledger)
{
	global $DB_LINK; $inco=0;$expe=0;$final_bal=0;
	//echo "SELECT * FROM `tbl_leg_add` where to_mem='".$userid."' and byledger='".$byledger."' order by id desc";exit;
 	$qry1=mysqli_query($DB_LINK,"SELECT * FROM `tbl_leg_add` where to_mem='".$userid."' and byledger='".$byledger."' and ttyp!='Wallet Credit By FD' order by id desc") ;
 	while($row1=mysqli_fetch_array($qry1))
 	{
 		if($row1['typ']=='dr') { $expe+=$row1['amt']; }
 		if($row1['typ']=='cr') { $inco+=$row1['amt'];  }
 	}
 	return $final_bal=$inco-$expe;
}
function recharge_wallet($userid)
{
	global $DB_LINK;$inco=0;$expe=0;$final_bal=0;
 	$qry1=mysqli_query($DB_LINK,"SELECT * FROM `tbl_leg_rec` where member='".$userid."'   ") ;
 	while($row1=mysqli_fetch_array($qry1))
 	{
 		if($row1['typ']=='dr') { $expe+=$row1['amt']; }
 		if($row1['typ']=='cr') { $inco+=$row1['amt'];  } 
 	}  
   	$recharge_bal=$inco-$expe;
	return round($recharge_bal,2);
}
function insert_ledger($to, $from, $typ, $amt, $prt, $ttyp, $description='', $byledger=0)
{
	global $DB_LINK;
	$ins="INSERT INTO `tbl_leg_add` set `to_mem`='".$to."', `from_mem`='".$from."', `typ` ='$typ', `amt`='".$amt."', `dt`='".date("Y-m-d")."', `part`='$prt', ttyp='$ttyp', txnid='".time().rand(100,999)."', description='$description', byledger='$byledger'";
	mysqli_query($DB_LINK,$ins);
}
function insert_ledger_rec($to, $typ, $amt, $prt, $ttyp)
{
	global $DB_LINK;
	$ins="INSERT INTO `tbl_leg_rec` set `member`='".$to."', `typ` ='$typ', `amt`='".$amt."', `dt`='".date("Y-m-d")."', `part`='$prt', ttyp='$ttyp', txnid='".time().rand(100,999)."'";
	mysqli_query($DB_LINK,$ins);
}
function recharge_api($operatorcode, $number, $amount)
{
	global $p2a_cid, $p2a_apitoken, $cnumber;
	function httpGetWithErros($url)
	{
		$ch = curl_init();  
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
			 
		if($output === false)
		{
			echo "Error Number:".curl_errno($ch)."<br>";
			echo "Error String:".curl_error($ch);
		}
		curl_close($ch);
		return $output;
	}
		
	$provider_id = $operatorcode; 
	$number = $number;
	$amount = $amount;
	$client_id = $p2a_cid; //(your system unique id. that you can check in pay2all);
	//end of data collection from form
	//check whether user enter some data or not
	if(empty($provider_id))
	{
		echo"select operator";
		exit;
	}
	if(empty($number))
	{
		echo"enter mobile number";
		exit;
	}
	if(empty($amount))
	{
		echo"enter amount";
		exit;
	}
	$api_token =$p2a_apitoken; // api_token token will in (https://www.pay2all.in/developers/recharge-api-doc) 
			
	$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id";
	
	if($rowm['rec_type']=='DTH Recharge')
 	{
	 	$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&cnumber=";  
 	} 
 	if($rowm['rec_type']=='Telephone Payment')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&optional1=&optional2=&optional3=";
 	}
	if($rowm['rec_type']=='DataCard Recharge')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&cnumber=";  
 	} 
 	if($rowm['rec_type']=='Electricity Payment')
 	{
 		$url = "https://www.pay2all.in/web-api/paynow?api_token=$api_token&number=$number&provider_id=$provider_id&amount=$amount&client_id=$client_id&optional1=&optional2=&optional3=";
 	}	
	$response = httpGetWithErros($url);
			
	//$response='{"payid":"8952252","operator_ref":"","status":"success","message":"Transaction Submitted Successfully Done, Check Status in Transaction Report, Thanks","txstatus_desc":"Pending"}';
	$result='['.$response.']';
		 
	$status='';
	$txnid='';
	$ref_id='';
	$r_status='';
	$jsonRS = json_decode ($result,true);
	return $jsonRS;
}
function sms_sender($contact, $sms_text)
{ 
	
	global $msg_contact, $msg_pass, $msg_sender_id;
 $username = $msg_contact;
 $password = $msg_pass;
// Message details
 $senderid = $msg_sender_id;
 $type = '1';
 $product = '1';
 $number = $contact;
 $message = $sms_text;
// API credentials
 $credentials = 'username='. $username . '&password='. $password;
// prepare data for GET request
  $data = '&sender='. $senderid . '&mobile='. $number . '&type='.$type. '&product='. $product .'&message='. $message;
// make url to post using cURL
   $url = 'http://sms.friendzitsolutions.biz/api/sendsms.php?'. $credentials . $data;
 
  $url=str_replace(' ', '%20', $url);
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"api\"\r\n\r\nQXpvbGxhQXBwRGV2ZWxvcGVkYnlhbWl0\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"device\"\r\n\r\n android\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"maid_id\"\r\n\r\n4\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"customer_id\"\r\n\r\n6\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"title\"\r\n\r\nHio\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"content\"\r\n\r\nhi\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 0ff0f943-344f-4551-a267-8664d39fda40",
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));
return $response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
//if ($err) {
//  echo "cURL Error #:" . $err;
//} else {
//  echo $response;
//}          
 
           
           
           
	/*
	
	$data ="mobile=".$msg_contact."&pass=".$msg_pass."&senderid=".$msg_sender_id."&to=".$contact."&msg=".$sms_text."";
	 
	//echo $data;exit;
	
 	// Send the POST request with cURL
	$ch = curl_init('http://tsms.friendzitsolutions.biz/sendsms.aspx?'); //note https for SSL
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); //This is the result from Textlocal
	curl_close($ch);
	return $result;*/
}



function mail_sender($contact,$is_admin, $sms_text,$name,$subject) {
	include('../assets/plugins/mailer/PHPMailerAutoload.php');
	try{
	global   $SITE_NAME,$EMAIL_ID ,$WEBMAIL,$MPASS ,$HOST ,$PORT,$SITE_URL;
//echo $SITE_NAME.$EMAIL_ID .$WEBMAIL.$MPASS .$HOST .$PORT.$SITE_URL;
	  $mail_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>'.$SITE_NAME.'</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="'.$SITE_URL.'/assets/links/images/logo.png" alt="'.$SITE_NAME.'" width="200"   style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>'.$subject.'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                         <div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">Hi '.$name.',</div><br>
                                         '.$sms_text.'
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        &reg; '.$SITE_NAME.', Copyright 2019-20<br/>
                                        <a href="'.$SITE_URL.'" style="color: #ffffff;"><font color="#ffffff">Visit Website</font></a> 
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.facebook.com/" style="color: #ffffff;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
	$mail = new PHPMailer;
	//$mail->isSMTP(); // Set mailer to use SMTP
	$mail->SMTPDebug = 2;
	$mail->Host = $HOST; // Specify main and backup server
	$mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = $WEBMAIL; // SMTP username
	$mail->Password = $MPASS; // SMTP password
	$mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
	$mail->Port = $PORT; //Set the SMTP port number - 587 for authenticated TLS
	$mail->setFrom($WEBMAIL, $SITE_NAME); //Set who the message is to be sent from
	//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
	//$mail->addAddress('xyz@gmail.com', $SITE_NAME);
	//$mail->addAddress($EMAIL_ID, $SITE_NAME);
	$mail->addAddress($contact, $name);
if($is_admin!='yes')
	$mail->addAddress($EMAIL_ID, $SITE_NAME);
	// Name is optional
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');
	$mail->WordWrap = 50; // Set word wrap to 50 characters
	$mail->isHTML(true);
	//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
	// Set email format to HTML
	$mail->Subject = $subject;
	$mail->Body = $mail_body;

	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic pl}ain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

	if ($mail->send()) {
		//echo 'Message Sent Mailer';
	  //echo 'Mailer Error: ' . $mail->ErrorInfo;
	} /*else {
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		//echo 'Message Sent Successfully';
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= 'From: $SITE_NAME<$EMAIL_ID>' . "\r\n";
		//$headers .= 'Cc: xyz@gmail.com' . "\r\n";
		//mail($_POST['email'],$subject,$mail_body,$headers);
		mail($EMAIL_ID, $subject, $mail_body, $headers);
	}*/

	}
	catch (Exception $ex)
	{
		echo 'Message: ' .$ex->getMessage();
	}
}

function mail_sender_replica($contact,$is_admin, $sms_text,$name,$subject) {
	//include('../assets/plugins/mailer/PHPMailerAutoload.php');
	try{
		global   $SITE_NAME,$EMAIL_ID ,$WEBMAIL,$MPASS ,$HOST ,$PORT,$SITE_URL;
//echo $SITE_NAME.$EMAIL_ID .$WEBMAIL.$MPASS .$HOST .$PORT.$SITE_URL;
		$mail_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>'.$SITE_NAME.'</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="'.$SITE_URL.'/assets/links/images/logo.png" alt="'.$SITE_NAME.'" width="200"   style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>'.$subject.'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                         <div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">Hi '.$name.',</div><br>
                                         '.$sms_text.'
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        &reg; '.$SITE_NAME.', Copyright 2019-20<br/>
                                        <a href="'.$SITE_URL.'" style="color: #ffffff;"><font color="#ffffff">Visit Website</font></a> 
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.facebook.com/" style="color: #ffffff;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
		$mail = new PHPMailer;
		//$mail->isSMTP(); // Set mailer to use SMTP
		$mail->SMTPDebug = 2;
		$mail->Host = $HOST; // Specify main and backup server
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = $WEBMAIL; // SMTP username
		$mail->Password = $MPASS; // SMTP password
		$mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
		$mail->Port = $PORT; //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom($WEBMAIL, $SITE_NAME); //Set who the message is to be sent from
		//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
		//$mail->addAddress('xyz@gmail.com', $SITE_NAME);
		//$mail->addAddress($EMAIL_ID, $SITE_NAME);
		$mail->addAddress($contact, $name);
		if($is_admin!='yes')
			$mail->addAddress($EMAIL_ID, $SITE_NAME);
		// Name is optional
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		$mail->WordWrap = 50; // Set word wrap to 50 characters
		$mail->isHTML(true);
		//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
		// Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body = $mail_body;

		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic pl}ain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

		if ($mail->send()) {
			//echo 'Message Sent Mailer';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
		} /*else {
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		//echo 'Message Sent Successfully';
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= 'From: $SITE_NAME<$EMAIL_ID>' . "\r\n";
		//$headers .= 'Cc: xyz@gmail.com' . "\r\n";
		//mail($_POST['email'],$subject,$mail_body,$headers);
		mail($EMAIL_ID, $subject, $mail_body, $headers);
	}*/

	}
	catch (Exception $ex)
	{
		echo 'Message: ' .$ex->getMessage();
	}
}

/*function msg($type, $module)
{
    switch($type)
    {
        case 'ok': $pop = $module." has been created successfully."; $color = 'success';
        break;
        case 'err': $pop = "Oops ! Something went wrong."; $color = 'warning';
        break;
        case 'invalid': $pop = "Please fill all fields";
        break;
        case 'update': $pop = $module." has been updated successfully.";$color = 'success';
        break;
        case 'exists': $pop = $module." already exists.";$color = 'warning';
        break;
        case 'del': $pop = $module." has been deleted successfully"; $color = 'success';
        break;
    }
    $result = array($pop, $color);
    return $result;
}*/
function alert_msg($type, $module)
{
    switch($type)
    {
        case 'success': $toastr = 'Successfully !!'; $sweetalert = 'success';
        break;
        case 'error': $toastr = 'Error !!'; $sweetalert = 'error';
        break;
        case 'warning': $toastr = 'Warning !!'; $sweetalert = 'warning';
        break;
        case 'info': $toastr = 'Welcome !!'; $sweetalert = 'info';
        break;
    }
    $result = array($toastr, $sweetalert);
    return $result;
}
function logEvent($msg, $message) 
{
	global $DB_LINK;
    if ($message != '') 
	{
		$delim = "\t";   // set delim, eg tab 
		$res = mysqli_query($DB_LINK,$msg); 
		while ($row = mysqli_fetch_row($res)) { 
    		$scoredata = $row;
		} 
        // Add a timestamp to the start of the $message
        //$message = date("Y/m/d H:i:s").': '.$message."\r\n";
		$message = date("Y/m/d H:i:s").': '.$message."".PHP_EOL;
        //$fp = fopen('appLog-'.date('d-m-Y').'.txt', 'a');
		$fp = fopen('logs/appLog-'.date('d-m-Y').'.txt', 'a');
        fwrite($fp, $message);
		fwrite($fp, join($delim, $scoredata) . "\r\n"); 
        fclose($fp);
    }
}
/*
function truncate_number( $number, $precision = 2) {
    // Zero causes issues, and no need to truncate
    if ( 0 == (int)$number ) {
        return $number;
    }
    // Are we negative?
    $negative = $number / abs($number);
    // Cast the number to a positive to solve rounding
    $number = abs($number);
    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);
    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
    return floor( $number * $precision ) / $precision * $negative;
}*/
function randomString($length = 8) 
{
  $str = "";
  $characters = array_merge(range('A','Z'));
  $max = count($characters) - 1;
  for ($i = 0; $i < $length/2; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  $characters = array_merge( range('0','9'));
  $max = count($characters) - 1;
  for ($i = 0; $i < $length/2; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  return $str;
}
function randomString_forpin($length = 16) 
{
  $str = "";
  $characters = array_merge(range('A','Z'));
  $max = count($characters) - 1;
  for ($i = 0; $i < $length/2; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  $characters = array_merge( range('0','9'));
  $max = count($characters) - 1;
  for ($i = 0; $i < $length/2; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  return $str;
}
function pin_typ($str_typ)
{
  if($str_typ=='Basic') $pintyp_is="Basic 500";
  if($str_typ=='Premium') $pintyp_is="Premium";
  if($str_typ=='3') $pintyp_is="Basic to Premium"; 
 
  return $pintyp_is;
}
function pin_status($str_typ)
{
  if($str_typ=='0') $pintyp_is="Free Pin"; 
  if($str_typ=='1') $pintyp_is="Transferred Pin";
  if($str_typ=='2') $pintyp_is="Used Pin"; 
 
  return $pintyp_is;
}

global $place_is;
function placing($placing)
{
    $place_is='';
   
  if($placing=='1') $place_is="First Place";
  if($placing=='2') $place_is="Second Place";
  if($placing=='3') $place_is="Third Place";
  if($placing=='3') $place_is="Third Place";

  return $place_is;
}

function account_typ($actyp)
{
   $actyp_val='';    
  if($actyp=='0') $actyp_val="Registered"; 
  if($actyp=='1') $actyp_val="Basic"; 
  if($actyp=='2') $actyp_val="Premium";  
  return $actyp_val;
}

function pin_transfer($pin_code,$transfer_to,$transfer_by)
{
    $qry="INSERT INTO `tbl_pins_history` set `pin_code`='$pin_code', `transfer_to`='$transfer_to', `transfer_by`='$transfer_by'  ";    
     global $DB_LINK;
     mysqli_query($DB_LINK,$qry); 
}

function update_member($login_id,$data,$column_name)
{
     $qry="update `tbl_staff_profile` set $column_name='$data' where login_id='$login_id'";
     global $DB_LINK;
     mysqli_query($DB_LINK,$qry); 
}

function get_member_data($login_id,$column_name)
{
    $comm="select $column_name from  `tbl_staff_profile` where login_id='$login_id'";    
     global $DB_LINK;
     $qry=mysqli_query($DB_LINK,$comm); 
     $result=mysqli_fetch_array($qry);
     return $result[$column_name];
}

function direct_member_count($login_id,$position,$usertype)
{  
   global $DB_LINK;
       // echo "SELECT tbl_staff.*, tbl_staff_profile.* FROM tbl_staff INNER JOIN tbl_staff_profile ON tbl_staff.login_id = tbl_staff_profile.login_id where tbl_staff.r_id='".$login_id."' and  tbl_staff.placing ='$position' and tbl_staff_profile.account_typ='1'  order by tbl_staff.m_id desc";
   $qry=mysqli_query($DB_LINK,"SELECT tbl_staff.login_id  FROM tbl_staff INNER JOIN tbl_staff_profile ON tbl_staff.login_id = tbl_staff_profile.login_id where tbl_staff.r_id='".$login_id."' and  tbl_staff.placing ='$position' and tbl_staff_profile.account_typ='$usertype'    and tbl_staff.status='1' order by tbl_staff.m_id desc");
  return mysqli_num_rows($qry);         
}

function binarypay_count($login_id,$position)
{  
   global $DB_LINK;
       // echo "SELECT tbl_staff.*, tbl_staff_profile.* FROM tbl_staff INNER JOIN tbl_staff_profile ON tbl_staff.login_id = tbl_staff_profile.login_id where tbl_staff.r_id='".$login_id."' and  tbl_staff.placing ='$position' and tbl_staff_profile.account_typ='1'  order by tbl_staff.m_id desc";
   $qry=mysqli_query($DB_LINK,"SELECT  * FROM tbl_ledger_binary  where  m_id='".$login_id."' and   for_placing ='$position'  order by   id desc");
  return mysqli_num_rows($qry);         
}

function customer_data($c_id)
{
  global $DB_LINK;
$getdata_qry=mysqli_query($DB_LINK,"SELECT
 tbl_staff.login_id, 
tbl_staff_profile.name ,
tbl_staff_profile.mobile 
FROM tbl_staff INNER JOIN tbl_staff_profile ON tbl_staff.login_id = tbl_staff_profile.login_id  where  tbl_staff.login_id='$c_id'  ");
 $getresult=mysqli_fetch_array($getdata_qry);
    return $c_data=$getresult['login_id']."<br>".$getresult['name']."<br>Mb. ".$getresult['mobile'];
}

function customer_data_mid($c_id)
{
    global $DB_LINK;
    $getdata_qry=mysqli_query($DB_LINK,"SELECT 
tbl_staff.login_id, 
tbl_staff_profile.name ,
tbl_staff_profile.mobile 
FROM tbl_staff INNER JOIN tbl_staff_profile ON tbl_staff.login_id = tbl_staff_profile.login_id  where  tbl_staff.m_id='$c_id'  ");
    $getresult=mysqli_fetch_array($getdata_qry);
    return $c_data=$getresult['name']."<br>LoginId : ".$getresult['login_id']."<br>Mob : ".$getresult['mobile'];
}

function get_wallet_balance_allcombo($userid, $wallet_name)
{
	$tab_name=getwallet_tabname($wallet_name);
	global $DB_LINK;
	$cr = 0;			$dr = 0;			$w_amt = 0;
	//echo "SELECT * from $tab_name where `m_id`='" . $userid . "'  ";
	$qry = mysqli_query($DB_LINK, "SELECT * from $tab_name where `m_id`='" . $userid . "'  ");
	foreach ($qry as $row)
	{
		if ($row['mode'] == 'CR') $cr = $cr + $row['amt'];
		if ($row['mode'] == 'DR') $dr = $dr + $row['amt'];
		$w_amt = $cr - $dr;
	}
	 return $w_amt;
}

function getwallet_colname($wallet_name)
{
	$col_name='';

	if($wallet_name=='pin')
		$col_name='wallet_pin';

	if($wallet_name=='binary')
		$col_name='wallet_binary';

	if($wallet_name=='contact')
		$col_name='wallet_contact';

	if($wallet_name=='contact_b')
		$col_name='wallet_contact_b';

	if($wallet_name=='ad')
		$col_name='wallet_ad';

	if($wallet_name=='shopping')
		$col_name='wallet_shopping';

	if($wallet_name=='journey')
		$col_name='wallet_journey';

	if($wallet_name=='carfund')
		$col_name='wallet_carfund';

	if($wallet_name=='housefund')
		$col_name='wallet_housefund';

	if($wallet_name=='movies')
		$col_name='wallet_movies';

	if($wallet_name=='bonus')
		$col_name='wallet_bonus';

	return $col_name;
}

function getwallet_tabname($wallet_name)
{
	$tab_name='';

	if($wallet_name=='contact')
		$tab_name='tbl_ledger_contact';

	if($wallet_name=='contact_b')
		$tab_name='tbl_ledger_contact_b';

	if($wallet_name=='binary')
	$tab_name='tbl_ledger_binary';

	if($wallet_name=='ad')
		$tab_name='tbl_ledger_video';

	if($wallet_name=='shopping')
	$tab_name='tbl_ledger_shopping';

	if($wallet_name=='journey')
		$tab_name='tbl_ledger_journey';

	if($wallet_name=='carfund')
		$tab_name='tbl_ledger_carfund';

	if($wallet_name=='housefund')
		$tab_name='tbl_ledger_housefund';

	if($wallet_name=='movies')
	$tab_name='tbl_ledger_movies';

	if($wallet_name=='pin')
		$tab_name='tbl_ledger_pin';

	if($wallet_name=='bonus')
		$tab_name='tbl_ledger_bonus';
	if($wallet_name=='team')
		$tab_name='tbl_ledger_team';

	if($wallet_name=='direct')
		$tab_name='tbl_ledger_direct';

	return $tab_name;
}

function w2wplimit_Other($usertyp)
{
	if($usertyp=='Basic')
		$min_value=1000;

	if($usertyp=='Premium')
		$min_value=1000;

	return $min_value;
}

function w2wplimit($usertyp)
{
	if($usertyp=='Basic')
		$min_value=500;
		//$min_value=1500;

	if($usertyp=='Premium')
		$min_value=2000;

	return $min_value;
}

function w2bplimit($usertyp)
{
	if($usertyp=='Basic')
		$min_value=1000;
  
  		//$min_value=1000;

	if($usertyp=='Premium')
		$min_value=1000;

	return $min_value;
}
function w2shoppingplimit($usertyp)
{
	if($usertyp=='Basic')
		$min_value=500;

	//$min_value=1000;

	if($usertyp=='Premium')
		$min_value=2000;

	return $min_value;
}

function pinvaluebyidtype($usertyp)
{
	if($usertyp=='Basic')
		$min_value=2000;

	//	old $min_value=1999;

	if($usertyp=='Premium')
		$min_value=5999;

	return $min_value;
}

function user_validty($usertyp)
{
	if($usertyp=='Basic')
		$val_days=200;
	if($usertyp=='Premium')
		$val_days=177;
	return $val_days;
}

function get_transcation_pass($c_id)
{
	global $DB_LINK;
	$getdata_qry=mysqli_query($DB_LINK,"SELECT tpass FROM tbl_staff where   login_id='$c_id'");
	$getresult=mysqli_fetch_array($getdata_qry);
	return  $getresult['tpass'];
}

function update_level_history($m_id,$m_name,$m_level,$summary)
{
  if($m_level>0) {
    global $DB_LINK;
    $getdata_qry = mysqli_query($DB_LINK, "SELECT `level` as lev_data FROM tbl_level_achive_list 
 where `m_id`='$m_id' order by id desc");
    $getresult = mysqli_fetch_array($getdata_qry);
    if ($getresult['lev_data'] != $m_level) {
      mysqli_query($DB_LINK, "INSERT INTO `tbl_level_achive_list` 
 set `m_id`='$m_id', 
`m_name`='$m_name',
`level`='$m_level', 
`summary`='$summary' ");
    } else {
    }
  }
}

function video_payment($usertyp)
{
	if($usertyp=='Basic')
		$min_value=80;
	if($usertyp=='Premium')
		$min_value=80;
	return $min_value;
}        
  
function get_upadate_level($downline,$referal,$m_id)
{
	global $DB_LINK;
	///////////////////////////////Restore Level Data//////////////////////////
	$mylevel='0';
	$qry=mysqli_query($DB_LINK,"select * From tbl_level_data order by id asc");
	foreach($qry as $row)
	{
				///////////////////////////////Level 1 Clear///////////////////////////////
				if($row['lev_name']=='Level 1')
				{
					if($row['dl_mem']<$downline || $row['ref_mem']<$referal)
					{
						$mylevel='1';
					}
				}
				////////////////////////////////Level 2 Clear//////////////////////////////
				if($row['lev_name']=='Level 2')
				{
					if($row['dl_mem']<$downline || $row['ref_mem']<$referal)
					{
						$mylevel='2';
					}
				}
				///////////////////////////////////Level 3 Clear///////////////////////////
				if($row['lev_name']=='Level 3')
				{
					if($row['dl_mem']<$downline || $row['ref_mem']<$referal)
					{
						$mylevel='3';
					}
				}
				///////////////////////////////////Level 4 Clear///////////////////////////
				if($row['lev_name']=='Level 4')
				{
					if($row['dl_mem']<$downline || $row['ref_mem']<$referal)
					{
						$mylevel='4';
					}
				}
				///////////////////////////////////Level 3 Clear///////////////////////////
				if($row['lev_name']=='Level 5')
				{
					if($row['dl_mem']<$downline || $row['ref_mem']<$referal)
					{
						$mylevel='5';
					}
				}
				//////////////////////////////////////////////////////////////
				 }
	update_member($m_id,$mylevel,'level_report');
	return $mylevel;
	}

	function multiwalletcredit_system($m_id,$m_name,$m_level,$usertyp,$placing)
	{
		global $DB_LINK;
		$amtforpay=0; $pos='';
		if($usertyp=='Basic')
		{
			if($m_level==0)
				$amtforpay='100';
			if($m_level==1)
				$amtforpay='100';
			if($m_level==2)
				$amtforpay='100';
			if($m_level==3)
				$amtforpay='100';
			if($m_level==4)
				$amtforpay='100';
			if($m_level==5)
				$amtforpay='100';
		}
		if($usertyp=='Premium')
		{
			if($m_level==0)
				$amtforpay='100';
			if($m_level==1)
				$amtforpay='100';
			if($m_level==2)
				$amtforpay='100';
			if($m_level==3)
				$amtforpay='100';
			if($m_level==4)
				$amtforpay='100';
			if($m_level==5)
				$amtforpay='100';
		}
		if($placing=='1') $pos='LEFT';
		if($placing=='2') $pos='RIGHT';

		/*if($m_level>0)
		{*/
			if($m_level==0)
			{
				/////////////Shopping Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Shopping Wallet credit<br>';
			}
			if($m_level==1)
			{
				/////////////Shopping Wallet credit///////////////
		  $pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Shopping Wallet credit<br>';
			}
			if($m_level==2)
			{
				/////////////Shopping Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Shopping Wallet credit<br>';
			/*	/////////////Journey trip Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_journey` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Journey trip Wallet credit<br>';*/
			}
			if($m_level==3)
			{
				/////////////Shopping Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Shopping Wallet credit<br>';
	/*			/////////////Journey trip Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_journey` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Journey trip Wallet credit<br>';
				/////////////Car Fund Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_carfund` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Car Fund Wallet credit<br>';*/
			}
			if($m_level==4)
			{
				/////////////Shopping Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Shopping Wallet credit<br>';
			/*	/////////////Journey trip Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_journey` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Journey trip Wallet credit<br>';
				/////////////Car Fund Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_carfund` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Car Fund Wallet credit<br>';
				/////////////House Fund Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_housefund` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'House Fund Wallet credit<br>';*/
			}
			if($m_level==5)
			{
				/////////////Shopping Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Shopping Wallet credit<br>';
				/*/////////////Journey trip Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_journey` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Journey trip Wallet credit<br>';
				/////////////Car Fund Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_carfund` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Car Fund Wallet credit<br>';
				/////////////House Fund Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_housefund` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'House Fund Wallet credit<br>';
				/////////////Movies Wallet credit///////////////
				$pay_qry_r = "INSERT INTO `tbl_ledger_movies` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='$amtforpay',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Auto Credit For Level Achivemenet on Binary Gen Payment Rs $amtforpay for $pos', 
		   for_id='',for_placing='$placing' ";
				mysqli_query($DB_LINK, $pay_qry_r);
				echo 'Movies Wallet credit<br>';*/
			}
	/*	}*/

		/////Common Entry For Bonus Wallet//////
	/*	$pay_qry_r = "INSERT INTO `tbl_ledger_bonus` set `m_id`='" .$m_id . "',
		   `m_name`='$m_name', `mode`='CR',  `amt`='25',on_date ='" . date('Y-m-d') . "',
		   summary='Wallet Credit for Binary generation, bonus payment received Rs 25', 
		   for_id='',for_placing='$placing' ";
		mysqli_query($DB_LINK, $pay_qry_r);*/
		echo 'Shopping Wallet credit<br>';

	}

function get_student_data($roll,$col)
{
    global  $DB_LINK1; //and session='$session'
    $sql="SELECT $col FROM  tbl_team_student  where  user='".$roll."'    ";
    $result =mysqli_query($DB_LINK1,$sql);
    $data =mysqli_fetch_object($result);
    return $data->$col;
}

function get_student_result_data($roll,$session,$col)
{
    global  $DB_LINK1; //and session='$session'
    $sql="SELECT $col FROM   tbl_result_marks   where  roll_no='".$roll."' and session='".$session."'    ";
    $result =mysqli_query($DB_LINK1,$sql);
    $data =mysqli_fetch_object($result);
    return $data->$col;
}

function get_student_center_data($refid,$col)
{
    global  $DB_LINK1; //and session='$session'
    $sql="SELECT $col FROM   tbl_master_institute  where  a_fdl_id ='".$refid."'      ";
    $result =mysqli_query($DB_LINK1,$sql);
    $data =mysqli_fetch_object($result);
    return $data->$col;
}

function calc_percent($nummax,$nummin)
{
    return round((($nummin * 100) / $nummax),2);
}

function get_grade($percent)
{
    $result="";
    if($percent>=90)
        $result="A+ Outstanding";
    if($percent>=80 && $percent<90)
        $result="A Excellent";
    if($percent>=70 && $percent<80)
        $result="B+ Very Good";
    if($percent>=60 && $percent<70)
        $result="B Good";
    if($percent>=50 && $percent<60)
        $result="C Satisfactory";
    if($percent>=40 && $percent<50)
        $result="D Marginal";
      if( $percent<40)
        $result="X Disqualified";


    return $result;
}

function get_grade_bcc($percent)
{
    $result="";

    if($percent>=50  )
        $result='<span class="text-success text-lg-center"  >Qualified</span>';
    if( $percent<50)
        $result='<span class="text-danger text-lg-center"  >Disqualified</span>';


    return $result;
}

function get_grade_color($percent)
{
    $result="";
    if($percent>=90)
        $result='<span class="text-success text-lg-center"  >A+ Outstanding</span>';
    if($percent>=80 && $percent<90)
        $result='<span class="text-success text-lg-center"  > A Excellent</span>';
    if($percent>=70 && $percent<80)
        $result='<span class="text-primary text-lg-center"  > B+ Very Good</span>';
    if($percent>=60 && $percent<70)
        $result='<span class="text-primary text-lg-center"  >B Good</span>';
    if($percent>=50 && $percent<60)
        $result='<span class="text-warning text-lg-center"  >C Satisfactory</span>';
    if($percent>=40 && $percent<50)
        $result='<span class="text-warning text-lg-center"  >D Marginal</span>';
    if( $percent<40)
        $result='<span class="text-danger text-lg-center"  >X Disqualified</span>';


    return $result;
}

function get_director_img($id,$typ)
{
    $tabname=login_role_tablename($typ);
    $img_url=login_role_img_url($typ);
    global $DB_LINK1;
    //echo "SELECT   $column_name from  $tab_name where user ='$userid' ";
    $getdata_qry=mysqli_query($DB_LINK1, "SELECT   image from  $tabname where user ='$id' ");
    $getdata_info=mysqli_fetch_assoc($getdata_qry);
    if('WB1522D435769'==$id)
        $img='profile-pic.jpg';
    else
        $img=$getdata_info['image'];
    return $img_url.$img;

}

function login_role_tablename($role)
{
    if ($role=='sdl') {
        $tab_name="tbl_team_state";
    }
    if ($role=='ddl') {
        $tab_name="tbl_team_city";
    }
    if ($role=='fdl') {
        $tab_name="tbl_team_fren";
    }
    if ($role=='sl') {
        $tab_name="tbl_team_student";
    }
    if ($role=='tl') {
        $tab_name="tbl_team_fact";
    }
    return $tab_name;
}

function login_role_img_url($role)
{
    if ($role=='sdl') {
        $img_url="mis/upload/sdl_data/image/";
    }
    if ($role=='ddl') {
        $img_url="mis/upload/ddl_data/image/";
    }
    if ($role=='fdl') {
        $img_url="mis/upload/fdl_data/image/";
    }
    if ($role=='sl') {
        $img_url="mis/upload/sl_data/image/";
    }
    if ($role=='tl') {
        $img_url="mis/upload/tl_data/image/";
    }
    return $img_url;
}

function qn_count($quiz_id)
{
    global  $DB_LINK1; //and session='$session'
    $sql="SELECT *  FROM    tbl_quiz_question    where  quiz_id='".$quiz_id."'      ";
    $result =mysqli_query($DB_LINK1,$sql);
    return mysqli_num_rows($result);

}

function get_parent($p_id)
{
    global  $DB_LINK; //and session='$session'
    $sql="SELECT parent_id  FROM tbl_category where  id='".$p_id."'      ";
    $result =mysqli_query($DB_LINK,$sql);
    $getdata_info=mysqli_fetch_assoc($result);
    return $getdata_info['parent_id'];
}

function count_enq($tab_n)
{
    global  $DB_LINK; //and session='$session'
    $sql="SELECT *  FROM $tab_n  where  is_read='0'      ";
    $result =mysqli_query($DB_LINK,$sql);
    return mysqli_num_rows($result);
}

function count_child($id)
{
    global  $DB_LINK; //and session='$session'
    $sql="SELECT id  FROM tbl_category  where  parent_id='$id'      ";
    $result =mysqli_query($DB_LINK,$sql);
    return mysqli_num_rows($result);
}



function mail_sender_external($contact, $is_admin, $sms_text, $name, $subject)
{
	include('../assets/mailer/PHPMailerAutoload.php');
	try
	{
		global   $SITE_NAME,$EMAIL_ID ,$WEBMAIL,$MPASS ,$HOST ,$PORT,$SITE_URL ,$SITE_URL_LOGO;
		//echo $SITE_NAME.$EMAIL_ID .$WEBMAIL.$MPASS .$HOST .$PORT.$SITE_URL;
		$mail_body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>'.$SITE_NAME.'</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="'.$SITE_URL_LOGO.'" alt="'.$SITE_NAME.'" width="200"   style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>'.$subject.'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                         <div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">Hi '.$name.',</div><br>
                                         '.$sms_text.'
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        &reg; '.$SITE_NAME.', Copyright 2019-20<br/>
                                        <a href="'.$SITE_URL.'" style="color: #ffffff;"><font color="#ffffff">Visit Website</font></a>
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.facebook.com/" style="color: #ffffff;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
		$mail = new PHPMailer;
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->SMTPDebug = 2;
		$mail->Host = $HOST; // Specify main and backup server
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = $WEBMAIL; // SMTP username
		$mail->Password = $MPASS; // SMTP password
		$mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
		// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		
		$mail->Port = $PORT; //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom($WEBMAIL, $SITE_NAME); //Set who the message is to be sent from
		//$mail->addReplyTo('labnol@gmail.com', 'First Last');  //Set an alternative reply-to address
		//$mail->addAddress('xyz@gmail.com', $SITE_NAME);
		//$mail->addAddress($EMAIL_ID, $SITE_NAME);
		$mail->addAddress($contact, $name);
		if ($is_admin=='yes') {
			$mail->addAddress($EMAIL_ID, $SITE_NAME);
		}
		if($contact!='amit@devindia.in')
		{
			$mail->addBCC('amit@devindia.in',"Developer");
			
		}
		// Name is optional
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		$mail->WordWrap = 50; // Set word wrap to 50 characters
		$mail->isHTML(true);
		//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
		// Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body = $mail_body;
		
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic pl}ain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		
		if ($mail->send()) {
			//echo 'Message Sent Mailer';
			//echo 'Mailer Response: ' . $mail->ErrorInfo;
		} else {
			// echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	}
	catch (Exception $ex)
	{
		//  echo 'Message: ' .$ex->getMessage();
	}
}

        
?>