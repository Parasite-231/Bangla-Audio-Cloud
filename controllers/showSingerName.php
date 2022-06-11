<?php
include("../database/db_conn.php");



function showSingerName($id){



    $query = "SELECT ARTIST_NAME AS ARTIST_NAME FROM ARTIST_INFORMATION
     WHERE ARTIST_INFO_ID = '$id'";
  
  return $query;
   
  
}







?>