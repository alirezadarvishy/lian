jQuery(document).ready(function($)  {

  $(".lian-p-share").on("click tap", function(){
    $(".sharebox-modal").show();
  });

  $(".sharebox-modal .lian-times").on("click tap", function(){
    $(this).parent().parent().parent().hide();
  });

  $('.sharebox-modal').on("click tap", function(e){
        var container = $(".sharebox");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.parent().hide();
        }
  });

  $(".header-nav ul li").hover(function(){
    rightOffcet = ($(window).width() - ($(this).offset().left + $(this).outerWidth()));
    rightOffcet = rightOffcet - ($(window).width() - ($(this).parent().offset().left + $(this).parent().outerWidth()));
    width = $(this).outerWidth();
    $(this).parent().find(".lian-nav-active").css({'right':rightOffcet,'width':width,'transform':'scaleX(1)'});
  }, function(){
    $(this).parent().find(".lian-nav-active").css({"transform":"scaleX(0)"});
  });

  $(document).on("click tap",".hamburger", function(){
    if ($(this).hasClass('close')) {
      $(this).removeClass('close');
      $(this).addClass('open');
      $(this).parent().find('.nav-mobile').css({'left':'0px','opacity':'1'});
      $('.dark-overlay').show();
      $('html').addClass('locked');
    }else{
      $(this).removeClass('open');
      $(this).addClass('close');
      $(this).parent().find('.nav-mobile').css({'left':'-100%','opacity':'0'});
      $('.dark-overlay').hide();
      $('html').removeClass('locked');
    }
  });

  $(".nav-mobile-content li a").on("click tap", function(){
    if($(this).parent().find('.lian-megamenu').length > 0){
      return false;
    }
  });

  $(".hasmegamenu").on("click tap", function(){
    $(this).find(".elementor-tab-content").hide();
    $(this).find(".elementor-tab-mobile-title").removeClass('elementor-active');
  });

  $(".hasmegamenu .elementor-tab-mobile-title").on("click tap", function(){
    $(this).parent().find(".elementor-tab-content").removeClass('mobile-opened-tab');
    $(this).parent().find(".elementor-tab-mobile-title").removeClass('elementor-active');
    $(this).addClass('elementor-active');
    $(this).next().addClass('mobile-opened-tab');
  });


  $(document).bind( "mouseup touchend", function(e){
    var container = $('.nav-mobile-content');
    var burger = $('.lian_hamburger_wrapper .hamburger');
    if (!container.is(e.target) && container.has(e.target).length === 0 && !burger.is(e.target) && burger.has(e.target).length === 0)
    {
      $('.lian_hamburger_wrapper .hamburger').removeClass('open');
      $('.lian_hamburger_wrapper .hamburger').addClass('close');
      $('.lian_hamburger_wrapper .nav-mobile').css({'left':'-100%','opacity':'0'});
      $('.lian_hamburger_wrapper .dark-overlay').hide();
      $('html').removeClass('locked');
    }
  });


  // No action if touch a links on mobile
  $(".loggedin > a,.mini-cart > a").on("click tap", function(){
    if(screen.width <= 768){
      return false;
    }
  });

  if($('.site-header.sticky').length > 0){
    var stickySize = 0;
    
    if($("#wpadminbar").length > 0){
      stickySize = stickySize + $("#wpadminbar").height();
    }
    if($(".lian-notf").length > 0){
      stickySize = stickySize + $('.lian-notf').height();
    }
    $(window).scroll(function (event) {
      var scroll = $(window).scrollTop();
      var header_height = $('.site-header.sticky').height();
      if(scroll > stickySize){
        $('.site-header.sticky').addClass('sticky-do');
        $('.site-header.sticky').next().css({'padding-top':header_height});
      }else{
        $('.site-header.sticky').removeClass('sticky-do');
        $('.site-header.sticky').next().css({'padding-top':''});
      }
    });
  }

  $(".boxed-mini-cart > a").on("click tap", function(){
    $(this).parent().find('.mini-cart-dropdown').css({'left':'0'});
    $(this).parent().find('.lian-mini-cart-overlay').show();
    return false;
  });

  $(".boxed-mini-cart").on("click tap",".close", function(){
    $(this).parent().css({'left':'-100%'});
    $(this).parent().parent().find('.lian-mini-cart-overlay').hide();
  });

  $(".lian-mini-cart-overlay").on("click tap", function(){
    $(this).parent().find(".mini-cart-dropdown").css({'left':'-100%'});
    $(this).hide();
  });

  /** Q & A Box **/
  jQuery(document).on('click','.qa-question',function(){
    jQuery(this).parent().toggleClass('active');
    jQuery(this).parent().find('.qa-answer').toggle();
  });

});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function removeItemArray(arr, value) {
  var i = 0;
  while (i < arr.length) {
    if (arr[i] === value.toString()) {
      arr.splice(i, 1);
    } else {
      ++i;
    }
  }
  return arr;
}

function lianGoTop(){
  jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
}