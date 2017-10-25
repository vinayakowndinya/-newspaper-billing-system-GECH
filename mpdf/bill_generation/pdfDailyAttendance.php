<?php
include('../../config.php');
$date = $_GET['date'];



/////////////////////////////////////////////////////////////////////////////////////////////////


  
$monthDays = "select day(last_day('".$date."-01')) as lastDay";
$resMonthDays = mysqli_query($conn,$monthDays);
$rowMonthDays = mysqli_fetch_assoc($resMonthDays);
$lastDay = $rowMonthDays['lastDay'];



$table = '<div width="100%" align="center" style="margin-left: 0px;text-transform: uppercase;" >';
$table .='<h3 style="text-align:center;">Government Engineering College, Hassan</h3><h2 style="text-align:center;">Library and Information Center</h2><h4>Newspaper Billing of '.substr($date,0,4).' '.date('F', strtotime("$date")).' </h4>';
$table .= ' <table class="table table-hover table-striped" border="1" style="border-style: solid;" id="testTable" align="center"
 style="text-transform: uppercase;">';
  $table .= '<thead>';
  

  $table .= "<tr><th>Papers</th>";
for ($i=1; $i <= $lastDay; $i++) { 
  $table .= "<th>$i</th>";
}
$table .= "</tr></thead><tbody>";

$listPapers = "select paper from cost";
$resPapers = mysqli_query($conn,$listPapers);
while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
    echo "<tr><th colspan='1' style=''>"."a"."</th>";
    
    echo "</tr>";
}

      $table .= '</tbody></table>';

      /////////////////////////////////////////////////////////////////////////////////////////////////
$html = $table;
$html .= $table2;

include("../mpdf.php");
$mpdf=new mPDF('c','A4-L','','',10,10,10,10,10,10);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;    
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1); 

$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
?>



<?php


function showMonth($month, $year)
{
  $date = mktime(12, 0, 0, $month, 1, $year);
  $daysInMonth = date("t", $date);
  // calculate the position of the first day in the calendar (sunday = 1st column, etc)
  $offset = date("w", $date);
  $rows = 1;
   
   
  $table2 .= "<table border=\"0\" style='text-align:center;'  >\n";
  $table2 .= "<tr ><td  colspan='7'>" . date("F Y", $date) . "</td></tr>\n";
  $table2 .= "\t<tr ><th style='width:30px;' >Su</th><th style='width:30px;'>M</th><th style='width:30px;'>Tu</th><th style='width:30px;'>W</th><th style='width:30px;'>Th</th style='width:30px;'><th style='width:30px;'>F</th><th style='width:30px;'>Sa</th></tr>";
  $table2 .= "\n\t<tr>";
   
  for($i = 1; $i <= $offset; $i++)
  {
    $table2 .= "<td></td>";
  }
  
  for($day = 1; $day <= $daysInMonth; $day++)
  {
    if( ($day + $offset - 1) % 7 == 0 && $day != 1)
    {
      $table2 .= "</tr>\n\t<tr>";
      $rows++;
    }
   
    $table2 .= "<td>" . $day . "</td>";
  }

  while( ($day + $offset) <= $rows * 7)
  {
    $table2 .= "<td></td>";
    $day++;
  }

  $table2 .= "</tr>\n";
  $table2 .= "</table>\n";
}
?>