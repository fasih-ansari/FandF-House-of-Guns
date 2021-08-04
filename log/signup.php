<html>

<head>
	<title>sign up</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="signup.css">
</head>

<body>
	<div class="head">
		<h2><i class="fa fa-crosshairs"></i><a href="../HOME/index.html">F&F HOG</a></h2>	
	</div>
	<div class="main">
		<div class="login-right">
			<h1>SIGN UP</h1>
			<form action="signup.php" method="POST" onsubmit=" return validation()">

				<div class="login-input">
					<label class="fa fa-user"></label>
					<input class="inputname" type="text" placeholder="Enter your username" name="username" id="user">
					<span class="text-danger font-weight-bold" id="username"></span>
				</div>

				<div class="login-input">
					<label class="fa fa-lock"></label>
					<input class="inputname" type="password" placeholder="Enter your password" name="password"
						id="password">
					<span class="text-danger font-weight-bold" id="userpassword"></span>
				</div>

				<div class="login-input">
					<label class="fa fa-lock"></label>
					<input class="inputname" type="password" placeholder="Confirm your password" name="password"
						id="confirm">
					<span class="text-danger font-weight-bold" id="cpassword"></span>
				</div>

				<div class="login-input">
					<label class="fa fa-envelope"></label>
					<input class="inputname" type="email" placeholder="Enter your email" name="email" id="email">
					<span class="text-danger font-weight-bold" id="uemail"></span>
				</div>

				<div class="login-input">
					<label class="fa fa-id-card"></label>
					<input class="inputname" type="text" pattern="[0-9]{6}/[0-9]{2}" placeholder=" xxxxxx/xx" name="license"
						id="license">
					<span class="text-danger font-weight-bold" id="ulicense"></span>
				</div>

				<div class="login-input">
					<label class="fa fa-phone"></label>
					<input class="inputname" type="number" placeholder="Enter your number" name="mobilenum" id="num">
					<span class="text-danger font-weight-bold" id="unum"></span>
				</div>

				<div class="login-input">
					<label class="fa fa-home"></label>
					<input class="inputname" type="text" placeholder="Enter your address" name="address" maxlength="30"
						id="address">
					<span class="text-danger font-weight-bold" id="uaddress"></span>
				</div>

				<div>
					<input class="login-button" input type="submit" name="submit" value="SignUp">
				</div>
			</form>

			<div class="login-left">
				<h1>Already a member ?</h1>
				<div class="btn">
					<a href="login.php">Log In</a>
				</div>
			</div>
		</div>
	</div>


	<script>

		function validation() {
			var user = document.getElementById('user').value;
			var password = document.getElementById('password').value;
			var confirm = document.getElementById('confirm').value;
			var email = document.getElementById('email').value;
			var num = document.getElementById('num').value;
			var address = document.getElementById('address').value;

			if (user == "") {
				document.getElementById('username').innerHTML = " ** please fill username ";
				return false;
			}
			if (password == "") {
				document.getElementById('userpassword').innerHTML = " ** please fill password";
				return false;
			}
			if (confirm == "") {
				document.getElementById('cpassword').innerHTML = " ** please rewrite the password";
				return false;
			}
			if (email == "") {
				document.getElementById('uemail').innerHTML = " ** please fill email";
				return false;

			}
			if (num == "") {
				document.getElementById('unum').innerHTML = " ** please fill number";
				return false;
			}

			if (num.length != 11) {
				document.getElementById('unum').innerHTML = " ** please fill right number";
				return false;

			}
			if (address == "") {
				document.getElementById('uaddress').innerHTML = " ** please fill your address";
				return false;
			}
			if (password != confirm) {
				document.getElementById('cpassword').innerHTML = " ** password does not match";
				return false;
			}
			if ((user.length <= 2) || (user.length > 20)) {
				document.getElementById('username').innerHTML = " *enter between 2 to 20 character";
				return false;
			}
			if (!isNaN(user)) {
				document.getElementById('username').innerHTML = " *enter only charaters";
				return false;
			}
		}
	</script>
</body>

</html>


<?php
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
	// ------------------------------------------------------------------

    if(isset($_POST['submit']))
    {

        $username= $_POST['username'];
        $password= $_POST['password'];
		$encrypted_pwd=md5($password);
        $email= $_POST['email'];
		$license= $_POST['license'];
        $mobilenum= $_POST['mobilenum'];
        $address= $_POST['address'];
		
    

    $query = "insert into reg(username,password,email,license,mobilenum,address) 
             values ('$username','$encrypted_pwd','$email','$license','$mobilenum','$address')";

        if(mysqli_query($conn,$query))
        {
            echo "<script type='text/javascript'> alert ('Registered Successfully!! LogIn Now') </script>";
        }
    }    
?>