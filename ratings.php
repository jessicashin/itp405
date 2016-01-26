<?php

if (empty($_SERVER['QUERY_STRING'])) {
	header('Location: index.php');
	exit();
}

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pw = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pw);

$rating = $_SERVER['QUERY_STRING'];

$sql = "
	SELECT title, rating_name AS rating
	FROM dvds
	INNER JOIN ratings
	ON dvds.rating_id = ratings.id
  WHERE rating_name = '$rating'
";

$statement = $pdo->prepare($sql);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ); //static property

?>

<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DVD Search</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/search.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">
      <h2>All DVDs with rating "<?php echo $rating ?>":</h2><br>
      <?php foreach ($dvds as $d) : ?>
        <p><?php echo $d->title ?></p>
      <?php endforeach; ?>
    </div>

    <footer class="footer">
      <div class="footer-container">
        <p class="text-muted">
          <span class="footer-text">ITP-405</span>
          <span class="footer-text">1/26/16</span>
          <span class="footer-text">Jessica Shin</span>
          <span class="footer-text">Assignment 2: DVD Search with PDO</span>
        </p>
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
