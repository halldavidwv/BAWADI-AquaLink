$(document).ready(function () {
  $('#tracking_number_search').keyup(function () { 
    var search = $(this).val();
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

    searchContent("src/php/main_table_search.php", search, "main-table");
    searchContent("src/php/phase_2_step_4_complete_search.php", search, "phase-2-step-4-complete-table");
    searchContent("src/php/archive_table_search.php", search, "archive-table");

  });

  function updateContent(url, tableID) {
    $.ajax({
      url: url,
      success: function (data) {
        $("#" + tableID).html(data);
        $("#" + tableID).html(data).foundation();
      }
    });
  }

  updateContent("src/php/main_table_search.php", "main-table");
  updateContent("src/php/phase_2_step_4_complete_search.php", "phase-2-step-4-complete-table");

});