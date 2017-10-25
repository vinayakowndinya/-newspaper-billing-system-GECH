<?php
$date = $_POST['date'];

$date = '2017-05';

$month = substr($date, 5,2);
$year = substr($date, 0,4);echo "$month $year";

showMonth($month,$year);

function showMonth($month, $year)
{
  $date = mktime(12, 0, 0, $month, 1, $year);
  $daysInMonth = date("t", $date);
  // calculate the position of the first day in the calendar (sunday = 1st column, etc)
  $offset = date("w", $date);
  $rows = 1;
   
   
  echo "<table border=\"1\">\n";
  echo "<tr><td colspan='7'>" . date("F Y", $date) . "</td></tr>\n";
  echo "\t<tr><th>Su</th><th>M</th><th>Tu</th><th>W</th><th>Th</th><th>F</th><th>Sa</th></tr>";
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