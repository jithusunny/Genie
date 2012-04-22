<?php
session_start();

// if session is not set redirect the user
if(empty($_SESSION['u_name']))
	header("Location:index.html");	

//if logout then destroy the session and redirect the user
if(isset($_GET['logout']))
{
	session_destroy();
	header("Location:index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
<meta name="description" content="Genie" />
<title>Genie - JQuery Desktop</title>
<link rel="stylesheet" href="assets/css/reset.css" />
<link rel="stylesheet" href="assets/css/desktop.css" />

</head>
<body>
<div class="abs" id="wrapper">
  <div class="abs" id="desktop">
    <a class="abs icon" style="left:20px;top:20px;" href="#icon_dock_computer">
      <img src="assets/images/icons/icon_32_computer.png" />
      Computer
    </a>
	<a class="abs icon" style="left:100px;top:20px;" href="#icon_dock_facebook">
      <img src="assets/images/icons/icon_22_fb.png" />
      Facebook
    </a>
	<a class="abs icon" style="left:20px;top:100px;" href="#icon_dock_textarea">
      <img src="assets/images/icons/icon_16_page.png" />
      TextEditor
    </a>
	<a class="abs icon" style="left:20px;top:180px;" href="#icon_dock_music">
      <img src="assets/images/icons/icon_16_music.png" />
      Audios
    </a>
	<a class="abs icon" style="left:20px;top:260px;" href="#icon_dock_photo">
      <img src="assets/images/icons/icon_16_photo.png" />
      Albums
    </a>
	<a class="abs icon" style="left:20px;top:340px;" href="#icon_dock_disc">
      <img src="assets/images/icons/icon_16_disc.png" />
      Videos
    </a>
	<a class="abs icon" style="left:20px;top:420px;" href="#icon_dock_twitter">
      <img src="assets/images/icons/icon_16_twitter.png" />
      Twitter
    </a>
	<a class="abs icon" style="left:20px;top:500px;" href="#icon_dock_gmail">
      <img src="assets/images/icons/icon_16_gmail.png" />
      Gmail
    </a>
	<a class="abs icon" style="left:100px;top:100px;" href="#icon_dock_google">
      <img src="assets/images/icons/icon_16_google.png" />
      Google Search
    </a>
	
	
    <div id="window_computer" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_computer.png" />
            Computer
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_computer" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          
        </div>
        <div class="abs window_bottom">
          By Project Syn3energy Team!
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
    
	<div id="window_facebook" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_22_fb.png" />
            Facebook
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_facebook" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
			<a href="http://www.facebook.com"><h1>Load Facebook</h1></a>
			
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>

	
	<div id="window_textarea" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_page.png" />
            Text Editor
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <!--<a href="#" class="window_resize"></a>-->
            <a href="#icon_dock_textarea" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">

			<textarea style="width:690px;height:250px">
				This is a simple text editor
			</textarea>
		
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_music" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_music.png" />
            Audio
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_music" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_photo" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_photo.png" />
            Albums
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_photo" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	
	<div id="window_disc" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_disc.png" />
            Videos
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_disc" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_twitter" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_twitter.png" />
            Twitter
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_twitter" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
			<a href="http://www.twitter.com"><h1>Load Twitter</h1></a>
			
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_gmail" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_gmail.png" />
            Gmail
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_gmail" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
			<a href="http://www.gmail.com"><h1>Load Gmail</h1></a>
			
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_google" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_google.png" />
            Google
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_google" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
		
       		<a href="http://www.google.com"><h1>Load Google</h1></a>
        
		</div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	
  </div>
  
  <div class="abs" id="bar_top">
    <span class="float_right" id="clock"></span>
    <ul>
      <li>
        <a class="menu_trigger" href="#">Genie Home</a>
        <ul class="menu">
          <li>
            <a href="#">Programs</a>
          </li>
          <li>
            <a href="#">Games</a>
          </li>
          <li>
            <a href="#">Audio</a>
          </li>
          <li>
            <a href="#">Video</a>
          </li>
          <li>
            <a href="#">Social Widgets</a>
          </li>
          <li>
            <a href="logout.php?logout">Logout</a>
          </li>
        </ul>
      </li>
      
      <li>
        <a class="menu_trigger" href="#">Credits</a>
        <ul class="menu">
          <li>
            <a href="#">Project Syn3ergy Team</a>
          </li>
        </ul>
      </li>
	  
    </ul>
	
  </div>
 
   <div class="abs" id="bar_bottom">
	<a class="float_right" href="logout.php?logout">Sign Out</a>
	
    <a class="float_left" href="#" id="show_desktop" title="Show Desktop">
      <img src="assets/images/icons/icon_22_desktop.png" />
    </a>
    <ul id="dock">
      <li id="icon_dock_computer">
        <a href="#window_computer">
          <img src="assets/images/icons/icon_22_computer.png" />
          Computer
        </a>
      </li>
	  <li id="icon_dock_facebook">
        <a href="#window_facebook">
          <img src="assets/images/icons/icon_22_fb.png" />
          Facebook
        </a>
      </li>
	  <li id="icon_dock_textarea">
        <a href="#window_textarea">
          <img src="assets/images/icons/icon_16_page.png" />
          TextEditor
        </a>
      </li>
	  
	  <li id="icon_dock_music">
        <a href="#window_music">
          <img src="assets/images/icons/icon_16_music.png" />
          Audio
        </a>
      </li>
	  <li id="icon_dock_photo">
        <a href="#window_photo">
          <img src="assets/images/icons/icon_16_photo.png" />
          Albums
        </a>
      </li>
	  </li>
	  <li id="icon_dock_disc">
        <a href="#window_disc">
          <img src="assets/images/icons/icon_16_disc.png" />
          Videos
        </a>
      </li>
	  <li id="icon_dock_twitter">
        <a href="#window_twitter">
          <img src="assets/images/icons/icon_16_twitter.png" />
          Twitter
        </a>
      </li>
	  <li id="icon_dock_gmail">
        <a href="#window_gmail">
          <img src="assets/images/icons/icon_16_gmail.png" />
          Gmail
        </a>
      </li>
	   <li id="icon_dock_google">
        <a href="#window_google">
          <img src="assets/images/icons/icon_16_google.png" />
          Google
        </a>
      </li>
	  
    </ul>
  </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.desktop.js"></script>

<script>
  !window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery.js"%3E%3C/script%3E'));
  !window.jQuery.ui && document.write(unescape('%3Cscript src="assets/js/jquery.ui.js"%3E%3C/script%3E'));
</script>

<script>
  var _gaq = [['_setAccount', 'UA-166674-8'], ['_trackPageview']];

  (function(d, t) {
    var g = d.createElement(t),
    s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = 'assets/js/ga.js';
    s.parentNode.insertBefore(g, s);
  })(this.document, 'script');
</script>


</body>
</html>