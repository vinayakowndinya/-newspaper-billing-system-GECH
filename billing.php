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
?>

<!-- This is for the top-form to take date and list the attendance -->
  <div class="container top-form hidden-print">
    <form action="billing.php" method=""> 
      <div style="width: 12%">
        <div class="form-group" style="margin-top: 280px;float: left;">
        <label for="date">Select Date to Generate Bill</label>
          <div class="input-group date form_datetime col-md-5" style="width: 10%;"  data-link-field="date">
            <input class="form-control" style="width: 200px;background-color: lightgreen;" id="date" required="" name="date" type="text" value="<?php echo "".date("Y-m").""; ?>"  readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
          </div>
          <input type="submit" class="btn btn-primary" style="margin-top: 5px;" value="Submit" >
          <a href="edit.php" class="btn"><b><span class="glyphicon glyphicon-refresh" style="color: orange;font-size: 20px;"></b></span></a>
       </div>
       
      </div>
    </form>

    <div style="float: right;margin-top: 280px;">
      <form action="dayWiseReport.php" method="get">
        <input type="hidden" name="date" value="<?php echo "$date"; ?>">
        <input type="submit" name="submit" class=" btn-lg btn-danger" value="GET DAYWISE REPORT OF <?php echo "$date"; ?>">
      </form>
    </div>
  </div>


<?php
  $listPapers = "select paper from cost";
  $resPapers = mysqli_query($conn,$listPapers);
  $count = '0';
  while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
      $count = $count + '1';
  }
  $numOfPapers = $count * 3;
  $numOfPapers+=1;


?>

