<?php
session_start();
if(!$_SESSION['pseudo'])
{

	header('Location: login.php');
}





 ?>