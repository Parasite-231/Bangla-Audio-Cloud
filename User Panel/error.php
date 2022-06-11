<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="./css/error.css">
    <link rel="shortcut icon" type="image/x-icon" href="../icons/error.png">
    <title>Error</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                    <div class="error-details">
                        <?php if (isset($_GET['error'])) {  ?>
                        <p><?=$_GET['error']?></p>
                        <?php } ?>
                    </div>
                    <div class="error-actions">
                        <a href="../User Panel/home.php" class="btn btn-success btn-lg"><span
                                class="glyphicon glyphicon-home"></span>
                            Take Me Home </a><a href="../User Panel/contact.php" class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-envelope"></span> Contact Support </a>


                    </div>

                    <div style="width:480px" style="text-align:centre ;">
                        <iframe allow="fullscreen" frameBorder="0" height="320"
                            src="https://giphy.com/embed/u2wg2uXJbHzkXkPphr/video" width="480"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>