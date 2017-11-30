<?php

require_once 'dbconnect.php';

$sql = "SELECT * FROM Patient WHERE patient_id =" .$_REQUEST['patient_id'].""; 

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtpatientrv.php'>
PatientID <input name="patient_id" value="<?php echo $row['patient_id']?>" readonly></br>
FirstName <input name="f_name" value="<?php echo $row['f_name']?>"></br>
LastName <input name="l_name" value="<?php echo $row['l_name']?>"></br>
<input type="submit" value="Save">
</form>