<html>
    <head>
        <title>Genie - Registration</title>
        <link href="./style/base-style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div>    
	    <form name="home" method="link" action="index.php">

	        <button type="submit">Back Home</button>
	    </form>    	    
	</div>
	                
        <div id="stylized" class="login-box">    
            <form id="form" name="form" method="post" action="validate_registration.php">
            
                <label>Name:
                    <span class="small">
                        Add your name
                    </span>
                </label>
                <input type="text" name="name" id="name">
                
                <label>Username:
                    <span class="small">
                        Min. size 6 chars, without blank
                    </span>
                </label>
                <input type="text" name="uname" id="uname">

                <label>Password:
                    <span class="small">
                        Min. size 6 chars
                    </span>
                </label>
                <input type="text" name="pwd1" id="pwd1">

                <label>Confirm Password:
                    <span class="small">
                        Re-enter password
                    </span>
                </label>
                <input type="text" name="pwd2" id="pwd2">

                <label>Email:
                    <span class="small">
                        Add a valid Email-id
                    </span>
                </label>
                <input type="text" name="email" id="email">

                <label>Mobile:
                    <span class="small">
                        Add your contact number
                    </span>
                </label>
                <input type="text" name="mob" id="mob">
                     
                <button type="submit">Register</button>        
            </form>
        </div>
    </body>
</html>
