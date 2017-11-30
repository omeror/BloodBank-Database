<?php

require_once 'dbconnect.php';

$sql = "SELECT * FROM Donor WHERE donor_id =" .$_REQUEST['donor_id'].""; 

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtdonorrv.php'>
DonorID <input name="donor_id" value="<?php echo $row['donor_id']?>" readonly></br>
FirstName <input name="f_name" value="<?php echo $row['f_name']?>"></br>
LastName <input name="l_name" value="<?php echo $row['l_name']?>"></br>
<input type="submit" value="Save">
</form>