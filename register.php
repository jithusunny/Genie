<html>
 <head>
        <title>Genie - Register</title>
        <link href="style/base-style.css" rel="stylesheet" type="text/css" />
    </head>
<body>
<div style="height:120px;"></div>
     <img align="middle" border="0" src="./style/genie1.png" alt="Genie" width="200" height="50" />
     <div style="height:30px;"></div>
<div id="stylized" class="reg-box"> 


<h1>Registration Page</h1>
<h2> Fill up the following to register </h2>
<div id="stylized" class="login-box">    
            <form id="form" name="form" method="post" action="validate_registration.php">
            
                <label>Full Name:</label>
                <input type="text" name="name" id="name">
            
                <label>Username:</label>
                <input type="text" name="uname" id="uname">
                
                <label>Password:</label>
                <input type="password" name="pwd" id="pwd">
                
                <label>Email:</label>
                <input type="text" name="email" id="email">

                <label>Mobile:</label>
                <input type="text" name="mobile" id="mobile"></br>
                       
                <button type="submit">Register</button>        
            </form>
        </div>
</body>
</html>
