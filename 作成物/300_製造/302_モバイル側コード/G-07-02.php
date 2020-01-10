<?php
require ('controller/session_auth.php');
$ses = new session_auth();

$ses ->require_logined_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-07.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

</head>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>

    <!--　ここから　-->

    <?php
    require('lesson_details.php');
    ?>

    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>
</html>