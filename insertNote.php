<?php

	include("config.php");

	$note = $_POST['note'];

	$insert = "insert into notes values(now(),'".$note."')";
	$res = mysqli_query($conn,$insert);

	if($res)
	{
		header("location:papers.php?note=success");
	}
	else
	{
		echo "Error while inserting the note";
		echo "Please check database configuration and existing of table.";
	}

?>