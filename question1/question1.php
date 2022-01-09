<?php

$interestRate = 0;

$totalPayment = 0;

$annualPayment = 0;

$monthlyPayment = 0;

$htmlDesignForPayment = "";

if($_POST)
{
    /*
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["loan"] = $_POST["loan"];
    $_SESSION["years"] = $_POST["years"];
    */

    //echo "name: ".$_SESSION["name"]."<br>loan: ".$_SESSION["loan"]."<br>years: ".$_SESSION["years"]."";

    if($_POST["years"] < 3)
    {
        $interestRate = 10;
    }
    else
    {
        $interestRate = 15;
    }

    $totalPayment = (   $_POST["loan"] * ($interestRate / 100)    ) * $_POST["years"]   + $_POST["loan"];

    $annualPayment = $totalPayment / $_POST["years"];

    $monthlyPayment = $annualPayment / (12 * $_POST["years"]);

    $htmlDesignForPayment ="
    
        <div class='text-center p-3'>
            <h5>name: ".$_POST["name"]."</h5>
            <h5>loan: ".$_POST["loan"]." pound</h5>
            <h5>years: ".$_POST["years"]."</h5>
            <h5>interest rate: $interestRate%</h5>
            <h5>total payment after interest rate: $totalPayment pound</h5>
            <h5>annual payment: $annualPayment pound</h5>
            <h5>monthly payment: $monthlyPayment pound</h5>
        </div>
    
    ";
}

?>

<html>
    <head>
        <title>question 1</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>

    <div class="py-5"></div>

    <form method="post" class="w-75 m-auto bg-warning p-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="pb-5 pt-3">
                    <input name="name" type="text" class="form-control" placeholder="your name">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="pb-5 pt-3">
                    <input name="loan" type="number" class="form-control" placeholder="your loan">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="pb-5 pt-3">
                    <input name="years" type="number" class="form-control" placeholder="number of years to be paid in">
                </div>
            </div>
            <div class="col-xl-12">
                <button class="btn btn-primary">submit</button>
            </div>
        </div>
    </form>

    <div class="py-5"></div>

    <div class="bg-primary container">
        <?php  if(isset($htmlDesignForPayment)){echo $htmlDesignForPayment;}  ?>
    </div>

    <div class="py-5"></div>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    </body>
</html>