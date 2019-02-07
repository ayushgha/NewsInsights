<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Catamaran' rel='stylesheet'>  
    <style>
  .header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background-color: black;
  text-align: center;
  border: 1px solid black;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background-color: black;
  border: none;
  border-radius: 5px;
}
body {
					background-image: url(newspaper.jpeg);
					background-repeat: no-repeat;
					background-height: 100%;
          font-family: 'Catamaran';
          position: relative;
              
				}
  </style>
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
    <br>
  	<div class="input-group">
        <h style="color:white">bjhyjhgjgjjtr</h>
        <button type="submit" class="btn" name="login_user">Login</button><h style="color:white">fgrhthjtr</h>
		  <button class="btn btn-secondary" type="submit"><a href="home.php" style="color: white; text-decoration:none;">Home</a></button> 
  	</div>
  	<p><br>
    <h style="color:white">bjhjhhjgjjtr</h>Not yet a member? <a href="register.php">Sign up</a>
		 
  	</p>
  </form>
</body>
</html>