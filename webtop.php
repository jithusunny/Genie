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
<link rel="stylesheet" href="style/bas-style.css" />
<style type="text/css">
			.movable {
			    cursor: hand;
			}
		</style>
</head>
<body>

<div class="abs" id="wrapper">
  <div class="abs" id="desktop">
    <a class="abs icon" style="left:20px;top:20px;" href="#icon_dock_computer">
      <img src="assets/images/icons/icon_32_computer.png" />
      Computer
    </a>
	<a class="abs icon" style="left:100px;top:20px;" href="#icon_dock_facebook">
      <img src="assets/images/icons/icon_16_w3.png" />
      W3Schools
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
      <img src="assets/images/icons/icon_box.png" />
      Box - Online store
    </a>
	<a class="abs icon" style="left:20px;top:500px;" href="#icon_dock_gmail">
      <img src="assets/images/icons/icon_16_wiki.png" />
      Wikipedia
    </a>
	<a class="abs icon" style="left:100px;top:100px;" href="#icon_dock_google">
      <img src="assets/images/icons/icon_16_ask.png" />
      Ask Search
    </a>
	<a class="abs icon" style="left:100px;top:180px;" href="#icon_dock_mines">
      <img src="assets/images/icons/icon_16_mines.png" />
      Minesweeper
    </a>
	<a class="abs icon" style="left:100px;top:260px;" href="#icon_dock_upload">
      <img src="assets/images/icons/icon_22_network.png" />
      Upload
    </a>
	
	
	
	<!--- Clock Widget added here --->
	<div class="widget" >
	<div id="gfx_holder" style="width:175px;height:175px;">
	</div>
	<span id="time"></span>
	<button id="reset">
		Reset
	</button>
	</div>

	<div class="note_widget" >
        <textarea id="note" style="color: black; font-weight: bold; background-color: #FDFD86;   border-color:#FDFD86; font-family:Trebuchet MS,Tahoma,Myriad Pro,Arial,Verdana,sans-serif; font-size:18px;  width:175px;height:175px;"></textarea></br>
	<button style="background-color:#FDFD86;" id="update" onclick="writenote('widgets/note/save_note.php');">
		Save
	</button>
        </div>

	<!--- Windowed div starts here--->
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
            <img src="assets/images/icons/icon_16_w3.png" />
            W3schools
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_facebook" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">

			<!---<a href="http://www.facebook.com"><h1>Load Facebook</h1></a>--->
			<iframe src="http://www.w3schools.com" style="width:870px;height:670px" frameborder="0">
			</iframe>
			
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
        <div class="abs window_content">

	
	Filename:<textarea id='fname' style="height:20px; width:150px;"></textarea>
	<button onclick="save_file('save_file.php');">Save</button></br>
        <textarea id="fcontents" style="height:600px; width:840px" ></textarea></br>
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
        <div  class="abs window_musicarea">
       		
			<div class="window_aside align_center">
            <img src="assets/images/misc/album_cover.jpg" />
            <br />
            <em>Title of Album</em>
					
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">
                    #
                  </th>
                  <th class="shrink">
				Track
                  </th>
                  <th>
                    Song Name
                  </th>
                  <th class="shrink">
                    Length
                  </th>
				  <th class="shrink">
				  Play
				  </th>
				  <th class="shrink">
				  Pause
				  </th>
				  <th class="shrink">
				  VolUp
				  </th>
				  <th class="shrink">
				  Voldown
				  </th>
				  <th class="shrink">
				  Player
				  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="assets/images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    01
                  </td>
                  <td>
                    Track One
                  </td>
                  <td class="align_right">
                    5:00
                  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player').play()">Play</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player').pause()">Pause</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player').volume+=0.1">Volume Up</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player').volume-=0.1">Volume Down</button>
				  </td>
				  <td class="align_center">
				  <audio id="player" controls="none">
					<source src="audio/track1.ogg" type="audio/ogg" />
					</audio>
				  </td>
                </tr>
                <tr>
                  <td>
                    <img src="assets/images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    02
                  </td>
                  <td>
                    Track Two
                  </td>
                  <td class="align_right">
                    4:36
                  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player1').play()">Play</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player1').pause()">Pause</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player1').volume+=0.1">Volume Up</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('player1').volume-=0.1">Volume Down</button>
				  </td>
				  <td class="align_center">
					<audio id="player1" controls="controls">
					<source src="audio/track2.ogg" type="audio/ogg" />
					</audio>
				  </td>
                </tr>
                  	
              </tbody>
            </table>
          </div>
			
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
        <div  class="abs window_musicarea">
		
       	<div class="window_aside align_center">
            <img src="assets/images/misc/album_cover.jpg" />
            <br />
            <em>Video Album</em>
					
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">
                    #
                  </th>
                  <th class="shrink">
				Track
                  </th>
                  <th>
                    Song Name
                  </th>
                  <th class="shrink">
                    Length
                  </th>
				  <th class="shrink">
				  Play
				  </th>
				  <th class="shrink">
				  Pause
				  </th>
				  <th class="shrink">
				  VolUp
				  </th>
				  <th class="shrink">
				  Voldown
				  </th>
				  <th class="shrink">
				  Player
				  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="assets/images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    01
                  </td>
                  <td>
                    Video One
                  </td>
                  <td class="align_right">
                    1:00
                  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('video1').play()">Play</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('video1').pause()">Pause</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('video1').volume+=0.1">Volume Up</button>
				  </td>
				  <td class="align_right">
				  <button onclick="document.getElementById('video1').volume-=0.1">Volume Down</button>
				  </td>
				  <td class="align_center">
				  <video id="video1" width="320" height="240" controls="controls">
					<source src="video/video1.ogv" type="video/ogg" />
					</video>
				  </td>
                </tr>
                
                  	
              </tbody>
            </table>
          </div>	
        
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
            Box - Online store
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_twitter" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
			<!---<a href="http://www.twitter.com"><h1>Load Twitter</h1></a>--->
			<iframe src="http://www.box.com" style="width:870px;height:670px" frameborder="0">
			</iframe>
			
			
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
            <img src="assets/images/icons/icon_16_wiki.png" />
            Wikipedia
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#icon_dock_gmail" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
       		
	<iframe src="http://www.wikipedia.com" style="width:870px;height:670px" frameborder="0">
			</iframe>
			
        </div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_google" style="height: 500px;" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_ask.png" />
            Ask Search
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>

            <a href="#icon_dock_google" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
		

			<!---<iframe src="http://www.editpad.org/" style="width:1000px;height:800px" frameborder="0">
			</iframe>--->
			<iframe src="http://www.ask.com/" style="width:1000px;height:800px" frameborder="0">
			</iframe>

        
		</div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	<div id="window_mines" class="abs window" style="height=800px;">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_16_mines.png" />
            Minesweeper
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <!---<a href="#" class="window_resize"></a>--->
            <a href="#icon_dock_mines" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_content">
		
       		<h1>minesweeper</h1>
		<div id="container">
			<canvas id="imageview" width="800" height="240">
			</canvas>		
		</div>
        
		</div>
		<div class="abs window_bottom">
          By Project Syn3energy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
	
	
	<div id="window_upload" class="abs window" style="height=800px;">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="assets/images/icons/icon_22_network.png" />
            Upload
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_upload" class="window_close"></a>
          </span>
        </div>
        <div  class="abs window_musicarea">
		
		<div class="window_aside align_center">
            <img src="assets/images/icons/icon_22_network.png" />
            <br />
            <em>Upload content here</em>
					
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">
				Type
                  </th>
				  <th class="shrink">
				  Uploader
				  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align_center">
                    Album
                  </td>
                  <td class="align_center">
				  
				  <iframe src="http://localhost/widgets/imageupload" height="100%" width="100%" scrolling="no" frameborder="0">
				  </iframe>
				  
				  </td>
                </tr>
                
                  	
              </tbody>
            </table>
          </div>

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
          <img src="assets/images/icons/icon_16_w3.png" />
          W3schools
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
          
          Box - Online Store
        </a>
      </li>
	  <li id="icon_dock_gmail">
        <a href="#window_gmail">
          <img src="assets/images/icons/icon_16_wiki.png" />
          Wiki
        </a>
      </li>
	   <li id="icon_dock_google">
        <a href="#window_google">
          <img src="assets/images/icons/icon_16_ask.png" />
          Ask
        </a>
      </li>
	   <li id="icon_dock_mines">
        <a href="#window_mines">
          <img src="assets/images/icons/icon_16_mines.png" />
          Minesweeper
        </a>
      </li>
	  <li id="icon_dock_upload">
        <a href="#window_upload">
          <img src="assets/images/icons/icon_22_network.png" />
          Upload
        </a>
      </li>
	  
    </ul>
  </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.desktop.js"></script>

<script  src="widgets/note/note.js">
</script>


<!--- Adding Interactive clock widget The following scripts are necessary--->
<script  src="widgets/clock/dojoroot/dojo/dojo.js" data-dojo-config="async:true">
</script>
<script  src="widgets/clock/src.js">
</script>

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
<script type="text/javascript" src="assets/js/mine.js"></script>

<!--- Adding dialog ---->



</body>
</html>
