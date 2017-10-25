<?php
		$dbhost='localhost';
		$dbuser='root';
		$dbpass='';
		$dbname='newspaper';
		$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
		if(! $conn){
			die('No Connection');
		}

	       if(isset($_POST['submit'])){
        		$username=$_POST['username'];
        		$password=($_POST['password']);
            echo "$username";

        		$sql="SELECT * FROM login WHERE username like '$username'";
        		mysqli_select_db($conn,$dbname);
        		$query=mysqli_query($conn, $sql);
       			 if($query){
        			  $row= mysqli_fetch_assoc($query);
        			  $dbusername=$row['username'];
                      $prev = $row['prev'];
        			  $dbpassword=$row['password'];
        		}
        	   if($username== $dbusername && $password== $dbpassword){
        	   		session_start();
                     $_SESSION['expire'] = time() + 15*60; 
        			$_SESSION['login_user']=$username;//echo "".$_SESSION['username']."";
                    $_SESSION['prev'] = $prev;
         			header('Location:attendance.php');
        			}
                else{
          			//echo "<span style = 'font-size:20px; color:#cc0000;position: absolute;padding-top:37%;padding-left: 41%'  align='center' >Login Credentials Incorrect!</span>";
                header("location:index.php?error=".$username."");
        		}    
			}
			else{
			//echo "<span style = 'font-size:20px; color:#cc0000;position: absolute;padding-top:37%;padding-left: 41%'  align='center' >Login Credentials Incorrect!</span>";
			}
	?>