// This functionality is for the Customer Page. If the tracking number is correct, it will get the data of the tracking number from a PHP file.

$(document).ready(function() {
    $("#view_progress").on("click", function() {
        console.log("Clicked!");

        var getTrackingNumber = $("#tracking_number").val();

        $.ajax({
            type: "GET",
            url: "src/php/get_progress.php",
            data: {
                tracking_number: getTrackingNumber
            },
            success: function(data) {
                $("#customerCopy").html(data);
            }
        });


    });
});