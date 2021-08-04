<?php
    session_start();
    $database_name = "fnf";
    $con = mysqli_connect("localhost","root","fasih090078601",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOPPING CART</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        @import url('https://fonts.googleapis.com/css2?family=Italianno&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+SC&family=Audiowide&family=Telex&display=swap');

        *{
           
            main-font: 'Alegreya SC', serif;
            secondary-font: 'Italianno', cursive;
            body-font: 'Cabin', sans-serif;
            main-font-color-dark:#ffffff;
            secondary-font-color: #c59d5f;
            body-font-color:rgb(54, 53, 51); 
        }
        body{
            overflow-x: hidden;
            background:rgb(7, 7, 29);
        }
        .product{
            border: 2px solid #eaeaec;
            /* margin: -1px 19px 3px -1px; */
            margin: 5px;
            padding: 40px;
            text-align: center;
            background: rgba(225, 225, 225, 0.123);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.18);
            width: 100%;
            height: 350px;
            font-family: 'Alegreya SC', serif;
            font-size: 30px;            
        }  
        .gunsimg img{
            margin-top: 10px;
            margin-bottom:10px;
            width:200px;
            height: 100px;
        }    
        .descr{            

        }      
        table, th, tr{
            text-align: center;
            color: #c59d5f;           
        }
        
        .title2{
            text-align: center;
            font-family: 'Italianno', cursive;
            color: #c59d5f;
            background: rgba(225, 225, 225, 0.123);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255,255,255,0.18);
            padding: 2%;
            font-size: 40px;
        }
        .form-control{
            height: 30px;
        }
        h2{
            text-align: center;
            font-family: 'Italianno', cursive;
            color: #c59d5f;
            background: rgba(225, 225, 225, 0.123);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(255,255,255,0.18);
            padding: 2%;
            font-size: 40px;            
        }
        table th{
            background: rgba(225, 225, 225, 0.123);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.18);
        }
        .btns{
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-left: 38%; 
            margin-bottom: 20px ; 
        }
        .cta-btn{
            font-size: 1.1rem;
            /* background-color: #c59d5f; */
            padding: .9rem 1.8rem;
            color: var(#ffffff);
            border-radius: .4rem;
            transition: background-color .5s;
        }
        .cta-btn:hover,
        .cta-btn:focus{
            color: black;
            background-color: #c59d5f;
        }
    </style>
</head>
<body>

    <div class="container" style="width: 100%">
        <h2>Shopping Cart</h2>
        <?php
            $query = "SELECT * FROM product ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <div class="gunsimg">
                                    <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                </div>
                                <div class="descr">
                                    <h4 class="text-info"><?php echo $row["pname"]; ?></h4>
                                    <h4 class="text-danger">Rs.<?php echo $row["price"]; ?>/=</h4>
                                    <input type="text" name="quantity" class="form-control" value="1">
                                    <input type="hidden" name="hidden_name" class="name-gn" value="<?php echo $row["pname"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                        value="Add to Cart">
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">BILL</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    $_SESSION['total']=$total;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>Rs.<?php echo $value["product_price"]; ?>/=</td>
                            <td>
                                Rs. <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?>/=</td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                       $_SESSION['total'] = $_SESSION['total']+ ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">Rs. <?php echo number_format($_SESSION['total'], 2); ?>/=</th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
        <a href="bill.php"><button class="btns cta-btn" type="button"> Confirm Order </button></a>

    </div>
    <!-- <script>
        function sweetalertclick(){
        swal("Congratulations!!", "Your order has been placed.It will be delivered in 4-5 working days" , "success")}
    </script> -->


</body>
</html>
