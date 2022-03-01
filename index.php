<?php
session_start();
include_once("pages/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Agency</title>
    <!-- Bootstrap -->
<!--    <link href="assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <header class="col-sm-12 col-md-12 col-lg-12">
        </header>
    </div>
    <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">
            <?php
            include_once('partials/menu.php');
?>
        </nav>
    </div>
    <div class="row">
        <section class="col-sm-12 col-md-12 col-lg-12">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 1)
                    include_once("pages/tours.php");
                if ($page == 2)
                    include_once("pages/comments.php");
                if ($page == 3)
                    include_once("pages/registration.php");
                if ($page == 4)
                    include_once("pages/admin.php");
            }
            ?>
        </section>
    </div>
    <div class="row">
        <footer>Step Academy &copy;</footer>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript
plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<!-- Include all compiled plugins (below), or include
individual files as needed -->
<script src="assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
<!--<script src="assets/js/bootstrap.min.js"></script>-->
</body>
</html>