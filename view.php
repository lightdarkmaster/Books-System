<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        .book-details{
            background-color: #1A1919A5;
            padding: 2px;
            color:white;
        }
        body{
            background-image:url(bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            color: black;
            font-weight: bold;
        }
        h1{
            color: white;
        }
        h3{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book Details</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("connect.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM books WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>Title:</h3>
                 <p><?php echo $row["title"]; ?></p>
                 <h3>Author:</h3>
                 <p><?php echo $row["author"]; ?></p>
                 <h3>Type:</h3>
                 <p><?php echo $row["type"]; ?></p>
                 <h3>Description:</h3>
                 <p><?php echo $row["description"]; ?></p>
                
                 <?php
                }
            }
            else{
                echo "<h3>No books found</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>