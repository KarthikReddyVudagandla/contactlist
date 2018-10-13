<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src='test.js'></script>
</head>
<body>

<?
$search = $_GET["search"];
?>

     
    <nav class="navbar navbar-inverse">
        <div class="container-fluid ">
          <div class="topnav collapse navbar-collapse" style="position:relative;">
          <ul class="nav navbar-nav">
       <a> <img  src="mycontacts.jpg" alt="MyContactsLogo" height="76" width="70" /></a>
         
       <a> <span style="color:white;text-align:center;"><font size="5">My Contacts</font></span></a>
      </ul>
      <ul class="navbar-right" style="padding-top:20px;" >
      <form action="http://localhost/contactlist/display.php" method="post">
      <table><tr><td> <input style="float:right" type="text" name="search" placeholder="Search Contact" class="form-control" value='<? echo $search ?>'></td><td><input type="submit" value="Search"  class="form-control"></a></td><td><button id="addnewcontact" type="submit" class="btn btn-primary ">Add New Contact</button></td></tr></table>
      </form>
    </ul>
  </div>
    </div>
  </nav>
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

//print_r($_POST);
$search=($_POST["search"]);
$pieces = explode(" ", $search);
echo $search;

// $sql="SELECT * FROM contact ";
echo "<table id='myTable' class='table table-striped'><tr><td bgcolor='red'>Contact Id</td><td bgcolor='red'>First Name</td><td bgcolor='red'>Middle Name</td><td bgcolor='red'>Last Name</td><td bgcolor='red'>Action</td></tr>";
if($search)
 {
     $sql="SELECT * FROM contact   WHERE Fname LIKE '%$search%' OR Mname LIKE '%$search%' OR Lname LIKE '%$search%' OR address.address LIKE '%$search%' OR address.city LIKE '%$search%'  ;";
    // $sql .="SELECT * FROM address WHERE address LIKE '%$search%' OR city LIKE '%$search%' OR state LIKE '%$search%'OR zip LIKE '%$search%' ;";
    //  $sql .="SELECT * FROM phone WHERE areacode LIKE '%$search%' OR number LIKE '%$search%' ;";
    //  $sql .="SELECT * FROM date WHERE date LIKE '%$search%' ;"; 

    } 
$result=mysqli_query($success,$sql);
$rowcount=0;
$rowcount = $rowcount + $result->num_rows;

while($row= mysqli_fetch_array($result)){
     $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td><table><td>","<a href='modify.php?id=$bid '> Modify</a>","</td><td> |","<a href='delete.php?id=$bid '> Delete</a>" ,"</td></table></td></tr>";
}
if($search)
 {
    
      $sql1 ="SELECT * FROM address WHERE address LIKE '%$search%' OR city LIKE '%$search%' OR state LIKE '%$search%'OR zip LIKE '%$search%' ;";
    

    } 
$result1=mysqli_query($success,$sql1);
$rowcount = $rowcount + $result1->num_rows;
while($row= mysqli_fetch_array($result1)){
     $bid= $row["contact_id"];
     //echo $bid;
     $getfromcontact= "SELECT * FROM contact WHERE contact_id=$bid";
     $result=mysqli_query($success,$getfromcontact);
     if($row= mysqli_fetch_array($result)){
      $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td><table><td>","<a href='modify.php?id=$bid '> Modify</a>","</td><td> |","<a href='delete.php?id=$bid '> Delete</a>" ,"</td></table></td></tr>";
     }
  }

  if($search)
 {
     //$sql="SELECT * FROM contact WHERE Fname LIKE '%$search%' OR Mname LIKE '%$search%' OR Lname LIKE '%$search%' ;";
      //$sql1 ="SELECT * FROM address WHERE address LIKE '%$search%' OR city LIKE '%$search%' OR state LIKE '%$search%'OR zip LIKE '%$search%' ;";
      $sql2 ="SELECT * FROM phone WHERE areacode LIKE '%$search%' OR number LIKE '%$search%' ;";
    //  $sql .="SELECT * FROM date WHERE date LIKE '%$search%' ;"; 

    } 
$result2=mysqli_query($success,$sql2);
$rowcount = $rowcount + $result2->num_rows;
while($row= mysqli_fetch_array($result2)){
     $bid= $row["contact_id"];
     //echo $bid;
     $getfromcontact= "SELECT * FROM contact WHERE contact_id=$bid";
     $result=mysqli_query($success,$getfromcontact);
     if($row= mysqli_fetch_array($result)){
      $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td><table><td>","<a href='modify.php?id=$bid'>Modify </a>","</td><td> |","<a href='delete.php?id=$bid '> Delete</a>" ,"</td></table></td></tr>";
     }
  }

  if($search)
 {
     //$sql="SELECT * FROM contact WHERE Fname LIKE '%$search%' OR Mname LIKE '%$search%' OR Lname LIKE '%$search%' ;";
      //$sql1 ="SELECT * FROM address WHERE address LIKE '%$search%' OR city LIKE '%$search%' OR state LIKE '%$search%'OR zip LIKE '%$search%' ;";
     // $sql2 ="SELECT * FROM phone WHERE areacode LIKE '%$search%' OR number LIKE '%$search%' ;";
      $sql3 ="SELECT * FROM date WHERE date LIKE '%$search%' ;"; 

    } 
$result3=mysqli_query($success,$sql3);
$rowcount = $rowcount + $result3->num_rows;
while($row= mysqli_fetch_array($result3)){
     $bid= $row["contact_id"];
     //echo $bid;
     $getfromcontact= "SELECT * FROM contact WHERE  contact_id=$bid";
     $result=mysqli_query($success,$getfromcontact);
     if($row= mysqli_fetch_array($result)){
      $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td><table><td>","<a href='modify.php?id=$bid '> Modify</a>","</td><td> |","<a href='delete.php?id=$bid '> Delete</a>" ,"</td></table></td></tr>";
     }
  }



echo "</table>";
 mysqli_close();
 echo $rowcount,":Contacts displayed";
?>


<br/>
<a href='main.html'>Home</a>
<br/>
<br/>
</body>
</html>