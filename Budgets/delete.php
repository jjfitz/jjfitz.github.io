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

/*echo "username = $username \n";
echo "user_id = $user_id \n";
echo "id = $id  \n";*/

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

    $query = "DELETE FROM budget_expected WHERE budget_category_id = $id";
    $statement = $db->prepare($query);
    $statement->execute();
    $query = "DELETE FROM budget_actual WHERE budget_category_id = $id";
    $statement = $db->prepare($query);
    $statement->execute();
    $query = "DELETE FROM budgetCategories WHERE id = $id";
    $statement = $db->prepare($query);
    $statement->execute();
    header("Location: delete-budgets.php");
    exit;

?>
