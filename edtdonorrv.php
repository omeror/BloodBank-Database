<?php
require_once 'dbconnect.php';

$sql = "UPDATE Donor SET f_name='" . $_REQUEST['f_name'] ."',l_name='".$_REQUEST['l_name']."' WHERE donor_id=".$_REQUEST['donor_id']."";



if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='donor.php'; </script>