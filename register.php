<html>
    <head>
        <title>Genie - Registration</title>
        <link href="./style/base-style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div>    
	    <form id="stylized" name="home" method="link" action="index.php">
	        <button type="submit">Back Home</button>
	    </form>    	    
	</div>
	                
        <div id="stylized" class="login-box">    
            <form id="form" name="form" method="post" action="validate_registration.php">
            
                <label>Name:</label>
                <input type="text" name="name" id="name">
                
                <label>Username:</label>
                <input type="text" name="uname" id="uname">

                <label>Password:</label>
                <input type="text" name="pwd1" id="pwd1">

                <label>Confirm Password:</label>
                <input type="text" name="pwd2" id="pwd2">

                <label>Email:</label>
                <input type="text" name="email" id="email">

                <label>Mobile:</label>
                <input type="text" name="mob" id="mob">
                     
                <button type="submit">Register</button>        
            </form>
        </div>
    </body>
</html>
