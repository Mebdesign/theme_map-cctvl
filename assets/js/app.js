
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}

document.addEventListener("DOMContentLoaded", function(event) { 
  var input_user_login = document.getElementById('user_login')
  if(input_user_login?.value !== '') {
    input_user_login?.parentElement?.classList?.add("focused", "is-focused")
  }
});

