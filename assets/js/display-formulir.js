jQuery(function($) {

	var fbRender = $('#form-target');
	let formData = $('#form-target').html().trim();
	
  var formRenderOpts = {
    formData,
    dataType: 'json'
  };

  $(fbRender).formRender(formRenderOpts);

});