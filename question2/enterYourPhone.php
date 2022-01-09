<?php

session_start();

if($_POST)
{
    $_SESSION["number"] = $_POST["yourNumber"];
    header("location:question2.php");
}

?>

<html>
    <head>
        <title>hospital evaluation</title>

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
                    <input name="yourNumber" type="number" class="form-control" placeholder="your number">
                </div>
            </div>
            <div class="col-xl-12">
                <button class="btn btn-primary">submit</button>
            </div>
        </div>
    </form>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    </body>
</html>