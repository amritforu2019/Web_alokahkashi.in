<?php 
include('con_base/functions.inc.php'); 

$final_bal=refresh_wallet($head_userid, $head_title);

if(isset($_POST['branch']))
{
	$final_bal1=refresh_wallet($_POST['branch'], $branch_title);
}

if(isset($_POST['member']))
{
	$final_bal2=refresh_wallet($_POST['member'], $member_title);
	$sql_staff=mysqli_query($DB_LINK,"select * from tbl_customer where ac_no='".$_POST['member']."'") or die(mysqli_error());
	$get_staff=mysqli_fetch_array($sql_staff);
}

////////////////////////11111111///////////////////////
if($_POST['typ']=='deposit-b')
{
$amt_req=$_POST['amt_req']; 
if($final_bal>=$amt_req)
{
?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> Description </label>
  <div class="col-sm-6">
    <textarea name="description" rows="2" class="form-control input-lg" id="description" placeholder="Description"  ></textarea>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3 control-label no-padding-right"></div>
  <div class="col-md-9 no-padding-right">
    <button class="btn btn-primary" type="submit" name="submit"> <i class="ace-icon fa fa-check bigger-110"></i>Deposit Payment </button>
  </div>
</div>
<?php
}
else
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right"> Wallet Summary</div>
  <div class="col-md-9 no-padding-right"> Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal; ?> = <?php echo $amt_req-$final_bal ; ?> <br />
    <span class="text-danger"> Wallet Balance is low !!! </span> </div>
</div>
<?php
}
}


if($_POST['typ']=='withdraw-b')
{
$amt_req=$_POST['amt_req']; 
if($final_bal1>=$amt_req)
{
	?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> Description </label>
  <div class="col-sm-6">
    <textarea name="description" rows="2" class="form-control input-lg" id="description" placeholder="Description"  ></textarea>
  </div>
</div>
<!--<div class="form-group">
  <label class="col-sm-2 control-label " for="attachment"> </label>
  <div class="col-sm-6">
    <button onClick="onchangeajax1(<?php echo $head_mobileotp;?>)" class="btn btn-info" type="button" name="submit" > <i class="ace-icon fa fa-envelope-o bigger-110"></i> Generate OTP</button>
    <span id="statediv2"> </span> </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> OTP </label>
  <div class="col-sm-4">
    <input type="text" name="vcode" id="vcode" onKeyUp="verify_otp();" class="col-xs-4 col-sm-4" aria-describedby="basic-addon3" placeholder="Enter OTP" required>
    <input type="hidden" name="vcode3" id="vcode3" value="0"  />
    <div class="col-xs-5 col-sm-5"> <span id="confirmMessage2" >Enter OTP</span> </div>
  </div>
</div>-->
<div class="form-group" id="normal" >
  <div class="col-sm-3 control-label no-padding-right"></div>
  <div class="col-md-9 no-padding-right">
    <button class="btn btn-info" type="submit" name="submit" > <i class="ace-icon fa fa-check bigger-110"></i> Withdraw Now </button>
  </div>
</div>
<?php
}
else
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right">Branch Wallet Summary</div>
  <div class="col-md-9 no-padding-right" > Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal1; ?> = <?php echo $amt_req-$final_bal1 ; ?> <br />
    <span class="text-danger">Branch Wallet Balance is low !!! </span> </div>
</div>
<?php
}
}


if($_POST['typ']=='deposit')
{
$amt_req=$_POST['amt_req']; 
if($final_bal>=$amt_req)
{
?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> Description </label>
  <div class="col-sm-6">
    <textarea name="description" rows="2" class="form-control input-lg" id="description" placeholder="Description"  ></textarea>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3 control-label no-padding-right"></div>
  <div class="col-md-9 no-padding-right">
    <button class="btn btn-primary" type="submit" name="submit"> <i class="ace-icon fa fa-check bigger-110"></i>Deposit Payment </button>
  </div>
</div>
<?php
}
elseif($final_bal<$amt_req)
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right">Branch Wallet Summary</div>
  <div class="col-md-9 no-padding-right"> Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal; ?> = <?php echo $amt_req-$final_bal ; ?> <br />
    <span class="text-danger">Branch Wallet Balance is low !!! </span> </div>
</div>
<?php
}
else
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right">Customer Wallet Summary</div>
  <div class="col-md-9 no-padding-right"> Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal2; ?> = <?php echo $amt_req-$final_bal2 ; ?> <br />
    <span class="text-danger">Customer Wallet Balance is low !!! </span> </div>
