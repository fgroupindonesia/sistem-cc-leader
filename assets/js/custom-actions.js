const URL_ADD_FORM = "/insert-formulir";
const URL_ADD_USER = "/insert-user";
const URL_UPDATE_USER = "/update-user";
const URL_MANAGEMENT_FORM = "/management-formulir";
const URL_MANAGEMENT_USER = "/management-user";

$(document).ready( function () {
    
    var fb = $('#fb-editor');

    if(fb.length>0){
    let formna = fb.formBuilder();
    }

    $('body').on('click', '.save-template', function(){
        //alert('a');
        
        let datana = formna.formData;
        let namaform = $('#nama-formulir').val();

        let jsondata = {name: namaform, code_json: datana};

        console.log(jsondata);
        
        saveDataIntoDB(jsondata, URL_ADD_FORM);
    });

     $('body').on('submit', '#form-user', function(e){
        //alert('a');
        
        e.preventDefault();
        let act = $(this).attr('action');


        let jsondata = $(this).serialize();

        console.log(jsondata);
        
        if(act.includes('insert')){
            saveDataIntoDB(jsondata, URL_ADD_USER);
         }else{
            saveDataIntoDB(jsondata, URL_UPDATE_USER);
         }
    });

  });

    
function saveDataIntoDB(datana, URLna){

            $.ajax({
              url: URLna,
              type: "POST",
              data: datana,
              success: function(response) {
                 console.log(response + ' waw!');
                 if(URLna.includes('formulir')){
                    window.location = URL_MANAGEMENT_FORM;
                 }else if(URLna.includes('user')){
                    window.location = URL_MANAGEMENT_USER;
                 }

              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX error:", textStatus, errorThrown);
                alert('error' + textStatus);
              }
            });


}