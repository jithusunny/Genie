<?php

$link = mysql_connect('localhost', 'root', 'usbw'); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//select the database | Change the name of database from here
mysql_select_db('genie'); 

$username = $_POST['uname'];
$password = $_POST['pwd'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['pwd'];

// echo $username , $password ;
$sql = 'INSERT INTO `users` (`user_id`, `user_name`, `password`, `name`, `email`, `mobile`) VALUES (NULL, \''.$username.'\', \''.md5($password).'\', \''.$name.'\', \''.$email.'\', \''.$mobile.'\');';

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
  header("Location:success_reg.html");
?>