</div>
<?php
}
}


if($_POST['typ']=='withdraw')
{
$amt_req=$_POST['amt_req']; 
if($final_bal2>=$amt_req)
{
	?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> Description </label>
  <div class="col-sm-6">
    <textarea name="description" rows="2" class="form-control input-lg" id="description" placeholder="Description"  ></textarea>
  </div>
</div>
<!--<div class="form-group">
  <label class="col-sm-2 control-label " for="attachment"> </label>
  <div class="col-sm-6">
    <button onClick="onchangeajax1(<?php echo $get_staff['mobile'];?>)" class="btn btn-info" type="button" name="submit" > <i class="ace-icon fa fa-envelope-o bigger-110"></i> Generate OTP </button>
    <span id="statediv2"> </span> </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> OTP </label>
  <div class="col-sm-4">
    <input type="text" name="vcode" id="vcode" onKeyUp="verify_otp();" class="col-xs-4 col-sm-4" aria-describedby="basic-addon3" placeholder="Enter OTP" required>
    <input type="hidden" name="vcode3" id="vcode3" value="0"  />
    <div class="col-xs-5 col-sm-5"> <span id="confirmMessage2" >Enter OTP</span> </div>
  </div>
</div>-->
<div class="form-group" id="normal" >
  <div class="col-sm-3 control-label no-padding-right"></div>
  <div class="col-md-9 no-padding-right">
    <button class="btn btn-info" type="submit" name="submit" > <i class="ace-icon fa fa-check bigger-110"></i> Withdraw Now </button>
  </div>
</div>
<?php
}
else
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right">Customer Wallet Summary</div>
  <div class="col-md-9 no-padding-right" > Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal2; ?> = <?php echo $amt_req-$final_bal2 ; ?> <br />
    <span class="text-danger">Customer Wallet Balance is low !!! </span> </div>
</div>
<?php
}
}


if($_POST['typ']=='fd')
{
$amt_req=$_POST['amt_req']; 
if($final_bal>=$amt_req)
{
?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right " for="attachment"> Duration </label>
  <div class="col-sm-6  ">
    <select name="term" class="form-control">
      <?php 
   for($i = 1 ; $i <= 10; $i++){
      echo "<option value=$i>$i Year(s)</option>";
   }
?>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" > Nominee Name</label>
  <div class="col-sm-6">
    <input type="text" placeholder="Nominee Name" class="form-control"  name="nominee"  required/>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" > Nominee Relation</label>
  <div class="col-sm-6">
    <input type="text" placeholder="Nominee Relation" class="form-control"  name="nominee_rel"  required />
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="attachment"> Description </label>
  <div class="col-sm-6">
    <textarea name="description" rows="2" class="form-control input-lg" id="description" placeholder="Description"  ></textarea>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3 control-label no-padding-right"></div>
  <div class="col-md-9 no-padding-right">
    <button class="btn btn-primary" type="submit" name="submit"> <i class="ace-icon fa fa-check bigger-110"></i>FD Payment </button>
  </div>
</div>
<?php
}
elseif($final_bal<$amt_req)
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right">Branch Wallet Summary</div>
  <div class="col-md-9 no-padding-right"> Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal; ?> = <?php echo $amt_req-$final_bal ; ?> <br />
    <span class="text-danger">Branch Wallet Balance is low !!! </span> </div>
</div>
<?php
}
else
{
	?>
<div class="form-group" >
  <div class="col-sm-3 control-label no-padding-right">Customer Wallet Summary</div>
  <div class="col-md-9 no-padding-right"> Total  - Wallet Amount = Rest Amount <br />
    <?php echo $amt_req;?> - <?php echo $final_bal2; ?> = <?php echo $amt_req-$final_bal2 ; ?> <br />
    <span class="text-danger">Customer Wallet Balance is low !!! </span> </div>
</div>
<?php
}
}


