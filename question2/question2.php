<?php

session_start();

function getEvaluation($evaluation)
{
    $evaluationArray;
    switch($evaluation)
    {
        case "bad":
        {
            $evaluationArray =
            [
                "percentage"=> 25,
                "evaluation"=> $evaluation
            ];
            break;
        }
        case "good":
        {
            $evaluationArray =
            [
                "percentage"=> 50,
                "evaluation"=> $evaluation
            ];
            break;
        }
        case "veryGood":
        {
            $evaluationArray =
            [
                "percentage"=> 75,
                "evaluation"=> $evaluation
            ];
            break;
        }
        case "excellent":
        {
            $evaluationArray =
            [
                "percentage"=> 100,
                "evaluation"=> $evaluation
            ];
            break;
        }
        default:
        {
            $evaluationArray = [];
        }
    }
    return $evaluationArray;
}

$ourTableResult = "";
$sorryForBadService = "";

if($_POST)
{
    $evaluation1 = getEvaluation($_POST["evaluation1"]);
    $evaluation2 = getEvaluation($_POST["evaluation2"]);
    $evaluation3 = getEvaluation($_POST["evaluation3"]);
    $evaluation4 = getEvaluation($_POST["evaluation4"]);
    $evaluation5 = getEvaluation($_POST["evaluation5"]);

    $sumOfAllPercentage = $evaluation1["percentage"] + $evaluation2["percentage"] + $evaluation3["percentage"];

    if(($sumOfAllPercentage / 300) * 100 < 50)
    {
        $sorryForBadService = "sorry for your concern we will contact you on ".$_SESSION["number"]."";
    }
    else
    {
        $sorryForBadService = "thanks for submitting the form";
    }

    $ourTableResult .="

    <table class='table bg-warning w-50 m-auto'>
            <thead>
            </thead>
            <tbody>
                <tr>
                    <td><h4>neatness quality</h4></td>
                    <td>".$evaluation1["evaluation"]."</td>
                    
                </tr>
                <tr>
                    <td><h4>services prices</h4></td>
                    <td>".$evaluation2["evaluation"]."</td>
                </tr>
                <tr>
                    <td><h4>nursing services</h4></td>
                    <td>".$evaluation3["evaluation"]."</td>
                </tr>
                <tr>
                    <td><h4>doctors quality</h4></td>
                    <td>".$evaluation4["evaluation"]."</td>
                </tr>
                <tr>
                    <td><h4>calmness</h4></td>
                    <td>".$evaluation5["evaluation"]."</td>
                </tr>
            </tbody>
        </table>
    ";
}

?>

<html>
    <head>
        <title>question 2</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/fontawesome.min.css">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>

    <body>

    <div class="py-4"></div>

    <form method="post" class="w-75 m-auto">
        <table class="table bg-warning">
            <thead>
                <th></th>
                <th>bad</th>
                <th>good</th>
                <th>very good</th>
                <th>excellent</th>
            </thead>
            <tbody>
                <tr>
                    <td>neatness quality</td>
                    <td>
                        <input type="radio" name="evaluation1" value="bad">
                    </td>
                    <td>
                        <input type="radio" name="evaluation1" value="good">
                    </td>
                    <td>
                        <input type="radio" name="evaluation1" value="veryGood">
                    </td>
                    <td>
                        <input type="radio" name="evaluation1" value="excellent">
                    </td>
                </tr>
                <tr>
                    <td>services prices</td>
                    <td>
                        <input type="radio" name="evaluation2" value="bad">
                    </td>
                    <td>
                        <input type="radio" name="evaluation2" value="good">
                    </td>
                    <td>
                        <input type="radio" name="evaluation2" value="veryGood">
                    </td>
                    <td>
                        <input type="radio" name="evaluation2" value="excellent">
                    </td>
                </tr>
                <tr>
                    <td>nursing services</td>
                    <td>
                        <input type="radio" name="evaluation3" value="bad">
                    </td>
                    <td>
                        <input type="radio" name="evaluation3" value="good">
                    </td>
                    <td>
                        <input type="radio" name="evaluation3" value="veryGood">
                    </td>
                    <td>
                        <input type="radio" name="evaluation3" value="excellent">
                    </td>
                </tr>
                <tr>
                    <td>doctors quality</td>
                    <td>
                        <input type="radio" name="evaluation4" value="bad">
                    </td>
                    <td>
                        <input type="radio" name="evaluation4" value="good">
                    </td>
                    <td>
                        <input type="radio" name="evaluation4" value="veryGood">
                    </td>
                    <td>
                        <input type="radio" name="evaluation4" value="excellent">
                    </td>
                </tr>
                <tr>
                    <td>calmness</td>
                    <td>
                        <input type="radio" name="evaluation5" value="bad">
                    </td>
                    <td>
                        <input type="radio" name="evaluation5" value="good">
                    </td>
                    <td>
                        <input type="radio" name="evaluation5" value="veryGood">
                    </td>
                    <td>
                        <input type="radio" name="evaluation5" value="excellent">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="py-3"></div>
        <div>
            <button class="btn btn-primary">submit</button>
        </div>
    </form>

    <div class="py-5"></div>

    <?php   echo $ourTableResult    ?>

    <div class="w-50 m-auto text-center">
        <h3 class="my-5">   <?php  if(isset($sorryForBadService)){echo $sorryForBadService;}  ?>  </h3>
    </div>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    </body>
</html>