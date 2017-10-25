<?php
	
	include("config.php");
	if(isset($_POST['defreezeDates']))
	{
	$defreezeDates = $_POST['defreezeDates'];
	foreach ($defreezeDates as $key => $value) {
		$defreeze = "delete from history where date like '".$defreezeDates[$key]."'";
		$res = mysqli_query($conn,$defreeze);
	}
	}
?>

Please wait. You are being redirected...
<meta http-equiv="Refresh" content="1; url=history.php">
