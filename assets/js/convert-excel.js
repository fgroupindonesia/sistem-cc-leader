

// used by the excel_reporting cases
let nama_table = "";

const URL_GENERATE_EXCEL_DATA = "/export-to-excel";
const URL_DOWNLOAD_EXCEL_REPORT = "/download-excel";

$( document ).ready(function() {

  $('#convert-to-excel').on('click', function(e){  
      e.preventDefault();
       
        nama_table = $(this).data('form');

        var xPos = event.pageX;
        var yPos = event.pageY;

        // Show the new div at the click position
        $('#excel-menu').css({
          'position': 'absolute',
          'background-color' : 'white',
          'display': 'block',
          'width' : '200px',
          'left': xPos,
          'top': yPos
        }).show();

    });


  $('.floating-menu').on('click', function(){

    $('#excel-menu').hide();

  });

  $('#excel-cancel').on('click', function(e){
    e.preventDefault();
    $('#excel-menu').hide();    
  });



  $('#excel-csv').on('click', function(e){
      e.preventDefault();

      exportTableToExcel('table-data');

  });

  $('#excel-xlsx').on('click', function(e){
      e.preventDefault();

      // call the server generator
      let datana = {name : nama_table};
      generateExcelReport(datana, URL_GENERATE_EXCEL_DATA);

  });


   
});

function generateExcelReport(json, urlna){

   $.ajax({ 
        url: urlna,
        data: (json),
        cache : false,
        type: 'POST',
        success: function(data){
            openDownloadLink();
        },
        error: function(a, s, e){
            alert('error!' + a + ' ' + s);
        } 
    
    });   

}

function openDownloadLink(){

  window.location = URL_DOWNLOAD_EXCEL_REPORT;

}


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