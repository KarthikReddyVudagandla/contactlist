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
    
 $Fname=$_POST["Fname"];
 $Mname=$_POST["Mname"];
 $Lname=$_POST["Lname"];

 if($Fname&& $Lname)
 {
    
    $sql="INSERT INTO contact(Fname,Mname,Lname) VALUES('$Fname','$Mname','$Lname')";
     
    

$result=mysqli_query($success,$sql);

if($result){
    echo "Contact Added Successfully";

}
else{
    echo "Error occured while adding contact";
}
 }

 mysqli_close();
?>

</body>
</html>