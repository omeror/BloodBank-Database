<?php

require_once 'dbconnect.php';

$sql = "SELECT * FROM Patient_Accident WHERE patient_id =" .$_REQUEST['patient_id'].""; 

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtpatient_accrv.php'>
PatientID <input name="patient_id" value="<?php echo $row['patient_id']?>" readonly></br>
AccidentType <input name="accident_type" value="<?php echo $row['accident_type']?>"></br>
<input type="submit" value="Save">
</form>