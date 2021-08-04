<?php  
session_start(); 
	$servername = "localhost";
	$username = "root";
	$password = "fasih090078601";
	$dbname="fnf";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
	}
	else{
		//echo"connection successfull";
	}
	// ---------------------------------------------------------------------

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{
			//read from database
			$query = "select * from reg where username = '$username' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{                        
						$_SESSION['username']=$user_data['username'];
						$_SESSION['email']=$user_data['email'];
						$_SESSION['address']=$user_data['address'];
						$_SESSION['mnum']=$user_data['mobilenum'];				
						header("Location:welcome.php");
						die;
					}

				}
			}			
			echo "<script type='text/javascript'> alert ('wrong username or password!') </script>";
		}
		else
		{
			echo "wrong username or password!";
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="login.css">
</head>

<body>
<div class="head">
		<h2><i class="fa fa-crosshairs"></i><a href="../HOME/index.html">F&F HOG</a></h2>
		<h2></h2>
		<h3><a href="logout.php">Logout</a></h3>		
	</div>

	<div class="main">
		<div class="login-right">
			<h1>LOGIN</h1>

			<form action="" method="POST">
				<div class="login-input">
					<label class="fa fa-user"></label>
					<input class="inputname" type="text" placeholder="Enter your username" name="username"
						maxlength="30">
				</div>

				<div class="login-input">
					<label class="fa fa-lock"></label>
					<input class="inputname" type="password" placeholder="Enter your password" name="password"
						maxlength="30">
				</div>
				<div>
					<input class="login-button" input type="submit" name="login" value="LOGIN">
				</div>
			</form>
			<div class="login-left">
				<h1>Don't Have an account?</h1>
				<div class="btn">
					<a href="signup.php">Register Now</a>
				</div>
			</div>
		</div>
	</div>

</body>

</html>