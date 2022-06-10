<?php  

include("../database/db_conn.php");
require("../Functions/function.php");



$result = 0;
$selected_singer = '';
$artist_info_id = 0;

if (isset($_POST['upload']) && isset($_FILES['my_audio'])) 
{    include "../database/db_conn.php";
    $audio_name = $_FILES['my_audio']['name'];
    $tmp_name = $_FILES['my_audio']['tmp_name'];
    $error = $_FILES['my_audio']['error'];
     $album = $_POST['album'];
     $title = $_POST['title'];
     $selected_singer = $_POST['selected_singer'];
     
     $artist_info_id = "SELECT ARTIST_INFO_ID AS ARTIST_INFO_ID FROM ARTIST_INFORMATION WHERE ARTIST_NAME = '$selected_singer' ";
    // echo $selected_sensor;
    $result = mysqli_query($conn, $artist_info_id);
    if ($result && mysqli_num_rows($result) > 0) {
        $s_id = mysqli_fetch_assoc($result);
        $artist_id = $s_id['ARTIST_INFO_ID'];
        // echo "$sensor_id";
        
    }
     
     require("../controllers/addMusic.php");
     if ($error === 0) {
    	$audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

    	$audio_ex_lc = strtolower($audio_ex);

    	$allowed_exs = array("mp4", 'mp3', 'wav', 'm4a');

    	if (in_array($audio_ex_lc, $allowed_exs)) {
           
    		
    		$new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
    		$audio_upload_path = '../uploads/'.$new_audio_name;
    		move_uploaded_file($tmp_name, $audio_upload_path);

    		// Now let's Insert the video path into database
            // $query = addTrack($new_audio_name,$album,$title,$artist_id );
            
            $query = "INSERT INTO MUSIC_INFORMATION (FILE,MUSIC_TITLE,ALBUM,ARTIST_INFO_ID) 
            VALUES ('$new_audio_name','$title','$album','$artist_id')";
           
            mysqli_query($conn, $query);
            header("Location: showSuccess.php");
    	}else {
    		header("Location: showError.php");
    	}
    }
     

    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../icons/manager.png">
    <link rel="stylesheet" href="../CSS Files/Admin Panel Designs/AdminDashboardDesign.css">

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="../js/printerBot.js"></script>


    <title>Active Tracks</title>





</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-4 col-lg-2 me-0 px-3" style="text-align: center;" href="#"> <img
                src="../icons/music-note.png" width="35px" height="35px" alt="">&nbsp;AudioCloud</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#" style="color: white;">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item ">

                            <a class="nav-link active" style="color: white;" aria-current="page" href="dashboard.php">

                                <i class='bx bxs-dashboard'></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="showSensors.php" class="nav-link " style="color: white;">
                                <i class='bx bxs-analyse'></i>
                                Artists
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="showTracks.php" class="nav-link " style="color: white;">
                                <i class='bx bxs-building-house'></i>
                                Music
                            </a>
                        </li>
                        <li class="nav-item ">
                            <p style="color:cyan">Add Data &nbsp;<i class='bx bxs-right-arrow'></i></p>
                            <a class="nav-link " href="sensorDataBasedOnTwoLocationBetweenTwoDate.php"
                                style="color: white;">
                                <i class='bx bxs-location-plus'></i>
                                Add Artist
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="sensorDataBasedOnSpecificSensorAndLocationBased.php"
                                style="color: white;">
                                <i class='bx bxs-edit-location'></i>
                                Add Music
                            </a>
                        </li>



                    </ul>
                    <hr>

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../ICONS/admin0.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>Admin</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" width="23" height="25" fill="none" stroke="#ffffff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!
                                        Atomicons Free 1.00 by @atisalab License - https://atomicons.com/license/
                                        (Icons: CC BY 4.0) Copyright 2021 Atomicons --&gt;<circle cx="12" cy="12" r="3">
                                        </circle>
                                        <path
                                            d="M19.74,14H21a1,1,0,0,0,1-1V11a1,1,0,0,0-1-1H19.74l0-.14a8.17,8.17,0,0,0-.82-1.92l.89-.89a1,1,0,0,0,0-1.41L18.36,4.22a1,1,0,0,0-1.41,0l-.89.89A8,8,0,0,0,14,4.25V3a1,1,0,0,0-1-1H11a1,1,0,0,0-1,1V4.25a8,8,0,0,0-2.06.86l-.89-.89a1,1,0,0,0-1.41,0L4.22,5.64a1,1,0,0,0,0,1.41l.89.89a8.17,8.17,0,0,0-.82,1.92l0,.14H3a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1H4.26l0,.14a8.17,8.17,0,0,0,.82,1.92L4.22,17a1,1,0,0,0,0,1.41l1.42,1.42a1,1,0,0,0,1.41,0l.89-.89a8,8,0,0,0,2.06.86V21a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1V19.75a8,8,0,0,0,2.06-.86l.89.89a1,1,0,0,0,1.41,0l1.42-1.42a1,1,0,0,0,0-1.41l-.89-.89a8.17,8.17,0,0,0,.82-1.92Z">
                                        </path>
                                    </svg>&nbsp;&nbsp;Settings</a></li>
                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" width="23" height="25" fill="none" stroke="#ffffff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!
                                        Atomicons Free 1.00 by @atisalab License - https://atomicons.com/license/
                                        (Icons: CC BY 4.0) Copyright 2021 Atomicons --&gt;<circle cx="12" cy="6" r="4">
                                        </circle>
                                        <path
                                            d="M17.67,22a2,2,0,0,0,1.92-2.56A7.8,7.8,0,0,0,12,14a7.8,7.8,0,0,0-7.59,5.44A2,2,0,0,0,6.34,22Z">
                                        </path>
                                    </svg>&nbsp;&nbsp;Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" width="23" height="25" fill="none" stroke="#ffffff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!
                                        Atomicons Free 1.00 by @atisalab License - https://atomicons.com/license/
                                        (Icons: CC BY 4.0) Copyright 2021 Atomicons --&gt;<path
                                            d="M14,7V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V20a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V17">
                                        </path>
                                        <line x1="10" y1="12" x2="22" y2="12"></line>
                                        <polyline points="18 8 22 12 18 16"></polyline>
                                    </svg>&nbsp;&nbsp;Sign out</a></li>
                        </ul>
                    </div>




                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <!-- <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul> -->
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="heading" style="font-size: 17px;"> <i class='bx bxs-notepad'></i></i>&nbsp;Active Tracks
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div> -->
                        <form action="">
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
                        </form>
                    </div>
                </div>

                <!--date-->
                <!-- <div class="bootstrap-iso">
                    <div class=" container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12"> -->

                <!-- Form code begins -->


                <div class="card w-100" style="height: auto;">
                    <div class=" card-body" style="width: 100% ;height:auto">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-7" style="width: 100%;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="my_audio"
                                        style="width: 100%;">
                                    <label class="custom-file-label" for="inputGroupFile02"></label>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Music Title :</label>
                                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                                    placeholder="Music Title">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"> Album :</label>
                                <input type="text" class="form-control" name="album" id="exampleFormControlInput1"
                                    placeholder="Music Album">
                            </div>
                            <div class="col-md-4 col-lg-2 "
                                style="width:100%; margin: 0 auto; float: none; margin-bottom: 10px;">
                                <label class="control-label" for="date">Select Singer : </label>
                                <?php
                                  

                                    


                                  //Gather Information
                                  $sql_for_selected_singer = "SELECT * FROM ARTIST_INFORMATION ORDER BY ARTIST_INFO_ID ASC";
                                  $result_for_selected_singer = mysqli_query($conn, $sql_for_selected_singer);

                                  ?>

                                <select class="form-select" aria-label="Select Specific Region" id="selected_sensor"
                                    name="selected_singer">

                                    <option value='<?php echo $selected_singer ?>'><?php echo $selected_singer ?>
                                    </option>

                                    <!-- Loop For Fetch Result -->
                                    <?php while($row = mysqlI_fetch_array($result_for_selected_singer) ) : ?>
                                    <option value=<?php echo($row['ARTIST_NAME']);?>>
                                        <?php echo($row['ARTIST_NAME']);?></option>

                                    <?php endwhile; ?>
                                    <!-- End Loop for Fetch Result -->
                                </select>
                            </div>
                    </div>


                    <!-- Submit button -->
                    <div class="col-md-4 col-lg-2"
                        style="width:100%; margin: 0 auto; float: none; margin-bottom: 10px;">
                        <button class="btn btn-info" style="margin-top:10px;width:100%" name="upload"
                            type="submit">Upload</button>
                    </div>
                    </form>
                </div>
        </div>






        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
            integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
        </script>
        <script src="dashboard.js"></script>
        <script src="../js/dateBot.js"></script>
</body>

</html>