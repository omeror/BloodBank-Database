<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Invalid_blood";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1> Invalid Blood </h1>';
echo '<table border=1>';
echo '<tr><th>DonationID</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['donation_id'] . '</td>';
  
  echo "<td><a href='delbad_blood.php?donation_id=" . $row['donation_id'] . "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}


?>