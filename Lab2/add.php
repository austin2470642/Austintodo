<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #eef6ff, #f8f9fb);
            color: #333;
        }
        .header {
            background: linear-gradient(135deg, #1f6feb, #4f9cfb);
            color: white;
            padding: 24px 40px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .header h2 {
            margin: 0;
            font-size: 30px;
        }
        .content {
            padding: 30px 40px;
        }
        .card {
            max-width: 500px;
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 18px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        a {
            color: #0d6efd;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Add Task</h2>
</div>
<div class="content">
    <div class="card">
        <form method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
            <input type="submit" name="submit" value="Save">
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    mysqli_query($conn, "INSERT INTO tasks (title, status) VALUES ('$title', 'pending')");
    header("Location: index.php");
    exit;
}
?>
</body>
</html>
