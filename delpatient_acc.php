<?php
require_once 'dbconnect.php';

$sql = "delete from Patient_Accident where patient_id = '".$_REQUEST['patient_id']."'";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='patient_acc.php'; </script>