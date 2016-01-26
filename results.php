<?php

if (!isset($_GET['dvd'])) {
	header('Location: index.php');
	exit();
}

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pw = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pw);

$dvd = $_GET['dvd'];

$sql = "
	SELECT title,
		genre_name AS genre,
		format_name AS format,
		rating_name AS rating
	FROM dvds
	INNER JOIN genres
		ON dvds.genre_id = genres.id
	INNER JOIN formats
		ON dvds.format_id = formats.id
	INNER JOIN ratings
		ON dvds.rating_id = ratings.id
	WHERE title LIKE ?
";

$statement = $pdo->prepare($sql);
$like = '%' . $dvd . '%';
$statement->bindParam(1, $like);
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
			<?php
				if (empty($dvds)){ ?>
					<h1>No results found.</h1>
					<h2><a href="index.php">Click here to try another search!</a></h2>
				<?php } else { ?>
			<h2>You searched for "<?php echo $dvd ?>":</h2><br>
			<table class="table table-striped">
				<tr>
					<th><h4>Title</h4></th>
					<th><h4>Genre</h4></th>
					<th><h4>Format</h4></th>
					<th><h4>Rating</h4></th>
				</tr>
				<?php foreach ($dvds as $d) : ?>
					<tr>
						<td><?php echo $d->title ?></td>
						<td><?php echo $d->genre ?></td>
						<td><?php echo $d->format ?></td>
						<td><?php echo "<a href='ratings.php?" . $d->rating . "'>" . $d->rating . "</a>"?></td>
					</tr>
				<?php endforeach; }?>
			</table><br><br>
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
