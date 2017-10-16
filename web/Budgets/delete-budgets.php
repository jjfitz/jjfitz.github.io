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
    <title>Delete a Budget</title>

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
        <h1>What Budgets do you want to delete?</h1>
        <?php

          $statement = $db->prepare("SELECT budget_name, id
            FROM budgetCategories bc 
            JOIN users u ON bc.user_id = u.user_id
            WHERE u.user_name = $username");
          $statement->execute();
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
            $name = $row['budget_name'];
            echo '<form method="post" action="delete.php">
            <div class="form-group">
                    <label>' . $name . '</label>
                    <input type="hidden" name="id" value=' . $row['id'] . '>

                  </div>
                  <button type="submit" class="btn btn-danger">Delete</button>
                  <div></div>
                  </form></br>';

          }
        ?>

        <?php

          /*$statement = $db->prepare("SELECT budget_name, id
            FROM budgetCategories bc 
            JOIN users u ON bc.user_id = u.user_id
            WHERE u.user_name = $username");
          $statement->execute();
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
            $name = $row['budget_name'];
            echo '<form method="post" action="delete.php">
            <div class="form-group">
              <label>$name</label>
              <input type="hidden" name="id" value=' . $row['id'] . '>
            </div>
            <button type="submit" class="btn btn-default">Delete</button>

        </form>'
          }*/
        ?>
      </div>
    </div>

  <div style="height:400px"></div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/bootstrap.min.js"></script>
  </body>
</html>