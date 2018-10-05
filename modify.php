<html>
<head>
<title>Modify </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src='test.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src='test.js'></script> -->
</head>

<body>

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

   $contact_id= $_GET['id'];
   echo $contact_id;

 if($contact_id)
 {
    
    $sql="SELECT * FROM contact WHERE contact_id=$contact_id";
    $result4=mysqli_query($success,$sql);

if($row=mysqli_fetch_array($result4)){
    $Fname=$row["Fname"];
    $Mname=$row["Mname"];
    $Lname=$row["Lname"];
}
else{
    echo "Error occured while modifying contact";
}
 }

 mysqli_close();
?>

<div class="text-center">
    <h1>MODIFY </h1>
</div>

<hr>
<form action="insert.php?id=<?php echo $contact_id ?>" method="post">
<div class="container">
    <div class="row clearfix">
    <div class="col-md-12 column">
                    <label>FULL NAME:</label>
                    <table class="table ">

                        <tbody>
                            <thead>
                            </thead>
                            <tr>
                        <td>
                            <input type="text" name='Fname' placeholder='Enter First name' class="form-control" value='<? echo $Fname ?>' >
                        </td>
                        <td>
                            <input type="text" name='Mname' placeholder='Enter Middle Name' class="form-control" value='<? echo $Mname ?>' >
                        </td>
                        <td>
                            <input type="text" name='Lname' placeholder='Enter Last Name' class="form-control" value='<? echo $Lname ?>' >
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />
            <br />
            </div>
            <div class="col-md-12 column">

<div id="address" style="display: none">
    <label>ADDRESS:</label>
    <table class="table ">
        <tbody>

            <tr>
                <td>

                    Address Type:
                    <select id="add_type" name="add_type">
                        <option value="Home">Home</option>
                        <option value="Work">Work</option>
                        <option value="newaddrtype">Add new type</option>
                    </select>
                </td>
                <td></td>


                <button type="button" id="deladdr_row" class="btn pull-right">Delete</button>
            </tr>

            <tr>
                <td>
                    <input type="text" name='address' placeholder='Enter Address' class="form-control" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name='city' placeholder='Enter City' class="form-control" />
                </td>

                <td>
                    <select name='state' class="form-control">
                        <option>Choose State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                    <!-- <input type="text" name='state' placeholder='Enter State' class="form-control" /> -->
                </td>

                <td>
                    <input type="text" name='zip' placeholder='Enter Zipcode' class="form-control" />
                </td>
            </tr>


        </tbody>


    </table>

</div>

<div id="addressclone">

</div>
<button type="button" id="addaddr_row" class="btn btn-primary btn-lg pull-left">Add Address</button>
</div>
<br />
<div class="col-md-12 column">
<div class="col-md-4 column">
    <br />
    <br />
    <div id="phone" style="display:none">
        <table class="table">

            <label>PHONE:<label>
                    <tbody>
                        <tr>
                            <td>

                                Phone Type:
                                <select id="add_type" name="add_type">
                                    <option value="Home">Home</option>
                                    <option value="Work">Work</option>
                                    <option value="Work">Cell</option>
                                    <option value="newphntype">Add new type</option>
                                </select>
                            </td>
                            <td></td>
                            <button type="button" id="delphone_row" class="btn pull-right">Delete</button>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name='phone' placeholder='Enter Phone Number'
                                    class="form-control" />
                            </td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
        </table>
    </div>

    <div id="phoneclone">

    </div>
    <button type="button" id="addphone_row" class="btn btn-primary btn-lg pull-left" class="form-control">Add
        Phone</button>
</div>
</div>

<div class="col-md-12 column">
<div class="col-md-4 column">
    <br />
    <br />
    <div id="date" style="display:none">
        <table class="table ">
            <label> Date:</label>
            <tbody>
                <tr>
                    <br />
                    <br />
                    Date Type:
                    <select id="add_type" name="add_type">
                        <option value="birth">Birth</option>
                        <option value="adddatetype">Add new type</option>
                    </select>
                    <button type="button" id="deldate_row" class="btn pull-right">Delete</button>
                </tr>

                <tr>
                    <td>
                        <input type="date" name='dt' placeholder='Date' class="form-control" />
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
    <div id="dateclone">

    </div>
    <button type="button" id="adddate_row" class="btn btn-primary btn-lg pull-left">Add Date</button>

</div>
</div>
</div>
<br />
<br />
<br />
<input type="submit" value="SAVE CONTACT TO DATABASE">
</div>


</form>

</body>

</html>