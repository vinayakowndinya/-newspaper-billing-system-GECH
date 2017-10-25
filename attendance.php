<?php
	include("config.php");
	if(!isset($login_session))
	{
		header("location:index.php");
	}


  $findPriv = "select priv from login where username like '".$username."'";//echo "$findPriv";
  $resPriv = mysqli_query($conn,$findPriv);
  $rowPriv = mysqli_fetch_assoc($resPriv);
  $prev = $rowPriv['priv'];//echo "$prev";


?>


<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/jqui.css">
  	<script src="jq_cal1.js"></script>
 	<script src="js/jq_cal2.js"></script>
 	<!-- for datepicker -->
 	<script type="text/javascript" src="datepicker/bootstrap-datepicker.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="datepicker/bootstrap-datepicker3.css">
</head>

<style type="text/css">
	
	#header-image {
		width: 100%;
	}
	
	th{
		background-color: 333333;
		color: white;
	}
	html {
 		   height: 100%;
    	box-sizing: border-box;
	}

  *,
*:before,
*:after {
  box-sizing: inherit;
}

	body {
  position: relative;
  margin: 0;
  padding-bottom: 6rem;
  min-height: 100%;
  }
	.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: rgba(0,0,0,0.3);
  text-align: center;
}
  		
	

	
</style>


 <script>
    
    $( function() {
      $( ".datepicker" ).datepicker();
    } );

  </script>

<body>

<nav role="navigation" class="navbar navbar-default navbar-static-top" style="width: 100%;position: fixed;box-shadow: 3px 3px 3px;">
    <div class="container ">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://www.gechassan.ac.in" class="navbar-brand"><b>GECH</b></a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="attendance.php">Attendance</a></li>
                <li><a href="edit.php">Edit</a></li>
                <?php if($prev == '1') echo '<li><a href="papers.php">Daily Papers</a></li>'; ?>
                <li><a href="billing.php">Generate Bill</a></li>
                <li><a href="history.php">History</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
				
      			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b><?php echo "$username "; ?> <span class="glyphicon glyphicon-user"></span><span class="caret"></span></b></span></a>
              <ul class="dropdown-menu">
                <li><a  style="width: 150px;" href="update.php">Update Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a   style="width: 150px;" href="logout.php">Log out</a></li>
              </ul>
            </li>
                <li><a><b><?php echo "".date("Y-m-d").""; ?></b></a></li>
            </ul>
        </div>
    </div>
    <img  id="header-image" src="images/header2.png">
</nav>


<div class="container">
<form method="post" action="insertAttendance.php">
	<table class="table table-striped table-hover" border="1" style="margin-top: 300px;text-transform: uppercase;">

		<thead>
			<tr>
				<th>Paper</th><th style="width: 10%;">Attendance</th>
			</tr>
			<tr>
				<td colspan="2">
					<!--<div class="form-group ">
        				<input class="form-control" style="width: 50%" id="date" name="date" value=""  type="text"/>
      				</div> -->
      				<div class="form-group">
                		<div class="input-group date form_datetime col-md-5"  data-link-field="date">
                    		<input class="form-control" size="16" id="date" name="date" type="text" value="<?php echo "".date("Y-m-d").""; ?>" max="<?php echo "".date("Y-m-d").""; ?>" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                		</div>
            		</div>
				</td>
			</tr>
		</thead>
		<?php
			$list = "select paper from cost";
			$resList = mysqli_query($conn,$list);
			while ($rowList = mysqli_fetch_assoc($resList)) {
				echo "<tr><td>".$rowList['paper']."</td><input type='hidden' name='paper[]' value='".$rowList['paper']."'><td align='center'><input type='checkbox' value='yes' name='arrived[]'></td></tr>";
			}
		?>
	</table>
	<div align="center">
		<?php
			if(isset($_GET['exist']))
			{
				echo "<b style='color:red;'>This day's attendance has already been taken. Click <a href='edit.php'>here</a> to modify.</b><br><br>";
			}
			elseif(isset($_GET['done']))
			{
				echo "<b style='color:green;'>Attendance of ".$_GET['done']." has been taken successfully.</b><br><br>";
			}
		?>
		<input type="submit" name="submit" value="submit" class="btn-lg btn-primary" >
		<input type="reset" name="" class="btn-lg">
	</div>
</form>
</div>



</body>

</html>


<script>
    /*$(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })*/

    $("#date").datepicker();

	$("#date").on("keyup", function(e) {
  		var date, day, month, newYear, value, year;
  		value = e.target.value;
  		if (value.search(/(.*)\/(.*)\/(.*)/) !== -1) {
    		date = e.target.value.split("/");
    		year = date[2];
    		month = date[0];
    		day = date[1];

    		if (year === "") {
      			year = "0";
    		}
    		if (year.length < 4) {
      			newYear = String(2000 + parseInt(year));
      			$(this).datepicker("setValue", "" + newYear + "/" + month + "/" + day);
      			if (year === "0") {
        			year = "";
      			}
      			return $(this).val("" + year + "/" + month + "/" + day);
    		}
	  	}
	});
</script>
<br><br><br><br><br><br>
<div  class="footer">
  <?php
    include("footer.php");
  ?>
</div>