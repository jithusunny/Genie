<?php

$link = mysql_connect('localhost', 'root', 'usbw'); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//select the database | Change the name of database from here
mysql_select_db('genie'); 

$username = $_POST['uname'];
$password = $_POST['pwd'];

// echo $username , $password ;

$sql = 'INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES (NULL, \''.$username.'\', \''.md5($password).'\');';

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
?>
