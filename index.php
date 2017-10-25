
<?php
session_start();
if(isset($_SESSION['login_user']))
{
	$username = $_SESSION['login_user'];
}
if(isset($username))
{	
	header("location:attendance.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">

</head>
<style type="text/css">
	#box {
		border-style: solid;
		border-width: medium;
		border-radius: 5px;
	}

	#header {
		border-left: 15px;
		border-left-color: blue;
		border-left-style: solid;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 30px;
		background-color: #4fbbbe;
	}


	.input-label {
		background-color: #f3f3f3;
		padding-top: 0px;
		width: 100%;
		padding-bottom: 10px;
		padding-left: 10px;
		border-radius: 3px;

	}

	.input-label:hover
	{
		background-color: #f3f3f0;
	}

	.input {
		margin-left: 0px;
		width: 50%;
		transition: width .5s ease 0s;
	}

	.input:hover
	{
		width: 60%;
		border-color: #4fbbbe;
		border-width: 2px;
		transition: width .5s ease 0s;
	}

	#header-image {
		width: 100%;
	}

	.error {
		background-color: #f3f3f3;
		padding-top: 0px;
		width: 100%;
		padding-bottom: 10px;
		padding-left: 10px;
		border-radius: 3px;
		color: red;
	}

	.error {
		background-color: #f3f3f3;
		padding-top: 0px;
		width: 100%;
		padding-bottom: 10px;
		padding-left: 10px;
		border-radius: 3px;
		color: green;
	}
</style>
<body>
	<div>
		<img  id="header-image" src="images/header.png"><br><br>
	</div>
	<div class="container" id="box">
		<h2 id="header">LOGIN</h2>
		<br>
		<div id="login-body">
			<form method="post" action="login.php">
				<div  class="form-group form-group-lg">
					<label class="input-label">
					
						<h4><b>USERNAME</b></h4><input id="usr" class="input form-contol input-lg" type="text"
						<?php
						if (isset($_GET['error'])) {
							$username = $_GET['error'];
							echo "value='".$username."'";
						}
					?>
						 name="username" required="true"><br><br>
					</label>
					<label class="input-label">
						<h4><b>PASSWORD</b></h4><input id="pass" class="input form-contol input-lg" type="password" name="password" required="true"><br><br>
					</label>
					<?php
						if (isset($_GET['error'])) {
							echo "<label class='error'>Wrong Username/Password</label>";
						}
						if (isset($_GET['updated'])) {
							echo "<label style='color:green;' class='updated'>Your credentials has been updated. Please login with new credentials.</label>";
						}
					?>
					<br><br>
					<div align="center">
						<input type="submit" name="submit"  class="btn btn-lg btn-info" value="SUBMIT">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>