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
                <li class="active"><a href="edit.php">Edit</a></li>
                <?php if($prev == '1') echo '<li><a href="papers.php">Daily Papers</a></li>'; ?>
                <li ><a href="billing.php">Generate Bill</a></li>
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

<!-- This is for the top-form to take date and list the attendance -->
  <div class="container top-form hidden-print">
    <form action="edit.php" method="get"> 
      <div style="width: 12%">
        <div class="form-group" style="margin-top: 280px;float: left;">
        <label for="date">Select Date to List</label>
          <div class="input-group date form_datetime col-md-5" style="width: 10%;"  data-link-field="date">
            <input class="form-control" style="width: 200px;background-color: lightgreen;" id="date" required name="date" type="text" value="<?php echo "".date("Y-m").""; ?>"  readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
          </div>
          <input type="submit" class="btn btn-primary" style="margin-top: 5px;" value="Submit" >
          <a href="edit.php" class="btn"><b><span class="glyphicon glyphicon-refresh" style="color: orange;font-size: 20px;"></b></span></a>
       </div>
       
      </div>
    </form>
  </div>
<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
  }  
else {
    $date =  date("Y-m", strtotime("first day of this month"));//echo "$date";

  }
?>
<?php
  $freezed = "select * from history where date like '".$date."'";
  $resFreezed = mysqli_query($conn,$freezed);
  if(mysqli_num_rows($resFreezed) > '0')
  {
  //$rowFreezed = mysqli_fetch_assoc($resFreezed);
  echo "<div style='margin-top:410px;position:absolute;text-align:center;margin-left:800px;' >";
  echo "<h3>Billing of ".substr($date,0,4)." ".date('F', strtotime("$date"))." has been done</h3>";
  echo "<h2>For complete bill, click <a href='billing.php?date=".$date."'>here</a></h2>";

  $findPriv = "select priv from login where username like '".$username."'";//echo "$findPriv";
  $resPriv = mysqli_query($conn,$findPriv);
  $rowPriv = mysqli_fetch_assoc($resPriv);
  $prev = $rowPriv['priv'];//echo "$prev";


  if($prev != '1')
  {
    echo "(Contact Admin to defreeze this document)";
  }
  else
  {
    echo "(Hi ".$username.", you can defreeze this in <a href='history.php'>History Section</a>)";
  }
  die();
}
?>

  <div class="main-form" align="center" style="margin-left: 0px;width:100%;text-transform: uppercase;" >
    <form action="updateAttendance.php" method="post">
      <input type="hidden" name="deldate" value="<?php echo "$date"; ?>">
      <table class="table table-hover table-striped" border="1" align="center" style="text-transform: uppercase;">
        <thead>
          <tr><th colspan="30">Attendance of <?php echo "".substr($date,0,4)." ".date('F', strtotime("$date")).""; ?></th></tr>
          <tr>
            <th>Paper</th>
            <?php
              $listPapers = "select paper from cost";
              $resPapers = mysqli_query($conn,$listPapers);
              while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
                echo "<th style='width:140px;'>".$rowPapers['paper']."</th>";
              }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
            $monthDays = "select day(last_day('".$date."-1')) as lastDay";//echo "$monthDays";
            $resMonthDays = mysqli_query($conn,$monthDays);
            $rowMonthDays = mysqli_fetch_assoc($resMonthDays);
            $lastDay = $rowMonthDays['lastDay'];

            $qcurDate = "select day(now()) as today";
            $resCurDate = mysqli_query($conn,$qcurDate);
            $rowCurDate = mysqli_fetch_assoc($resCurDate);
            $curDate = $rowCurDate['today'];
            $d1 = "".date("Y-m")."-".$curDate."";
            $d2 = "".$date."-".$lastDay."";
            
            if($d1 < $d2)
            { 
              $lastDay = $curDate;
            }
            
            if(date("m")<substr($date, 6,2))
            {
              echo "<h2>Future data is not in my hand. Sorry!!</h2>";
              die();
            }
            for($i = '1';$i <= $lastDay;$i++) {
              if($i<10)
              {
                $append = '0';
              }
              else
              {
                $append = '';
              }
              echo "<tr><td>".$date."-".$append."".$i."<input type='hidden' value='".$date."-".$append."".$i."' name=date2[] ></td>";
              $listPapers = "select paper,slno from cost";
              $resPapers = mysqli_query($conn,$listPapers);
              while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
              
                $selectAttendance = "select delivery from attendance where date like '".$date."-".$append."".$i."' and paper like '".$rowPapers['paper']."'";
                $resAttendance = mysqli_query($conn,$selectAttendance);
                $background = "red";
                if(mysqli_num_rows($resAttendance) == '0')
                {
                  //echo "<td style='background-color:$background;'><input type='checkbox' name='p".$rowPapers['slno']."[]' value='yes'></td>";
                  echo "<td style='background-color:$background;'>
                          <select name='p".$rowPapers['slno']."[]' required class='form-control selectpicker'>
                            <option value='no'>No<option>
                            <option value='yes'>Yes<option>
                          </select>
                        </td>";
                }
                while ($rowAttendance = mysqli_fetch_assoc($resAttendance)) {
                  $delivery2 = $rowAttendance['delivery'];
                  if($delivery2 == '')
                    $delivery2 = 'no';
                  if($rowAttendance['delivery'] == 'yes')
                  {
                    $delivery = "checked";
                    $background = "lightgreen";
                  }
                  else
                  {
                    $delivery = '';
                    
                  }

                  //echo "<td style='background-color:$background;'><input type='checkbox' name='p".$rowPapers['slno']."[]' value='yes' $delivery></td>";
                  echo "<td style='background-color:$background;'>
                          <select name='p".$rowPapers['slno']."[]' required class='form-control selectpicker'>
                            <option value='".$delivery2."'>".$delivery2."<option>
                            <option value='no'>No<option>
                            <option value='yes'>Yes<option>
                          </select>
                        </td>";
                  unset($delivery);


                }
              
              }
              echo "</tr>";
            
            }

          ?>
        </tbody>
      </table>
      <input type="submit" name="submit" value="Update" class="btn-lg btn-primary">
       
      </form>
  </div>


</html>


<script>
  
  //$("#date").datepicker();
  $("#date").datepicker( {
    format: "yyyy-mm",
    startView: "months", 
    minViewMode: "months",
    endDate: "1m"
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