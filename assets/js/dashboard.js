

$(document).ready( function () { 

// Update the display every second
setInterval(() => {
  let tgl =	getCurrentDateTime();
  
  $('#today').text(tgl);

}, 1000);


  makeToggleSidebar();

});

function makeToggleSidebar(){

  $('#sidebar-control span').on('click', function(){

    let skrg = $(this).data('current');

    if(skrg == 'open'){
      
      openSidebar(false);

    }

  });

  $('.sidebar-header').on('click', function(){

    let skrg = $(this).data('current');

    if(skrg != 'open'){

      openSidebar(true);

      }
    

  });

  // toggle automatic
  if(getCookieSidebar()=='open'){
    openSidebar(true);
  }else{
    openSidebar(false);
  }

}


function openSidebar(val){

  if(val == true){

      $('.sidebar').removeClass('closed-sidebar');
      $('#sidebar-control span').data('current', 'open');
      $('#sidebar-control').css('text-align', 'right');


      saveCookieSidebar('open');

  } else {


    $('.sidebar').addClass('closed-sidebar');
      $(this).data('current', 'closed');
      $('#sidebar-control').css('text-align', 'left');

      saveCookieSidebar('closed');

  }

}




// for saving the cookie along the pages
function saveCookieSidebar(val){


$.cookie("data-current-sidebar", val);

}

function getCookieSidebar(){
let a = $.cookie("data-current-sidebar");
  return a;
}

// Get the current date and time
function getCurrentDateTime() {
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');
  const day = now.getDate();
  const month = now.toLocaleString('default', { month: 'long' });
  const year = now.getFullYear();

  return `${hours}:${minutes}:${seconds} - ${day} ${month} ${year}`;
}