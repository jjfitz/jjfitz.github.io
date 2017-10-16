<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Checkout</title>

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
        <h1>Are you ready to checkout?</h1>
      </div>
    </div>

    <!-- TYPOGRAPHY -->
    <div class="container">
    <h1>Please enter your address.</h1>

  <div class="row">
     <form method="post" action="confirmation.php">
        <!-- address-line1 input-->
        <div class="control-group">
            <label class="control-label">Address Line 1</label>
            <div class="controls">
                <input id="address-line1" name="address-line1" type="text" placeholder="address line 1"
                class="input-xlarge">
                <p class="help-block">Street address, P.O. box</p>
            </div>
        </div>
        <!-- address-line2 input-->
        <div class="control-group">
            <label class="control-label">Address Line 2</label>
            <div class="controls">
                <input id="address-line2" name="address-line2" type="text" placeholder="address line 2"
                class="input-xlarge">
                <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>
            </div>
        </div>
        <!-- city input-->
        <div class="control-group">
            <label class="control-label">City / Town</label>
            <div class="controls">
                <input id="city" name="city" type="text" placeholder="city" class="input-xlarge">
                <p class="help-block"></p>
            </div>
        </div>
        <!-- region input-->
        <div class="control-group">
            <label class="control-label">State</label>
            <div class="controls">
                <input id="region" name="state" type="text" placeholder="state"
                class="input-xlarge">
                <p class="help-block"></p>
            </div>
        </div>
        <!-- postal-code input-->
        <div class="control-group">
            <label class="control-label">Zip / Postal Code</label>
            <div class="controls">
                <input id="postal-code" name="postal-code" type="text" placeholder="zip or postal code"
                class="input-xlarge">
                <p class="help-block"></p>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Complete Purchase</button>
    </form>
  </div>

    <hr />

    <div class="pull-left"><a href="view-cart.php">Return to Cart</a></div>

  </div>



  <div style="height:400px"></div>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>