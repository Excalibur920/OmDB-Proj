<?php
	require "./includes/connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="stylesheet.css">
	</head>

<body class="body" >
	<div id="row" class="row" style="background-color:#8c9ec0;padding: 30px;">
		<form action="results.php" method="POST">
			<div class="col-lg-8 col-lg-offset-2 text-center">
				<div class="col-lg-4">
					<div class="form-group" style="display:flex; flex-direction: row; justify-content: center; align-items: left">
						<label class="sr-only" for="user">Username:</label>
						<input type="text" class="form-control" name="user" value="<?php echo $_SESSION['user']; ?>" placeholder="Enter username..." required pattern="[a-zA-Z0-9\s\-\:]+" title="Alpha-numeric and hyphen, colon characters only .">
					</div>
					<div class="form-group" style="display:flex; flex-direction: row; justify-content: center; align-items: left">
						<label class="sr-only" for="title">Title:</label>
						<input type="text" class="form-control" name="title" placeholder="Search by Title" required pattern="[a-zA-Z0-9\s\-\:]+" title="Alpha-numeric and hyphen, colon characters only .">
					</div>
				</div>
				<button class="btn btn-default" id="submit">Submit</button>
			</div>
		</form>
	</div>
</body>


<div class="footer">
	<a href="./history.php" class="button">View History</a>
</div>
</html>