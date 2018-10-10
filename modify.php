<html>
<head>
<title>Modify </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<!-- <script src='test.js'></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src='test.js'></script> -->

<script>
$(document).ready(function () {

    
$("#addnewcontact").click(function () {
    window.open("addnewcontact.html");
});

$("#addaddr_row").click(function () {
    $("#address").clone().appendTo("#addressclone").show();
    console.log("deleting address row");
    $(document).on("click", "#deladdr_row", function () {      
        console.log("deleting address row");
        $(this).parent("#address").remove();
        
    });

});

$("#addphone_row").click(function () {
    $("#phone").clone().appendTo("#phoneclone").show();

    $(document).on("click", "#delphone_row", function () {
        console.log("deleting phone row");
        $(this).parent("#phone").remove();
    });

});
$("#adddate_row").click(function () {
    $("#date").clone().appendTo("#dateclone").show();

    $(document).on("click", "#deldate_row", function () {
        $(this).parent("#date").remove();
    });

});

$(document).on("click", "#deloldaddr_row", function () {
       $id=$(this).val();
    //    alert($(this).val());
       console.log($id);
       $.ajax({  
    type: "POST",  
    url: "deletethis.php", 
    data: 'id='+$id,
    success: function(msg) {
       console.log(msg);
       }
    });
      

        $(this).parent("#old_address").remove();
    });

$(document).on("click", "#deloldphone_row", function () {
    $id=$(this).val();
    //    alert($(this).val());
       console.log($id);
       $.ajax({  
    type: "POST",  
    url: "deletethisphone.php", 
    data: 'id='+$id,
    success: function(msg) {
       console.log(msg);
       }
    });


        $(this).parent("#old_phone").remove();
    });
$(document).on("click", "#delolddate_row", function () {
    $id=$(this).val();
    //    alert($(this).val());
       console.log($id);
       $.ajax({  
    type: "POST",  
    url: "deletethisdate.php", 
    data: 'id='+$id,
    success: function(msg) {
       console.log(msg);
       }
    });
      

        $(this).parent("#old_date").remove();
    });

});
</script>

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
  $sql1="SELECT * FROM address WHERE contact_id=$contact_id";
  $addressResult=mysqli_query($success,$sql1);
   $addrcount=$addressResult->num_rows;
//    echo $addrcount;
   
//    echo "address";
  if($addressResult){
    for($i=0;$i<$addrcount;$i++){
       $addr_res=mysqli_fetch_array($addressResult);
       $address_id[$i]=$addr_res["address_id"];
      $addrtype[$i]=$addr_res["address_type"]; 
     $address[$i]=$addr_res["address"];
     $city[$i]=$addr_res["city"];
     $state[$i]=$addr_res["state"];
     $zip[$i]=$addr_res["zip"]; 
   }
 }else{
     echo " address ERROR";
 }

 $sql2="SELECT * FROM phone WHERE contact_id=$contact_id";
 $phoneResult=mysqli_query($success,$sql2);
  $phonecount=$addressResult->num_rows;
//   echo $phonecount;
   
   
 if($phoneResult){
     
   for($j=0;$j<$phonecount;$j++){
    //echo "phone";
      $phone_res=mysqli_fetch_array($phoneResult);
      $phone_id[$j]=$phone_res["phone_id"];
     $phonetype[$j]=$phone_res["phone_type"]; 
    $areacode[$j]=$phone_res["areacode"];
    $number[$j]=$phone_res["number"];
    // echo $phonetype[$j];
    // echo $areacode[$j];
    // echo $number[$j];

  }
}else{
    echo " phone ERROR";
}

$sql3="SELECT * FROM date WHERE contact_id=$contact_id";
$dateResult=mysqli_query($success,$sql3);
 $datecount=$dateResult->num_rows;
 //echo $datecount;
 
if($dateResult){
  for($k=0;$k<$datecount;$k++){
     $date_res=mysqli_fetch_array($dateResult);
     $date_id[$k]=$date_res["date_id"];
    $datetype[$k]=$date_res["date_type"]; 
   $date[$k]=$date_res["date"];
   
 }
}else{
   echo " date ERROR";
}


}
 mysqli_close();
?>

<div class="text-center">
    <h1>MODIFY </h1>
</div>
<div id="address" style="display:none">
    <label>ADDRESS:</label>
    <table class="table ">
        <tbody>

            <tr>
                <td>

                    Address Type:
                    <input list="addr_type" name="addaddr_type[]">
                    <datalist id="addr_type">
                        <option value="Home">Home</option>
                        <option value="Work">Work</option>
                    </datalist>
                </td>
                <td></td>


                <button type="button" id="deladdr_row" class="btn pull-right">Delete</button>
            </tr>

            <tr>
                <td>
                    <input type="text" name='address[]' placeholder='Enter Address' class="form-control" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name='city[]' placeholder='Enter City' class="form-control" />
                </td>

                <td>
                <input list="state" name='state[]' class="form-control" >
                    <datalist id="state">
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
                    <input type="text" name='zip[]' placeholder='Enter Zipcode' class="form-control" />
                </td>
            </tr>


        </tbody>


    </table>

