<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Chan Favorite Book.com</title>
    <link href="img/favicon.png" rel="icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
<style>
    body {
        background-image: url(bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
        height: 100%;
        margin:0;
        overflow-x:hidden;
        }
        
.footer{
position:relative;
background: #1A1919A5;
padding:30px 0px;
font-family: 'Play', sans-serif;
text-align:center;
margin:auto;
color: white;
font-weight: bold;
width: 60%;
}

.footer .row{
width:100%;
margin:1% 0%;
padding:0.6% 0%;
color:gray;
font-size:0.8em;
}

.footer .row a{
text-decoration:none;
color:gray;
transition:0.5s;
}
.row-a{
    display:flex;
    margin: auto;
    justify-content: space-evenly;
    font-size: 30px;
}
.fa{
    color: white;
}

.footer .row a:hover{
color:#fff;
}

.footer .row ul{
width:100%;
}

.footer .row ul li{
display:inline-block;
margin:0px 30px;
}

.footer .row a i{
font-size:2em;
margin:0% 1%;
}

@media (max-width:720px){
.footer{
text-align:left;
padding:5%;
}
.footer .row ul li{
display:block;
margin:10px 0px;
text-align:left;
}
.footer .row a i{
margin:0% 3%;
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


<!------ Footer -------->

<footer>
<div class="footer">
<div class="row-a">
<a href="https://www.facebook.com/ChanNotDiff"><i class="fa fa-facebook"></i></a>
<a href="https://www.instagram.com/chitchan22/"><i class="fa fa-instagram"></i></a>
<a href="https://www.youtube.com/channel/UC_8u7Mn0IGEyjTzHS9Y7q7A"><i class="fa fa-youtube"></i></a>
<a href="https://twitter.com/Chan_not_Diff22"><i class="fa fa-twitter"></i></a>
</div>

<div class="row">
<ul>
<li><a href="https://christian-barbosa.online/profile/#contact">Contact Me</a></li>
<li><a href="https://christian-barbosa.online/profile/#services">My Services</a></li>
<li><a href="https://christian-barbosa.online/profile/#portfolio">Portfolio</a></li>
<li><a href="https://christian-barbosa.online/profile/#resume">Resume</a></li>
<li><a href="#">Career</a></li>
</ul>
<center>Copyright © 2023 - All rights reserved || Designed By: <a href="https://christian-barbosa.online/profile/"  style="text-decoration:none">Christian Barbosa</a></center>
</div>
</div>
</footer>

<!-------- end of footer -------->

</body>
</html>