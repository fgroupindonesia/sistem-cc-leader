
$( document ).ready(function() {

  $('#convert-to-excel').on('click', function(e){  
      e.preventDefault();
       exportTableToExcel('table-data');
    });


   
});


function exportTableToExcel(tableId) {
  var table = $('#' + tableId);
  var excel_data = '';
  var rows = table.find('tr');
  for (var i = 0; i < rows.length; i++) {
    var row = $(rows[i]);
    var cols = row.find('td,th');
    for (var j = 0; j < cols.length; j++) {
      excel_data += '"' + $(cols[j]).text() + '",';
    }
    excel_data += '\n';
  }
  var a = document.createElement('a');
  a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(excel_data);
  a.download = 'excel_data.xls';
  a.click();
}