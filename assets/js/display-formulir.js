jQuery(function($) {

	var fbRender = $('#form-target');

  // if form exists
  if(fbRender.length > 0){

	let formData = $('#form-target').html().trim();
	
  var formRenderOpts = {
    formData,
    dataType: 'json'
  };

  $(fbRender).formRender(formRenderOpts);

  }

});