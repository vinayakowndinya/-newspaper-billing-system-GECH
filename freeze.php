<?php

	include("config.php");

	$freezeDate = $_POST['freezeDate'];
	
	$papers = "select slno,paper from cost order by slno";
	$resPapers = mysqli_query($conn,$papers);
	while ($rowPapers = mysqli_fetch_assoc($resPapers))
    {
        $pn = "p".$rowPapers['slno']."";//echo "$pn";
        $$pn = $_POST[''.$pn.''];//echo '$'.$pn.'=$_POST["'.$pn.'"]';
        //echo "<br>$$pn<br>";
    }

    unset($resPapers);
	$resPapers = mysqli_query($conn,$papers);
	while ($rowPapers = mysqli_fetch_assoc($resPapers))
    {
    	$pn = "p".$rowPapers['slno']."";//echo "$pn<br>";
        $insert = "insert into history values('".$rowPapers['paper']."','".$freezeDate."','".$$pn."')";//echo "$insert";
        $resInsert = mysqli_query($conn,$insert);
    }

?>

Please wait. You are being redirected...
<meta http-equiv="Refresh" content="1; url=billing.php?date=<?php echo "".$freezeDate.""; ?>">
