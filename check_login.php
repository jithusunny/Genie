<?php
require('function/dbconf.php');

$username = $_POST['uname'];
$password = $_POST['pwd'];

//echo $username , $password ;

$sql = 'SELECT password FROM `g_user` WHERE uname=\''.$username.'\'';
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

//echo $row['password'];
if($row == '')
{
die('Not registered');
}
elseif ($row['password']==$password)
{
echo "success";
}
else
{
echo "Wrong Username/Password";
}



?>
