<?php
	session_start(); 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="welcome.css">
    <title>Document</title>
</head>
<body>
<div class="head">
		<h2><i class="fa fa-crosshairs"></i><a href="../HOME/index.html">F&F HOG</a></h2>
		<h2></h2>
		<h3><a href="logout.php">Logout</a></h3>		
	</div>

<div class="section">

    <h2>Welcome <?php echo $_SESSION['username'];?> to F&F House Of Guns</h2>
    <div class="para">
        <p>"F&F house of guns( F&F HOG) sell and deal in all types of Non-Prohibited Bore Firearms and
            Ammunition. We will take time to listen to your questions and then offer the finest solution that
            suits you. We know that buying a firearm involves immense amounts of time, money, and responsibility
            and we are there to help you make the best choice for the protection of you and your family."</p>
    </div>
    <h1>Enjoy shopping </h1>
    <a href="../HOME/index.html" class="btn cta-btn"> Click to Explore</a> 
    </div>

</body>
</html>