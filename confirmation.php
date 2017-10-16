<?php
session_start();

$_SESSION["address-line1"] = $_POST["address-line1"];
$_SESSION["address-line2"] = $_POST["address-line2"];
$_SESSION["city"] = $_POST["city"];
$_SESSION["state"] = $_POST["state"];
$_SESSION["postal-code"] = $_POST["postal-code"];



$basketball = $_SESSION["basketball"];
$football = $_SESSION["football"];
$soccer = $_SESSION["soccer"];

if ($basketball == "") $basketball = 0;
if ($football == "") $football = 0;
if ($soccer == "") $soccer = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $addressline1 = test_input($_POST["address-line1"]);
$addressline2 = test_input($_POST["address-line2"]);
$city = test_input($_POST["city"]);
$state = test_input($_POST["state"]);
$postalcode = test_input($_POST["postal-code"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Confirmation</title>

    <!-- Bootstrap -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="online-store.php">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="view-cart.php">View Cart<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- JUMBOTRON -->
    <div class="jumbotron">
      <div class="container">
        <h1>Congratulations!</h1>
      </div>
    </div>

    <!-- TYPOGRAPHY -->
    <div class="container">
    <h1>These are the items you purchased:</h1>

    <?php
         if ($basketball != 0) print "<h3>Basketball for $basketball</h3>";
         if ($football != 0) print "<h3>Football for $football</h3>";
         if ($soccer != 0) print "<h3>Soccer ball for $soccer</h3>";
    ?>

    <h1>This is the address that it will be shipped to:</h1>

    <?php
         print "<p>$addressline1</p>";
         print "<p>$addressline2,</p>";
         print "<p>$city, $state</p>";
         print "<p>$postalcode</p>";
    ?>

    <hr />

  </div>



  <div style="height:400px"></div>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>