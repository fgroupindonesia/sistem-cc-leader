const URL_DELETE_ALL_FORM = "/delete-all-data-formulir";

$(document).ready( function () {
    $('#table-data').DataTable();


    // this is for toggling the detail of the data submitted
    $('#switch-display').on('click', function(){

       
        $('#table-container').toggleClass('hidden');
        $('#split-main').toggleClass('display');
        $('#split-main').toggleClass('hidden');
        
    });

    // this is for pdf generator
    $('#convert-to-pdf').on('click', function(){

        let el = $('#table-container');

        let displayStat = $('#table-container h3').css('display');

        if(displayStat == 'none'){
            $('#table-container h3').css('display', 'block');            
        }else{
            $('#table-container h3').css('display', 'none');            
        }
     
        html2PDF(el, {
            jsPDF: {
              format: 'a4',
            },
            imageType: 'image/jpeg',
            output: './pdf/generate.pdf'
          });

        $('#table-container h3').css('display', 'none');            
      

    });

    $('.item-menu').on('click', function(){

        $(this).find('input').attr('checked', function(_, attr) { return attr ? null : 'checked'; });
           
        // take the json in
        let datana = $(this).find('pre').html();
        //alert(JSON.parse(datana));

        let tglna = $(this).data('date-created');
        const updatedJson = replaceUnderscoreWithDash(JSON.parse(datana));

        //alert(tglna);

        // render it into the form
        previewForm(updatedJson, tglna);


    });

    $('body').on('click', '#clear-all-link', function(e){
        e.preventDefault();

        let namaForm = $(this).data('form');

        let datana = {name : namaForm};

        deleteAll(datana, URL_DELETE_ALL_FORM);

    });

    let formData = $('#hidden-code').html().trim();

    if(formData.length > 0){
       let  formBuilder = $('#form-render');
  
      setTimeout(function(){
           var formRenderOpts = {
            formData,
            dataType: 'json'
          };

            $(formBuilder).formRender(formRenderOpts);

      },1500);

    }

});


function replaceUnderscoreWithDash(obj) {
    if (Array.isArray(obj)) {
        return obj.map(item => replaceUnderscoreWithDash(item));
    } else if (obj !== null && typeof obj === 'object') {
        return Object.keys(obj).reduce((acc, key) => {
            const newKey = key.replace(/_/g, '-'); // Replace underscores with dashes
            acc[newKey] = replaceUnderscoreWithDash(obj[key]); // Recursively replace in nested objects
            return acc;
        }, {});
    } else {
        return obj; // Return the value if it's neither an object nor an array
    }
}

function previewForm(jsonIn, tgl){

    $('#date-created').text('Taken at : ' + tgl + '.');
     $('#username').text('Filled by : ' + jsonIn.username+'.');

    console.table(jsonIn);
    console.log('ada data\n'+ jsonIn);

    $.each(jsonIn, function(key, value) {
      let name = '#' + key;
      //console.log('ada ' + name + '\n');


        //alert('ditemui ' +name);
      if(!name.includes('radio')){  
        $(name).val(value);

        //console.log('processing A');
               
      }else{
       
       let elRadio = $('input[type="radio"][value="' + value + '"]');


       if(elRadio.length > 0){
        elRadio.prop('checked', true);
        console.log('processing B1');
       }else {
        console.log('processing B2');
            let elRadioOther = $('input[type="radio"][class=" other-option"][name="' + key + '"]');
            elRadioOther.prop('checked', true);

            // now filling the textbox
            let nameTxt = '#' + key + '-other-value';
            $(nameTxt).val(value);
       }
        
      }

    });

}

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