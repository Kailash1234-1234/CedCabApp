<?php
require_once '../config.php';
require_once 'AR.php';
$con=new Config();
$conn=$con->createConnection();
$newride = new AR();
$name=$_POST['name'];
$distance=$_POST['distance'];
if ($name=="" || $distance=='') {
    echo "Empty Feild bot Allowed Here !!";
} else {
    $newride->addlocation($name, $distance, $conn);
}

?>