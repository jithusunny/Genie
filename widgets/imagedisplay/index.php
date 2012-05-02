<?PHP // filetypes to display 
$imagetypes = array("image/jpeg", "image/gif","image/jpg"); 
?>

<?PHP 
// Original PHP code by Chirp Internet: www.chirp.com.au 
// Please acknowledge use of this code by including this header. 
function getImages($dir) 
{ global $imagetypes; 
// array to hold return value 
$retval = array(); 
// add trailing slash if missing 
if(substr($dir, -1) != "/") 
$dir .= "/"; 
// full server path to directory 
$fulldir = "{$_SERVER['DOCUMENT_ROOT']}/$dir"; 
//echo $fulldir;
$d = @dir($fulldir) or die("getImages: Failed opening directory $dir for reading"); 
while(false !== ($entry = $d->read())) 
{ 
// skip hidden files 
if($entry[0] == ".") 
continue; 
// check for image files 
$f = escapeshellarg("$fulldir$entry"); 
$mimetype = trim(`file -bi $f`); 
foreach($imagetypes as $valid_type) 
{ 
  if(preg_match("@^{$valid_type}@", $mimetype)) 
   { $retval[] = array( 'file' => "/$dir$entry", 'size' => getimagesize("$fulldir$entry") ); 
   break; 
   } 
} 
} 
$d->close(); 
return $retval; 
} 
?>


 
 <html>
 <head>
 <style type="text/css"> 
 .photo { 
 float: left; 
 margin: 0.5em; 
 border: 1px solid #ccc; 
 padding: 1em; 
 font-size: 10px; 
 } 
 </style>
 </head>
 <body>
 <?PHP 
// fetch image details 
$images = getImages("widgets/imagedisplay/images"); 
//echo $images;
// display on page 
foreach($images as $img) 
{ 
print "hai";
echo "<img class=\"photo\" src=\"{$img['file']}\" {$img['size'][3]} alt=\"\">\n"; 
}
 ?>
 </body>
 </html>