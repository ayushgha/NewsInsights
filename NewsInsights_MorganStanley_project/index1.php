<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	  <style>
  .header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background-color: black;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
body {
					background-image: url(newspaper.jpeg);
					background-repeat: no-repeat;
					background-size: 100%;
				}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background-color: black;
  border: none;
  border-radius: 5px;
}

  </style>
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index1.php?logout='1'" style="color: red;">logout</a> </p>
		
		  <form align= center>
    	 <button class="btn btn-secondary" type="submit"><a href="Business.php" style="color: white;">Next</a></button> 
		</form>
    <?php endif ?>
</div>
		
</body>
</html>