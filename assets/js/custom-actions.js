const URL_ADD_FORM = "/insert-formulir";
const URL_MANAGEMENT_FORM = "/management-formulir";

jQuery(function($) {
    let formna = $(document.getElementById('fb-editor')).formBuilder();

    $('body').on('click', '.save-template', function(){
        alert('a');
        
        let datana = formna.formData;
        let namaform = $('#nama-formulir').val();

        let jsondata = {name: namaform, code_json: datana};

        console.log(jsondata);
        
        saveDataIntoDB(jsondata, URL_ADD_FORM);
    });

  });

    
function saveDataIntoDB(datana, URLna){


            $.ajax({
              url: URLna,
              type: "POST",
              data: datana,
              success: function(response) {
                 console.log(response + ' waw!');
                 window.location = URL_MANAGEMENT_FORM;

              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX error:", textStatus, errorThrown);
                alert('error' + textStatus);
              }
            });


}