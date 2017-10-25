<?php

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,'newspaper');
	
	
	session_start();
	$username=$_SESSION['login_user'];
    $sql="SELECT  username, password,priv FROM login WHERE username='".$username."'";//echo "$sql";
    $res =  mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
	$login_session =$row['username'];
	$privilege = $row['priv'];
	if(!isset($login_session)){
		mysql_close($connection); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	} 
	if(time() > $_SESSION['expire'])
	{	
    	header("location:logout.php");
	}

	else { $_SESSION['expire'] = time()+15*60; }
	
	
?>
<link rel="icon" 
      type="image/png" 
      href="./favicon.jpg">