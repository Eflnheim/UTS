<?php

$id = $_GET['id'];

require './config/db.php';

$data = mysqli_query($db_connect, "SELECT * FROM products where id='$id'");
$row = mysqli_fetch_assoc($data)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width:60%;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Edit Product</h1>
    <form class="row g-3 align-items-center" action="./backend/edit.php?id=<?=$row['id'];?>" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputname" class="col-sm-1 col-form-label">Name</label>
            <input type="text" class="form-control" id="inputname" name="name" require value="<?=$row["name"]?>" placeholder="Enter the name of the product">
        </div>
        <div class="col-md-6">
            <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
            <input type="number" class="form-control" id="inputprice" name="price" require value="<?=$row["price"]?>" placeholder="Enter the price of the product">
        </div>
        <div class="col-md-12">
            <label for="formFile" class="form-label">Products image</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="col-md-12">
            <input class="col-12 btn btn-primary" type="submit" name="submit" value="Save">
        </div>  
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>