</div>


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
                                <input list="phone_type" name="addphone_type[]">
                                <datalist id="phone_type">
                                    <option value="Home">Home</option>
                                    <option value="Work">Work</option>
                                    <option value="Cell">Cell</option>
                            </datalist>
                            </td>
                            <td></td>
                            <button type="button" id="delphone_row" class="btn pull-right">Delete</button>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name='areacode[]' placeholder='Enter 3-digit area code'
                                    class="form-control" />
                                <input type="text" name='number[]' placeholder='Enter7-digit Number'
                                    class="form-control" />
                            </td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
        </table>
    </div>
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
                    <input list="date_type" name="adddate_type[]">
                    <datalist id="date_type">
                        <option value="birth">Birth</option>
                    </datalist>
                    <button type="button" id="deldate_row" class="btn pull-right">Delete</button>
                </tr>

                <tr>
                    <td>
                        <input type="date" name='date[]' placeholder='Date' class="form-control" />
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>
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

<? for($i=0;$i<$addrcount;$i++){ ?>
<?if($addrtype[$i] || $address[$i] || $city[$i] || $state[$i] ||$zip[$i] ){ ?>
<div id="old_address" style="display">
    <label>ADDRESS:</label>
    <table class="table ">
        <tbody>

            <tr>
                <td>

                    Address Type:
                    <input list="addrtype" name="addaddr_type[<?$i?>]" placeholder="Choose/Enter type" value='<? echo $addrtype[$i] ?>'>
                    <datalist id="addrtype">
                       <option value="Home">
                       <option value="Work">
                    </datalist>
                </td>
                <td></td>
                <input type="hidden" name='address_id[<?$i?>]' value='<? echo $address_id[$i] ?>'/>
                <button type="button" id="deloldaddr_row" class="btn pull-right" value='<? echo $address_id[$i] ?>' >Delete</button>
            </tr>

            <tr>
                <td>
                    <input type="text" name='address[<?$i?>]' placeholder='Enter Address' class="form-control" value='<? echo $address[$i] ?>'/>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name='city[<?$i?>]' placeholder='Enter City' class="form-control" value='<? echo $city[$i] ?>'/>
                </td>

                <td>
                    <input list="state" name='state[<?$i?>]' class="form-control" value='<? echo $state[$i] ?>'>
                    <datalist id="state">
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
                            </datalist>
                   
                    <!-- <input type="text" name='state' placeholder='Enter State' class="form-control" /> -->
                </td>

                <td>
                    <input type="text" name='zip[<?$i?>]' placeholder='Enter Zipcode' class="form-control" value='<? echo $zip[$i] ?>'/>
                </td>
            </tr>


        </tbody>


    </table>

</div>
<?}?>
<?}?>
<div id="addressclone">

</div>
<button type="button" id="addaddr_row" class="btn btn-primary btn-lg pull-left">Add Address</button>
</div>
<br />

<div class="col-md-12 column">
<div class="col-md-4 column">
<br />
<br />

<? for($i=0;$i<$phonecount;$i++){ ?>
<?if($phonetype[$i] || $areacode[$i] || $number[$i] ){ ?>
<?echo " phone entered";?>

<div id="old_phone" >
    <table class="table">

        <label>PHONE:<label>
                <tbody>
                    <tr>
                        <td>

                            Phone Type:
                            <input list="phn_type" name="addphn_type[<?$i?>]" placeholder="Choose/Enter type" value='<? echo $phonetype[$i] ?>'>
                            <datalist id="phn_type">
                                <option value="Home">Home</option>
                                <option value="Work">Work</option>
                                <option value="Cell">Cell</option>
                            </datalist>
                        </td>
                        <td></td>
                        <input type="hidden" name='phone_id[<?$i?>]' value='<? echo $phone_id[$i] ?>'/>
                        <button type="button" id="deloldphone_row" class="btn pull-right" value='<? echo $phone_id[$i] ?>' >Delete</button>
                    </tr>
                    <tr>
                        <td>
                                <input type="text" name='areacode[<?$i?>]' placeholder='Enter 3-digit Area code' value='<? echo $areacode[$i] ?>'
                                class="form-control" />
                            <input type="text" name='number[<?$i?>]' placeholder='Enter 7-digit Number' value='<? echo $number[$i] ?>'
                                class="form-control" />
                        </td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>
    </table>
</div>
<br/>
<br/>
<?}?>
<?}?>

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


        
<? for($i=0;$i<$datecount;$i++){ ?>
<?if($datetype[$i] || $date[$i] ){ ?>
<?echo " date entered";?>

<div id="old_date" >
        <table class="table ">
            <label> Date:</label>
            <tbody>
                <tr>
                    <br />
                    <br />
                    Date Type:
                    <input list="date_type" name="adddate_type[<?$i?>]" placeholder="Choose/Enter type" value='<? echo $datetype[$i] ?>'>
                    <datalist id="date_type">
                        <option value="birth">Birth</option>
                    </datalist>
                    <input type="hidden" name='date_id[<?$i?>]' value='<? echo $date_id[$i] ?>'/>
                    <button type="button" id="delolddate_row" class="btn pull-right" value='<? echo $date_id[$i] ?>'>Delete</button>
                </tr>

                <tr>
                    <td>
                        <input type="date" name='date[<?$i?>]' placeholder='Date' class="form-control" value='<? echo $date[$i] ?>'/>
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
    <br/>
    <br/>
<?} ?>
<?} ?>

   
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