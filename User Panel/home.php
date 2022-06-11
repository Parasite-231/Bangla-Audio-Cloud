<?php include('./partials/header.php') ?>
<?php include('./partials/navbar.php') ?>
<?php include('./partials/showFrames.php') ?>


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
            <div class="card" style="width: 18rem;margin:2%">
                <img src="../images/<?php echo $row['ARTIST_IMAGE'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Singer : <?php echo $row['ARTIST_NAME'] ?></h5>
                    <p class="card-text">Nationality : <?php echo $row['NATIONALITY'] ?></p>


                    <a href="songChart.php" class="btn btn-primary">Listen&nbsp;<img src="../icons/icon6.png"
                            height="30px" width="30px" /></a>
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