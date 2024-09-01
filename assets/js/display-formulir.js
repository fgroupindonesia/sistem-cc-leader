$(document).ready( function () { 

	var fbRender = $('#form-target');
  var codeHidden = $('#hidden-code-json');

  // if form exists
  if(fbRender.length > 0)
  renderForm(fbRender);

  // if code exists (from editing point of view)
  if(codeHidden.length > 0)
  renderFormEditable(codeHidden);

});


function renderForm(element){

  let formData = $(element).html().trim();
  
  var formRenderOpts = {
    formData,
    dataType: 'json'
  };

  $(element).formRender(formRenderOpts);

}

function renderFormEditable(element){

  let formData = $(element).html().trim();
  var formBuilder;

  if(typeof formna !== 'undefined'){
     formBuilder   = formna;
  }else{
    formBuilder = $('#fb-editor').formBuilder();
  }
  
  setTimeout(function(){
    formBuilder.actions.setData(formData);
    alert('Warning all data will be erased once changed!');
  },1500);

  console.log('testing');

}