<table class="table" style="width: 80%;font-size: 8px;" align="center" border="1" >
	<tr>
		<th style="text-align: center;"><h4><b>VISVESVARAYA TECHNOLOGICAL UNIVERSITY, BELAGAVI</b></h4>
		ADMISSION TICKET FOR B.E CRASH COURSE - 2016-17
		<!--<img src="newheader1.jpg" width="100%">-->
		<br> <br><br><div>
			<div style="float: left">
				1. UNIVERSITY SEAT NUMBER : <?php echo "$usn"; ?>
			</div>
			
		</div>
		</th>
		<th rowspan="2" style="width: 20%;"></th>
	</tr>
	<tr>
		<th>2. NAME OF THE CANDIDATE &nbsp&nbsp;:<?php echo "$name"; ?></th>
	</tr>
	<TR>
		<TD colspan="2"><b>3.SUBJECTS APPLIED<div style="float: right;margin-right: 10%;">STUDENT COPY</div></b>
		<BR><br>
		<div align="left" style="width: 90%;">
		<?php
		$subjects = "select * from rp_subjects where usn like '".$usn."'";
		$resSubjects = mysqli_query($conn,$subjects);
		while ($rowSubjects = mysqli_fetch_assoc($resSubjects))
		{
			echo "<span style='margin-right:6%;'>".$rowSubjects['scode']."</span>";
			$count = $count + '1';
			if($count == '4')
				echo "";
		}
		?>
		</div>
		<br><br><br><br><P>Note: Please verify the eligibility of candidate before issueing the admission-ticket.<br>This is Electronically Generated Hallticket</P>
		<BR><BR><BR>
		<div align="center">
		<div style="float: left;margin-left: 5%;"><B>Signature of the Candidate</B></div><b>Signature of the Principal</b><div style="float: right;margin-right: 5%;"><b>Registrar (Eval)/Special Officer</b></div></div></TD>
	</TR>
	<tr><td colspan="2" bgcolor="grey">
	<div style="text-align: center">Candidate must read the instructions provided in the answer booklet, before the commencement of examination.</div>
	</td>
	</tr>
</table>
