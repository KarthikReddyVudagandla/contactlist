$(document).ready(function () {
    $("#addnewcontact").click(function () {
        window.open("addnewcontact.html");
    });

    $("#addaddr_row").click(function () {
        $("#address").clone().appendTo("#addressclone").show();

        $(document).on("click", "#deladdr_row", function () {
            $(this).parent("#address").remove();
        });

    });
    $("#addphone_row").click(function () {
        $("#phone").clone().appendTo("#phoneclone").show();

        $(document).on("click", "#delphone_row", function () {
            $(this).parent("#phone").remove();
        });

    });
    $("#adddate_row").click(function () {
        $("#date").clone().appendTo("#dateclone").show();

        $(document).on("click", "#deldate_row", function () {
            $(this).parent("#date").remove();
        });

    });


});