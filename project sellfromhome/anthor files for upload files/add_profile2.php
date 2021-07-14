<?php


session_start();

include  'header.php';

include 'conecct.php';

if(isset($_FILES['image'])){

$errors= array();

$file_name = $_FILES['image']['name'];

$file_size = $_FILES['image']['size'];

$file_tmp =  $_FILES['image']['tmp_name'];

$file_type=  $_FILES['image']['type'];

$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
$extensions= array("jpeg","jpg","png");
      
if(in_array($file_ext,$extensions)=== false){

    $errors[]="extension not allowed, please choose a JPEG or PNG file.";

}
      
if($file_size > 2097152){

 $errors[]='File size must be excately 2 MB';

}
      
if($res){

// YOU CAN TYPE $FILE_NAME AND FILE_tmp in the path move_uploaded_file

move_uploaded_file($_FILES['image']['tmp_name'],"$file_name");

echo "<div class='alert alert-success text-center'>sucess</div>";


}

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <center>

  <form method="post" action = "add_profile2.php" enctype="multipart/form-data">

    <title>Form</title>
      
  </head>
  <body>
    <div class="container">


</br>
</br>
</br>
</br>

<div class = "row">

<input type="file" class="btn btn-success"  name="image">

<div class="text-danger"></div>
</br>
</br>
<input type="text" name ="bio" class="form-control" placeholder="Enter Your Bio" >
<div class="text-danger"></div>
<input class="btn btn-block btn-success" name="upload_image" type="submit" value="add image">
</br>
<center>
  
<input type="submit" class="btn btn-danger"  name ="Delete" value="Delete" required> 

      
<input type="submit" class="btn btn-warning" name ="update" value="update" required> 

</center>

</div>

</div>
  
   
</body>

</form>
    </center>
</html>