<?php session_start();

// if session is not set redirect the user
if(empty($_SESSION['u_name']))
	header("Location:index.html");	

//if logout then destroy the session and redirect the user
if(isset($_GET['logout']))
{
	session_destroy();
	header("Location:index.html");
}	

//echo "<a href='secure.php?logout'><b>Logout<b></a>";
?>
