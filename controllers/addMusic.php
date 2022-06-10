<?php
include("../database/db_conn.php");



function addTrack($new_audio_name,$album,$title,$artist_id){



  $query = "INSERT INTO MUSIC_INFORMATION (FILE,MUSIC_TITLE,ALBUM,ARTIST_INFO_ID) 
  VALUES ($new_audio_name,$album,$title,$artist_id)";
  
  return $query;
   
  
}







?>