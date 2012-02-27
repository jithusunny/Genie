<?php
require('function/dbconf.php');

$username = $_POST['uname'];
$password = $_POST['pwd'];

// echo $username , $password ;

$sql = 'INSERT INTO `genie`.`g_user` (`u_id`, `uname`, `password`) VALUES (NULL, \''.$username.'\', \''.$password.'\');'; 

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
?>
