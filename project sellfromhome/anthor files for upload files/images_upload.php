<?php

session_start();

include  'header.php';

include 'conecct.php';

if(isset($_FILES['image'])){

$errors= array();

$file_name = $_FILES['image']['name'];

$file_size =$_FILES['image']['size'];

$file_tmp =$_FILES['image']['tmp_name'];

$file_type=$_FILES['image']['type'];

$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
$extensions= array("jpeg","jpg","png");
      
if(in_array($file_ext,$extensions)=== false){


    $errors[]="extension not allowed, please choose a JPEG or PNG file.";

}
      
if($file_size > 2097152){

 $errors[]='File size must be excately 2 MB';

}
      
if(empty($errors)==true){

move_uploaded_file($file_tmp,"images/".$file_name);

echo "Success";


}else{

    print_r($errors);

}

$bio = '';
 
$error = [];
 
$bio = $_POST['bio'];
 
if(empty($bio)){

    $error['bioErr'] = 'bio required';

}
 
if (count($error) == 0) {

$bio = mysqli_real_escape_string($conn,$bio);

$path = dirname(__FILE__).'images/';

if (is_dir($path)) {

$fileName = time().'_'.$_FILES['images']['name'];

move_uploaded_file($_FILES['images']['tmp_name'], $path . '/' . $fileName);

}else{

echo '<div class="alert alert-danger">There is no directory with this name !!!</div>';


}

$image = 'images/'.$fileName;

$sql = "INSERT INTO Profile (image,bio)values($image,$bio);";

$insert = mysqli_query($db, $sql);

if($insert){


$_SESSION['message'] = 'image has been added with Name :'.$bio;


header('Location:add_profile2.php');


}else{
 
    echo '<div class="alert alert-warning"> failed adding product</div>';
     
}


}       
 
  if ($insert) {
      
      echo "<div class='alert alert-success text-center'>Your info is add success<div>";
  }
   

}

?>