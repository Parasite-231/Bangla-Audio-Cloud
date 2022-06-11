<?php
include("../database/db_conn.php");



function showSongList($id){



  $sql = "SELECT * FROM MUSIC_INFORMATION WHERE ARTIST_INFO_ID = '$id' AND DELETE_FLAG = 0 ORDER BY ADDED_DATE DESC" ;
  
  return $sql;
   
  
}







?>