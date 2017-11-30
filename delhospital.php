<?php
require_once 'dbconnect.php';

$sql = "delete from Hospital where name = '".$_REQUEST[name]."'";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='Hospital.php'; </script>