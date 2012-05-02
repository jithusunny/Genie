<?php
// if data are received via POST, with index of 'test'

$fname = $_POST['fname'];
$fcontents = $_POST['fcontents'];

$fh = fopen('files/'.$fname, 'w') or die("can't open file");

fwrite($fh, $fcontents);
fclose($fh);

return 1;
?> 
