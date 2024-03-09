$(document).ready(function () {

    function updateContent(url, tableID) {
        $.ajax({
            url: url,
            success: function (data) {
                $("#" + tableID).html(data);
                $("#" + tableID).html(data).foundation();
            }
        });
    }

    $(document).on('change', '#select_display_table', function() {

        var current_table_value = $(this).val();
        console.log(current_table_value);

        $("#current_table").empty();
        switch (current_table_value) {
            case 'main-table':
                updateContent('/src/php/tables/main_table_search.php','current_table');
                break;
            case '':
                break;
                
        }

    });

});