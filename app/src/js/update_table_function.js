$(document).ready(function () {

    function updateContent(url, tableID) {
        $.ajax({
            url: url,
            success: function (data) {
                console.log("updating");
                var response = JSON.parse(data);
                $("#" + tableID).html(response.table);
                $("#" + tableID).html(response.table).foundation();
                $("#current-table-title").html(response.title);
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
            case 'phase-2-step-1-table':
                updateContent('/src/php/tables/phase_2_step_1.php','current-table');
                break;
            case 'phase-2-step-2-table':
                updateContent('/src/php/tables/phase_2_step_2.php','current-table');
                break;
            case 'phase-2-step-3-table':
                updateContent('/src/php/tables/phase_2_step_3.php','current-table');
                break;
            case 'phase-2-step-4-incomplete-table':
                updateContent('/src/php/tables/phase_2_step_4_incomplete.php','current-table');
                break;
            case 'phase-2-step-4-complete-table':
                updateContent('/src/php/tables/phase_2_step_4_complete.php','current-table');
                break;
            case 'phase-3-step-1-table':
                updateContent('/src/php/tables/phase_3_step_1.php','current-table');
                break;
            case 'phase-4-step-1-existing-tapping-table':
                updateContent('/src/php/tables/phase_4_step_1_existing_tapping.php','current-table');
                break;
            case 'phase-4-step-1-proposed-tapping-table':
                updateContent('/src/php/tables/phase_4_step_1_proposed_tapping.php','current-table');
                break;
            case 'water-installation-completed-table':
                updateContent('/src/php/tables/completed.php','current-table');
                break;
        }

    });

    $("#select_display_table").change();

});