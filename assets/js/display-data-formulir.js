const URL_DELETE_ALL_FORM = "/delete-all-data-formulir";

$(document).ready( function () {
    $('#table-data').DataTable();

    $('body').on('click', '#clear-all-link', function(e){
        e.preventDefault();

        let namaForm = $(this).data('form');

        let datana = {name : namaForm};

        deleteAll(datana, URL_DELETE_ALL_FORM);

    });

});

function deleteAll(dataForm, urltarget){

    console.log('kita punya ' + JSON.stringify(dataForm));

    $.ajax({ 
        url: urltarget,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){
            location.reload();
        },
        error: function(a, s, e){
            alert('error!' + a + ' ' + s);
        } 
    
    });        

}