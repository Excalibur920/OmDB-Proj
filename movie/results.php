<?php
    require "./includes/connect.php";
    $_SESSION["user"] = $_POST["user"];
?>

<!DOCTYPE html>

<html>
    <head>
		<link rel="stylesheet" href="stylesheet.css">
    </head>
</html>

<?php
function getImdbRecord($Imdbtitle)
{
    $path = "http://www.omdbapi.com/?t=$Imdbtitle&apikey=90cef035";
    $json = file_get_contents($path);
    return json_decode($json, TRUE);
}

$sql_check= 'SELECT dex from searched WHERE user="' . $_SESSION["user"] . '" and title="' . $_POST["title"] . '"';

$checkresult = mysqli_query($link_db, $sql_check);
$rows = mysqli_num_rows($checkresult);

if ($rows > 0) {
    header('location: ./details.php?title=' . $_POST["title"]);
    exit;
}

$result  = getImdbRecord($_POST["title"]);

$sql = 'INSERT INTO searched (user, prompt, title, yr, rated, released, runtime, genre, actors, plot, lang, poster, imdbrating)
VALUES ("' . $_SESSION["user"] . '", 
        "' . $_POST["title"] . '", 
        "' . $result["Title"] . '", 
        ' . $result["Year"] . ',
        "' . $result["Rated"] . '", 
        "' . $result["Released"] . '", 
        "' . $result["Runtime"] . '", 
        "' . $result["Genre"] . '", 
        "' . $result["Actors"] . '", 
        "' . $result["Plot"] . '", 
        "' . $result["Language"] . '", 
        "' . $result["Poster"] . '", 
        "' . $result["imdbRating"] . '")';

if ($_SERVER['HTTP_REFERER'] = "./search.php") {
    $dbresult = mysqli_query($link_db, $sql);
}



?>
<html>
    <div class="row" style="padding:30px;">
        <div class="rcolumn" style="background-color:#8c9ec0;padding: 30px;">
            <?php
                echo "<pre>";
                echo "Title: " . $result["Title"];
                echo "<br>";
                echo "Year of Release: " . $result["Year"];
                echo "<br>";
                echo "Rating: " . $result["Rated"];
                echo "<br>";
                echo "Released on: " . $result["Released"];
                echo "<br>";
                echo "Runtime: " . $result["Runtime"];
                echo "<br>";
                echo "Genre: " . $result["Genre"];
                echo "<br>";
                echo "Actors: " . $result["Actors"];
                echo "<br>";
                echo "<textarea readonly class='form-control' name='plot' style='height: 100px;width: 500px;'>" . $result["Plot"] . "</textarea>";
                echo "<br>";
                echo "Languages: " . $result["Language"];
                echo "<br>";
                echo "ImDB Rating: " . $result["imdbRating"];
                echo "</pre>";
            ?>
        </div>
        <div class="rcolumn">
            <div class="img-container">
                <img src=<?php echo $result["Poster"] ?>>
            </div>
        </div>
    </div>

    <div class="footer">
	    <a href="./history.php" class="button">View History</a>
        <a href="./search.php" class="button">Search</a>
    </div>
</html>
