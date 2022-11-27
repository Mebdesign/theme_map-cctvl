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
      console.log(target)
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

  //Filter mobiles status
  jQuery('#filtered_mobile').on('click', '.all', filterAll)
  jQuery('#filtered_mobile').on('click', '.engaged', filterEngaged)
  jQuery('#filtered_mobile').on('click', '.no-engaged', filterNoEngaged)
  jQuery('#filtered_fixes').on('click', '.all_fixes', filterAllFixes)
  jQuery('#filtered_fixes').on('click', '.engaged_fixes', filterEngagedFixes)
  jQuery('#filtered_fixes').on('click', '.no_engaged_fixes', filterNoEngagedFixes)

  function filterAll(e){
    e.preventDefault()
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterAll',
            args: 'all'
        },
        success: function(data){
            jQuery('#filtered_mobile').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterEngaged(e){
    e.preventDefault()
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterEngaged',
            args: 'engaged'
        },
        success: function(data){
            jQuery('#filtered_mobile').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterNoEngaged(e){
    e.preventDefault()
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterNoEngaged',
            args: 'no-engaged'
        },
        success: function(data){
            jQuery('#filtered_mobile').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterAllFixes(e){
    e.preventDefault()
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterAllFixes',
            args: 'all'
        },
        success: function(data){
            jQuery('#filtered_fixes').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterEngagedFixes(e){
    e.preventDefault()
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterEngagedFixes',
            args: 'engaged'
        },
        success: function(data){
            jQuery('#filtered_fixes').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }

  function filterNoEngagedFixes(e){
    e.preventDefault()
    jQuery.ajax({
        url: params.ajaxurl,
        data: {
            action: 'filterNoEngagedFixes',
            args: 'no-engaged'
        },
        success: function(data){
            jQuery('#filtered_fixes').html(data);
        },
        error : function(error){
            console.log(error)
        }
    })
  }


});

