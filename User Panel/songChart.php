<?php 

require '../database/db_conn.php';



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Song Chart </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../icons/icon2.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon3.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon4.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon5.png"> -->
    <link rel="stylesheet" href="./css/new.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../js/audioBot.js"></script>
</head>


<?php

    $placeholder = "Search by music...";
    include("./partials/navbar.php");
    require("../controllers/showSingerName.php");

    $id = $_GET['id'];
    $query = showSingerName($id);
    $run = mysqli_query($conn,$query);
    $data = mysqli_num_rows($run) > 0 ;
    if($data){

        while ($row = mysqli_fetch_assoc($run)) {
           
            	
            $artist_name = $row['ARTIST_NAME'];


            include("./partials/songListHeader.php");

        }
    }
    
    
?>

<hr>
<div class="bg">
    <!-- <div class="container"> -->
    <?php

$id = $_GET['id'];	

$sql = "SELECT * FROM MUSIC_INFORMATION WHERE ARTIST_INFO_ID = '$id'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($audio = mysqli_fetch_assoc($res)) { 
?>

    <!-- Full Page Intro -->

    <div class="view" style="display: inline-block ;margin:1%">
        <!-- Mask & flexbox options-->
        <div class="mask gradient-card align-items-center">
            <!-- Content -->

            <div class="container ">

                <div id="mobile-box">


                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <div class="view">
                            <img class="card-img-top" src="../icons/a.jpg" alt="Card image cap">
                            <a href="https://bachataurban.com/" target="_blank">
                                <div class="mask gradient-card"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body text-center">

                            <h5 class="h5 font-weight-bold"><a href="https://bachataurban.com/" target="_blank">
                                    Music Title
                                    : <?php echo $audio['MUSIC_TITLE'] ?></a></h5>
                            <p class="mb-0">Album : <?php echo $audio['ALBUM'] ?></p>
                            <hr>
                            <audio id="music" preload="true" controls>
                                <source src="../uploads/<?=$audio['FILE']?>">
                            </audio>


                        </div>

                    </div>
                    <!-- Card -->


                </div>
            </div>
            <!-- Content -->



        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->



    <?php 
}
}else if(mysqli_num_rows($res) <= 0) {
    $error = "Sorry ! Your requested Data can't be proceed at this moment :(";
    header("Location: error.php?error=$error");
    
}

?>
</div>
<hr>
<!-- </div> -->
<script src="../js/audioBot.js"></script>
</body>

</html>