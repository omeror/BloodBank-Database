<?php
require_once 'dbconnect.php';

$sql = "delete from Invalid_blood where donation_id = '".$_REQUEST['donation_id']."'";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='bad_blood.php'; </script>