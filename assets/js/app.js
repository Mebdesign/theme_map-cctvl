
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}

document.addEventListener("DOMContentLoaded", function(event) { 
  var label = document.getElementsByClassName('user_login')
  var input = document.getElementById('user_login')

  if(input.value !== '') {
    input.parentElement.classList.add("focused", "is-focused")
  }
});

