<?php

session_start();

include 'header.php';

include 'conecct.php';

?>

<form action="dashbord.php" method="POST ">

</br>
</br> 
<center>

<link rel="stylesheet" type="text/css" href="style.css">  
  
<!-- <input type="hidden" name="id"> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="ADD_post.php">POST Now</a>

</br>

 <a class="navbar-brand" href="Profile.php">Profile</a>

 </button>


  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">

      <li class="nav-item active">
     

      </li>


         </li>

       <li class="nav-item">

      

      </li>
    
      <li class="nav-item">
      <!--   <a class="nav-link" href="Profile.php">Profile</a> -->
      </li>

     <!--   <li class="nav-item">
        <a class="nav-link" href="Message/index.php">Massage</a> -->
      </li>
    </ul>
  </div>
</nav>

</center>

</br>
</br> 


<a href="logout.php" class="btn btn-danger btn-lg active">Log out </a>



<?php

echo "<center>";

@$id=$_GET['id'];

// $stmt=$con->prepare("SELECT * from profilee");

// $stmt->execute(array($id));

// $rows=$stmt->fetch();







foreach ($rows as $row) {

echo "<img src='Images/".$rows['image']."' >";

echo"<td>".$rows['bio']."</td>";

echo "<div id='img_div'>";

echo "</div>";

echo "</br>";

echo "<a href='Delete.php?id=".$rows['id']." '>Delete</a>";


echo "</br>";

echo "<a href='update.php?id=".$rows['id']." '>update</a>";

echo "</center>";



}

// $result = mysqli_query($con, "SELECT * FROM profilee order by id DESC");

// while ($row = mysqli_fetch_array($result)) {


// echo "<img src='Images/".$row['image']."' >";


// echo "</div>";

// echo "<div id='img_div'>";


?>

</center>
</br>
</br>
</br>
</br>
</br>
<center>
	
<h4><p>Developent by Developer Yosief cobywrite @ 2020</p></h4>

</center>

</form>









