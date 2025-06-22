<!DOCTYPE html>
<html>
<head>
    <title>Leave Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Employee Leave Application</h2>
    <form action="submit.php" method="post">
    <label>Employee Name:</label>
    <input type="text" name="employee_name" required><br>
    <label>Leave Type:</label>
    <select name="leave_type" required>
        <option value="Sick Leave">Sick Leave</option>
        <option value="Casual Leave">Casual Leave</option>
        <option value="Annual Leave">Annual Leave</option>
    </select><br>
    <label>Start Date:</label>
    <input type="date" name="start_date" required><br>
    <label>End Date:</label>
    <input type="date" name="end_date" required><br>
    <label>Reason:</label>
    <textarea name="reason"></textarea><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>
