<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome | Bangla Music Cloud </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../icons/icon2.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon2.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon3.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon4.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon5.png"> -->
    <link rel="stylesheet" href="./css/fit.css">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</head>

<?php

    include("./partials/navbar.php");
    include("./partials/showFrames.php");
    include("./partials/showHeading.php");
    
?>
<div class="container py-5">
    <div class="row mt-4">

        <?php 
    require '../database/db_conn.php';
    require("../controllers/showCards.php");


   
    $query = showCards();
    $run = mysqli_query($conn,$query);
    $data = mysqli_num_rows($run) > 0 ;
    if($data){

        while ($row = mysqli_fetch_assoc($run)) {
           
            ?>
        <div class="col-md-4">
            <div class="card">
                <img src="../images/<?php echo $row['ARTIST_IMAGE'] ?>" class="card-img-top" width="340px"
                    height="300px" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Singer : <?php echo $row['ARTIST_NAME'] ?></h5>
                    <p class="card-text">Nationality : <?php echo $row['NATIONALITY'] ?></p>

                    <form>
                        <a href="songChart.php?id=<?php echo $row['ARTIST_INFO_ID'];?>"
                            class="btn btn-info">Listen&nbsp;<img src="../icons/icon5.png" height="30px"
                                width="30px" /></a>

                    </form>
                </div>
            </div>
        </div>

        <?php
        }
    }

    else{

        header("Location: error.php");
    }

    ?>




    </div>
</div>
</body>

</html>