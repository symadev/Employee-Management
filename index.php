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
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .employee-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .employee-table th,
    .employee-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .employee-table th {
        background-color: #f4f4f4;
    }

    .employee-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .employee-table tr:hover {
        background-color: #f1f1f1;
    }

    .edit-btn,
    .delete-btn {
        padding: 6px 12px;
        border: none;
        cursor: pointer;
        color: #fff;
        margin-right: 5px;
    }

    .edit-btn {
        background-color: #4caf50;
    }

    .delete-btn {
        background-color: #f44336;
    }

    .edit-btn:hover {
        background-color: #45a049;
    }

    .delete-btn:hover {
        background-color: #e53935;
    }
    form input{
        margin: 5px;
        padding: 5px;
    }
    form button{
        margin: 5px 0 0 5px;
        padding: 10px 15px;
        background-color: #6fa2f2;
        border: 4px solid #6fa2f2;
        color: white;
    }
    body{
        max-width: 800px;
        margin: auto;
        border: 4px solid white;
        border-radius: 5px;
        border-color: #e4e8e3;
        margin-top: 50px;
        padding: 20px 50px 50px 50px;
        
        
    }

    
</style>
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
<table border="1" class="employee-table">
<thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Hire Date</th>
            
        </tr>
    </thead>
    
    

    <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['employee_name']); ?></td>
                <td><?php echo htmlspecialchars($row['position']); ?></td>
                <td><?php echo htmlspecialchars($row['salary']); ?></td>
                <td><?php echo htmlspecialchars($row['hire_date']); ?></td>
                
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
