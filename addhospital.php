<?php
require_once 'dbconnect.php';

 $sql = "insert into Hospital (name,city,state) values(' $_REQUEST[name]' ,' $_REQUEST[city] ',' $_REQUEST[state]')";


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='Hospital.php'; </script>