<?php
require_once 'Include/DB.php';

?>
<!DOCTYPE>


<html>
<head>
    <title>View Data From DB</title>
    <link rel="stylesheet" href="Include/style.css">
    <!-- Latest compiled and minified CSS -->
    <! <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">>

    <!-- jQuery library -->
    <! <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> >

    <!-- Latest compiled JavaScript -->
    <! <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> >


</head>
<body>

<div>
    <h3 style="font-weight: bold; text-align: center">View From DataBase</h3>
</div>

<table class="Table" align="center" border="5" width="1000">

    <tr>
        <th></th>
        <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

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
        <tr>
            <td><?php echo $DataRows['id']; ?></td>
            <td><?php echo $ID; ?></td>
            <td><?php echo $FirstName; ?></td>
            <td><?php echo $LastName; ?></td>
            <td><?php echo $Email; ?></td>
            <td><a href="Update.php?id=<?php echo $DataRows['id']; ?>">Update</td>
            <!Update Via ID!>
            <td><a href="Delete.php?id=<?php echo $DataRows['id']; ?>">Delete</td>
            <!Delete Via ID!>
        </tr>
    <?php } ?>
</table>
<div style="text-align: center; margin-top: 3% !important;">
    <button class="addButton" type="button" style="cursor: hand" onclick="window.location.href='insertIntoDB.php'">
        +
    </button>
</div>


<!-- Trigger the modal with a button --

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

-- Modal --
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

         Modal content--
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>-->

</body>
</html>



