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
                    <th>Test ID</th>
                    <th>Test Date</th>
                    <th>Donar Id</th>
                    <th>Person Name</th>
                    <th>Blood Group</th>
                    <th>Blood Type</th>
                    <th>Event Name</th>
                    <th>Test Result</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    error_reporting(0);
                    $stid = oci_parse($conn, 'select et.test_id,et.test_date,d.req_id ,p.person_name,
                    p.person_bloodgroup,d.req_type,d.req_event,et.state ,d.req_state from donation_request d ,
                    eligibility e,person p,eligibility_test et
                    where e.eligibility_request_id=d.req_id and p.person_id=e.eligibility_person_id 
                    and e.eligibility_test_id=et.test_id');
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                    ?><tr><td><?php echo $row[0] ?></td><?php
                    ?><td><?php echo $row[1] ?></td><?php
                    ?><td><?php echo $row[2] ?></td><?php
                    ?><td><?php echo $row[3] ?></td><?php
                    ?><td><?php echo $row[4] ?></td><?php
                    ?><td><?php echo $row[5] ?></td><?php
                    ?><td><?php echo $row[6] ?></td><?php
                    ?><td><?php echo $row[7] ?></td><?php
                    ?><td><?php echo $row[8] ?></td></tr><?php
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