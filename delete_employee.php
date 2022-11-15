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


if (isset($_POST["Delete"])) {

    $eFirstName = $_POST["EFirstName"];
    $eLastName = $_POST["ELastName"];
    $emp_email = $_POST["Email"];
    $eID = $_POST["EID"];
    global $ConnectingDB; //variable from Db file
    $sql = "DELETE FROM emp_record WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if ($Execute) {
        echo '<script>window.open("home.php?id=Record Deleted Successfully","_self")</script>';
    } else {
        echo '<span class="FieldInfoHeading">Please Try Again</span>';
    }


}
?>
<!DOCTYPE>


<html>
<head>
    <title>Delete</title>
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
    <h3 style="margin-top: 3%; text-align: center; font-weight: bold">Are You Sure??</h3>
    <form action="delete_employee.php?id=<?php echo $SearchQueryParameter; ?>" method="post">
        <fieldset class="fieldset">
            <span>Employee First Name</span>

            <br>
            <input type="text" name="EFirstName" value="<?php echo $FirstName ?>">
            <span class="Error">*<?php echo $eFirstNameError ?><br></span>
            <br>
            <span>Employee Last Name</span>
            <br>
            <input type="text" name="ELastName" value="<?php echo $LastName ?>">
            <span class="Error">*<?php echo $eLastNameError ?><br></span>
            <br>
            <span>Employee ID</span>
            <br>
            <input type="text" name="EID" value="<?php echo $ID ?>">
            <span class="Error">*<?php echo $eidError ?><br></span>
            <br>
            <span>Employee Email</span>
            <br>
            <input type="text" name="Email" value="<?php echo $Email ?>">
            <span class="Error">*<?php echo $emailError ?><br></span>
            <br>
            <br>
            <span>
            <input class="Submit" type="submit" name="Delete" value="Delete">
            </span>
            <br>
        </fieldset>
    </form>
</div>

<?php include './inc/footer.php'; ?>
</body>
</html>




