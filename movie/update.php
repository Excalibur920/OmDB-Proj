<?php
require "./includes/connect.php";
?>

<!DOCTYPE html>
<?php
echo $_POST["user"];
echo $_POST["title"];
echo $_POST["genre"];
echo $_POST["actors"];
echo $_POST["plot"];
echo $_POST["dex"];

    $sql_upd = 'UPDATE searched 
                SET title = "' . $_POST["title"] . '",
                   genre = "' . $_POST["genre"] . '",
                  actors = "' . $_POST["actors"] . '",
                    plot = "' . $_POST["plot"] . '"
                WHERE dex = "' . $_POST["dex"] . '"';
    
    $result = mysqli_query($link_db, $sql_upd);

    header('location: ./history.php');
    exit;
?>