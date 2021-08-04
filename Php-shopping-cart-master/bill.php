<!-- <?php 

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
	// ------------------------------------------//	
?>
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" href="bill.css">
</head>

<body>
    <div class="head">
        <h2><i class="fa fa-crosshairs"></i><a href="../HOME/index.html">F&F HOG</a></h2>
    </div>

    <div class="main">
        <div class="login-right">
            <strong>
                <h1><i class="fa fa-crosshairs"></i>F&F HOG Bill</h1>
            </strong>
            <div>
                <u>
                    <h2>DELIVERY INFORMATION</h2>
                </u>
                <div class="info">
                    <p> <i class="fa fa-user"></i>
                        NAME :
                        <?php echo	$_SESSION['username']; ?>
                    </p>

                    <p><i class="fa fa-envelope"></i>
                        Email :
                        <?php echo $_SESSION['email']; ?>
                    </p>
                    <p>
                        <i class="fa fa-phone"></i>
                        MOBILE NUMBER :
                        <?php echo $_SESSION['mnum']; ?>
                    </p>
                    <p>
                        <i class="fa fa-home"></i>
                        ADDRESS :
                        <?php echo $_SESSION['address']; ?>
                    </p>
                </div>

                <div>
                    <p><i class="fa fa-usd">
                        </i>TOTAL PRICE :
                        <?php echo $_SESSION['total']; ?>
                    </p>

                    <p><i class="fa fa-truck"></i>
                        DELIVERY CHARGES : Rs.2500/=
                    </p>
                    <hr />

                    <p><i class="fa fa-money"></i>
                        TOTAL BILL :
                        <?php echo $_SESSION['total'] + 2500; ?>
                    </p>
                    <hr />

                    <p>
                        PAYMENT : Payorder/Cheque
                    </p>
                </div>
                <div>
                    <p class="typing">
                        Order will be delivered in 5-6 working days!
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div>
        <br>
    </div>
    <button class="btn cta-btn" onclick="window.print() ">PRINT BILL</button>
</body>

</html>