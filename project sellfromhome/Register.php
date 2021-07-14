<?php

// make Session with server if dont have  

session_start();

// show me errors

error_reporting(0);
 
//Connect To Database

include 'connect.php';

// include file Desin

include 'header.php';

// if user Clicke to the Button make Actions .....

if (isset($_POST['Register'])){
 
// Definition of username

$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);

// Definition of firstname
 
$firstname=filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
 
// Definition of lastname

$lastname=filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
 
// Definition of Email

$Email=filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL);
 
// Definition of Password

$Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
 
// This for Security Password used sha1 

$Password2=sha1($Password);

// Definition of city
 
$city=filter_var($_POST['city'],FILTER_SANITIZE_STRING);

// Definition of Country

$Country=filter_var($_POST['Country'],FILTER_SANITIZE_STRING);

// Definition of PhoneNumber 

$Phonenumber=filter_var($_POST['Phonenumber'],FILTER_SANITIZE_STRING);
 
// if the firstname not type make Action show me Error Danger

if (empty($firstname)){
	
 echo("<div class='alert alert-danger text-center'> sorry firstname is <strong> empty</strong></div>");

}

// if the lastname not type make Action show me Error Danger

if (empty($lastname)){
	
   echo("<div class='alert alert-danger text-center'> sorry lastname is <strong> empty </strong></div>");

}

// if the Email not type make Action show me Error Danger

if (empty($Email)){
	
   echo("<div class='alert alert-danger text-center'> sorry Email is <strong> empty </strong></div>");

}

// if the Passowrd not type make Action show me Error Danger

if (empty($Password)){
	
   echo("<div class='alert alert-danger text-center'> sorry Password is <strong> empty </strong></div>");

}

// if the city not type make Action show me Error Danger

if (empty($city)){
	
echo("<div class='alert alert-danger text-center'> sorry city is <strong> empty </strong></div>");

}

// if the Country not type make Action show me Error Danger

if (empty($Country)){
	
echo("<div class='alert alert-danger text-center'> sorry Country is <strong> empty </strong></div>");

}

// if the PhoneNumber not type make Action show me Error Danger

if (empty($Phonenumber)){
	
echo("<div class='alert alert-danger text-center'>sorry Phone number is<strong> empty </strong>  </div>");

}

// if the username not type make Action show me Error Danger

if (empty($username)){
    
 echo("<div class='alert alert-danger text-center'> sorry username is <strong> empty</strong></div>");

}

// Select all users from Database

$stmt=$con->prepare("SELECT * FROM users where username = ?");

// Make Execute for Database

$stmt->execute(array($username));

// Get all users or infomation for Data

$row=$stmt->fetch();

// type Records from Database to Dashbord website ...

$stmt->rowCount();

// if have firstname in Databse how message for the user tell .....

if ($stmt->rowCount() > 0) {

echo"<div class='alert alert-danger text-center'>sorry firstname is arldey <strong>Exist</strong></div>";

}

// if have lastname in Databse how message for the user tell .....

if ($stmt->rowCount() > 0) {

echo "<div class='alert alert-danger text-center'>sorry lastname is arldey <strong>Exist</strong></div>";

}

// if have Email in Databse how message for the user tell .....

if ($stmt->rowCount() > 0) {

 echo "<div class='alert alert-danger text-center'>sorry Email is arldey <strong>Exist</strong></div>";


// if have user in Databse how message for the user tell .....

if ($stmt->rowCount() > 0) {

print("<div class='alert alert-danger text-center'>sorry username is arldey <strong>Exist</strong></div>");

}

// if any Error haben Do anthor Actions

}else{

// if username not embty and

 if (!empty($_POST['username']) 

// if firstname  not embty and

 && !empty($_POST['firstname']) && 

// if lastname not embty and

 !empty($_POST['lastname']) && 

// if Email not embty and

 !empty($_POST['Email']) && 

// if Password not embty and

 !empty($_POST['Password']) 

// if city not embty and

 && !empty($_POST['city']) && 

// if Country not embty and

 ! empty($_POST['Country']) 

// if Phone number  not embty 

 && !empty($_POST['Phonenumber'])){

// Insert infomation in Database

 $sql=$con->prepare("INSERT INTO users

(username,firstname,lastname,Email,password,city,Country,Phonenumber)

VALUES

(:username,:firstname,:lastname,:Email,:password,:city,:Country,:Phonenumber)");

// make execte for Infotmation ....

 $sql->execute(array(

 'username' => $username,


 'firstname' => $firstname,


 'lastname' =>$lastname ,


 'Email' => $Email,


 'password' => $Password2,


 'city' =>$city ,


 'Country' => $Country ,

 
 'Phonenumber' =>$Phonenumber ));

// type records ....

 $row=$sql->rowCount();

 // go to anthor page ...

 header("Location:login/index.php");

 }

 // tag if Statment for PhoneNumber ....

 }

 //  Else Statment for in embty the textFaildes ...... 

}

// for if clicked user on button do Actions ......

?>

<!DOCTYPE html>
<html>
<head>
 <title>Register Page</title>
</head>
<center>

<img src="download.jpg">
</br>
</br>
</br>
</br>
</center>
<body>
<form action="Register.php" method="POST">	
<center>
</center>
 <center>
 </br>	
 <input type="text" name="username" placeholder="username" class="form-control" >
</br>

</br>
<input type="text" name="firstname" placeholder="firstname"class="form-control" >
</br>
</br>
<input type="text" name="lastname" placeholder="lastname" class="form-control" >
</br>
</br> 
<input type="text" name="Email" placeholder="Email" class="form-control" >
</br>
</br>
<input type="Password" name="Password" placeholder="Password" class="form-control"  >
</br>
</br>
<input type="text" name="city" placeholder="city" class="form-control" >
</br>
</br>
<input type="text" name="Country" placeholder="Country" class="form-control" >
</br>
</br>
 <input type="text" name="Phonenumber" placeholder="Enter Phone number" class="form-control" />
 </br>
</br>
 <input type="submit" name="Register" class="btn btn-dark"  value="Register Now">
</br>
 </br>
<a href="login/index.php" class="btn btn-dark" >if you arledy have Account ? Log in</a>
</br>
</br>	
</form>
 </center>
</body>
</html>
</center>
 <center>
 <h4><p>Developent by Developer Yosief cobywrite @ 2020</p></h4>
</center>