<?php

include 'header.php';

include 'conecct.php';
  
if (isset($_POST['upload'])) {

$bio=filter_var($_POST['bio']); 

$image=$_FILES['image']['name'];

$image_size=$_FILES['image']['size'];

$image_type=$_FILES['image']['type'];

$image_tmp=$_FILES['image']['tmp_name'];

$target="Images/".basename($image);

if (empty($bio)) {

echo "<div class='alert alert-danger text-center'>Plasse Enter Your bio</div>";

}

if (empty($image)) {

echo "<div class='alert alert-danger text-center'>Plasse Enter Your image</div>";

}

if (!empty ($bio) && !empty($image)) {
  
@$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

$extensions= array("jpeg","jpg","png");
      
if(in_array($file_ext,$extensions)){

if (move_uploaded_file($_FILES['image']['tmp_name'],$target)==true) {
  
echo "<div class='alert alert-success text-center'>Your file has been uploded Sucssesfuly</div>";

$stmt=$con->prepare("INSERT INTO profilee(image,bio)values(:image,:bio)");

$stmt->bindParam(':image',$image);

$stmt->bindParam(':bio',$bio);

$stmt->execute();

}else{

if (!in_array($file_ext,$extensions)) {

if (!move_uploaded_file($_FILES['image']['name'],$target)) {
  
  echo "<div class='alert alert-danger text-center'>the file is not Accses fou upload Plasse Try agine</div>";

}
  



}



}

}

}

 
}

// END WHEN CLICK ON Button 
  
?>
 
<a href="dashbord.php" class="btn btn-danger">back to home page</a>
</br>

</br>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="content">

<form method="POST" action="ADD_post.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
  <textarea id="text"name="bio" class="form-control" placeholder="Description Your item"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload" class="btn btn-info btn-lg btn-block">POST</button>
  	</div>
  </form>
</div>
</body>
</html>

</center>
</br>
</br>
</br>
</br>
</br>
<center>
  
<h4><p>Developent by Developer Yosief cobywrite @ 2020</p></h4>

</center>

