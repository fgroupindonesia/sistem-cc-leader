
$(document).ready( function () { 

// Update the display every second
setInterval(() => {
  let tgl =	getCurrentDateTime();
  
  $('#today').text(tgl);

}, 1000);


});

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