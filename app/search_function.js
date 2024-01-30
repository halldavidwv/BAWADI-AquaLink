$(document).ready(function () {
  $('#tracking_number_search').keyup(function () {
    var search = $(this).val();
      $.ajax({
        url: 'search.php',
        method: 'POST',
        data: {search:search},
        success: function (data) {
          $("#main-table").empty();
          $("#main-table").html(data);
        }
      });
    });
    $.ajax({
      url: 'search.php',
      success: function (data) {
        $("#main-table").html(data);
      }
    });
});

