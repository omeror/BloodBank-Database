<?php
require_once 'dbconnect.php';

 $sql = "insert into Donor (donor_id,f_name,l_name) values(' $_REQUEST[donor_id]' ,' $_REQUEST[f_name] ',' $_REQUEST[l_name]')";


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='donor.php'; </script>