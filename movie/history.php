<?php
    require "./includes/connect.php";
?>

<!DOCTYPE html>
<?php
    $sql = "SELECT dex, title, yr, genre, plot, imdbrating, user FROM searched WHERE user='" . $_SESSION['user'] . "'";
    $result=mysqli_query($link_db,$sql);
?>
<html>
	<head>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
</html>

<html>
<table>
    <?php
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Release Year</th>";
        echo "<th>Genre</th>";        
        echo "<th>Summary</th>";                
        echo "<th>ImDB Rating</th>";                        
        echo "<th>Submitted By</th>";                                
        echo "<th></th>";                                        
        echo "<tr>";
    ?>
    <tbody>
    <?php
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<pre><td><form action='./details.php' method='post'><button type='submit' name='title' value='" . $row['title'] . "' class='btn-link'>" . $row['title'] . "</button></form></td>";
            echo "<td>" . $row['yr'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['plot'] . "</td>";
            echo "<td>" . $row['imdbrating'] . "</td>";
            echo "<td>" . $row['user'] . "</td>";
            echo "<td><a href='delete.php?dex=" . $row['dex'] . "'  onclick='return confirm('Are you sure?')'><button class='btn btn-danger'>Delete</button></a></td></pre>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<div class="footer">
        <a href="./search.php" class="button">Search</a>
    </div>
</html>