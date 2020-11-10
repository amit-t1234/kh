// Call the dataTables jQuery plugin
	console.log('yes yes');

$(document).ready(function() {
	console.log('yes yes');
  	var table = $('#dataTable').DataTable();
  	var table2 = $('#dataTable2').DataTable();
  	$.each($('.toggle-vis'), function(index, value) {
  		var column = table.column( Number($(this).attr('data-column')) + 1 );
  		var column2 = table2.column( Number($(this).attr('data-column')) + 1 );
  	    // Toggle the visibility
	    if (this.checked) {
	      column.visible( true );
	      column2.visible( true );
	    } else {
	      column.visible( false );
	      column2.visible( false );
	    }
  	});
	$('.toggle-vis').change(function (e) {
	    e.preventDefault();
	    console.log('yes');
	    // Get the column API object
	    var column = table.column( Number($(this).attr('data-column')) + 1 );
	    var column2 = table2.column( Number($(this).attr('data-column')) + 1 );
	    console.log(column2);
	    // Toggle the visibility
	    if (this.checked) {
	      column.visible( true );
	      column2.visible( true );
	    } else {
	      column.visible( false );
	      column2.visible( false );
	    }
	} );
});	