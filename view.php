<?php
include "db.php";

$sql = "SELECT * FROM leaves";
$result = $conn->query($sql);
?>

<h2>Leave Status</h2>
<table border="1">
    <tr>
        <th>Employee Name</th>
        <th>Leave Type</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['employee_name']; ?></td>
        <td><?php echo $row['leave_type']; ?></td>
        <td><?php echo $row['start_date']; ?></td>
        <td><?php echo $row['end_date']; ?></td>
        <td><?php echo $row['reason']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
    <?php } ?>
</table>
