<?php

	include("config.php");
	
	$user = $_POST['user'];
	$actualuser = $_POST['actualuser'];
	$password = $_POST['password'];
	$priv = $_POST['priv'];
	$delete = $_POST['delete'];

	$check = "select priv from login where username like '".$delete."' ";
	$resCheck = mysqli_query($conn,$check);
	$rowCheck = mysqli_fetch_assoc($resCheck);
	$userPriv = $rowCheck['priv'];

	if(isset($delete))
	{
	if($userPriv == '1')
	{
		$admins = "select id from login where priv = '1'";
		$resAdmins = mysqli_query($conn,$admins);
		$countAdmins =  mysqli_num_rows($resAdmins);
		if($countAdmins <= '1')
		{
			header("location:update.php?user=".$delete."");
		}
		else
		{
			$delete = "delete from login where username like '".$delete."'";
			$resDelete = mysqli_query($conn,$delete);
			if($resDelete)
			{
				if($delete = $login_session)
				{
					header("location:logout.php");
				}
			}
			header("location:update.php");
		}
	}
	else
	{
		$delete = "delete from login where username like '".$delete."'";
		$resDelete = mysqli_query($conn,$delete);
		if($resDelete)
		{
			if($delete = $login_session)
			{
				header("location:logout.php");
			}
		}
		header("location:update.php");
	}
	}
	
	if(!isset($delete))
	{
	$update = "update login set username='".$user."',password='".$password."',priv='".$priv."' where username like '".$actualuser."'";
	$resUpdate = mysqli_query($conn,$update);
	if(!$resUpdate)
	{
		header("location:update.php?update=".$user."");
	}
	if($login_session == $actualuser)
	{
		header("location:logout.php?cur=true");
	}
	else
	{
		header("location:update.php?updatesuccess=".$user."");
	}
	}
?>