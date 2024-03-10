$(document).ready(function () {

    function updateContent(url, tableID) {
        $.ajax({
            url: url,
            success: function (data) {
                $("#" + tableID).html(data);
                $("#" + tableID).html(data).foundation();
            }
        });
    };

    $(document).on('change', '#select_display_table', function() {

        var current_table_value = $(this).val();
        console.log(current_table_value);

        $("#current-table").empty();
        switch (current_table_value) {
            case 'main-table':
                updateContent('/src/php/tables/main_table.php','current-table');
                break;
            case 'archive-table':
                updateContent('/src/php/tables/archive_table.php','current-table');
                break;
                
        }

    });

    $("#select_display_table").change();

});