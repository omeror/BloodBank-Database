<?php
require_once 'dbconnect.php';

 $sql = "insert into Blood_Donations (donation_id,blood_type,donor_id,is_blood_valid,f_name,l_name) values(' $_REQUEST[donation_id]' ,' $_REQUEST[blood_type]' ,' $_REQUEST[donor_id]' ,' $_REQUEST[is_blood_valid]' ,' $_REQUEST[f_name] ',' $_REQUEST[l_name]')";


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='blood_don.php'; </script>