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
  $val=$_GET['id']; 
  echo $val;

 $Fname=$_POST["Fname"];
 $Mname=$_POST["Mname"];
 $Lname=$_POST["Lname"];
 print_r($_POST);
 
 for ($i=1;$i<count($_POST['addaddr_type']);$i++) {
    echo "<p>".$_POST['addaddr_type'][$i]."</p>";  
    echo "<hr />";
    $address[$i]=$_POST['addaddr_type'][$i];
 }
  
 if($Fname)
 {
    if(!$val){
       // echo "new contact"; 
    $sql="INSERT INTO contact(Fname,Mname,Lname) VALUES('$Fname','$Mname','$Lname')";
 }else{
      // echo "updating";
        $sql="UPDATE contact SET Fname='$Fname',Mname='$Mname',Lname='$Lname' WHERE contact_id=$val";
    }
     
    

$result=mysqli_query($success,$sql);

if($result){
    echo "Contact Added Successfully in contact tbl";
    $getid="SELECT * FROM contact WHERE Fname='$Fname' AND Mname='$Mname' AND Lname='$Lname'";
    $rungetid=mysqli_query($success,$getid);
    if($rungetid){
    $fetchid=mysqli_fetch_array($rungetid);
    $contact_id=$fetchid["contact_id"];
    //echo $fetchid["contact_id"];
    for ($i=1;$i<count($_POST['addaddr_type']);$i++) {
        $addresstype[$i]=$_POST['addaddr_type'][$i];
        echo $i;
        echo $address[$i];
        $address[$i]= $_POST['address'][$i];
        $city[$i]= $_POST['city'][$i];
        $state[$i]=$_POST['state'][$i];
        $zip[$i]=$_POST['zip'][$i];

     $addtoaddr="INSERT INTO address(contact_id,address_type,address,city,state,zip)VALUES($contact_id,'$addresstype[$i]','$address[$i]','$city[$i]','$state[$i]','$zip[$i]')";
     $runaddtoaddr=mysqli_query($success,$addtoaddr);  
     
      if($runaddtoaddr){
          echo"added to address tbl";
      }else{
          echo"error while adding to addr tbl";
      }
   
    }


    for ($i=1;$i<count($_POST['addphn_type']);$i++) {
        $phonetype[$i]=$_POST['addphn_type'][$i];
        $areacode[$i]=$_POST['areacode'][$i];
        $number[$i]=$_POST['number'][$i];


     $addtophone="INSERT INTO phone(contact_id,phone_type,areacode,number)VALUES($contact_id,'$phonetype[$i]','$areacode[$i]','$number[$i]')";
    
     $runaddtophone=mysqli_query($success,$addtophone);  
     
     if($runaddtophone){
         echo"added to phone tbl";
     }else{
         echo"error while adding to phone tbl";
     }
    }


    for ($i=1;$i<count($_POST['adddate_type']);$i++) {
        $datetype[$i]=$_POST['adddate_type'][$i];
        $date[$i]=$_POST['date'][$i];

     $addtodate ="INSERT INTO date(contact_id,date_type,date)VALUES($contact_id,'$datetype[$i]','$date[$i]')";
     $runaddtodate=mysqli_query($success,$addtodate);  
     
     if($runaddtodate){
         echo"added to date tbl";
     }else{
         echo"error while adding to date tbl";
     }
    }
     

    }else{
        echo "Error occured while getting id from contact";
    }
}
else{
    echo "Error occured while adding contact";
}
 }

 mysqli_close();
?>
<br/>
<a href='addnewcontact.html'>Add another contact</a>
<br/>
<a href='main.html'>Home</a>
</body>
</html>