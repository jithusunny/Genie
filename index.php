<html>
    <head>
        <title>Genie - Login</title>

<script type="text/javascript" src="scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="scripts/login_ajax.js"></script>


        <link href="style/base-style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
	<div id="page">
        	<div>    
	    		<form id="stylized" name="register" method="link" action="register.php">
	        		<button type="submit">Register</button>
	    		</form>    	    
		</div>
	                
        	<div id="stylized" class="login-box">    
            		<form id="form" name="login-form" method="post">
            
                		<label>Username:</label>
                		<input type="text" name="uname" id="uname">
                
                		<label>Password:</label>
                		<input type="password" name="pwd" id="pwd">
                       
				<p id="login_response"></p> 

                		<button type="submit" id="login">Log in</button>
		        </form>
        	</div>
	</div>
    </body>
</html>
