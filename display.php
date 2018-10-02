<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src='test.js'></script> -->
</head>

<body>



<!-- <form action="display.php" method="GET">
<input type="text" name="search" >
<input type="submit" value="search">
<button id='addnewcontact'>+ ADD NEW CONTACT</button>
</form> -->

<?
$user = 'root';
$password = 'root';
$db = 'contactlist';
$host = 'localhost';
$port = 3306;

$success = mysqli_connect( 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);

if(!$success){
 echo "Connection error";
 exit;
}
//echo "connected";

// $(document).ready(function () {
    



$sql="SELECT * FROM contact";

 $search=$_POST["search"];

 if($search)
 {
    
     $sql .=" WHERE Fname LIKE '%$search%'";
    

$result=mysqli_query($success,$sql);

 //echo $sql;

echo "<table class='table table-striped'><tr><td>Contact_id</td><td>Fname</td><td>Mname</td><td>Lname</td><td>Action</td></tr>";
while($row= mysqli_fetch_array($result)){
     $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td>","<button name='Delete' id=$bid >Delete</button>","</td></tr>";
}

echo "</table>";



 }

 mysqli_close();
?>

</body>
</html>