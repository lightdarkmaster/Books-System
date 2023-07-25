<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Chan Favorite Book.com</title>
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:right;
        padding:20px!important;
        color:white;
        font-weight:bold;
        background-color: grey;
        justify-content: center;
        margin: auto;
        }
        body{
            background-image:url(bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }
        .p-5{
            background-color: transparent;
            height:100%;
        }
        .input-group{
            position: relative;
            left: 60%;
            width: 40%;
        }
        tr{
            background-color: #1A1919A5;
        }
        tr>th{
            color: red;
            font-weight: 900;
        }
        a{
            font-family: Tahoma;
            font-size: 20px;
            color: white;
        }
        /* Media Query for Mobile Devices */
@media only screen and (max-width: 600px) {
    th, td {
        padding: 5px; /* Reduce padding for smaller screens */
        font-size: 12px; /* Adjust font size for readability */
    }
    .btn{
        width: 45px;
        height:30px;
        padding: 2px;
        font-size:12px;
    }
     .btn-info{
        width: 45px;
        height:40px;
        padding: 2px;
        font-size:12px;
    }
    .btn-warning{
        width: 45px;
        height:25px;
        padding: 0;
        font-size:12px;
    }
      .btn-danger{
        width: 45px;
        height:25px;
        padding: 0;
        font-size:12px;
    }
       .btn-primary{
        width: 80px;
        height:45px;
        padding: 2px;
        font-size:12px;
    }
     .input-group{
            position: relative;
            left: 60%;
            width: 50%;
            font-size: 12px;
            padding: 2px;
        }
        form{
            width: 300px;
            font-size: 13px;
        }
}
    </style>
</head>
<body>
<div class="p-5 my-4">
<div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Book</a>
            </div>
        </header>
<form action="" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by title or author">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>


        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book ID:</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
include('connect.php');
if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];
    $sqlSelect = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
} else {
    $sqlSelect = "SELECT * FROM books";
}

$result = mysqli_query($conn, $sqlSelect);
?>

<!-- ... rest of the HTML code ... -->

<tbody>
    <?php
    while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['title']; ?></td>
            <td><?php echo $data['author']; ?></td>
            <td><?php echo $data['type']; ?></td>
            <td>
                <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Read More</a>
                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>

        </table>
    </div>
</div>
<footer>
    <a href="https://christian-barbosa.online/profile/"  style="text-decoration:none">About Christian Barbosa</a>
</footer>
</body>
</html>