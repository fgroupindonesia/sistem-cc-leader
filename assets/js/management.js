
const URL_DELETE_FORM = "/delete-formulir";

jQuery(function($) {

	$('body').on('click', '#delete-data', function(e){

		e.preventDefault();

		var checkedValues = [];

		$('input[type="checkbox"]:checked').each(function() {
			let idna = $(this).attr('id'); 
		   checkedValues.push(idna);
		});

		if(checkedValues.length>0){
			let i=0;
			for(i=0; i<checkedValues.length; i++){
				let dataformat = {id: checkedValues[i]};
				kirimData(dataformat, URL_DELETE_FORM);
			}
		}

	});


});


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