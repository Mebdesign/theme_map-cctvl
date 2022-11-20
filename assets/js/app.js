// Need for skin sidebar
var win = navigator.platform.indexOf('Win') > -1;

if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}

document.addEventListener("DOMContentLoaded", function(event) {
  //Hide card body
  document.querySelectorAll('.card-body-toggled').forEach(function(el) {
    el.style.display = 'none';
  });

  //Toggle display card body
  var switcher = document.querySelectorAll('.flexSwitchCheckDefault')
  switcher.forEach(function(el) {
    el.addEventListener('click', function(){
      var target = this.closest(".card-header").nextElementSibling
      target.style.display = target.style.display === 'none' ? 'block' : 'none';
    })
  });

  //Add class focus on login form
  var input_user_login = document.getElementById('user_login')
  if(input_user_login?.value !== '') {
    input_user_login?.parentElement?.classList?.add("focused", "is-focused")
  }

  //Toggle display passwd on login form
  var eye_dashicon = document.querySelector('.wp-pwd .dashicons-visibility')
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

   var all = jQuery('.all')
   var engaged = jQuery('.engaged')
   var no_engaged = jQuery('.no-engaged')


  all.click(filterAll)
  engaged.click(filterEngaged)
  no_engaged.click(filterNoEngaged)

  function filterAll(e){

    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterAll'
        },
        success: function(data){
            jQuery('#filtered').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterEngaged(e){

    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterEngaged'
        },
        success: function(data){
            jQuery('#filtered').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterNoEngaged(e){
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterNoEngaged'
        },
        success: function(data){
            jQuery('#filtered').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

});

