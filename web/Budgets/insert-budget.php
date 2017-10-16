<?php
session_start();
?>

<?php
if ($_POST["username"] != "") {
$_SESSION["username"] = $_POST["username"];
}

$username =  $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$budget_name = $_POST["budget_name"];
$goal = $_POST["goal"];
$end_date = $_POST["end_date"];

$isWrong = false;

/*echo "username = $username \n";
echo "budget_name = $budget_name  \n";
echo "goal = $goal \n";
echo "end_date = $end_date \n";
echo "user_id = $user_id \n";*/

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

    $query = 'INSERT INTO budgetCategories (user_id, budget_name) VALUES(:user_id, :budget_name)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_name', $budget_name);

    $statement->execute();

    //$budgetId = $db->lastInsertId('budgetCategories_id_seq');
    $statement = $db->prepare("SELECT id FROM budgetCategories");
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $budgetId = $row['id'];
    }

    /*echo "username = $username \n";
    echo "budget_name = $budget_name  \n";
    echo "goal = $goal \n";
    echo "end_date = $end_date \n";
    echo "user_id = $user_id \n";
    //echo "budget_category_id = $budgetId \n";
    echo "budget_category_id = $budgetId \n";*/

    $query = 'INSERT INTO budget_expected (user_id, budget_category_id, goal, end_date) VALUES(:user_id, :budget_category_id, :goal, :end_date)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_category_id', $budgetId);
    $statement->bindValue(':goal', $goal);
    $statement->bindValue(':end_date', $end_date);

    $statement->execute();

    $query = 'INSERT INTO budget_actual (user_id, budget_category_id, money_spent, date_payed) VALUES(:user_id, :budget_category_id, :money_spent, :date_payed)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_category_id', $budgetId);
    $statement->bindValue(':money_spent', 0);
    $statement->bindValue(':date_payed', $end_date);

    $statement->execute();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Budgets</title>

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
        <h1>Your budget has been created.</h1>
      </div>
    </div>

    <div class="container">
      <div class="col-md-4">
        <p>Do you want to create another budget?</p>
        <a href="create-budgets.php" class="btn btn-primary">Create Budget</a>
      </div>


  <div style="height:400px"></div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/bootstrap.min.js"></script>
  </body>
</html>