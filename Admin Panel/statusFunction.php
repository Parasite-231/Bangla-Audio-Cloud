<?php
include("../databaseConnection.php");
function updateStatus($conn,$result)
{
    if ($result && mysqli_num_rows($result) > 0) {
        while ($list = mysqli_fetch_assoc($result)) {
            $location_id = $list['LOCATION_ID'];

            if ($location_id > 0) {
                return $location_id;
            } 
        }
    }
}

?>