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
      <form action="http://localhost/contactlist/search.php" method="post">
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
//echo count($pieces);

 $sql="SELECT * FROM contact WHERE";
echo "<table id='myTable' class='table table-striped'><tr><td bgcolor='red'>Contact Id</td><td bgcolor='red'>First Name</td><td bgcolor='red'>Middle Name</td><td bgcolor='red'>Last Name</td><td bgcolor='red'>Action</td></tr>";
for($i=0;$i<count($pieces);$i++)
 {
     $sql.=" (Fname LIKE '%$pieces[$i]%' OR Mname LIKE '%$pieces[$i]%' OR Lname LIKE '%$pieces[$i]%'
      OR contact.contact_id IN (SELECT contact_id FROM address where address LIKE '%$pieces[$i]%' OR city LIKE '%$pieces[$i]%' OR state LIKE '%$pieces[$i]%' or zip LIKE '%$pieces[$i]%')
      OR contact.contact_id IN (SELECT contact_id FROM phone WHERE areacode LIKE '%$pieces[$i]%' OR number LIKE '%$pieces[$i]%')
      OR contact.contact_id IN (SELECT contact_id FROM date WHERE date LIKE '%$pieces[$i]%'))";

      if($i<=(count($pieces)-2))
      {
         $sql.="AND"; 
      }else{
          $sql.=";";
      }

    } 
 //echo $sql;   
$result=mysqli_query($success,$sql);
$rowcount=0;
$rowcount = $rowcount + $result->num_rows;

while($row= mysqli_fetch_array($result)){
     $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td><table><td>","<a href='modify.php?id=$bid '> Modify</a>","</td><td> |","<a href='delete.php?id=$bid '> Delete</a>" ,"</td></table></td></tr>";
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