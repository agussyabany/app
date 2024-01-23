 (function($) {

	"use strict";
	$(document).ready(function() {
		
	// Camera Slider Active
	jQuery(function(){
		jQuery('#camera_wrap_4').camera({
			loader: false,
			pagination: false,
			thumbnails: false,
			hover: false,
			opacityOnGrid: false
		});
	});
// swiper plugin Testimonial Onwe active.	
		var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			paginationClickable: true,
			autoplay: 2000,
			loop: true
		});
		
// swiper plugin Logo Section active.	
		var swiper = new Swiper('.swiper-container-two', {
			slidesPerView: 5,
			paginationClickable: false,
			spaceBetween: 18,
			autoplay: 3000,
			loop: true,
			breakpoints: {
				// when window width is <= 320px
				320: {
				  slidesPerView: 1
				},
				// when window width is <= 480px
				480: {
				  slidesPerView: 2
				},
				// when window width is <= 640px
				638: {
				  slidesPerView: 3
				},
				// when window width is <= 640px
				765: {
				  slidesPerView: 3
				},
				// when window width is <= 991px
				991: {
				  slidesPerView: 5
				}
			  }
		});
		
// swiper plugin Testimonial Two active.	
		var swiper = new Swiper('.testimonial-parents', {
			slidesPerView: 3,
			paginationClickable: false,
			spaceBetween: 30,
			autoplay: 3000,
			grabCursor: true,
			loop: true,
			breakpoints: {
				// when window width is <= 320px
				320: {
				  slidesPerView: 1
				},
				// when window width is <= 480px
				480: {
				  slidesPerView: 1
				},
				// when window width is <= 640px
				638: {
				  slidesPerView: 1
				},
				// when window width is <= 991px
				991: {
				  slidesPerView: 2
				}
			  }
		});
		
// swiper plugin Testimonial Two active.	
		var swiper = new Swiper('.testimonial-parents-sidebar', {
			slidesPerView: 1,
			paginationClickable: false,
			spaceBetween: 100,
			autoplay: 3000,
			grabCursor: true,
			loop: true
		});
		
		
	// Fancybox
    $(".fancybox").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',

    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
    });	
	$(".various").fancybox({
		maxWidth: 800,
		maxHeight: 600,
		fitToView: false,
		width: '70%',
		height: '70%',
		autoSize: false,
		closeClick: false,
		openEffect: 'elastic',
		closeEffect: 'none'
	});
	
	// nstslider for filtering price
	$('.nstSlider').nstSlider({
		"left_grip_selector": ".leftGrip",
		"right_grip_selector": ".rightGrip",
		"value_bar_selector": ".bar",
		"highlight": {
			"grip_class": "gripHighlighted",
			"panel_selector": ".highlightPanel"
		},
		"value_changed_callback": function(cause, leftValue, rightValue) {
			$('.leftLabel').text(leftValue);
			$('.rightLabel').text(rightValue);
		},
	});
	
  // Flex Carousel Active
  $('#flex_carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 74,
    itemMargin: 5,
    asNavFor: '#slider'
  });
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#flex_carousel"
  });
  
  
  //Counter Up plugin
	$('.counter').countUp({
		'time': 2000,
		'delay': 5
	});
	
	// Backgound Paralux
	$(function(){
		$('.parallax').simpleParallax();
	});
	
	//Skill Progress bar
	var index=0;
	$(document).scroll(function(){
		var top = $('.single-team-member-details-section').height()-$(window).scrollTop();
	/* 	console.log(top) */
		if(top<-0){
			if(index==0){	
				
				$('.chart').easyPieChart({
					easing: 'easeOutBounce',
					animate: 3000,
					barColor:'#62A0D1',
					lineWidth:8,
					size: 106,
					onStep: function(from, to, percent) {
						$(this.el).find('.percent').text(Math.round(percent));
					}
				});
				
			}
			index++;
		}
	});
	
	// Smooth scroll Plugin Active
	$(function() {  

		jQuery.scrollSpeed(150, 800);

	});
	
	// Google Map Active and Option
   $("#map_canvas").gmap3({
        action: "init",
        marker: {
			// markers and locations------------------
            values: [ {
                latLng: [ 23.739296,90.3870653 ],
                options: {
                    icon: "images/map-location.png"
                }
            } ],
            options: {
                draggable: false
            }
        },
        map: {
            options: {
                zoom: 12,
                zoomControl: true,
                scaleControl: true,
                scrollwheel: false,
		        mapTypeControl: false,				
                streetViewControl: true,
                draggable: true,
                styles: [
					  {
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#EDEDED"
						  }
						]
					  },
					  {
						"elementType": "labels.icon",
						"stylers": [
						  {
							"visibility": "off"
						  }
						]
					  },
					  {
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#616161"
						  }
						]
					  },
					  {
						"elementType": "labels.text.stroke",
						"stylers": [
						  {
							"color": "#EDEDED"
						  }
						]
					  },
					  {
						"featureType": "administrative.land_parcel",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#bdbdbd"
						  }
						]
					  },
					  {
						"featureType": "poi",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#eeeeee"
						  }
						]
					  },
					  {
						"featureType": "poi",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#757575"
						  }
						]
					  },
					  {
						"featureType": "poi.park",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#e5e5e5"
						  }
						]
					  },
					  {
						"featureType": "poi.park",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#9e9e9e"
						  }
						]
					  },
					  {
						"featureType": "road",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#ffffff"
						  }
						]
					  },
					  {
						"featureType": "road.arterial",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#757575"
						  }
						]
					  },
					  {
						"featureType": "road.highway",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#BCBCBC"
						  }
						]
					  },
					  {
						"featureType": "road.highway",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#616161"
						  }
						]
					  },
					  {
						"featureType": "road.local",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#9e9e9e"
						  }
						]
					  },
					  {
						"featureType": "transit.line",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#e5e5e5"
						  }
						]
					  },
					  {
						"featureType": "transit.station",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#eeeeee"
						  }
						]
					  },
					  {
						"featureType": "water",
						"elementType": "geometry",
						"stylers": [
						  {
							"color": "#c9c9c9"
						  }
						]
					  },
					  {
						"featureType": "water",
						"elementType": "labels.text.fill",
						"stylers": [
						  {
							"color": "#9e9e9e"
						  }
						]
					  }
				]
            }
        }
    });	
});
})(jQuery);
