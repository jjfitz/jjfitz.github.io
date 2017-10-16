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

$isWrong = false;

//echo "username=$username \n";
//echo "password=$password \n";
//echo "confirm=$confirm \n";

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

  $statement = $db->prepare("SELECT user_name, password FROM users");
  $statement->execute();
  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    if ($username == $row['user_name'] || $confirm != $password) {
      $isWrong = true;
      $_SESSION["isWrong"] = $isWrong;
      header("Location: login.php");
    } 
  }
  if($isWrong == false) {
    $query = 'INSERT INTO users (user_name, password) VALUES(:user_name, :password)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_name', $username);
    $statement->bindValue(':password', $password);

    $statement->execute();

    $statement = $db->prepare("SELECT user_id FROM users");
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $user_id = $row['user_id'];
    }

    $query = 'INSERT INTO budgetCategories (user_id, budget_name) VALUES(:user_id, :budget_name)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_name', 'Example');

    $statement->execute();

    //$budgetId = $db->lastInsertId('budgetCategories_id_seq');
    $statement = $db->prepare("SELECT id FROM budgetCategories");
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $budgetId = $row['id'];
    }

    $query = 'INSERT INTO budget_expected (user_id, budget_category_id, goal, end_date) VALUES(:user_id, :budget_category_id, :goal, :end_date)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_category_id', $budgetId);
    $statement->bindValue(':goal', 40);
    $statement->bindValue(':end_date', 'May');

    $statement->execute();

    $query = 'INSERT INTO budget_actual (user_id, budget_category_id, money_spent, date_payed) VALUES(:user_id, :budget_category_id, :money_spent, :date_payed)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_category_id', $budgetId);
    $statement->bindValue(':money_spent', 10);
    $statement->bindValue(':date_payed', 'May');

    $statement->execute();

    header("Location: budgets.php");
  }

?>
