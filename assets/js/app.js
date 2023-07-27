$(function () {
  $(document).scroll(function () {
    var $nav = $(".nav-fixed");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.outerHeight());
  });
  $('#nav-toggler').on('click', function (){
    $('#navmenu-top').addClass('toggle-nav');
  });
  $('#nav-close').on('click', function (){
    $('#navmenu-top').removeClass('toggle-nav');
  });
  // Smooth scroll function
  sections  = $('article');
  for(ind in sections){
    section = sections[ind];
    $('a[href^="#'+section.id+'"]').on('click', function (e) {
        e.preventDefault();
  
        var target = this.hash,
            $target = $(target);
        console.log(target);
        console.log($('html, body'));
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 90
        }, 400, 'swing', function () {
            // window.location.hash = target;
        });
    });
  }
  $('#contact-button').on('click', function(){
    let message = $('#message').val();
    $('#contact-link').attr('href', `https://api.whatsapp.com/send/?phone=6283895172024&text=${message}`);
    console.log($('#contact-link'));
    $('#contact-link')[0].click();
  });
});