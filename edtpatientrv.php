<?php
require_once 'dbconnect.php';

$sql = "UPDATE Patient SET f_name='" . $_REQUEST['f_name'] ."',l_name='".$_REQUEST['l_name']."' WHERE patient_id=".$_REQUEST['patient_id']."";



if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='patient.php'; </script>