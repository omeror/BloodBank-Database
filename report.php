<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from report";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<h1>Accident Report</h1>';
echo '<table border=1>';
echo '<tr><th>FirstName</th><th>LastName</th><th>AccidentType</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['f_name'] . '</td>';
  echo '<td>' . $row['l_name'] . '</td>';
  echo '<td>' . $row['accident_type'] . '</td>';
  echo '</tr>';
}
echo '</table>';

?>
