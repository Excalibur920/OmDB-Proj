<!DOCTYPE html>
<?php
	 require "./includes/connect.php";
	 $sql = "SELECT dex, user, prompt, title, yr, rated, released, runtime, genre, actors, plot, lang, poster, imdbrating FROM searched WHERE title='" . (isset($_GET['title']) ? $_GET['title'] : $_POST['title']) . "'";
	 $result=mysqli_query($link_db,$sql);
	 $movie=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<html>
	<head>
		  <link rel="stylesheet" href="stylesheet.css">
	</head>
    <div class="row" style="padding:30px;">
        <div class="rcolumn" style="background-color:#8c9ec0;padding: 30px;">
            <form action="update.php" method="POST">
                <input type="hidden" name="dex" value="<?php echo $movie["dex"] ?>">
                    <?php
                        echo "<pre>";
                        echo "Submitted by: " . $movie["user"];
                        echo "<br>";
                        echo "Prompt: " . $movie["prompt"];
                        echo "<br>";
                        echo "Title: <input type='text' class='form-control' name='title' value='" . $movie["title"] . "'>";
                        echo "<br>";
                        echo "Year of Release: " . $movie["yr"];
                        echo "<br>";
                        echo "Rating: " . $movie["rated"];
                        echo "<br>";
                        echo "Released on: " . $movie["released"];
                        echo "<br>";
                        echo "Runtime: " . $movie["runtime"];
                        echo "<br>";
                        echo "Genre: <input type='text' class='form-control' name='genre' value='" . $movie["genre"] . "'>";
                        echo "<br>";
                        echo "Actors: <input type='text' class='form-control' name='actors' value='" . $movie["actors"] . "'>";
                        echo "<br>";
                        echo "<div>Summary: </div> <textarea class='form-control' name='plot' style='height: 100px;width: 500px;'>" . $movie["plot"] . "</textarea>";
                        echo "<br>";
                        echo"Languages: " . $movie["lang"];
                        echo "<br>";
                        echo"ImDB Rating: " . $movie["imdbrating"];
                        echo "</pre>";
                    ?>
                <button class="btn btn-default" id="save">Save Changes</button>
            </form>
        </div>
        <div class="rcolumn">
            <div class="img-container">
                <img src=<?php print_r($movie["poster"]) ?>>
            </div>
        </div>
    </div>

    <div class="footer">
	      <a href="./history.php" class="button">View History</a>
        <a href="./search.php" class="button">Search</a>
    </div>
</html>

