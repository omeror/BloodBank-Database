<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Blood_Donations";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1>Blood Donations</h1>';
echo '<table border=1>';
echo '<tr><th>DonationID</th><th>Blood Type</th><th>DonorID</th><th>IsBloodValid</th><th>FirstName</th><th>LastName</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['donation_id'] . '</td>';
  echo '<td>' . $row['blood_type'] . '</td>';
  echo '<td>' . $row['donor_id'] . '</td>';
  echo '<td>' . $row['is_blood_valid'] . '</td>';
  echo '<td>' . $row['f_name'] . '</td>';
  echo '<td>' . $row['l_name'] . '</td>';
  
  echo "<td><a href='edtblood_don.php?donation_id=" . $row['donation_id'] . "'>EDIT</a>" . ' ';
  
  echo "<a href='delblood_don.php?donation_id=" . $row['donation_id'] . "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}
 echo "<a href='addblood_donclt.php?donation_id=" . $row['donation_id'] . "'>Add New Donation</a>" . '</td>';

?>