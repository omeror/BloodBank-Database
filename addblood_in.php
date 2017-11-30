<?php
require_once 'dbconnect.php';

 $sql = "insert into Blood_inventory (donation_id,blood_type) values('$_REQUEST[donation_id]' ,'$_REQUEST[blood_type]')";


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='blood_in.php'; </script>