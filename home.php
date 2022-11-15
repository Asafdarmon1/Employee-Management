<?php
include "./inc/header.php";
?>
<!DOCTYPE>


<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="Include/style.css">
</head>
<body>

<div>
    <h3 style="margin-top: 5%; font-weight: bold; text-align: center">Employee List:</h3>
</div>

<table class="table table-hover text-center" border="5px" style="width: max-content; margin:2% auto auto auto">

<thead>
<tr>
    <th>#</th>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Update</th>
    <th>Delete</th>
</tr>
</thead>
<?php
$ID = '';
$FirstName = '';
$LastName = '';
$Email = '';

global $ConnectingDB;
$sql = "SELECT * FROM emp_record";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) { //matching each column to its data, using a while loop and fetch
$ID = $DataRows['eID'];
$FirstName = $DataRows['eFirstName'];
$LastName = $DataRows['eLastName'];
$Email = $DataRows['eEmail'];
?>
<tbody>
<tr>
    <td><?php echo $DataRows['id']; ?></td>
    <td><?php echo $ID; ?></td>
    <td><?php echo $FirstName; ?></td>
    <td><?php echo $LastName; ?></td>
    <td><?php echo $Email; ?></td>
    <td><a href="update_employee.php?id=<?php echo $DataRows['id']; ?>">Update</td>
    <!Update Via ID!>
    <td><a href="delete_employee.php?id=<?php echo $DataRows['id']; ?>">Delete</td>
    <!Delete Via ID!>
</tr>
<?php } ?>
</tbody>
</table>
<div style="text-align: center; margin-top: 3% !important;">
    <button class="addButton" type="button" style="cursor: hand" onclick="window.location.href='add_employee.php'">
        Add Employee
    </button>
</div>
<?php include './inc/footer.php'; ?>
</body>
</html>



