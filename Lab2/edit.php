<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE tasks SET title='$title', status='$status' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
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
            padding: 30px 32px;
        }
        .card {
            max-width: 520px;
            background: white;
            padding: 26px;
            border: 1px solid #dfe6ee;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #1e293b;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 18px;
            font-size: 15px;
        }
        input[type="submit"] {
            background: #22a261;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #1d8d54;
        }
        a {
            color: #2d6cdf;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Edit Task</h2>
</div>
<div class="content">
    <div class="card">
        <form method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>">

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="pending" <?php if($row['status']=='pending') echo 'selected'; ?>>Pending</option>
                <option value="done" <?php if($row['status']=='done') echo 'selected'; ?>>Done</option>
            </select>

            <input type="submit" name="update" value="Update">
        </form>
    </div>
</div>
</body>
</html>
