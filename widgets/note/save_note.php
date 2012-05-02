<?php
// if data are received via POST, with index of 'test'

$myFile = "note.txt";


$fh = fopen($myFile, 'w') or die("can't open file");

$stringData = $_POST['note'];


fwrite($fh, $stringData);
fclose($fh);

return 1;
?> 
