<?php
require_once 'Include/DB.php';
$SearchQueryParameter = $_GET['id'];
$eFirstNameError = '';
$emailError = '';
$eLastNameError = '';
$eidError = '';

$eFirstName = false;
$eLastName = false;
$eEmail = false;
$eID = false;


if (isset($_POST["Delete"])) {

    $eFirstName = $_POST["EFirstName"];
    $eLastName = $_POST["ELastName"];
    $emp_email = $_POST["Email"];
    $eID = $_POST["EID"];
    global $ConnectingDB; //variable from Db file
    $sql = "DELETE FROM emp_record WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if ($Execute) {
        echo '<script>window.open("viewFromDB.php?id=Record Deleted Successfully","_self")</script>';
    } else {
        echo '<span class="FieldInfoHeading">Please Try Again</span>';
    }


}
?>
<!DOCTYPE>


<html>
<head>
    <title>Update Data</title>
    <link rel="stylesheet" href="Include/style.css">
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
<div class="">
    <form class="" action="Delete.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
        <fieldset style="">
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
            <input type="submit" name="Delete" value="Delete">
            <br>


        </fieldset>
    </form>
</div>


</body>
</html>




