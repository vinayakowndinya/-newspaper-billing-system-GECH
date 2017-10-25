<?php
	include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dailies</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>


<div style="position: absolute;top: 0px;">

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
                <li><a href="attendance.php">Attendance</a></li>
                <li><a href="edit.php">Edit</a></li>
                <li class="active"><a href="papers.php">Daily Papers</a></li>
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

</div>
</head>

<style type="text/css">
	
	#header-image {
		width: 100%;
	}
    ul li ul.dropdown{
        min-width: 255px; /* Set width of the dropdown */
        display: none;
        position: absolute;
        left: -100%;
    }
    ul li:hover ul.dropdown{
        display: block; /* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }

    input {
        text-transform: capitalize;
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



</style>

<SCRIPT language="javascript">
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;
        for(var i=0; i<colCount; i++) {
            if (rowCount >= 17) {
                alert("Maximum Of 16 Subjects Can Only Be Added");
                break;
            }
            else{
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                        newcell.childNodes[0].value = "";
                        break;
                    case "checkbox":
                        newcell.childNodes[0].checked = false;
                        break;
                    case "select-one":
                        newcell.childNodes[0].selectedIndex = 0;
                        break;
                }
            }
        }
    }

    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        }
        catch(e) {
            alert(e);
        }
    }

</SCRIPT>



<body style="text-transform: capitalize;">

<div align="center">
<div  style="width: 100%;margin-left: 0%;position: absolute;margin-top: 200px;" >
<form method="post" action="updateCost.php">
<br><br><br><br>
<table class="table table-striped table-hover" style="width: 70%;"  align="center" border="1" id="dataTable" style="margin-top: 300px;background-color: #cccccc;">
	<thead>
		<tr>
			<th>Select</th><th style="width: 40%;background-color: #43444d;">Paper</th>
            <th >Sun</th>
            <th style="background-color: #43444d;">Mon</th>
            <th>Tue</th>
            <th style="background-color: #43444d;">Wed</th>
            <th>Thu</th>
            <th style="background-color: #43444d;">Fri</th><th>Sat</th>
        </tr>
    </thead>
    <tbody>
		<?php
            
                $cost = "select * from cost";
                $resCost = mysqli_query($conn,$cost);
                while ($rowCost = mysqli_fetch_assoc($resCost)) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='chk'></td>";
                    echo "<td><input required type='text' name='paper[]' value='".$rowCost['paper']."'></td>";
                    echo "<td><input required type='' min='0'  name='sunday[]' value='".$rowCost['sunday']."'></td>";
                    echo "<td><input required type='' min='0'  name='monday[]' value='".$rowCost['monday']."'></td>";
                    echo "<td><input required type='' min='0'  name='tuesday[]' value='".$rowCost['tuesday']."'></td>";
                    echo "<td><input required type='' min='0'  name='wednesday[]' value='".$rowCost['wednesday']."'></td>";
                    echo "<td><input required type='' min='0'  name='thursday[]' value='".$rowCost['thursday']."'></td>";
                    echo "<td><input required type='' min='0'  name='friday[]' value='".$rowCost['friday']."'></td>";
                    echo "<td><input required type='' min='0'  name='saturday[]' value='".$rowCost['saturday']."'></td>";
                    echo "</tr>";
                }
                if(mysqli_num_rows($resCost) == '0')
                {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='chk'></td>";
                    echo "<td><input required  type='text' name='paper[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='sunday[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='monday[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='tuesday[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='wednesday[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='thursday[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='friday[]' value=''></td>";
                    echo "<td><input required  min='0' type='' name='saturday[]' value=''></td>";
                    echo "</tr>";
                }
        ?>
	</tbody>
</table>
<div style="margin-left: 0%">
<p align="center">Click <b>'Add Paper'</b> button to add more Papers and select the rows and press <b>'Delete Paper'</b> to delete Paper</p><br>
<INPUT type="button" class="btn btn-success" style="margin-left: 0%;" value="Add Paper" onclick="addRow('dataTable')" />
<INPUT type="button" class="btn btn-danger" style="margin-left: 20%;" value="Delete Paper" onclick="deleteRow('dataTable')" />
<br>
<input type="submit" onclick="makeSure()" name="submit" value="update" class="btn-lg btn-primary">
</div>
</form>

<div align="center" style="">
<br><hr><h3>Add notes for this month</h3>
<?php
    if (isset($_GET['note'])) {
        echo "<p style='color:green;'>Note inserted successfully</p>";
    }
?>
   <form action="insertNote.php" method="post">
    <textarea style="width: 80%;height: 100px;" placeholder="Add note not more than 100 characters" required="true" name="note"></textarea>
    <br><br>
    <input type="submit" name="submit2" value="Add Note" class="btn-lg btn-primary">
    <br><br>
   </form>

</div>
</div>
</div>



</body>
</html>
<!--<div id="footer">
    <div class="container">
        <p class="footer-block" style="color: white;"><?php //include("footer.php"); ?></p>   
    </div>
</div> -->
<script type="text/javascript">
    function makeSure() {
        alert("This will erase all old data and overwrite. Are you sure to do this?");
    }
</script>