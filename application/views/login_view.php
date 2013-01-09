<html>
<head>
    <title>Login</title>
    	<link rel="stylesheet" href="<?php echo base_url('css/styles.css') ?>" type="text/css" media="screen"> 
</head>
<body>
<h3>Login for the ECWM604 Website</h3>
<form action="/w1183443/index.php/auth/authenticate" method="POST">
    Username : <input type="text" name='uname' length="10" size="10">  <br>
    Password: <input type="password" name='pword' length="15" size="30"> <br>
    <input type="submit" value='Submit!'>
    <h3><a href="/w1183443/index.php/find/findemp">Basic Search</a></h3>
</form>
</form>
</body>
</html>