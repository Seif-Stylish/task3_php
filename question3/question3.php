<?php

session_start();

$concat = "";

$length = 0;

$cityFees = 0;

$discount = 0;

$ourDivFinalResult = "";

$productPrice = 0;

$isSubmittedFinal = 0;

if($_POST)
{
    $name = $_POST["name"];

    $city = $_POST["city"];

    $length = $_REQUEST["noOfProducts"];

    $_SESSION["name"] = $name;

    $_SESSION["city"] = $city;

    $_SESSION["length"] = $length;

    //$_POST["noOfProducts"] = $_SESSION["length"];

    //$length = $_SESSION["length"];

    for($i = 0; $i < $length; $i++)
    {
        $concat .="
            
                <div class='row'>
                    <div class='col-xl-4'>
                        <div class='py-3'>
                            <input name='productName$i' type='text' class='form-control' placeholder='product name'>
                        </div>
                    </div>
                    <div class='col-xl-4'>
                        <div class='py-3'>
                            <input name='productPrice$i' type='number' class='form-control' placeholder='product price'>
                        </div>
                    </div>
                    <div class='col-xl-4'>
                        <div class='py-3'>
                            <input name='productQuantity$i' type='number' class='form-control' placeholder='quantity'>
                        </div>
                    </div>
                </div>
            
        ";
    }

    if($concat != "")
    {
        $concat.= "
            <div class='col-xl-12 px-0'>
                <div class='my-4'>
                    <button class='btn btn-primary' name='submit2'>submit</button>
                </div>
            </div>";
    }

    if($city == "cairo")
    {
        $cityFees = 0;
    }
    else if($city == "giza")
    {
        $cityFees = 30;
    }
    else if($city == "alex")
    {
        $cityFees = 50;
    }
    else
    {
        $cityFees = 100;
    }

    /*
    $ourDivFinalResult .="
    
        <div class='p-2'>
            <h5>your name: ".$name."</h5>
            <h5>city: ".$city."</h5>
            <h5>city fees: $cityFees pounds</h5>
            <br>
        
    ";
    */

    // must be length not a static value such as (2)
    for($x = 0; $x < $length; $x++)
    {
        if(isset($_POST["productName$x"]) && isset($_POST["productPrice$x"]) && isset($_POST["productQuantity$x"]))
        {
            if($_POST["productPrice$x"] < 1000)
            {
                $productPrice = $_POST["productPrice$x"] * (1 -  (0 / 100));
                $discount = 0;
            }

            else if($_POST["productPrice$x"] < 3000)
            {
                $productPrice = $_POST["productPrice$x"] * (1 -  (10 / 100));
                $discount = 10;
            }

            else if($_POST["productPrice$x"] < 4500)
            {
                $productPrice = $_POST["productPrice$x"] * (1 -  (15 / 100));
                $discount = 15;
            }

            else
            {
                $productPrice = $_POST["productPrice$x"] * (1 -  (20 / 100));
                $discount = 20;
            }

            $ourDivFinalResult .="
            
            <h5>product name: ".$_POST["productName$x"]."</h5>
            <h5>price: ".$_POST["productPrice$x"]."</h5>
            <h5>discount: $discount%</h5>
            <h5>product price after discount: ".$productPrice."</h5>   
            <h5>product quantity: ".$_POST["productQuantity$x"]." pieces</h5>
            <h5>total payment: ".($productPrice * $_POST["productQuantity$x"] + $cityFees)."</h5>
            <br>
            
            ";
            /*
            echo "product name: ". $_POST["productName$x"]. ", product price: ". $_POST["productPrice$x"]. " and product quantity: ". $_POST["productQuantity$x"] . " and total payment is " . ($_POST["productPrice$x"] * $_POST["productQuantity$x"] + $cityFees);
            echo "<br>";
            */
        }
    }

    $ourDivFinalResult.= "</div>";
}

if(isset($_POST["submit2"]))
{
    /*
    print_r($_POST);
    die;
    */
    $concat = "";

    $_SESSION["length"] = null;

    $_SESSION["name"] = "";
    $isSubmittedFinal = 1;
}

if(!isset($_POST["submit1"]))
{
    $_SESSION["name"] = ""; 

    $_SESSION["city"] = "";

    $_SESSION["length"] = null;
}

?>

<html>
    <head>
        <title>question 3</title>
        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>

    <div class="py-4"></div>

    <form method="post" class="w-75 m-auto bg-warning p-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="pb-5 pt-3">
                    <input name="name" type="text" class="form-control" placeholder="your name" value="<?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}   ?>">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="pb-5 pt-3">
                    <input name="city" type="text" class="form-control" placeholder="city" value="<?php if(isset($_SESSION["city"])){echo $_SESSION["city"];}   ?>">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="pb-5 pt-3">
                    <input name="noOfProducts" type="number" class="form-control" placeholder="number of products" value="<?php if(isset($_SESSION["length"])){echo $_SESSION["length"];}   ?>">
                </div>
            </div>
            <div class="col-xl-12">
                <button class="btn btn-primary" name="submit1">submit</button>
            </div>
        </div>

        <?php if(isset($concat)){echo $concat;}?>

    </form>

    <div class="py-5"></div>
   <!-- 
    <div class="w-50 m-auto bg-primary text-center">
        <?php  if(isset($ourDivFinalResult)){echo $ourDivFinalResult;}  ?>
    </div>
    -->

    <div class="w-50 m-auto bg-primary text-center">
        <?php   if($isSubmittedFinal == 1)
        {
            echo "
            
            <div class='p-2'>
            <h5>your name: ".$name."</h5>
            <h5>city: ".$city."</h5>
            <h5>city fees: $cityFees pounds</h5>
            <br>
            
            ". $ourDivFinalResult;
        }
        ?>
    </div>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    </body>
</html>