<!--this is the main bill generation code -->
<div class="main-form" align="center"  style="margin-left: 0px;text-transform: uppercase;width: 100%;" >
  <table class="table table-hover table-striped" border="1" style="border-style: solid;" id="testTable" align="center" style="text-transform: uppercase;">
    <thead>
      <tr><th colspan="<?php echo "$numOfPapers"; ?>">Bill of <?php echo "".substr($date,0,4)." ".date('F', strtotime("$date")).""; ?></th></tr>
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
                echo "<th colspan='3' style='width:25%;'>".$rowPapers['paper']."</th>";
              }
          ?>
      </tr>
      </thead>
      <tbody>
        <th></th>
        <?php
          foreach ($paperName as $a => $b) {
            echo "<td><b>UC</b></td><td><b>AT</b></td><td><b>TC</b></td>";
          }

          $daysOfWeek = "select * from daysOfWeek order by id";
          $resDaysOfweek = mysqli_query($conn,$daysOfWeek);
          while ($rowDaysOfWeek = mysqli_fetch_assoc($resDaysOfweek)) {
            echo "<tr><th>".$rowDaysOfWeek['day']."</th>";
            $listPapers = "select paper,slno from cost";
            $resPapers = mysqli_query($conn,$listPapers);
            while ($rowPapers = mysqli_fetch_assoc($resPapers))
            {
              $uc = "select ".$rowDaysOfWeek['day']." as uc from cost where paper like '".$rowPapers['paper']."'";
              $resuc = mysqli_query($conn,$uc);
              $rowuc = mysqli_fetch_assoc($resuc);

              $monthDays = "select day(last_day('".$date."-1')) as lastDay";//echo "$monthDays";
              $resMonthDays = mysqli_query($conn,$monthDays);
              $rowMonthDays = mysqli_fetch_assoc($resMonthDays);
              $lastDay = $rowMonthDays['lastDay'];

              $at = "select count(delivery) as count from attendance where date between '".$date."-01' and '".$date."-".$lastDay."' and dayname(date) like '".$rowDaysOfWeek['day']."' and paper like '".$rowPapers['paper']."' and delivery like 'yes' ";
              $resat = mysqli_query($conn,$at);
              $rowat = mysqli_fetch_assoc($resat);

              $tc = $rowuc['uc'] * $rowat['count'];
              $pn = $rowPapers['paper'];
              $$pn = $$pn + $tc;

              echo "<td>".$rowuc['uc']."</td><td>".$rowat['count']."</td><td>".number_format((float)$tc, 2, '.', '')."</td>";
            }
            echo "</tr>";
          }
      
          $listPapers = "select paper,slno from cost";
          $resPapers = mysqli_query($conn,$listPapers);
          echo "<tr><th>Total</th>";
          $grandTotal = '0';
          $numOfPapers ='0';
          while ($rowPapers = mysqli_fetch_assoc($resPapers))
          {
            $numOfPapers++;
            $pn = $rowPapers['paper'];
            $allPaperBills[$numOfPapers] = $$pn;
            echo "<td colspan='3'><b>".number_format((float)$$pn, 2, '.', '')."</b></td>";
            $grandTotal += $$pn;
          }
          $numOfPapers = ($numOfPapers * '3');
          $numOfPapers-='2';
          echo "</tr><tr><th colspan='".$numOfPapers."'>Grand Total</th><th colspan='3'><b>".number_format((float)$grandTotal, 2, '.', '')."</b></th></tr>";
        ?>
      
         

        <?php
          $listPapers = "select paper,slno from cost";
          $resPapers = mysqli_query($conn,$listPapers);
          $monthDays = "select day(last_day('".$date."-1')) as lastDay";//echo "$monthDays";
          $resMonthDays = mysqli_query($conn,$monthDays);
          $rowMonthDays = mysqli_fetch_assoc($resMonthDays);
          $lastDay = $rowMonthDays['lastDay'];
          echo "<tr><th>Absence Dates</th>";
          while ($rowPapers = mysqli_fetch_assoc($resPapers))
          {
            $checkAbsent = "select date from attendance where paper like '".$rowPapers['paper']."' and delivery like 'no' and date between '".$date."-01' and '".$date."-".$lastDay."' ";
            $resCheckAbsent = mysqli_query($conn,$checkAbsent);
            echo "<td colspan='3'>";
            $count = '1';
            while($rowCheckAbsent = mysqli_fetch_assoc($resCheckAbsent))
            {
              echo "&nbsp;".substr($rowCheckAbsent['date'],8,2)."";
              $count++;
              if($count % '5' == '0')
              {
                echo "<br>";
              }
            }
            echo "</td>";
          }
          echo "</tr>";
        ?>

        <?php

          $numOfPapers=$numOfPapers+3;
          $listNotes = "select * from notes where date like '".$date."%'";
          $resListNotes = mysqli_query($conn,$listNotes);
          echo '<tr><td colspan='.$numOfPapers.' ><div style="text-align: left;">';
          while ($rowListNotes = mysqli_fetch_assoc($resListNotes)) {
            echo "* ".$rowListNotes['note']."<br>";
          }
          echo "</div><br></td></tr>";
          $month = substr($date, 5,2);
          $year = substr($date, 0,4);//echo "$month $year";
          echo "<tr><td colspan=".$numOfPapers.">";
          showMonth($month,$year);
          echo "</td></tr>";
        ?>
        <br><br> 
        </tbody>
      <tfoot>
 
      </tfoot>
      </table>
      
      <div align="center">
        <form action="freeze.php" method="post">
          <input type="hidden" name="freezeDate" value="<?php echo "$date"; ?>">
          <?php

          $listPapers = "select paper,slno from cost";
          $resPapers = mysqli_query($conn,$listPapers);
          $i = '1';
          while ($rowPapers = mysqli_fetch_assoc($resPapers))
          {
            $pn = $rowPapers['paper'];
            echo "<input type='hidden' value='".$allPaperBills[$i]."' name='p".$rowPapers['slno']."' >";$i++;
          }
          
          ?>
          <?php 
            $exist = "select * from history where date like '".$date."'";
            $resExist = mysqli_query($conn,$exist);
            if(!mysqli_num_rows($resExist))
            {
              echo '<input type="submit" name="submit" class="btn-lg btn-info" value="Freeze and Make History">';
            }
          ?>
          
        </form>

        <a target="_blank" href="mpdf/bill_generation/pdfbill.php?date=<?php echo "$date"; ?>&total=<?php echo "$grandTotal"; ?>"><button class="btn-lg btn-primary hidden-print" >Generate PDF Report</button></a>
        <button class="btn-lg btn-primary hidden-print" onclick="tableToExcel('testTable', 'W3C Example Table')" >Download as XLS</button><br><br>
      </div>
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