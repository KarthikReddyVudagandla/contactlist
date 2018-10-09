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
 // print_r($_POST);
   $id= $_POST['id'];
   echo $id;


   $sql="DELETE FROM address WHERE address_id=$id";
   $result=mysqli_query($success,$sql);
   if($result){
       echo "deleted successfully from database";
   }else{
       echo "error while deleting from db";
   }
mysqli_close();
   ?>