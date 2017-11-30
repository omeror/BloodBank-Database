<?php
require_once 'dbconnect.php';

$sql = "delete from Donor where donor_id = '".$_REQUEST['donor_id']."'";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='donor.php'; </script>