<?php
require_once 'dbconnect.php';

$sql = "UPDATE Patient_Accident SET accident_type='" . $_REQUEST['accident_type'] ."' WHERE patient_id=".$_REQUEST['patient_id']."";



if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='patient_acc.php'; </script>