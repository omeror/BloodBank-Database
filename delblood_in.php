<?php
require_once 'dbconnect.php';

$sql = "delete from Blood_inventory where donation_id ='".$_REQUEST['.donation_id']."'";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='blood_in.php'; </script>