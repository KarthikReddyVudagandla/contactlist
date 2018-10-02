$(document).ready(function () {
    var i = 1;
    var j = 1;
    var k = 1;
    $("#add_row").click(function () {

        //$('tr').find('input').prop('disabled',true)
        $('#addr' + i).html(" <tr><select><option>Home</option><option>Work</option></select></tr><tr><td><input type='text' name='address" + i + "'  placeholder='Enter Address' class='form-control input-md'/></td></tr><tr><td><input type='text' name='city" + i + "' placeholder='Enter City' class='form-control input-md'/></td><td><input type='text' name='state" + i + "' placeholder='Enter State' class='form-control input-md'/></td><td><input type='text' name='zip" + i + "' placeholder='Enter Zipcode' class='form-control input-md'/></td></tr>");

        $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
        i++;
    });

    $("#del_row").click(function () {

        //$('tr').find('input').prop('disabled',true)
        //$('#addr' - i).html("<tr><td><input type='text' name='address" + i + "'  placeholder='Enter Address' class='form-control input-md'/></td></tr><tr><td><input type='text' name='city" + i + "' placeholder='Enter City' class='form-control input-md'/></td><td><input type='text' name='state" + i + "' placeholder='Enter State' class='form-control input-md'/></td><td><input type='text' name='zip" + i + "' placeholder='Enter Zipcode' class='form-control input-md'/></td></tr>");
        $('#addr' + i).remove();
        //$('#tab_logic').remove('<tr id="addr' + (i) + '"></tr>');
        i--;
    });
    $("#addphone_row").click(function () {

        //$('tr').find('input').prop('disabled',true)
        $('#phnaddr' + j).html(" <tr><td><input type='text' name='phone" + j + "' placeholder='Enter Phone Number' class='form-control input-md'/></td></tr>");

        $('#tab_logic1').append('<tr id="phnaddr' + (j + 1) + '"></tr>');
        j++;
    });

    $("#delphone_row").click(function () {

        //$('tr').find('input').prop('disabled',true)
        //$('#addr' - i).html("<tr><td><input type='text' name='address" + i + "'  placeholder='Enter Address' class='form-control input-md'/></td></tr><tr><td><input type='text' name='city" + i + "' placeholder='Enter City' class='form-control input-md'/></td><td><input type='text' name='state" + i + "' placeholder='Enter State' class='form-control input-md'/></td><td><input type='text' name='zip" + i + "' placeholder='Enter Zipcode' class='form-control input-md'/></td></tr>");
        $('#phnaddr' + j).remove();
        //$('#tab_logic').remove('<tr id="addr' + (i) + '"></tr>');
        j--;
    });
    $("#adddate_row").click(function () {

        //$('tr').find('input').prop('disabled',true)
        $('#dateaddr' + k).html(" <tr><td><input type='date' name='dt" + k +"' placeholder='Date' class='form-control input-md' /> </td></tr>");

        $('#tab_logic2').append('<tr id="dateaddr' + (k + 1) + '"></tr>');
        k++;
    });

    $("#deldate_row").click(function () {

        //$('tr').find('input').prop('disabled',true)
        //$('#addr' - i).html("<tr><td><input type='text' name='address" + i + "'  placeholder='Enter Address' class='form-control input-md'/></td></tr><tr><td><input type='text' name='city" + i + "' placeholder='Enter City' class='form-control input-md'/></td><td><input type='text' name='state" + i + "' placeholder='Enter State' class='form-control input-md'/></td><td><input type='text' name='zip" + i + "' placeholder='Enter Zipcode' class='form-control input-md'/></td></tr>");
        $('#dateaddr' + k).remove();
        //$('#tab_logic').remove('<tr id="addr' + (i) + '"></tr>');
        k--;
    });

    $("#addnewcontact").click(function () {

        window.open("addnewcontact.html");
    });
    $("submit").click(function () {
        
        alert("Contact Saved");
    });
    
});
