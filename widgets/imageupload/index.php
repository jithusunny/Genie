<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic Ajax and PHP tutorial</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Georgia,"Times New Roman",Times,serif;;
	font-size: 12px;
	color: #333;
}
body {
	margin-left: 0px;
	margin-top: 30px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.maindiv{ width:640px; margin:0 auto; padding:20px; background:#CCC;}
.innerbg{ padding:6px; background:#FFF;}
.result{ border:solid 1px #CCC; margin:10px 2px; padding:4px 2px;}
.title a{ font-weight:bold; color:#c24f00; text-decoration:none; font-size:14px;}
.discptn a{ text-decoration:none; color:#999;}
.link a{ color:#008000; text-decoration:none;}
-->
</style>
<script type="text/javascript" src="Ajaxfileupload-jquery-1.3.2.js" ></script>
<script type="text/javascript" src="ajaxupload.3.5.js" ></script>
<link rel="stylesheet" type="text/css" href="Ajaxfile-upload.css" />
<script type="text/javascript" >
	$(function(){
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');
		new AjaxUpload(btnUpload, {
			action: 'uploadPhoto.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				mestatus.html('<img src="ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response){
				//On completion clear the status
				mestatus.text('Photo Uploaded Sucessfully!');
				//On completion clear the status
				files.html('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files').html('<img src="images/webinfopedia_'+file+'" alt="" height="120" width="130" /><br />').addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>

</head>

<body>
<div style="text-align:center;">
<div style="display:none;"><img src="ajax-loader.gif"  /></div>
  <h1 style="color:#CCC;">PHP Ajax image Dynamic upload.<a href="http://www.webinfopedia.com/upload-image-using-PHP-ajax.html" style="color:#EEDDCA; text-decoration:none; font-size:18px;">http://www.webinfopedia.com/upload-image-using-PHP-ajax.html</a></h1></div>
<div class="maindiv">
<div class="innerbg">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td colspan="3" align="left" valign="middle" bgcolor="#008000"><div style="margin:0px 10px; font-weight:bold; color:#FFF; font-size:16px;">PHP Ajax image Dynamic upload</div></td>
    </tr>
  <tr>
    <td colspan="3" align="left" valign="middle">
    <div id="flash"></div>
    <div id="ajaxresult">
    </div>
    </td>
    </tr>
  <tr>
  <td colspan="3">
        <table width="630" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		      <td width="194" align="center" valign="middle">
              <div id="me" class="styleall" style=" cursor:pointer;"><span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;"><span style=" cursor:pointer;">Click Here To Upload Profile Photo</span></span></div><span id="mestatus" ></span>
              
              
              </td>
		      <td width="208" align="center" valign="middle"><div id="files">
              <li class="success">
              </li>
              </div>
              </td>
              <td width="228" align="right" valign="center">&nbsp;</td>
	        </tr>		    
	      </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="middle">
    </td>
    </tr>
</table>
</div>
</div>
<div style="padding:4px; text-align:right;"><h1><a href="http://www.webinfopedia.com/upload-image-using-PHP-ajax.html" style="font-weight:bold; color:#FFF; padding:4px 8px; background:#333; text-decoration:none;">Go back to tutorial</a></h1></div></body>
</html>
