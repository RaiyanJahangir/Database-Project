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
    ?>
    <br>
    <br>
     <div>
            <h1 style="text-align: center;color: rgb(0, 162, 255);">Pending donation requests</h1>
            <br>
            <br>
        </div>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Donation Type</th>
                    <th>Message(If any)</th>
                    <th>Details</th>
                    <th>Eligibility</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    $stid = oci_parse($conn, 'SELECT * FROM donation_request');
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                    $type=$row['REQ_TYPE'];
                    $id=$row['REQ_ID'];
                    $msg=$row['REQ_MESSAGE'];
                    $query = oci_parse($conn, "SELECT p.person_name,p.person_bloodgroup,p.person_id FROM person p,eligibility e,donation_request d
                                        where p.person_id=e.eligibility_person_id and e.eligibility_request_id = '$id'");
                    oci_execute($query);
                    $row = oci_fetch_array($query, OCI_BOTH);
                    $name=$row[0];
                    $bgroup=$row[1];
                    $pid=$row[2];
                    include "table-row.php";
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