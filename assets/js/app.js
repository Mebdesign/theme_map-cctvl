
var win = navigator.platform.indexOf('Win') > -1;

if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}

document.addEventListener("DOMContentLoaded", function(event) { 
  document.querySelectorAll('.card-body-toggled').forEach(function(el) {
    el.style.display = 'none';
  });

  var switcher = document.querySelectorAll('.flexSwitchCheckDefault')
  switcher.forEach(function(el) {
    el.addEventListener('click', function(){
      var _this = this.closest(".card-header").nextElementSibling
      _this.style.display = _this.style.display === 'none' ? 'block' : 'none';

    })
  });

  var eye_dashicon = document.querySelector('.wp-pwd .dashicons-visibility')
  var input_user_login = document.getElementById('user_login')
  if(input_user_login?.value !== '') {
    input_user_login?.parentElement?.classList?.add("focused", "is-focused")
  }

  eye_dashicon?.addEventListener("click", function(event) { 
    if(this.classList.contains('dashicons-visibility')){
      this.classList.toggle("dashicons-hidden")
      this.classList.remove("dashicons-visibility")
      this.parentElement.previousElementSibling.type = 'text'
      
    } else {
      this.classList.toggle("dashicons-visibility")
      this.classList.remove("dashicons-hidden")
      this.parentElement.previousElementSibling.type = 'password'
    }
   })


  
});

