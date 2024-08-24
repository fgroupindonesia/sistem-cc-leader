
const URL_DELETE_FORM = "/delete-formulir";
const URL_DELETE_USER = "/delete-user";
const URL_EDIT_FORM = "/edit-formulir";
const URL_EDIT_USER = "/edit-user";


jQuery(function($) {

		
new DataTable('#table-data');

	$('body').on('click', '#edit-data', function(e){

		e.preventDefault();

		var checkedValues = [];
		var formValues = [];
		
		$('input[type="checkbox"]:checked').each(function() {
			let idna = $(this).attr('id'); 
			var formna = $(this).data('form');

		   checkedValues.push(idna);

		   if(typeof formna !== 'undefined'){
		   console.log('ada ' + formna);
		   formValues.push(formna);
		   }
		});

		if(checkedValues.length>0){
			let i=0;
			for(i=0; i<checkedValues.length; i++){

				if(formValues.length>0){
					let dataformat = {name: formValues[i], id: checkedValues[i]};
					displayForm(dataformat, URL_EDIT_FORM);
				}else{
					// coming not from management formulir
					let dataformat = {id: checkedValues[i]};
					displayForm(dataformat, URL_EDIT_USER);
				}
			}
		}


	});

	$('body').on('click', '#delete-data', function(e){

		e.preventDefault();

		var checkedValues = [];
		var formValues = [];

		$('input[type="checkbox"]:checked').each(function() {
			let idna = $(this).attr('id'); 
			var formna = $(this).data('form');

		   checkedValues.push(idna);

		   if(typeof formna !== 'undefined'){
		   console.log('ada ' + formna);
		   formValues.push(formna);
		   }
		});

		if(checkedValues.length>0){
			let i=0;
			for(i=0; i<checkedValues.length; i++){

				if(formValues.length>0){
					let dataformat = {name: formValues[i], id: checkedValues[i]};
					kirimData(dataformat, URL_DELETE_FORM);
				}else{
					// coming not from management formulir
					let dataformat = {id: checkedValues[i]};
					kirimData(dataformat, URL_DELETE_USER);
				}
			}
		}

	});


});

function displayForm(datajson, urltarget){

	window.location = urltarget + '?id=' + datajson.id;

}

function kirimData(datajson, urltarget){

 $.ajax({ 
        url: urltarget,
        data: (datajson),
        cache : false,
        type: 'POST',
        success: function(data){
            location.reload();
        },
        error: function(a, s, e){
            alert('error!');
        } 
    
    });        



}