<?php  

include("../database/db_conn.php");
require("../Functions/function.php");



$result = 0;



if (isset($_POST['search'])) {

   

    // include("../controllerOne.php");
    require("../controllers/showTracksBetweenTwoDates.php");

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];


   
    $query = findTracksBetweenTwoDates($start_date,$end_date);
    $result = mysqli_query($conn, $query);
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
                    <!--sidebar-->
                    <?php 
                include("./partials/sideBar.php");
                ?>
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
                        <form action=""></form>
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
                        <form method="POST">
                            <div class="row">
                                <div class="col">
                                    <label class="control-label" for="date">From : </label>
                                    <!-- <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY"
                                        type="text" /> -->
                                    <i class='bx bxs-calendar' style="float:right ;"></i>
                                    <input class="form-control" type="date" placeholder="MM-DD-YYYY " id="start"
                                        name="start_date" value="<?php echo $start_date ?>" min="2020-01-01"
                                        max="<?php echo newDate(0) ?>" />


                                </div>
                                <div class="col" style="margin-bottom: 10px">
                                    <label class="control-label" for="date">To :</label>
                                    <!-- <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY"
                                        type="text" /> -->
                                    <i class='bx bxs-calendar' style="float:right ;"></i>
                                    <input class="form-control" type="date" placeholder="MM-DD-YYYY" id="start"
                                        name="end_date" value="<?php echo $end_date ?>" min="2020-01-01"
                                        max="<?php echo newDate(0) ?>" />

                                </div>

                            </div>
                            <!-- Submit button -->
                            <div class="col-md-4 col-lg-2"
                                style="width:100%; margin: 0 auto; float: none; margin-bottom: 10px;">
                                <button class="btn btn-info" style="margin-top:10px;width:100%" name="search"
                                    type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Form code ends -->

                <!-- </div> -->
                <!-- </div>
                    </div>
                </div> -->


                <!-- <h2>Section title</h2> -->
                <div class="table-responsive" id="printableTable" style="margin-top:20px ;">
                    <table class="table table-bordered table-dark" style=" border: 20px white;font-size: 16px;">
                        <thead>
                            <tr>
                                <th>TRACK_ID</th>
                                <th>MUSIC_TITLE</th>
                                <th>ALBUM</th>
                                <th>ADDED_DATE</th>
                                <th>SINGER_NAME</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

if ($result && mysqli_num_rows($result) > 0) {
    while ($list = mysqli_fetch_assoc($result)) {
        $TRACK_ID = $list['TRACK_ID'];
        $MUSIC_TITLE = $list['MUSIC_TITLE'];
        $ALBUM = $list['ALBUM'];
        $ADDED_DATE = $list['ADDED_DATE'];
        $SINGER_NAME = $list['SINGER_NAME'];
  

        echo "
      
        <tr>
            <td>$TRACK_ID</td>
            <td>$MUSIC_TITLE</td>
            <td>$ALBUM</td>
            <td>$ADDED_DATE</td>
            <td>$SINGER_NAME</td>
    
        </tr>
     
        
        
        ";
      
    }
    // echo "<input type='button' class='btn btn-warning' style='margin:1%' onclick='PrintTable();' value='Print'/>";

    echo " <a href='showTracks.php' style='float:right;margin:1%' class='btn btn-danger'>Reset</a>";

    
}
else  if($result && mysqli_num_rows($result) <= 0){
  echo 
   "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <img src='../ICONS/folder3.png' height='40' width='40'/>
  Sorry there is no such recorded data within this date !
</div>
<a href='showTracks.php' style='float:right;margin:1%' class='btn btn-danger'>Search Again</a>
";
  } 
  
?>

                        </tbody>
                    </table>
                </div>
                <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>




                <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
                    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
                    crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
                    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
                    crossorigin="anonymous">
                </script>
                <script src="dashboard.js"></script>
                <script src="../js/dateBot.js"></script>
</body>

</html>