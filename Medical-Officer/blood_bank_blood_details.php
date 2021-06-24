<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/request.css" rel="stylesheet">
</head>
<body>
    <?php
    include_once '../database.php';
    include "navbar.php";
    include "header-small.php";
    echo $mid=$_SESSION['mid'];
    ?>
    <br>
    <br>
     <div>
            <h1 style="text-align: center;color: rgb(0, 162, 255);">Donation request and performed tests</h1>
            <br>
            <br>
        </div>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Blood Group</th>
                    <th>Blood Type</th>
                    <th>Total Bags Available</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    error_reporting(0);
                    $stid = oci_parse($conn, 'select * from product_view');
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                    ?><tr><td><?php echo $row[0] ?></td><?php
                    ?><td><?php echo $row[1] ?></td><?php
                    ?><td><?php echo $row[2] ?></td></tr><?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <?php
    include "footer.php";
    ?>
</body>
</html>