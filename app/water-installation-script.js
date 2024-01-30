$(document).ready(function() {
    $("#view_progress").on("click", function() {

        var getTrackingNumber = $("#tracking_number").val();

        $.ajax({
            type: "GET",
            url: "get_progress.php",
            data: {
                tracking_number: getTrackingNumber
            },
            success: function(data) {
                $("#customerCopy").html(data);
            }
        });


    });
});