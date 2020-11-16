// Call the dataTables jQuery plugin

$(document).ready(function() {
  	var table = $('#dataTable').length ? $('#dataTable').DataTable(): null;
  	var table2 = $('#dataTable2').length ? $('#dataTable2').DataTable(): null;
  	let i = 0;
	$('.toggle-vis').change(function (e) {
		console.log('yes');
	    e.preventDefault();
	    // Get the column API object
	    var column = table? table.column( Number($(this).attr('data-column')) ): null;
	    var column2 = table2? table2.column( Number($(this).attr('data-column')) ): null;
	     console.log(column2);
	    // Toggle the visibility
	    if (this.checked) {
	    	if (column)
	      		column.visible( true );
	      	if (column2)
	      		column2.visible( true );
	    } else {
	    	if (column)
	      		column.visible( false );
	      	if (column2)
	      		column2.visible( false );
	    }
	} );  	
  	$.each($('.toggle-vis'), function(index, value) {
  		var column = table ? table.column( Number($(this).attr('data-column'))): null;
  		var column2 = table2 ? table2.column( Number($(this).attr('data-column'))): null;
  	    // Toggle the visibility
  	    console.log(++i);
	    if (this.checked) {
	    	if (column)
	      		column.visible( true );
	      	if (column2) {
	      		console.log(column2);
	      		column2.visible( true );
	      	}
	    } else {
	    	if (column)
	      		column.visible( false );
	      	if (column2) {
	      		column2.visible( false );
	      	}
	    }
  	});
});	