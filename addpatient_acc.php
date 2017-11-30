<?php
require_once 'dbconnect.php';

 $sql = "insert into Patient_Accident (patient_id, accident_type) values(' $_REQUEST[patient_id]' ,' $_REQUEST[accident_type]')";


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='patient_acc.php'; </script>