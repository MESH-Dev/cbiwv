jQuery(document).ready(function($){


	$(".homeslides").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500,            // Integer: Speed of the transition, in milliseconds
		timeout: 3000,          // Integer: Time between slide transitions, in milliseconds
			pager: true,           // Boolean: Show pager, true or false
		nav: true,             // Boolean: Show navigation, true or false
		prevText: "<i class='fa fa-angle-left'></i>",   // String: Text for the "previous" button
		nextText: "<i class='fa fa-angle-right'></i>",       // String: Text for the "next" button

	});

	$(".page-slides").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500,            // Integer: Speed of the transition, in milliseconds
		timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
		pager: true,           // Boolean: Show pager, true or false
		nav: true,             // Boolean: Show navigation, true or false
		prevText: "<i class='fa fa-angle-left'></i>",   // String: Text for the "previous" button
		nextText: "<i class='fa fa-angle-right'></i>",       // String: Text for the "next" button
	});


	//MENU SLIDEOUT ON MOUSEOVER
	$('#menu-main-navigation > li > a').mouseenter(function(event) {
		$('header.home .bg').animate({
			'left': '-250px'
		}, 400, 'swing');
		$('.active-nav').hide();
		$('#menu-main-navigation li ul').removeClass('active-nav');
		$('#menu-main-navigation li a').removeClass('hover');
		$(this).parent('li').children('ul').addClass('active-nav');
		$('.active-nav').stop().fadeIn(500);
		$(this).addClass('hover');

	});

	//MENU SLIDEIN MOUSELEAVE
	$('header.home').mouseleave(function(event){
		$('.active-nav').hide();
		$('#menu-main-navigation li a').removeClass('hover');
		$('header.home .bg').animate({
			'left': '-550px'
		}, 200, 'swing');
	});

 

	$('.landing-block').mouseenter(function()
	{
 
		var imgs = $(this).find('img').length;

 
		if(imgs == 2)
		{
			$( "img:first", this ).hide();
			$( "img:last", this ).show();
		}
		
	})
	.mouseleave(function() {
		var imgs = $(this).find('img').length;
		if(imgs == 2){
			$( "img:first", this ).show();
			$( "img:last", this ).hide();
		}
	});





	$( ".logo" )
	.mouseenter(function() {
		$( "img#static-blocks", this ).hide();
		$( "img#animated-blocks", this ).show();

	})
	.mouseleave(function() {
		$( "img#static-blocks", this ).show();
		$( "img#animated-blocks", this ).hide();
	});

	$('.page-header').parallax('80%', 0.1);

	// var timer;

	// $('.social-icon').mouseenter(function() {
	// 	timer = setTimeout( function(){
	// 		$(this).css('-webkit-transform', 'rotateZ(360deg)');
	// 	}, 200);
	// }).mouseleave(function(){
	// 	clearTimeout(timer);
	// });

	var timer;

	$('.social-icon').mouseenter(function() {
    	var that = this;
    	timer = setInterval(function(){
        	$(that).css('-webkit-transform', 'rotateZ(360deg)');
    	}, 200);
	}).mouseleave(function() {
    	clearInterval(timer);
	});

	// New tabs

  /* ==========
     Variables
   ========== */
   var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  /* ==========
      Utilities
    ========== */
   function beginsWith(needle, haystack){
     return (haystack.substr(0, needle.length) == needle);
   };


  /* ==========
     Anchors open in new tab/window
   ========== */
   $('a').each(function(){

     if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab
      if( test == false && $(this).attr('href').indexOf('#') == -1){
        $(this).attr('target','_blank');
      }
     }
   });

//-----------------------------------------------
//Remove the nav on scroll for mobile devices
//Added 9/25/15 - SD
//-----------------------------------------------

var width = $(window).width();
var mWidth = window.matchMedia("(max-width: 500px");
var wsWidth = window.screen.width;
console.log("Window is " + width + "px");
console.log("Window is " + wsWidth + "px");
if (wsWidth <= 500 || width <= 500){

	var st = $(window).scrollTop();
	console.log("Window is " + width + "px");

	$(window).scroll(function(){
		var st = $(window).scrollTop();
		var sl = $(window).scrollLeft();
		if (st > 10 || sl > 0 ){
			//$('.bg').hide();
			//$('.bg')
			$('header')
				.addClass('slideOutLeft animated')
				.removeClass('slideInLeft');
			//$('.container-header').hide();
			//$('.container-header')
				//.addClass('slideOutLeft animated')
				//.removeClass('slideInLeft');
			console.log("Window ScrollTop = " + st);
		}
		else{
			//$('.bg').show();
			//$('.bg')
			$('header')
				.addClass('slideInLeft')
				.removeClass('slideOutLeft');
			//$('.container-header').show();
			// $('.container-header')
			// 	.addClass('slideInLeft')
			// 	.removeClass('slideOutLeft');

			console.log("Window ScrollTop = " + st);
		}
	});
}

//-----------------------------------------------



});
