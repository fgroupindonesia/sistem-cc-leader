const URL_DASHBOARD = "/dashboard";
const URL_ADD_FORM = "/insert-formulir";
const URL_ADD_USER = "/insert-user";
const URL_ADD_HISTORY_FORM = "/insert-history-formulir";
const URL_UPDATE_USER = "/update-user";
const URL_UPDATE_FORM = "/update-formulir";
const URL_MANAGEMENT_FORM = "/management-formulir";
const URL_MANAGEMENT_USER = "/management-user";

var fb = $('#fb-editor');
let formna;

let _lastJSONData=null;
let _countWorksChanges = 0;
let _totalWorks = 0;

$(document).ready( function () {
    
    // dont do making builder if the 
    // source is coming from editing stages
      
    if(fb.length>0){
      formna = fb.formBuilder();
    }

    dontTakeHTMLPaste();

    // this is for form saving mechanism
    $('body').on('click', '.save-template', function(){
        //alert('a');
        
        let datana = formna.formData;
        let namaform = $('#nama-formulir').val();

        let formType = $('#form-type').text();
        let namaUser = $('#username').val();

        let divisina = $('#divisi').val();
                    

        let jsondata = {divisi: divisina, name: namaform, code_json: datana};

        console.log(jsondata);
        
        if(formType=='Formulir Baru'){
            saveDataIntoDB(jsondata, URL_ADD_FORM);
        } else {

            // if it is coming from EDITING
            let idna = $('#id-form').val();
             jsondata = {id: idna, divisi: divisina, name: namaform, code_json: datana};
            
            // store for later usage in returning calls
            _lastJSONData = jsondata;

             let codeJsonBefore = $('#hidden-code-json').text();

            console.log(namaform);
            console.log(divisina);
            //console.log(namaform);
            compareCodeJson(codeJsonBefore, datana, namaform, namaUser);
            
        }



    });

    $('#nama-formulir').on('keyup', function(e){

        // i want to protect the naming convention
        // no symbolic dangerous characters are allowed there

        let word = $(this).val();

        let cleared = sanitizeInput(word);
        $('#nama-formulir').val(cleared);

    });

     $('body').on('submit', '#form-user', function(e){
        //alert('a');
        
        e.preventDefault();
        let act = $(this).attr('action');

        // temporary open the disabled item
        var disabled1 = $(this).find(':input:disabled').removeAttr('disabled');
        var disabled2 = $(this).find('select:disabled').removeAttr('disabled');

        let jsondata = $(this).serialize();

        //console.log(jsondata);
        //alert(jsondata);

        // re-disabled the set of inputs that you previously enabled
        disabled1.attr('disabled','disabled');
        disabled2.attr('disabled','disabled');

        console.log(jsondata);
        
        if(act.includes('insert')){
            saveDataIntoDB(jsondata, URL_ADD_USER);
         }else{
            saveDataIntoDB(jsondata, URL_UPDATE_USER);
         }
    });

  });

function sanitizeInput(input) {
  // Use a regular expression to match all characters that are not alphabetic, numeric, or spaces
  const regex = /[^a-zA-Z0-9\s]/g;

  // Replace all matches with an empty string, effectively removing them
  const sanitizedInput = input.replace(regex, '');

  // Return the sanitized input
  return sanitizedInput;
}

function compareCodeJson(jsonBefore, jsonAfter, formName, usernameNa){

    let dataBefore = JSON.parse(jsonBefore);
    let dataAfter = JSON.parse(jsonAfter);

    let sBefore='';
    let sAfter='';
    let typeElement = '';

    let i=0;

    // starting
    _countWorksChanges = 0;
    _totalWorks = 0;

    let dataNeedsToSend = [];
    

    for(i=0; i<dataBefore.length; i++){
        typeElement = dataBefore[i].type;
        console.log(dataBefore[i].label + '\n');
        console.log(dataAfter[i].label + '\n');

        sBefore = dataBefore[i].label;
        sAfter = dataAfter[i].label;

        if(typeElement == 'button'){
            break;
        }

        let dataFinal  = {username : usernameNa, formulir_name:formName, data_before: sBefore, data_after: sAfter};
        
        if(sBefore != sAfter)
            dataNeedsToSend.push(dataFinal);
        
        //console.log(JSON.stringify(dataFinal));
    }

    // stored as number reference
    _totalWorks = dataNeedsToSend.length;

    // now send them all
    for(i=0; i<dataNeedsToSend.length; i++){
        let dna = dataNeedsToSend[i];
        saveDataIntoDB(dna, URL_ADD_HISTORY_FORM);
    }


}

function dontTakeHTMLPaste(){


$('body').on('focus', '.input-wrap,input', function(x) {

  $(this).on('keydown', function(e) {
    if (e.ctrlKey && e.key === 'v') {

         window.addEventListener('paste', e => {

        let divEl = document.activeElement;
        var elementType = document.activeElement.tagName;
        //console.log('di ' + elementType);

            if(elementType === "DIV"){
             e.preventDefault();
            }

             let data = e.clipboardData.getData('text/plain');
             //alert('aya ' + data);
             if(elementType === "DIV"){
                $(divEl).text(data);
             }else{
                $(divEl).val(data);
             }

            });
    
    }
  });
});

}

    
function saveDataIntoDB(datana, URLna){

            $.ajax({
              url: URLna,
              type: "POST",
              data: datana,
              success: function(response) {
                 console.log(response + ' waw!');
                 if(datana.divisi == "IT" && URLna.includes('formulir')) {
                    window.location = URL_MANAGEMENT_FORM;
                 }else if(URLna.includes('history')){
                    // let it stay
                    // for a while
                    // until the calls ended
                    if(_totalWorks != _countWorksChanges){
                    _countWorksChanges++;
                    }

                    if(_totalWorks == _countWorksChanges){
                    
                        saveDataIntoDB(_lastJSONData, URL_UPDATE_FORM);
                    }

                    console.log('tersimpan history!');

                 }else if(URLna.includes('formulir')){
                    window.location = URL_DASHBOARD;
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