<?php

$id = $_GET['id'];

require './../config/db.php';

if(isset($_POST["submit"])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $tempImage = $_FILES['image']['tmp_name'];

  $randomFilename = time().'-'.md5(rand()).'-'.$image;

  $uploadPath = './../upload/' . $randomFilename;

  $upload = move_uploaded_file($tempImage,$uploadPath);

  if($upload) {
    mysqli_query($db_connect, "UPDATE products SET name = '$name', price = '$price', image = '/uts-pemweb/upload/$randomFilename'  WHERE id = '$id'");
      echo "Edit successful";
      header("Location:./../show.php");
  } else {
      echo "Edit failed";
  }
}

?>