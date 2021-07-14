<!-- <?php


session_start();

include 'connect.php';

include 'header.php';


if (isset($_POST['Login'])) {

$username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);

$Email=filter_var($_POST['Email'],FILTER_SANITIZE_EMAIL);

$Password=$_POST['password'];

$stmt=$con->prepare("SELECT * from users 

where username=':username' AND Email=':Email' AND password=':password' ");

$stmt->execute(array($username,$Email,$Password));

$stmt->rowCount();

echo $stmt->rowCount();

echo"</br>";

$row=$stmt->fetch();


if ($stmt->rowCount()>0) {

	if ($_SESSION['userid']=$row['userid']) {
	
	header("Location:dashbord.php");
	
	}else{


	echo"You have error";
}


}

 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login page </title>
</head>
<body>
<center>
<form action= " " method="POST">


</br>
</br>
</br>
</br>
</br>

</br>
</br>
</br>
</br>
</br>



<input type="text" name="username" placeholder="username" style="height:40px;width:500px;">

</br>
</br>


<input type="text" name="Email" placeholder="Email" style="height:40px;width:500px;">


</br>
</br>
 
<input type="text" name="password" placeholder="Password" style="height:40px;width:500px;"/>
</br>
</br>
</br>




</br>

<a href="Register.php" class="btn btn-primary">Register Now</a>

<input type="submit" name="Login" value="Login now " class="btn btn-success">

</center>

</form>

</body>
</html>

</center>
</br>
</br>
<center>
	
<h4><p>Developent by Developer Yosief cobywrite @ 2020</p></h4>

</center> -->