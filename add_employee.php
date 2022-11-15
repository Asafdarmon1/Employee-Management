<?php
include "./inc/header.php";

$eFirstNameError = '';
$emailError = '';
$eLastNameError = '';
$eidError = '';

$eFirstName = false;
$eLastName = false;
$eEmail = false;
$eID = false;


if (isset($_POST["Submit"])) {
    if (empty($_POST["EFirstName"])) {
        $eFirstNameError = "First Name is Required";
    } else {
        $eFirstName = preg_match("/^[A-Za-z. ]*$/", $_POST["EFirstName"]);
        if (!$eFirstName) {
            $eFirstNameError = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["Email"])) {
        $emailError = "Email is Required";
    } else {
        $Email = preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $_POST["Email"]);
        if (!$Email) {
            $emailError = "Invalid email format";
        }
    }
    if (empty($_POST["ELastName"])) {
        $eLastNameError = "Last Name is Required";
    } else {
        $eLastName = preg_match("/^[A-Za-z. ]*$/", $_POST["ELastName"]);
        if (!$eLastName) {
            $eLastNameError = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["EID"])) {
        $eidError = "ID is Required";
    } else {
        $eID = preg_match("/^[0-9]*$/", $_POST["EID"]);
        if (!$eID) {
            $eidError = "Invalid ID format";
        }
    }
    if ($eFirstName && $eID && $eLastName && $Email) {
        $eFirstName = ucfirst($_POST["EFirstName"]);
        $eLastName = ucfirst($_POST["ELastName"]);
        $emp_email = $_POST["Email"];
        $eID = $_POST["EID"];
        global $ConnectingDB; //variable from Db file
        $sql = "INSERT INTO emp_record(eID,eFirstName,eLastName,eEmail) 
        VALUES (:EID,:EFirstName,:ELastName,:EMAIL)"; //insert into the column in the sql phpMyAdmin (dummy)
        $stmt = $ConnectingDB->prepare($sql); //using ConnectingDB as an Object
        $stmt->bindValue(':EID', $eID);
        $stmt->bindValue(':EFirstName', $eFirstName);
        $stmt->bindValue(':ELastName', $eLastName);
        $stmt->bindValue('EMAIL', $emp_email);
        $Execute = $stmt->execute();
        if ($Execute) {
            header('location:home.php');
        } else {
            echo '<span class="FieldInfoHeading">Please Try Again</span>';
        }

    }

}
?>
<!DOCTYPE>


<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="Include/style.css">
</head>
<body>
<div style="text-align: center">
    <form class="" action="add_employee.php" method="post">
        <h1 style="margin-top: 3%">Add Employee:</h1>
        <fieldset class="fieldset">
            <span class="FieldInfo">Employee First Name</span>

            <br>
            <input type="text" name="EFirstName" value="">
            <span class="Error">*<?php echo $eFirstNameError ?><br></span>
            <br>
            <span class="FieldInfo">Employee Last Name</span>
            <br>
            <input type="text" name="ELastName" value="">
            <span class="Error">*<?php echo $eLastNameError ?><br></span>
            <br>
            <span class="FieldInfo">Employee ID</span>
            <br>
            <input type="text" name="EID" value="">
            <span class="Error">*<?php echo $eidError ?><br></span>
            <br>
            <span class="FieldInfo">Employee Email</span>
            <br>
            <input type="text" name="Email" value="">
            <span class="Error">*<?php echo $emailError ?><br></span>
            <br>
            <br>
            <input class="Submit" type="submit" name="Submit" value="Submit">
            <br>


        </fieldset>
    </form>
</div>

<?php include './inc/footer.php'; ?>
</body>
</html>



