<?php
session_start();



$basketball = $_SESSION["basketball"];
$football = $_SESSION["football"];
$soccer = $_SESSION["soccer"];

if ($basketball == "") $basketball = 0;
if ($football == "") $football = 0;
if ($soccer == "") $soccer = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View Cart</title>

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
        <h1>Here are the items in your cart</h1>
      </div>
    </div>

    <!-- TYPOGRAPHY -->
    <div class="container">

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="container">

    <?php
         if ($basketball != 0) {
          print "<div class='checkbox'>
        <label>
          <input type='checkbox' name='basketball' value='0'>Basketball for $basketball
        </label>
      </div>";
        }
         if ($football != 0) { 
          print "<div class='checkbox'>
        <label>
          <input type='checkbox' name='football' value='0'>Football for $football
        </label>
      </div>";
        }
         if ($soccer != 0) { 
          print "<div class='checkbox'>
        <label>
          <input type='checkbox' name='soccer' value='0'>Soccer Ball for $soccer
        </label>
      </div>";
        }
    ?>

    <button type="submit" class="btn btn-default">Remove Items From Cart</button>

    <hr />

  </form>
    
    <hr />
    <div class="pull-left"><a href="online-store.php">Back to Browsing</a></div>
    <div class="pull-right"><a href="checkout.php">Continue to Checkout</a></div>


  </div>


  <div style="height:400px"></div>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>