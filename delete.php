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
  //print_r($_GET);  

   //$contact_id=$_GET["id"];
   $contact_id= $_GET['id'];

 if($contact_id)
 {
    $sql="DELETE FROM address WHERE contact_id=$contact_id";
    $result1=mysqli_query($success,$sql);
    
    
    $sql="DELETE FROM phone WHERE contact_id=$contact_id";
    $result2=mysqli_query($success,$sql);
    
    
    $sql="DELETE FROM date WHERE contact_id=$contact_id";
    $result3=mysqli_query($success,$sql);
    
    
    $sql="DELETE FROM contact WHERE contact_id=$contact_id";
    $result4=mysqli_query($success,$sql);

if($result1 && $result2 && $result3 && result4){
    echo "Contact Deleted Successfully";

}
else{
    echo "Error occured while deleting contact";
}
 }

 mysqli_close();
?>
<br/>
<a href='main.html'>Home</a>
</body>
</html>