///////////////////////////////////
//staff
if($_POST['typ']=='customer')
{
$id = $_POST[ 'id' ];
$qur = mysqli_query( $DB_LINK, "select * from tbl_customer where ac_no='$id'  " )or die( mysqli_error() );
if ( mysqli_num_rows( $qur ) > 0 ) {
	$city = mysqli_fetch_array( $qur );
	?>
<div class="form-group">
  <label class="col-sm-2   control-label no-padding-right"> Account No. </label>
  <div class="col-sm-6">
    <div class="input-group">
      <input name="ac_no" type="text" class="form-control input-lg" id="ac_no" placeholder="Enter Account No." onBlur="onchangeajax2(this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required value="<?php echo $city['ac_no'];?>">
      <span class="input-group-btn">
      <button class="btn btn-warning btn-lg" onClick="onchangeajax2(ac_no.value)"  type="button"><i class="fa fa-search"></i></button>
      </span> </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right"> Customer Name : </label>
  <div class="col-sm-5 text-uppercase bigger-150 text-success "> <?php echo $city['name'];?> </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right " for="attachment"> Amount </label>
  <div class="col-sm-6  ">
    <input name="amount" type="text" class="form-control" id="amount" placeholder="Amount" onKeyUp="ajax_fire_1(this.value, ac_no.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"   maxlength="6" required>
  </div>
</div>
<span id="finder_wallet"></span>
<?php
} else {
	?>
<div class="form-group">
  <label class="col-sm-2   control-label no-padding-right" for="trn_id"> Account No. </label>
  <div class="col-sm-6">
    <div class="input-group">
      <input name="ac_no" type="text" class="form-control input-lg" id="ac_no" placeholder="Enter Account No." onBlur="onchangeajax2(this.value)"  value="">
      <span class="input-group-btn">
      <button class="btn btn-warning btn-lg" onClick="onchangeajax2(ac_no.value)"  type="button"><i class="fa fa-search"></i></button>
      </span> </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right"> &nbsp; </label>
  <div class="col-sm-5 text-danger"> Sorry invalid  !!! </div>
</div>
<?php
}
}



//////////////////////////////////////////
//branch
if($_POST['typ']=='branch')
{
$id=$_POST['id'];

 $qur=mysqli_query($DB_LINK,"select * from tbl_branch where branch_id='$id'  ") or die(mysqli_error());

 $mem=mysqli_fetch_array($qur);

 if(mysqli_num_rows($qur)>0)

   { 

  ?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="trn_id"> Branch Id </label>
  <div class="col-sm-6">
    <div class="input-group">
      <input name="branch" type="text" class="form-control input-lg" id="branch" placeholder="Branch Id" onBlur="onchangeajax2(this.value)" onkeydown="" value="<?php echo $id;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
      <span class="input-group-btn">
      <button class="btn btn-warning btn-lg" onClick="onchangeajax2(branch.value)"  type="button"><i class="fa fa-search"></i></button>
      </span> </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="trn_id"> Branch </label>
  <div class="col-sm-5 text-uppercase bigger-150 text-success "> <?php echo $mem['name'];?> </div>
</div>
<div class="form-group   ">
  <label class="col-sm-2 control-label " for="attachment"> Amount </label>
  <div class="col-sm-6  ">
    <input name="amount" type="text" class="form-control input-lg" id="amount" placeholder="Amount" onKeyUp="ajax_fire_1(this.value, branch.value)"  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"   maxlength="6" required>
  </div>
</div>
<?php

 }

 else

 {

  ?>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="trn_id"> Branch Id </label>
  <div class="col-sm-6">
    <div class="input-group">
      <input name="branch" type="text" class="form-control input-lg" id="branch" placeholder="Branch Id"  onBlur="onchangeajax2(this.value)" value="<?php echo $id;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
      <span class="input-group-btn">
      <button class="btn btn-warning btn-lg" onClick="onchangeajax2(branch.value)"  type="button"><i class="fa fa-search"></i></button>
      </span> </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right"> &nbsp; </label>
  <div class="col-sm-5 text-danger"> Sorry invalid  !!! </div>
</div>
<?php

 }

}
if($_POST['typ']=='otp')
{
echo "<span style='color:#337ab7; font-size:15px;' >OTP send to mobile.</span>";
$cd=rand (1000,10000);
 
$text=$cd." is the OTP. Thanks and Regards Xiromile online retail services pvt ltd";

sms_sender($_POST['mobile'], $text);  
?>                   
<input type="hidden" name="vcode2" id="vcode2" value="<?php echo $cd;?>"  />
<?php
}

?>
