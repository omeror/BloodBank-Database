<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Patient";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1>Patients</h1>';
echo '<table border=1>';
echo '<tr><th>PatientID</th><th>FirstName</th><th>LastName</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['patient_id'] . '</td>';
  echo '<td>' . $row['f_name'] . '</td>';
  echo '<td>' . $row['l_name'] . '</td>';
  
  echo "<td><a href='edtpatient.php?patient_id=" . $row['patient_id'] . "'>EDIT</a>" . ' ';
  
  echo "<a href='delpatient.php?patient_id=" . $row['patient_id'] . "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}
 echo "<a href='addpatientclt.php?patient_id=" . $row['patient_id'] . "'>Add New Patient</a>" . '</td>';

?>