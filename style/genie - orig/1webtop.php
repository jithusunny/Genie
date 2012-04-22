<?
session_start();

if(!isset($_SESSION['VARNAME']))
{
header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
<meta name="description" content="A simple intuitive web desktop build using JQuery" />
<title>Genie</title>
<link rel="stylesheet" href="assets/css/reset.css" />
<link rel="stylesheet" href="assets/css/desktop.css" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="assets/css/ie.css" />
<![endif]-->
</head>
<body>
<div class="abs" id="wrapper">
  <div class="abs" id="desktop">
    <a class="abs icon" style="left:20px;top:20px;" href="#icon_dock_computer">
      <img src="assets/images/icons/icon_32_computer.png" />
      Computer
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
          <div class="window_aside">
				My Computer
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">
                    &nbsp;
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Date Modified
                  </th>
                  <th>
                    Date Created
                  </th>
                  <th>
                    Size
                  </th>
                  <th>
                    Kind
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="assets/images/icons/icon_16_drive.png" />
                  </td>
                  <td>
                    Hard Drive
                  </td>
                  <td>
                    Today
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    200 GB
                  </td>
                  <td>
                    Volume
                  </td>
                </tr>

                <tr>
                  <td>
                    <img src="assets/images/icons/icon_16_trash.png" />
                  </td>
                  <td>
                    Trash
                  </td>
                  <td>
                    Today
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Bin
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="abs window_bottom">
          By Project Syn3rgy Team
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>

  </div>
  <div class="abs" id="bar_top">
    <span class="float_right" ></span>
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
            <a href="#">License</a>
          </li>
        </ul>
      </li>
      
      <li>
        <a class="menu_trigger" href="#">Credits</a>
        <ul class="menu">
          <li>
            <a href="#">Project Syn3rgy Team</a>
          </li>
        </ul>
      </li>
	  
    </ul>
	
  </div>
  <div class="abs" id="bar_bottom">
   
    <ul id="dock">
      <li id="icon_dock_computer">
        <a href="#window_computer">
          <img src="assets/images/icons/icon_22_computer.png" />
          Computer
        </a>
      </li>
    </ul>
  </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script>
  !window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery.js"%3E%3C/script%3E'));
  !window.jQuery.ui && document.write(unescape('%3Cscript src="assets/js/jquery.ui.js"%3E%3C/script%3E'));
</script>
<script src="assets/js/jquery.desktop.js"></script>
<script>
  var _gaq = [['_setAccount', 'UA-166674-8'], ['_trackPageview']];

  (function(d, t) {
    var g = d.createElement(t),
    s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = '//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
  })(this.document, 'script');
</script>
</body>
</html>
