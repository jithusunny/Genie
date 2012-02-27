<html>
    <head>
        <title>Genie - Login</title>
        <link href="style/base-style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div>    
	    <form id="stylized" name="register" method="link" action="register.php">
	        <button type="submit">Register</button>
	    </form>    	    
	</div>
	                
        <div id="stylized" class="login-box">    
            <form id="form" name="form" method="post" action="checklogin.php">
            
                <label>Username:</label>
                <input type="text" name="uname" id="uname">
                
                <label>Password:</label>
                <input type="password" name="pwd" id="pwd">
                       
                <button type="submit">Log in</button>        
            </form>
        </div>
    </body>
</html>
