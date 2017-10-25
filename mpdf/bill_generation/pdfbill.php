<?php
include('../../config.php');
$date = $_GET['date'];



/////////////////////////////////////////////////////////////////////////////////////////////////


  $listPapers = "select paper from cost";
  $resPapers = mysqli_query($conn,$listPapers);
  $count = '0';
  while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
      $count = $count + '1';
  }
  $numOfPapers = $count * 3;
  $numOfPapers+=1;



$table = '<div width="100%" align="center" style="margin-left: 0px;text-transform: uppercase;" >';
$table .='<h3 style="text-align:center;">Government Engineering College, Hassan</h3><h2 style="text-align:center;">Library and Information Center</h2><h4>Newspaper Billing of '.substr($date,0,4).' '.date('F', strtotime("$date")).'  ('.number_format((float)$_GET['total'], 2, '.', '').') </h4>';
$table .= ' <table class="table table-hover table-striped" border="1" style="border-style: solid;" id="testTable" align="center"
 style="text-transform: uppercase;">';
  $table .= '<thead>';
  
   $table .='    <tr>
        <th rowspan="2"></th>';
              $listPapers = "select paper from cost";
              $resPapers = mysqli_query($conn,$listPapers);
              $count = '1';
              while ($rowPapers = mysqli_fetch_assoc($resPapers)) {
                $paperName[$count] = $rowPapers['paper'];
                $paperVar = $rowPapers['paper'];
                $$paperVar = '0';
                $count = $count + '1';
                if($count % '2')
                {
                  $color == '#ffffff';
                }
                else
                {
                  $color = '#b3b3b3';
                }
                $table .= "<th colspan='3' style='width:25%;background-color:".$color.";'>".$rowPapers['paper']."</th>";unset($color);
              }
      $table .= '</tr>
      </thead>
      <tbody>
        <tr style="background-color:#cccccc">';
        
          foreach ($paperName as $a => $b) {
            $table.= "<td><b>UC</b></td><td><b>AT</b></td><td><b>TC</b></td>";
          }

          $daysOfWeek = "select * from daysOfWeek order by id";
          $resDaysOfweek = mysqli_query($conn,$daysOfWeek);
          $count  = '0';
          while ($rowDaysOfWeek = mysqli_fetch_assoc($resDaysOfweek)) {
            if($count % '2')
                {
                  $color == '#ffffff';
                }
            else
                {
                  $color = '#cccccc';
                }
            $table .= "<tr style='background-color:".$color."'><th>".strtoupper($rowDaysOfWeek['day'])."</th>";
            $count++;
            unset($color);
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

              $table.= "<td>".$rowuc['uc']."</td><td>".$rowat['count']."</td><td>".number_format((float)$tc, 2, '.', '')."</td>";
            }
            $table.= "</tr>";
          }
      
          $listPapers = "select paper,slno from cost";
          $resPapers = mysqli_query($conn,$listPapers);
          $table .= "<tr ><th>TOTAL</th>";
          $grandTotal = '0';
          $numOfPapers ='0';
          while ($rowPapers = mysqli_fetch_assoc($resPapers))
          {
            $numOfPapers++;
            $pn = $rowPapers['paper'];
            $allPaperBills[$numOfPapers] = $$pn;
            $table .= "<td colspan='3'><b>".number_format((float)$$pn, 2, '.', '')."</b></td>";
            $grandTotal += $$pn;
          }
          $numOfPapers = ($numOfPapers * '3');
          $numOfPapers-='2';
          $table .= "</tr><tr style='background-color:#b3b3b3;'><th colspan='".$numOfPapers."'>GRAND TOTAL</th><th colspan='3'><b>".number_format((float)$_GET['total'], 2, '.', '')."</b></th></tr>";
      
          $numOfCols = $numOfPapers+3;
          $table .= '<tr><td colspan="'.$numOfCols.'"><div style="text-align: left;">';
          $listNotes = "select * from notes where date like '".$date."%'";
          $resListNotes = mysqli_query($conn,$listNotes);
          while ($rowListNotes = mysqli_fetch_assoc($resListNotes)) {
            $table.= "* ".$rowListNotes['note']."<br>";
          }
          $table .= "</div></td></tr>";

          ////////////////////////print absent papers////////////////////////////////////////////////
          $listPapers = "select paper,slno from cost";
          $resPapers = mysqli_query($conn,$listPapers);
          $monthDays = "select day(last_day('".$date."-1')) as lastDay";//echo "$monthDays";
          $resMonthDays = mysqli_query($conn,$monthDays);
          $rowMonthDays = mysqli_fetch_assoc($resMonthDays);
          $lastDay = $rowMonthDays['lastDay'];
          $table .= "<tr><th>Absence Dates</th>";
          while ($rowPapers = mysqli_fetch_assoc($resPapers))
          {
            $checkAbsent = "select date from attendance where paper like '".$rowPapers['paper']."' and delivery like 'no' and date between '".$date."-01' and '".$date."-".$lastDay."' ";
            $resCheckAbsent = mysqli_query($conn,$checkAbsent);
            $table .= "<td colspan='3'>";
            $count = '1';
            while($rowCheckAbsent = mysqli_fetch_assoc($resCheckAbsent))
            {
              $table .= "&nbsp;".substr($rowCheckAbsent['date'],8,2)."";
              $count++;
              if($count % '5' == '0')
              {
                $table .= "<br>";
              }
            }
            $table .= "</td>";
          }
          $table .= "</tr>";

      $table .= '</tbody>
      <tfoot>
        
      </tfoot>
      </table>';
//////////////////////////////////////////////////////////////////////////////////////////////////////
          $month = substr($date, 5,2);
          $year = substr($date, 0,4);//echo "$month $year";


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