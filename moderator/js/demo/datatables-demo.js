// Call the dataTables jQuery plugin
$(document).ready(function() {
  	var table = $('#dataTable').DataTable();
  	$.each($('.toggle-vis'), function(index, value) {
  		var column = table.column( $(this).attr('data-column') );
  	    // Toggle the visibility
	    if (this.checked) {
	      column.visible( true );
	    } else {
	      column.visible( false );
	    }
  	});
	$('.toggle-vis').change(function (e) {
	    e.preventDefault();
	    console.log('yes');
	    // Get the column API object
	    var column = table.column( $(this).attr('data-column') );

	    // Toggle the visibility
	    if (this.checked) {
	      column.visible( true );
	    } else {
	      column.visible( false );
	    }
	} );
});	