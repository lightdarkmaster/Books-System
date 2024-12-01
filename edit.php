<?php
require 'config.php';

$id = $_GET['id'];
$item = $conn->query("SELECT * FROM items WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE items SET name = ?, description = ?, price = ? WHERE id = ?");
    $stmt->bind_param('ssdi', $name, $description, $price, $id);
    $stmt->execute();

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            display: flex;
            flex-direction: column;
            font-size: 16px;
            color: #333;
        }
        input, textarea, button {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input:focus, textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            text-decoration: none;
            color: #007bff;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>
        <form method="POST">
            <label>
                Name:
                <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
            </label>
            <label>
                Description:
                <textarea name="description" rows="4" required><?= htmlspecialchars($item['description']) ?></textarea>
            </label>
            <label>
                Price:
                <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($item['price']) ?>" required>
            </label>
            <button type="submit">Update</button>
        </form>
        <div class="back-link">
            <a href="index.php">Back to Item List</a>
        </div>
    </div>
</body>
</html>
