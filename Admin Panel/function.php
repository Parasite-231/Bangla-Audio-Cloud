<?php
include("../databaseConnection.php");
function newDate($day)
{
$date = date('Y-m-d', time() + 4 * 3600);
echo date('Y-m-d', strtotime($date . ' + ' . $day . 'days'));
}
?>