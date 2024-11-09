<?php
include 'config.php';

// Fetch all employees from the database
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
</head>
<body>

<h2>Employee Management</h2>

<form action="insert.php" method="POST">
    <input type="text" name="employee_name" placeholder="Name" required><br>
    <input type="text" name="position" placeholder="Position" required><br>
    <input type="number" name="salary" placeholder="Salary" required><br>
    <input type="date" name="hire_date" required><br>
    <button type="submit">Add Employee</button>
</form>

<h3>Employee List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Hire Date</th>
        <th>Actions</th>
    </tr>

    <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['employee_name']); ?></td>
                <td><?php echo htmlspecialchars($row['position']); ?></td>
                <td><?php echo htmlspecialchars($row['salary']); ?></td>
                <td><?php echo htmlspecialchars($row['hire_date']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this employee?');">Delete</a>
                </td>
            </tr>
    <?php } } else { ?>
        <tr>
            <td colspan="6">No employees found.</td>
        </tr>
    <?php } ?>
</table>

<?php $conn->close(); ?>
</body>
</html>
