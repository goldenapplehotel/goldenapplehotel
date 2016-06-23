<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/admin-bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/metisMenu.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/raphael-min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/sb-admin-2.js"></script>



    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css">
    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/bower_components/Font-Awesome/css/font-awesome.css">
    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/build.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/metisMenu.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/timeline.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/sb-admin-2.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/morris.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/font-awesome.css">
    <link  rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/admin-style.css">


<!--    <link type="text/css" rel="stylesheet" href="--><?php //echo BASE_URL;?><!--assets/css/admin.css">-->
</head>

<body>

<div id="wrapper">

    <?php include('nav.php');?>
    <div id="page-wrapper">
    <?php $this->load->view($main_content); ?>
    </div>
</div>

</body>
</html>