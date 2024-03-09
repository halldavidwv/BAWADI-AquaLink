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

  const debounceSearch = debounce(function () {
    let search = $("#tracking_number_search").val();
    searchContent("src/php/main_table_search.php", search, "main-table");
    searchContent("src/php/phase_2_step_4_complete_search.php", search, "phase-2-step-4-complete-table");
    searchContent("src/php/archive_table_search.php", search, "archive-table");
  }, 300);

  $('#tracking_number_search').keyup(debounceSearch);

});