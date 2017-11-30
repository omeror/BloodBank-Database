<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Patient_Accident";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1> Patient Accidents </h1>';
echo '<table border=1>';
echo '<tr><th>PatientID</th><th>AccidentType</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['patient_id'] . '</td>';
  echo '<td>' . $row['accident_type'] . '</td>';
  
  echo "<td><a href='edtpatient_acc.php?patient_id=" . $row['patient_id'] . "'>EDIT</a>" . ' ';
  
  echo "<a href='delpatient_acc.php?patient_id=" . $row['patient_id'] . "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}
 echo "<a href='addpatient_accclt.php?patient_id=" . $row['patient_id'] . "'>Add New Patient Accident</a>" . '</td>';

?>