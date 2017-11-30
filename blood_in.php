<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Blood_inventory";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1>Blood Inventory</h1>';
echo '<table border=1>';
echo '<tr><th>DonationID</th><th>BloodType</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['donation_id'] . '</td>';
  echo '<td>' . $row['blood_type'] . '</td>';
  
 
  
  echo "<td><a href='delblood_in.php? donation_id =" . $row['donation_id'] . "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}
 echo "<a href='addblood_inclt.php? donation_id =" . $row['donation_id'] . "'>Add New Donation to Inventory</a>" . '</td>';

?>