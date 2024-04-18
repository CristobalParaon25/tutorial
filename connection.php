<?php
$dbname ="tutorialdb";
$dbpass ="";
$dbhost ="localhost";
$dbuser ="root";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn){

    echo $conn -> error;
    exit;

}


?>

