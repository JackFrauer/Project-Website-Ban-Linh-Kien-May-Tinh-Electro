// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "search": "Search records:",
      "lengthMenu": "Display _MENU_ records per page",
      "zeroRecords": "No matching records found",
      "info": "Display_PAGE_ of _PAGES_",
      "infoEmpty": "No records available",
      "infoFiltered": "(filtered from _MAX_ total records)",
      "paginate": {
        "first": "First",
        "last": "Last",
        "next": "Next",
        "previous": "Tru"
      }
    }
  } );
});


