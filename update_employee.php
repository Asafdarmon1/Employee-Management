<?php
include "./inc/header.php";
$SearchQueryParameter = $_GET['id'];
$eFirstNameError = '';
$emailError = '';
$eLastNameError = '';
$eidError = '';

$eFirstName = false;
$eLastName = false;
$eEmail = false;
$eID = false;


if (isset($_POST["Update"])) {
    if (empty($_POST["EFirstName"])) {
        $eFirstNameError = "Field Required";
    } else {
        $eFirstName = preg_match("/^[A-Za-z. ]*$/", $_POST["EFirstName"]);
        if (!$eFirstName) {
            $eFirstNameError = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["Email"])) {
        $emailError = "Field Required";
    } else {
        $eEmail = preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $_POST["Email"]);
        if (!$eEmail) {
            $emailError = "Invalid email format";
        }
    }
    if (empty($_POST["ELastName"])) {
        $eLastNameError = "Field Required";
    } else {
        $eLastName = preg_match("/^[A-Za-z. ]*$/", $_POST["ELastName"]);
        if (!$eLastName) {
            $eLastNameError = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["EID"])) {
        $eidError = "Field Required";
    } else {
        $eID = preg_match("/^\d{9}[0-9]*$/", $_POST["EID"]);
        $eID = preg_match("/^\d{9}$/", $_POST["EID"]);
        if (!$eID) {
            $eidError = "Invalid ID format";
        }
    }
    if ($eFirstName && $eID && $eLastName && $eEmail) {
        $eFirstName = ucfirst($_POST["EFirstName"]);
        $eLastName = ucfirst($_POST["ELastName"]);
        $emp_email = $_POST["Email"];
        $eID = $_POST["EID"];
        global $ConnectingDB; //variable from Db file
        $sql = "UPDATE emp_record SET eID='$eID', eFirstname = '$eFirstName', eLastName = '$eLastName', eEmail = '$emp_email' 
    WHERE id='$SearchQueryParameter'";
        $Execute = $ConnectingDB->query($sql);
        if ($Execute) {
            echo '<script>window.open("home.php?id=Record Updated Successfully","_self")</script>';
        } else {
            echo '<span class="FieldInfoHeading">Please Try Again</span>';
        }
    }


}
?>
<!DOCTYPE>


<html>
<head>
    <title>Update</title>
</head>
<body>
<?php
$ID = '';
$FirstName = '';
$LastName = '';
$Email = '';
global $ConnectingDB;
$sql = "SELECT * FROM emp_record WHERE id='$SearchQueryParameter'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
    $ID = $DataRows['eID'];
    $FirstName = $DataRows['eFirstName'];
    $LastName = $DataRows['eLastName'];
    $Email = $DataRows['eEmail'];
}
?>

<div style="text-align: center;">
    <form action="update_employee.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
        <h3 style="margin-top: 5%">Update Info:</h3>
        <fieldset class="fieldset">
            <span class="FieldInfo">Employee First Name</span>
            <br>
            <input type="text" name="EFirstName" value="<?php echo $FirstName ?>">
            <span class="Error">*<?php echo $eFirstNameError ?><br></span>
            <br>
            <span class="FieldInfo">Employee Last Name</span>
            <br>
            <input type="text" name="ELastName" value="<?php echo $LastName ?>">
            <span class="Error">*<?php echo $eLastNameError ?><br></span>
            <br>
            <span class="FieldInfo">Employee ID</span>
            <br>
            <input type="text" name="EID" value="<?php echo $ID ?>">
            <span class="Error">*<?php echo $eidError ?><br></span>
            <br>
            <span class="FieldInfo">Employee Email</span>
            <br>
            <input type="text" name="Email" value="<?php echo $Email ?>">
            <span class="Error">*<?php echo $emailError ?><br></span>
            <br>
            <br>
            <input class="Submit" type="submit" name="Update" value="Update">
            <br>
        </fieldset>
    </form>
</div>
<?php include './inc/footer.php'; ?>
</body>
</html>




