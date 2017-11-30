<?php
require_once 'dbconnect.php';

$sql = "UPDATE Blood_Donations SET blood_type='" . $_REQUEST['blood_type'] ."',donor_id='".$_REQUEST['donor_id']."' ,is_blood_valid ='".$_REQUEST['is_blood_valid']."',f_name='".$_REQUEST['f_name']."' ,l_name='".$_REQUEST['l_name']."' WHERE donation_id=".$_REQUEST['donation_id']."";



if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='blood_don.php'; </script>