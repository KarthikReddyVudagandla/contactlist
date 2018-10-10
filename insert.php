<!-- NEED TO UPDATE CONTACTS WHICH ARE OLD N EDITED -->
<!-- NEED TO UPDATE ADDRESS..PHN AND DATE...IF EXISTING OR NEWLY INSERTED...HV SEPERATE NAME FR OLD ONES
BUT DOSE R INSERTED WITH NEW NAME....CHECK...
OR....FOR OLD ADDRESSES OR PHN..DATE..ETC...IF CHANGE HAPPENS IN ANY FIELD...DEN TAKE THRU AJAX TO SEPERATE FIELD
AND UPDATE THERE ONLY....
ONLY NEW ONES TAKE THRU FORM....BUT OLD ONES ALSO COME.....SO..CHECK IF DIS COMPLETE THING EXISTS FOR DAT CONTCT ID..
IF EXISTS...DONT INSERT...ELSE INSERT -->
<!-- DELETE IS HAPPENING DYNAMICALLY IN DIFFERENT FILES -->

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
 
//  for ($i=0;$i<max(count($_POST['addaddr_type']),count($_POST['address']),count($_POST['city']),count($_POST['state']),count($_POST['zip']));$i++) {
//     echo "<p>".$_POST['addaddr_type'][$i]."</p>";  
//     echo "<hr />";
//     $address[$i]=$_POST['addaddr_type'][$i];
//  }
  
 if($Fname)   // add last name also here    
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
    
    for ($i=0;$i<max(count($_POST['addaddr_type']),count($_POST['address']),count($_POST['city']),count($_POST['state']),count($_POST['zip']));$i++) {
        $addresstype[$i]=$_POST['addaddr_type'][$i];
        // echo $i;
        // echo $address[$i];
        if($val){
          $address_id[$i]=$_POST['address_id'][$i];
        }
        $address[$i]= $_POST['address'][$i];
        $city[$i]= $_POST['city'][$i];
        $state[$i]=$_POST['state'][$i];
        $zip[$i]=$_POST['zip'][$i];
      if(!$address_id[$i]){
     if($addresstype[$i] || $address[$i] ||  $city[$i] || $state[$i] || $zip[$i]){ 
     $addtoaddr="INSERT INTO address(contact_id,address_type,address,city,state,zip)VALUES($contact_id,'$addresstype[$i]','$address[$i]','$city[$i]','$state[$i]','$zip[$i]')";
     $runaddtoaddr=mysqli_query($success,$addtoaddr);  
     
      if($runaddtoaddr){
          echo"added to address tbl";
      }else{
          echo"error while adding to addr tbl";
      }
   
      }
    }else{//address id exists...so update
          //echo $address_type[$i];
        $updateaddr="UPDATE address SET address_type='$addresstype[$i]',address='$address[$i]',city='$city[$i]',state='$state[$i]',zip='$zip[$i]' WHERE address_id=$address_id[$i]";
        $runupdatetoaddr=mysqli_query($success,$updateaddr);  
     
      if($runupdatetoaddr){
          echo"updated to address tbl";
      }else{
          echo"error while updating to addr tbl";
      }   
   
    }


   }
  

    for ($i=0;$i<max(count($_POST['addphn_type']),count($_POST['aracode']),count($_POST['number']));$i++) {

        if($val){
         $phone_id[$i]=$_POST['phone_id'][$i];   
        }
        $phonetype[$i]=$_POST['addphn_type'][$i];
        $areacode[$i]=$_POST['areacode'][$i];
        $number[$i]=$_POST['number'][$i];
        echo $phonetype[$i];
        echo $areacode[$i] ;
        echo $number[$i];
    if(!$phone_id[$i]){
    if($phonetype[$i] || $areacode[$i] || $number[$i] ){
     $addtophone="INSERT INTO phone(contact_id,phone_type,areacode,number)VALUES($contact_id,'$phonetype[$i]','$areacode[$i]','$number[$i]')";
    
     $runaddtophone=mysqli_query($success,$addtophone);  
     
     if($runaddtophone){
         echo"added to phone tbl";
     }else{
         echo"error while adding to phone tbl";
     }
    }
    }else{//update if no phone_id
      
        $updatephone="UPDATE phone SET phone_type='$phonetype[$i]',areacode='$areacode[$i]',number='$number[$i]' WHERE phone_id=$phone_id[$i]";
        $runupdatetophone=mysqli_query($success,$updatephone);  
     
      if($runupdatetophone){
          echo"updated to phone tbl";
      }else{
          echo"error while updating to phone tbl";
      }

    }
   }


    for ($i=0;$i<max(count($_POST['adddate_type']),count($_POST['date']));$i++) {
        if($val){
            $date_id[$i]=$_POST['date_id'][$i];   
           }
        $datetype[$i]=$_POST['adddate_type'][$i];
        $date[$i]=$_POST['date'][$i];
        // echo $datetype[$i];
        // echo $date[$i];

    if(!$date_id[$i]){    
   if($datetype[$i] || $date[$i]){
     $addtodate ="INSERT INTO date(contact_id,date_type,date)VALUES($contact_id,'$datetype[$i]','$date[$i]')";
     $runaddtodate=mysqli_query($success,$addtodate);  
     
     if($runaddtodate){
         echo"added to date tbl";
     }else{
         echo"error while adding to date tbl";
     }
    }
   }else{

    $updatedate="UPDATE date SET date_type='$datetype[$i]',date='$date[$i]'  WHERE date_id=$date_id[$i]";
    $runupdatetodate=mysqli_query($success,$updatedate);  
 
  if($runupdatetodate){
      echo"updated to date tbl";
  }else{
      echo"error while updating to date tbl";
  }



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