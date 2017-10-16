<?php
session_start();
?>

<?php
if ($_POST["username"] != "") {
$_SESSION["username"] = $_POST["username"];
}

$username =  $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$id = $_POST["id"];
$money_spent = $_POST["money_spent"];
$date_payed = 'May';

/*echo "username = $username \n";
echo "id = $id  \n";
echo "money_spent = $money_spent \n";
echo "date_payed = $date_payed \n";
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

    $query = 'INSERT INTO budget_actual (user_id, budget_category_id, money_spent, date_payed) VALUES(:user_id, :budget_category_id, :money_spent, :date_payed)';
    $statement = $db->prepare($query);

    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':budget_category_id', $id);
    $statement->bindValue(':money_spent', $money_spent);
    $statement->bindValue(':date_payed', $date_payed);

    $statement->execute();
    header("Location: view-budgets.php");
    exit;

?>
