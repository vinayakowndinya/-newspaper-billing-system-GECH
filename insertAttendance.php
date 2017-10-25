<?php
	include("config.php");

	$paper = $_POST['paper'];
	if(isset($_POST['arrived']))
	{
		$arrived = $_POST['arrived'];
	}
	else
	{
		$arrived = '';
	}
	$date = $_POST['date'];
	$exist = "select * from attendance where date like '".$date."'";
	$res = mysqli_query($conn,$exist);
	
	$num = mysqli_num_rows($res);
	if($num != '0')
	{
		header("location:attendance.php?exist=".$date."");
	}
	else {
		foreach ($paper as $a => $b) {
			$insert = "insert into attendance values('".$paper[$a]."','".$date."',dayname(".$date."),'".$arrived[$a]."')";
			$res = mysqli_query($conn,$insert);
		}
	}
?>
Please wait. You are being redirected...
<meta http-equiv="Refresh" content="3; url=attendance.php?done=<?php echo "".$date.""; ?>">
