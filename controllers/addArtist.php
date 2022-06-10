<?php
include("../database/db_conn.php");



function addSinger($name,$nationality){



  $query = "INSERT INTO ARTIST_INFORMATION (ARTIST_NAME,NATIONALITY) 
  VALUES ('$name','$nationality')";
  
  return $query;
   
  
}







?>