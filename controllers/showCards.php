<?php
include("../database/db_conn.php");



function showCards(){



  $query = "SELECT * FROM ARTIST_INFORMATION WHERE DELETE_FLAG = 0 " ;
  
  return $query;
   
  
}







?>