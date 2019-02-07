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
				}
  </style>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
				<br>
  	  <h style="color:white">hjuujrtgjjrghtggtrgrh</h><button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>