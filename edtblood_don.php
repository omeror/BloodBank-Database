<?php

require_once 'dbconnect.php';

$sql = "SELECT * FROM Blood_Donations WHERE donation_id =".$_REQUEST['donation_id'].""; 

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtblood_donrv.php'>
DonationID <input name="donation_id" value="<?php echo $row['donation_id']?>" ></br>
BloodType <input name="blood_type" value="<?php echo $row['blood_type']?>" ></br>
DonorID <input name="donor_id" value="<?php echo $row['donor_id']?>" ></br>
IsBloodValid <input name="is_blood_valid" value="<?php echo $row['is_blood_valid']?>" ></br>
FirstName <input name="f_name" value="<?php echo $row['f_name']?>"></br>
LastName <input name="l_name" value="<?php echo $row['l_name']?>"></br>
<input type="submit" value="Save">
</form>