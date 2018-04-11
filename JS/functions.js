$(document).ready(function() {
	
    $('table.display').DataTable({
    	dom: 'Bfrtip',
        buttons:[
            
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],
     //    "scrollY": 500,
    	// "scrollX":true
    });

    $('#dob').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
       
});

