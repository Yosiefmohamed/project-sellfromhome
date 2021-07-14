<?php

// file to connect to Database

include 'conecct.php';

// file for Desing in bootstrab

include 'header.php';

// tag 

print("</br>");

// Massage for user

print("<div class='alert alert-primary text-center'> welcome to Profile page</div>");

// button for back to dashbord page

print("<a href='dashbord.php' class='btn btn-danger'>Dashbord</a>");
 
//clicked on button do ..

if (isset($_POST['upload'])) {

//name file 

$file=$_FILES['image_upload'];

//data of type the file

$fileName=$_FILES['image_upload']['name'];

//the data type

$file_type=$_FILES['image_upload']['type'];

//the type of file

$file_tmp=$_FILES['image_upload']['tmp_name'];

//size of file

$file_size=$_FILES['image_upload']['size'];

//show erro if habend

$file_error=$_FILES['image_upload']['error'];

//hiad the . from image , where from filename

$fileEXT = explode('.', $fileName);

$fileActualEXT=strtolower(end($fileEXT));

//image upload just in array

$allowed = array('jpg' , 'jpeg' , 'png');

//if in array this 

if (in_array($fileActualEXT, $allowed)) {

// if now error do Action ..... 
    
if ($file_error === 0) {

// if size file < 100000
    
if ($file_size < 1000000) {

$fileNameNew=uniqid('',true).".".$fileActualEXT;

// this code where need save image or file

$fileDestination="upload_profile/".$fileNameNew;

// .$fileName 


// this method for upload files

move_uploaded_file($file_tmp, $fileDestination);

// how message for user if Succses upload file

echo "<div class='alert alert-success text-center'>image hsa been uploaded</div>";

}else{

// if file its very big show Message .... 

 print(" Your file its very big !!");

}



}else{

// if found any error show Message ... 

 print("There ar error uploading your file ");

} 
       
}else{

 // if found error in upload image show Message for user say ,,,   
 
    print("You cannot upload files of this type");
}


}




?>

<!DOCTYPE html>

<html>

<body>

<center>

<form action="Profile.php" method="post"  enctype="multipart/form-data">

<?php

// HERE image for user 

?>

<img src="https://www.viasea.com/r/admin/person.png">

</br>

</br>

</br>

</br>




<?php

// HERE tag for file upload image ....  

?>

<input type="file" name="image_upload" class="btn btn-light btn-lg" >


<?php

// HERE button  for upload image  ..... 

?>

<input type="submit" name="upload" class="btn btn-primary btn-lg" value="upload image">

</form>

</center>

<h4>

</br>

</br>
</br>

</br>	

<p value="">Your bio is : </p>

</h4>

<center>

</br>

</br>

</br>


<?php

// HERE bio for user Enter infomations 

?>

<input type="text" name="bio" style="margin-left:50px;width:400px;height:60px;" placeholder ="Enter Your bio">
</br>

</br>
</br>

</br>


<?php

// HERE delete bio  

?>

<input type="submit" name="delete" value="Delete bio" class="btn btn-danger btn-lg" style="width:300px;margin-left:50px;">



<?php

// HERE save bio  

?>

<input type="submit" name="save" value="save bio" class="btn btn-primary btn-lg" style="width:300px;margin-left:50px;">


<?php

// HERE update bio  

?>

<input type="submit" name="update" value="Update bio" class="btn btn-warning btn-lg" style="width:300px;margin-left:50px;">

</br>

</br>

</br>

</br>

</br>

</br>
</center>

</body>

</html>
