<?php
session_start();
?>

<?php
// Set session variables
$_SESSION["basketball"] = $_POST["basketball"];
$_SESSION["football"] = $_POST["football"];
$_SESSION["soccer"] = $_POST["soccer"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Store</title>

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
        <h1>Welcome to the Online Store</h1>
        <p>We hope you find what you are looking for.</p>
      </div>
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="container">
      <h1 class="page-header">Basketball</h1>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="basketball" value="9.99">Get this bouncy basketball for only $9.99!
        </label>
      </div>

    <hr />

    <h1 class="page-header">Football</h1>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="football" value="10.99">Get this pointy football for only $10.99!
        </label>
      </div>

    <hr />

    <h1 class="page-header">Soccer Ball</h1>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="soccer" value="11.99">Get this round soccer ball for only $11.99!
        </label>
      </div>

      <button type="submit" class="btn btn-default">Add Items to Cart</button>

    <hr />

  </form>

</div>


  <div style="height:400px"></div>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/bootstrap.min.js"></script>
  </body>
</html>