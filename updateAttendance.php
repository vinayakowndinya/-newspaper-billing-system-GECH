<?php

	include("config.php");
	$date = $_POST['date2'];
	$deldate = $_POST['deldate'];

	

	
	$listPapers = "select paper,slno from cost";
	$resListPapers = mysqli_query($conn,$listPapers);
	$count = '1';
	$a = 'count';
	while ($rowListPapers = mysqli_fetch_assoc($resListPapers))
	{
		$paperName[$count] = $rowListPapers['paper'];
		$paperNo[$count] = "p".$rowListPapers['slno']."";//echo "$paperNo[$count]";
		${$paperNo[$count]} = $_POST[''.$paperNo[$count].''];//echo "\$_POST['".$paperNo[$count]."']";
		/*foreach ($$paperNo as $key => $value) {
			echo "".${$paperNo[$count]}[$key]."<br>";
		}*/
		$count=$count+'1';
		//echo "<b>".${$a}."</b><br>";
	}


	$delete = "delete from attendance where date like '".$deldate."%'";//echo "$delete<br>";
	$resDelete = mysqli_query($conn,$delete);


	//echo "<hr>";
	foreach ($date as $a => $b) {
		//echo "$date[$a]<br>";
		foreach ($paperName as $c => $d) {
			//echo "".$paperName[$c]."".$paperNo[$c]."<br>";
			$p = $paperNo[$c];
			$insert = "insert into attendance values('".$paperName[$c]."','".$date[$a]."',dayname(".$date[$a]."),'".${$p}[$a]."')";//echo "$insert<br>";
			$resInsert = mysqli_query($conn,$insert);
		}
		unset($c);
		//echo "<hr>";
	}

?>
Please wait. You are being redirected...
<meta http-equiv="Refresh" content="1; url=edit.php?date=<?php echo "".$deldate.""; ?>">
