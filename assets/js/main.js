jQuery(document).ready(function($)  {

  $(".lian-p-share").on("click tap", function(){
    $(".sharebox-modal").show();
  });

  $(".sharebox-modal .lian-times").on("click tap", function(){
    $(this).parent().parent().parent().hide();
  });

  $('.sharebox-modal').on("click tap", function(e){
        var lianContainer = $(".sharebox");
        if (!lianContainer.is(e.target) && lianContainer.has(e.target).length === 0) {
          lianContainer.parent().hide();
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
    var lianContainer = $('.nav-mobile-content');
    var lianBurger = $('.lian_hamburger_wrapper .hamburger');
    if (!lianContainer.is(e.target) && lianContainer.has(e.target).length === 0 && !lianBurger.is(e.target) && lianBurger.has(e.target).length === 0)
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
    var lianStickySize = 0;
    
    if($("#wpadminbar").length > 0){
      lianStickySize = lianStickySize + $("#wpadminbar").height();
    }
    if($(".lian-notf").length > 0){
      lianStickySize = lianStickySize + $('.lian-notf').height();
    }
    $(window).scroll(function (event) {
      var lianScroll = $(window).scrollTop();
      var lianHeaderHeight = $('.site-header.sticky').height();
      if(lianScroll > lianStickySize){
        $('.site-header.sticky').addClass('sticky-do');
        $('.site-header.sticky').next().css({'padding-top':lianHeaderHeight});
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
  $(document).on('click','.qa-question',function(){
    $(this).parent().toggleClass('active');
    $(this).parent().find('.qa-answer').toggle();
  });
  
  /** Mobile Menu **/
  $('.mobile-menu').on('click',function(){
    $(this).parent().find('.menu').toggleClass('show-mobile-menu');
    return false;
  });
  $('.mobile-menu').on('keypress',function(e){
      if(e.which == 13) {
        $(this).parent().find('.menu').toggleClass('show-mobile-menu');
      }
      return false;
  });

  $('.page_item_has_children > a').on('click',function(){
      if($(window).width() < 991){
          return false;
      }
  });


  const lianFocusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
  const lianMenu = $('.headerrow');
  const lianFirstFocusableElement = lianMenu.find(lianFocusableElements).first();
  const lianLastFocusableElement = lianMenu.find(lianFocusableElements).last();

  $(document).on('keydown', function(e) {

    if (! lianMenu.find('.menu').hasClass('show-mobile-menu')) {
      return;
    }

    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

    if (!isTabPressed) {
      return;
    }

    if (e.shiftKey) {
      if ($(document.activeElement).is(lianFirstFocusableElement)) {
        lianLastFocusableElement.focus();
        e.preventDefault();
      }
    } else { 
      if ($(document.activeElement).is(lianLastFocusableElement)) {
        lianFirstFocusableElement.focus();
        e.preventDefault();
      }
    }
  });

});

function lianRemoveItemArray(arr, value) {
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