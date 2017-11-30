<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Donor";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1>Donors</h1>';
echo '<table border=1>';
echo '<tr><th>DonorID</th><th>FirstName</th><th>LastName</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['donor_id'] . '</td>';
  echo '<td>' . $row['f_name'] . '</td>';
  echo '<td>' . $row['l_name'] . '</td>';
  
  echo "<td><a href='edtdonor.php?donor_id=" . $row['donor_id'] . "'>EDIT</a>" . ' ';
  
  echo "<a href='deldonor.php?donor_id=" . $row['donor_id'] . "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}
 echo "<a href='adddonorclt.php?donor_id=" . $row['donor_id'] . "'>Add New Donor</a>" . '</td>';

?>