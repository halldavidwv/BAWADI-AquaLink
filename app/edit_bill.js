$(document).ready(function() { 
    $("#edit_bill_button").click(function() { 
        $.ajax({
            url: 'edit_bill_window.php',
            success: function(data) {
                console.log("Click Successful");
                $("#edit_bill_window").html(data);
                $("#edit_bill_window").html(data).foundation();
            }
        });
    });
});