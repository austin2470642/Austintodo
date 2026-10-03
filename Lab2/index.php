<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #222;
        }
        .header {
            background: #2d6cdf;
            color: white;
            padding: 22px 32px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .header h2 {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
        }
        .content {
            padding: 28px 32px;
        }
        .add-btn {
            display: inline-block;
            background: #22a261;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .add-btn:hover {
            background: #1d8d54;
        }
        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            background: white;
            border: 1px solid #dfe6ee;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        th, td {
            padding: 12px 14px;
            border-bottom: 1px solid #e9edf3;
            text-align: left;
        }
        th {
            background: #edf3ff;
            color: #244d9c;
        }
        td a {
            color: #2d6cdf;
            text-decoration: none;
            font-weight: 500;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>My Todo List</h2>
</div>
<div class="content">
<a href="add.php" class="add-btn">Add Task</a>
<table>
<tr><th>ID</th><th>Title</th><th>Status</th><th>Actions</th></tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM tasks");
while ($row = mysqli_fetch_assoc($result)) {
    $status = isset($row['status']) && $row['status'] !== '' ? $row['status'] : 'pending';

    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['title']}</td>
            <td>{$status}</td>
            <td>
            <a href='edit.php?id={$row['id']}'>Edit</a> |
            <a href='delete.php?id={$row['id']}' onclick=\"return confirm(&#039;Are you sure you want to delete this task?&#039;);\">Delete</a> |
            <a href='mark_done.php?id={$row['id']}'>Mark as Done</a>
            </td>
        </tr>";
}
?>
</table>
</div>
</body>
</html>
