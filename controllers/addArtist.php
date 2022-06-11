<?php
include("../database/db_conn.php");



function addSinger($name,$new_img_name,$nationality){



  $query = "INSERT INTO ARTIST_INFORMATION (ARTIST_NAME,ARTIST_IMAGE,NATIONALITY) 
  VALUES ('$name','$new_img_name','$nationality')";
  
  return $query;
   
  
}







?>