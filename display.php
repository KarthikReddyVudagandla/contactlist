<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src='test.js'></script> -->
</head>
<body>

<?
$search = $_GET["search"];
?>


<!-- <form action="display.php" method="GET">
<input id="myInput" type="text" name="search" onkeyup="myFunction()" value="<? echo $search ?>" >
<input type="submit" value="Search">
<button type="button" id='addnewcontact'>+ ADD NEW CONTACT</button>
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


$search=$_POST["search"];

// $sql="SELECT * FROM contact ";
 if($search)
 {
     $sql="SELECT * FROM contact WHERE Fname LIKE '%$search%'";
 } 
$result=mysqli_query($success,$sql);

 //echo $sql;

echo "<table id='myTable' class='table table-striped'><tr><td bgcolor='red'>Contact Id</td><td bgcolor='red'>First Name</td><td bgcolor='red'>Middle Name</td><td bgcolor='red'>Last Name</td><td bgcolor='red'>Action</td></tr>";
while($row= mysqli_fetch_array($result)){
     $bid= $row["contact_id"];
    echo "<tr><td>" ,$row["contact_id"] ,"</td><td>", $row["Fname"],"</td><td>", $row["Mname"],"</td><td>", $row["Lname"],"</td><td><table><td>","<a href='modify.php?id=$bid '> Modify</a>","</td><td> |","<a href='delete.php?id=$bid '> Delete</a>" ,"</td></table></td></tr>";
}

echo "</table>";
 mysqli_close();
?>

<script>

function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    //td = tr[i].getElementsByTagName("td")[1];
    //echo td;
    if (tr[i]) {
      if (tr[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

<br/>
<a href='main.html'>Home</a>
<br/>
<br/>
</body>
</html>