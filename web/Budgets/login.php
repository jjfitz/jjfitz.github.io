<?php
session_start();
?>

<?php
if ($_POST["username"] != "") {
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["confirm"] = $_POST["confirm"];
}
$username =  $_SESSION["username"];
$password =  $_SESSION["password"];
$confirm = $_SESSION["confirm"];
$isWrong = $_SESSION["isWrong"];

if ($username != "" && $password != "")
  $wrongLogIn = true;

?>

<?php 
// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:password@localhost:5432/budgetdb";
}// you need to edit this for your local postgress

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
}
?>

<?php

  $statement = $db->prepare("SELECT user_name, password 
    FROM users");
  $statement->execute();
  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    if ($username == $row['user_name'] && $password == $row['password'] && $username != "") {
      header("Location: budgets.php");
      exit;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Budgets Login</title>

    <!-- Bootstrap -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <!-- JUMBOTRON -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Budgets!</h1>
        <p>Budgets is a place where you can make budgets and keep track of them. It will show you
          where you are doing well and where you aren't with your financial goals.</p>
      </div>
    </div>

    <!-- TYPOGRAPHY -->
    <div class="container">
    <h1 class="page-header">Log In and start budgeting!</h1>


    <!-- INLINE FORMS -->

    <?php
    if ($wrongLogIn == true)
      echo "<p class='text-danger'>You entered the wrong Username or Password.</p>";
    ?>

    <form class="form-inline" method="post" action="login.php">

      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Add Password">
      </div>


      <button type="submit" class="btn btn-default">Login</button>

    </form>

    <h4>Or Sign Up!</h4>

    <?php
    if ($isWrong == true)
      echo "<p class='text-danger'>There is already a User with that username or your Password didn't match.</p>";
    ?>

    <form class="form-inline" method="post" action="insert-user.php">

      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Add Password">
      </div>

      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="confirm" placeholder="Confirm Password">
      </div>


      <button type="submit" class="btn btn-default">Sign Up</button>

    </form>


  </div>


  <div style="height:400px"></div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/bootstrap.min.js"></script>
  </body>
</html>