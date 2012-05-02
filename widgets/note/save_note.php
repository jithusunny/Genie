<?php
// if data are received via POST, with index of 'test'

$note = $_POST['note'];

$fh = fopen('notes.txt', 'w') or die("can't open file");

fwrite($fh, $note);
fclose($fh);

return 1;
?> 
