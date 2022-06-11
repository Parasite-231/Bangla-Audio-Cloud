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



<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#f08396 ;">
        <div class="container-fluid">
            <img src="../icons/icon.png" height="50px" alt="">
            <a class="navbar-brand" href="#">&nbsp;Bangla Music Cloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=".././home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../User Panel/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../User Panel/contact.php">Contact us</a>
                    </li>
                    <!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->

                </ul>
                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-2" name="search" type="search"
                        placeholder="<?php echo $placeholder ?>" ; aria-label="Search" value="<?php
                        
                        if(isset($_GET['search'])){

                            echo $_GET['search']; 
                        }
                        
                        ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php

if (isset($_GET['search'])){

    $filter = $_GET['search'];
    $search = "SELECT * FROM MUSIC_INFORMATION WHERE
    CONCAT(MUSIC_TITLE,ALBUM) LIKE '%$filter%'";

    $search_run = mysqli_query($conn,$search);

    
if (mysqli_num_rows($search_run) > 0) {
    while ($audio_search = mysqli_fetch_assoc($search_run)) { 
?>

    <!-- Full Page Intro -->

    <div class="view">
        <!-- Mask & flexbox options-->
        <div class="mask gradient-card align-items-center">
            <!-- Content -->

            <div class="container d-flex justify-content my-4 mb-5">

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
                                    : <?php echo $audio_search['MUSIC_TITLE'] ?></a></h5>
                            <p class="mb-0">Album : <?php echo $audio_search['ALBUM'] ?></p>
                            <hr>
                            <audio id="music" preload="true" controls>
                                <source src="../uploads/<?=$audio_search['FILE']?>">
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
}else if(mysqli_num_rows($search_run) <= 0) {
    $error = "Sorry ! Your requested Data can't be proceed at this moment :(";
    // header("Location: error.php?error=$error");
    
}
}


?>