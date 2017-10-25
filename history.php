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
	<title>History</title>


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
    text-transform: uppercase;
		background-color: 333333;
		color: white;
	}
	html {
 		min-height: 100%;
    	position: relative;
	}
	body {
  		/* Margin bottom by footer height */
  		margin-bottom: 60px;
	}
	#footer {
  		position: absolute;
  		bottom: 0;
  		width: 100%;
  		min-height: 80px;
  		height: 60px;
  		background-color: rgba(0,0,0,0.7);
	}
  .top-form {
    position: absolute;
    background-color: #f3f3f3;
    height: 400px;
    width: 100%;
    border: solid;
  }
  .main-form {
    position: absolute;
    margin-top: 400px;
    align-self: center;
    align-content: center;
    
  }
  select{
    text-transform: uppercase;
  }

	
</style>


 <script>
    
    $( function() {
      $( ".datepicker" ).datepicker();
    } );



  </script>

  <script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>


<nav role="navigation" class="navbar navbar-default navbar-static-top hidden-print" style="width: 100%;position: fixed;box-shadow: 3px 3px 3px;">
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
                <li><a href="attendance.php">Attendance</a></li>
                <li><a href="edit.php">Edit</a></li>
                <?php if($prev == '1') echo '<li><a href="papers.php">Daily Papers</a></li>'; ?>
                <li><a href="billing.php">Generate Bill</a></li>
                <li class="active"><a href="history.php">History</a></li>
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

<body>
<div class="container" style="width: 100%;">
<br>
  <h3 style="margin-top: 250px;text-align: center;">BILLING HISTORY</h3>
  <form method="post" action="defreeze.php">
  <table class="table table-hover table-striped" border="1" style="border-style: solid;margin-top: 20px;" id="testTable" align="center" style="text-transform: uppercase;">
    <thead>
        <tr>
        <th>Paper</th>
          <?php
              $listPapers = "select paper from cost";
              $resPapers = mysqli_query($conn,$listPapers);
              $count = '1';
              while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
                $paperName[$count] = $rowPapers['paper'];
                $paperVar = $rowPapers['paper'];
                $$paperVar = '0';
                $count = $count + '1';
                echo "<th colspan='1' style='width:15%;'>".$rowPapers['paper']."</th>";
              }
          ?>
          <th>Total</th>
          <th>Defreeze</th>
      </tr>
      </thead>
      <tbody>
      <?php
        $dateList = "select distinct date from history";
        $resDateList = mysqli_query($conn,$dateList);
        while ($rowDateList = mysqli_fetch_assoc($resDateList)) {
          echo "<tr>";
          echo "<th>".$rowDateList['date']."</th>";
          $listPapers = "select paper from cost";
          $resPapers = mysqli_query($conn,$listPapers);
          $totalBill = '0';
          while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
            $selectBill = "select bill from history where paper like '".$rowPapers['paper']."' and date like '".$rowDateList['date']."' ";
            $resBill = mysqli_query($conn,$selectBill);
            $bill = mysqli_fetch_assoc($resBill);
            echo "<td>".$bill['bill']."</td>";
            $totalBill += $bill['bill'];
          }
          echo "<td>".$totalBill."</td>";
          unset($totalBill);
          echo "<td><input type='checkbox' name='defreezeDates[]' value='".$rowDateList['date']."'></td>";
          echo "</tr>";
        }
      ?>
      </tbody>
    </table>
    <div align="center">
    <?php

      $findPriv = "select priv from login where username like '".$username."'";//echo "$findPriv";
      $resPriv = mysqli_query($conn,$findPriv);
      $rowPriv = mysqli_fetch_assoc($resPriv);
      $prev = $rowPriv['priv'];//echo "$prev";

      if($prev != '1')
      {
        $disabled = 'disabled';
        $cls = '';
      }
      else
      {
        $disabled = '';
        $cls = 'btn-success';
      }
    ?>
    <input type="submit" name="defreeze" <?php echo "$disabled"; ?> value="DEFREEZE" class="btn-lg <?php echo "$cls"; ?>"><br>
    <b>(Note: Only Admin/User with high privilege can defreeze)</b>
    </div>
  </form>
</div>
</body>
</html>


<script>
  
  //$("#date").datepicker();
  $("#date").datepicker( {
    format: "yyyy-mm",
    startView: "months", 
    minViewMode: "months",
    endDate: "-1m"
    });

  $("#date").on("keyup", function(e) {
      var date, day, month, newYear, value, year;
      value = e.target.value;
      if (value.search(/(.*)\/(.*)\/(.*)/) !== -1) {
        date = e.target.value.split("/");
        year = date[2];
        month = date[0];

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