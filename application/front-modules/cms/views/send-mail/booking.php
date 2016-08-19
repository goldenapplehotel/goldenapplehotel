<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<body>

<p>Dear Admin</p>

<div><?php echo $message;?></div>

<?php
	if($title ){ ?>
	
<div>Room Name: <?php echo $title;?></div>

<div>Room Id: <?php echo $room_type;?></div>

<?
	}

?>

<div>ChekIn date: <?php echo $checkin;?></div>

<div>CheckOut Date: <?php echo $checkout;?></div>

<div>Guest amount: <?php echo $guest;?></div>

<div>Customer email: <?php echo $email_from;?></div>

<div>Customer tel: <?php echo $phone;?></div>

</body>

</html>