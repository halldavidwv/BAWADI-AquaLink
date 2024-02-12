$(document).ready(function () {
  $('#tracking_number_search').keyup(function () { 
    var search = $(this).val();

    // Function to update the table
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

    function updateContent(url, tableID) {
      $.ajax({
        url: url,
        success: function (data) {
          $("#" + tableID).empty();
          $("#" + tableID).html(data);
          $("#" + tableID).html(data).foundation();
        }
      });
    }

    //searchContent("main_table_search.php", search, "main-table");
    searchContent("phase_2_step_4_complete_search.php", search, "phase-2-step-4-complete-table");

    //updateContent("main_table_search.php", "main-table");
    updateContent("phase_2_step_4_complete_search.php", "phase-2-step-4-complete-table");

  });
});