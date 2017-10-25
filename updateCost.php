<?php
	include("config.php");

	$paper = $_POST['paper'];
	$sunday = $_POST['sunday'];
	$monday = $_POST['monday'];
	$tuesday = $_POST['tuesday'];
	$wednesday = $_POST['wednesday'];
	$thursday = $_POST['thursday'];
	$friday = $_POST['friday'];
	$saturday = $_POST['saturday'];

	$delCost = "delete from cost";//echo "$delCost";
	$res = mysqli_query($conn,$delCost);
	
	$count = '1';
	foreach ($paper as $a => $b) {
		$insert = "insert into cost values($count,'".$paper[$a]."','".$sunday[$a]."','".$monday[$a]."','".$tuesday[$a]."','".$wednesday[$a]."','".$thursday[$a]."','".$friday[$a]."','".$saturday[$a]."')";
		$res = mysqli_query($conn,$insert);
		$count++;
	}
?>

Please wait. You are being redirected...
<meta http-equiv="Refresh" content="0; url=papers.php">
