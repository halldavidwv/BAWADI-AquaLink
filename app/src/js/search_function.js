$(document).ready(function () {

  const debounce = function (func, delay) {
    let timer;
    return function (...args) {
      clearTimeout(timer);
      timer = setTimeout(() => {
        func.apply(this, args);
      }, delay);
    };
  };

  // Function to update the table when search value applied
  function searchContent(url, searchData, tableID) {
    $.ajax({
      url: url,
      method: 'POST',
      data: { searchData: searchData },
      success: function (data) {
        $("#" + tableID).empty();
        $("#" + tableID).html(data);
        $("#" + tableID).html(data).foundation();
      }
    });
  }

  $(document).on('change', '#select_display_table', function () {

    var current_table_value_2 = $(this).val();
    const currentCase = current_table_value_2;
    console.log(current_table_value_2);

    let search = null;

    const debounceSearch = debounce(function () {
      const currentCase = current_table_value_2;
      let search = $("#tracking_number_search").val();
      if (search != null) {
        currentSearch = search;
        switch (current_table_value_2) {
          case 'main-table':
            searchContent("src/php/tables/main_table.php", search, "current-table")
            break;
          case 'archive-table':
            searchContent("src/php/tables/archive_table.php", search, "current-table")
            break;
          case 'phase-2-step-1-table':
            searchContent("src/php/tables/phase_2_step_1.php", search, "current-table")
            break;
          case 'phase-2-step-2-table':
            searchContent("src/php/tables/phase_2_step_2.php", search, "current-table")
            break;
          case 'phase-2-step-3-table':
            searchContent("src/php/tables/phase_2_step_3.php", search, "current-table")
            break;
          case 'phase-2-step-4-incomplete-table':
            searchContent("src/php/tables/phase_2_step_4_incomplete.php", search, "current-table")
            break;
          case 'phase-2-step-4-complete-table':
            searchContent("src/php/tables/phase_2_step_4_complete.php", search, "current-table")
            break;
          case 'phase-3-step-1-table':
            searchContent("src/php/tables/phase_3_step_1.php", search, "current-table")
            break;
          case 'phase-4-step-1-existing-tapping-table':
            searchContent("src/php/tables/phase_4_step_1_existing_tapping.php", search, "current-table")
            break;
          case 'phase-4-step-1-proposed-tapping-table':
            searchContent("src/php/tables/phase_4_step_1_proposed_tapping.php", search, "current-table")
            break;
          case 'water-installation-completed-table':
            searchContent("src/php/tables/completed.php", search, "current-table")
            break;
        }
      }
    }, 300);

    $('#tracking_number_search').keyup(debounceSearch);

  });

});