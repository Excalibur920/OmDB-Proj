<?php

    session_start();

    $conn_host		= '#####';
    $conn_user		= '#####';
    $conn_pass		= '#####';
    $conn_database	= '#####'; 

    $link_db = mysqli_connect($conn_host,$conn_user,$conn_pass,$conn_database) or die('Unable to establish a DB connection');

?>
