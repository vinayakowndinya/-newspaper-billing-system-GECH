
<?php
$list=array();
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, date('m'), $d, date('Y'));
    if (date('m', $time)==date('m'))
        $list[]=date('Y-m-d-D', $time);
}
echo "<pre>";
print_r($list);
echo "</pre>";
?>