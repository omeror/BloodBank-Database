<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from Hospital";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1>Hospital</h1>';
echo '<table border=1>';
echo '<tr><th>Name</th><th>City</th><th>State</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';


  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['city'] . '</td>';
  echo '<td>' . $row['state'] . '</td>';
  

  
  echo "<td><a href='delhospital.php?name =" . $row['hospital_id'] ."&name = ".$row['name']. "'>DEL</a>" . '</td>';
 
  echo '</tr>';
}
 echo "<a href='addhospitalclt.php? name =" . $row['name'] . "'>Add New Hospital</a>" . '</td>';

?>