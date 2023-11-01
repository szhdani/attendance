<?php
    include_once 'session.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Attendance - <?php echo $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="css/site.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">IT Conference</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav me-auto">
                            <a class="nav-link active" href="index.php">Home</a>
                            <a class="nav-link" href="viewrecords.php">View attendees</a>
                        </div>
                        <div class="navbar-nav ms-auto">
                            <?php
                                if(!isset($_SESSION['userid'])){
                            ?>
                            <a class="nav-link" href="login.php">Log in</a>
                            <?php }
                                else{ ?>
                            <a class="nav-link" href="#">Hello <?php echo $_SESSION['username']?>!</a>
                            <a class="nav-link" href="logout.php">Log out</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </nav>
            <br/>