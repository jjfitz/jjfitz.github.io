<?php
session_start();
?>

<?php
// Set session variables
$username =  '\'' . $_SESSION["username"] . '\'';
$user_id = '\'' . $_SESSION["user_id"] . '\'';
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create a New Budget</title>

    <!-- Bootstrap -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-default">
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
          <a class="navbar-brand" href="budgets.php">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="view-budgets.php">View Budgets<span class="sr-only">(current)</span></a></li>
            <li><a href="create-budgets.php">Create Budgets<span class="sr-only">(current)</span></a></li>
            <li><a href="delete-budgets.php">Delete Budgets<span class="sr-only">(current)</span></a></li>
            <li><a href="logout.php">Log Out<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- JUMBOTRON -->
    <div class="jumbotron">
      <div class="container">
        <h1>What Budget do you want to create?</h1>
        <form method="post" action="insert-budget.php">
          <div class="form-group">
            <label>Budget Name</label>
            <input type="text" class="form-control" name="budget_name" placeholder="Budget Name">
          </div>

          <div class="form-group">
            <label>Monthly Budget Goal</label>
            <input type="number" class="form-control" name="goal" placeholder="$$$">
          </div>

          <div class="form-group">
            <label>How long do you want to keep this budget?</label>
            <select class="form-control" name="end_date">
              <option value="Jan">January</option>
              <option value="Feb">February</option>
              <option value="Mar">March</option>
              <option value="Apr">April</option>
              <option value="May">May</option>
              <option value="Jun">June</option>
              <option value="July">July</option>
              <option value="Aug">August</option>
              <option value="Sep">September</option>
              <option value="Oct">October</option>
              <option value="Nov">November</option>
              <option value="Dec">December</option>
            </select>
          </div>

          <button type="submit" class="btn btn-default">Submit</button>

        </form>
      </div>
    </div>


  <div style="height:400px"></div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/bootstrap.min.js"></script>
  </body>
</html>