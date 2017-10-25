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
	<title>Bill</title>


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
                <li class="active"><a href="billing.php">Generate Bill</a></li>
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

<body>
<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
  }  
else {
    $date =  date("Y-m", strtotime("first day of this month -1 day"));//echo "$date";

  }


$monthDays = "select day(last_day('".$date."-01')) as lastDay";
$resMonthDays = mysqli_query($conn,$monthDays);
$rowMonthDays = mysqli_fetch_assoc($resMonthDays);
$lastDay = $rowMonthDays['lastDay'];

echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table class="table table-hover table-striped" border="1" style="border-style: solid;" id="testTable" align="center" style="text-transform: uppercase;width:90%;">
<tr><th colspan = "'.($lastDay+3).'">Daywise Report</th></tr>
';
echo "<tr><th>Papers</th>";
for ($i=1; $i <= $lastDay; $i++) { 
  echo "<th>$i</th>";
}
echo "</tr>";

$listPapers = "select paper from cost";
$resPapers = mysqli_query($conn,$listPapers);
$count = '1';
while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
    echo "<tr><th colspan='1' style=''>".$rowPapers['paper']."</th>";
    for ($i=1; $i <= $lastDay; $i++) { 
      if($i<10)
      {
        $append = '0';
      }
      else
      {
        $append = '';
      }
      $listAttendance = "select delivery from attendance where paper like '".$rowPapers['paper']."' and date like '".$date."-$append$i'";  
      //echo "$listAttendance";
      $resListAttendance = mysqli_query($conn,$listAttendance);
      if(mysqli_num_rows($resListAttendance)=='0')
      {
          echo "<td><img src='images/wrong.png' style='height:20px;'></td>";
      }
      else {
      while ($rowAttendance = mysqli_fetch_assoc($resListAttendance)) {
        if ($rowAttendance['delivery'] == 'yes') {
          echo "<td><img src='images/right.png' style='height:20px;'></td>";
        }
        if ($rowAttendance['delivery'] == 'no') {
          echo "<td><img src='images/wrong.png' style='height:20px;'></td>";
        }
        
      }
    }
  }
} 

?>
<!-- <a target="_blank" href="mpdf/bill_generation/pdfDailyAttendance.php?date=<?php echo "$date"; ?>"><button class="btn-lg btn-primary hidden-print" >Generate PDF Report</button></a>-->
<button class="btn-lg btn-primary hidden-print" onclick="window.print()">Generate PDF Report</button>
<br><br>
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

<?php


function showMonth($month, $year)
{
  $date = mktime(12, 0, 0, $month, 1, $year);
  $daysInMonth = date("t", $date);
  // calculate the position of the first day in the calendar (sunday = 1st column, etc)
  $offset = date("w", $date);
  $rows = 1;
   
   
  echo "<table border=\"0\" style='text-align:center;'  >\n";
  echo "<tr ><td  colspan='7'>" . date("F Y", $date) . "</td></tr>\n";
  echo "\t<tr ><th style='width:30px;' >Su</th><th style='width:30px;'>M</th><th style='width:30px;'>Tu</th><th style='width:30px;'>W</th><th style='width:30px;'>Th</th style='width:30px;'><th style='width:30px;'>F</th><th style='width:30px;'>Sa</th></tr>";
  echo "\n\t<tr>";
   
  for($i = 1; $i <= $offset; $i++)
  {
    echo "<td></td>";
  }
  
  for($day = 1; $day <= $daysInMonth; $day++)
  {
    if( ($day + $offset - 1) % 7 == 0 && $day != 1)
    {
      echo "</tr>\n\t<tr>";
      $rows++;
    }
   
    echo "<td>" . $day . "</td>";
  }

  while( ($day + $offset) <= $rows * 7)
  {
    echo "<td></td>";
    $day++;
  }

  echo "</tr>\n";
  echo "</table>\n";
}
?>