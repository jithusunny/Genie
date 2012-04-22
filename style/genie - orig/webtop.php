<?php
session_start();

if (!$_SESSION["valid_user"])
{
// User not logged in, redirect to login page
Header("Location: index.php");
}

// Member only content
// ...
// ...
// ...

// Display Member information
echo "<p>User ID: " . $_SESSION["valid_id"];
echo "<p>Username: " . $_SESSION["valid_user"];
echo "<p>Logged in: " . date("m/d/Y", $_SESSION["valid_time"]);

// Display logout link
echo "<p><a href=logout.php>Click'here to logout!</a></p>";
?>
