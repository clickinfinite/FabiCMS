  $(document).ready(function(){
    var link= $('.menu-link');
    var menu = $('.menu');
    var list_link = $('.menu a');

    link.click(function(){
      link.toggleClass('menu-link-active');
      menu.toggleClass('menu-active');
    });

    list_link.click(function(){
      link.removeClass('menu-link-active');
      menu.removeClass('menu-active');
    });

  });