<?php

session_start();

if(isset($_SESSION['email']))
{
	$_SESSION['email'] = null ;

}

header("Location: login.php");
die;
