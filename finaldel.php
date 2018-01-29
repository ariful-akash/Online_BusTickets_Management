<?php

$id = $_GET['bus_id'];


$con = new mysqli('localhost', 'root', '', 'busticketreservation');
$sql1 = "delete from seat where b_id = '$id';";
$result = $con->query($sql1);

$sql = "delete from bus where b_id='$id';";

$results = $con->query($sql);

?>