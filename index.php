<!DOCTYPE html>
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

	    <form action="results.php" method="get" class="form-search">
				<h2 class="form-signin-heading">Search for a DVD</h2>
				<div class="form-group">
					<label for="dvd" class="sr-only">DVD title</label>
		      <input type="text" class="form-control" id="dvd" name="dvd" placeholder="DVD title">
				</div>
	      <button type="submit" class="btn btn-lg btn-primary btn-block">Search</button>
	    </form>

		</div> <!-- /container -->

		<footer class="footer">
      <div class="footer-container">
        <p class="text-muted">
					<span class="footer-text">ITP-405</span>
					<span class="footer-text">January 26 2016</span>
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
