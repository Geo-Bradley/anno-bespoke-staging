// Start of fade in animation on scroll JavaScript. Add code Add "fadein fadehalf delay1" to add the animation to a specified area. 


$(document).ready(function(){
	$('.sub-btn').click(function(){
        $(this).closest('form').submit();
		console.log('test 1');
    });

    const mainMenu = $('.main-menu');
    const openMenu = $('.open-menu');
    const closeMenu = $('.close-menu');

    openMenu.on('click', function() {
        mainMenu.css({
            'display': 'flex',
            'top': '0'
        });
    });

    closeMenu.on('click', function() {
        mainMenu.css('top', '-100%');
    });

	$(".open-menu").click(function(){
        $(this).addClass("hidden");
		$('.close-menu').addClass("active");
		$('.burger').addClass("active");
    });

	$(".close-menu").click(function(){
        $('.open-menu').removeClass("hidden");
        $('.burger').removeClass("active");
		$(this).removeClass("active");
    });

	$(".burger .menu-item-has-children").click(function(){
        $(this).toggleClass("active");
    });

});



jQuery(window).on("load", function(e){
	header_scroll_active();
	setTimeout(function(){
		equalheight('.equal-height');
	}, 500);
});

jQuery(window).resize(function() {
	setTimeout(function(){
		equalheight('.equal-height');
	}, 500);
});

jQuery(window).scroll(function() {
	header_scroll_active();
});

jQuery(window).focus(function() {
	equalheight('.equal-height');
});



// Equal Height
equalheight = function(container){
	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
	jQuery(container).each(function(){
		$el = jQuery(this);
		jQuery($el).height('auto')
		topPostion = $el.position().top;
		if(currentRowStart != topPostion){
			for(currentDiv = 0; currentDiv < rowDivs.length; currentDiv++){
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0;
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		}else{
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for(currentDiv = 0; currentDiv < rowDivs.length; currentDiv++){
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}

function makeSquare() {
	jQuery('.make-square').each(function(){

		var elementWidth = $(this).width(); console.log(elementWidth);

		$(this).css('height', elementWidth);
	});
}

jQuery(window).on('load', function(){
	setTimeout(function(){
		equalheight('.equal-height');
		equalheight('.equal-height-two');
		makeSquare();
	}, 500);
});
jQuery(window).on('resize', function(){
	setTimeout(function(){
		equalheight('.equal-height');
		equalheight('.equal-height-two');
		makeSquare();
	}, 500);
});
jQuery(window).on('focus', function(){
	equalheight('.equal-height');
	equalheight('.equal-height-two');
	makeSquare();
});

function header_scroll_active() {

	var st = $(window).scrollTop();

	if (st > 50) {
		$("#header").addClass("active");

	  }else{
		  $("#header").removeClass("active");  
	  }

};

function header_scroll_active_visibility() {

	var lastScrollTop = 0;

	$(window).scroll(function(){

		var st = $(window).scrollTop();
		var scrollAtive = $('.header-content');

		setTimeout(function(){

			if (st > lastScrollTop){
				scrollAtive.removeClass('scroll-up').addClass('scroll-active');
			} else {
				scrollAtive.removeClass('scroll-active').addClass('scroll-up');
			}
				lastScrollTop = st;

		}, 100);
	});
};

// Counter - Display add class * counter-countup * Input number without , 
function stat_countup(obj){
	obj.prop('Counter', 0).animate({
		Counter: obj.text()
	}, {
		duration: 2600,
		easing: 'swing',
		step: function(now){
			now = Number(Math.ceil(now)).toLocaleString('en');
			obj.text(now);
		}
	});
	
	obj.addClass('finished-counting');
}



ScrollReveal({
	reset: false,
	distance: '60px',
	duration: 2000,
	delay: 0,
});


ScrollReveal().reveal('.reveal-top', { delay: 0, origin: 'top' });
ScrollReveal().reveal('.reveal-bottom, .green-accordion-title .w50 p', { delay: 0, origin: 'bottom' });
ScrollReveal().reveal('.reveal-left, .faq-section .accordion-item', { delay: 0, origin: 'left' });
ScrollReveal().reveal('.reveal-right, .about-location h3', { delay: 0, origin: 'right' });

ScrollReveal().reveal('.lefterval, .icon-single, .snapshot-100 .w33', { delay: 0, origin: 'left', interval: 200});

ScrollReveal().reveal('.header-content', { delay: 500, origin: 'top'});
ScrollReveal().reveal('.bottom-up, .case-study-swiper .swiper-slide, .sr-1, .team-100 .w33, .team-info, .spirits-100, .case-upper p, .inner-study-card, .cs-testimonial-up', { origin: 'bottom', interval: 200});



// Global Lenis smooth scrolling initialization
const lenis = new Lenis({
    smooth: true,
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
});

function raf(time) {
    lenis.raf(time); // Update Lenis
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

window.addEventListener('load', () => lenis.resize());
window.addEventListener('resize', () => lenis.resize());

// --- GSAP ScrollTrigger ---
gsap.registerPlugin(ScrollTrigger);

let text = new SplitType('.skew-up', { types: 'lines, words' });

function resetSplitType() {
    text.revert(); 
    text = new SplitType('.skew-up', { types: 'lines, words' });
}

function refreshAll() {
    // Reset SplitType
    resetSplitType();

    // Kill skew-up and hero-vid triggers if they exist
    ScrollTrigger.getAll().forEach(trigger => trigger.kill());

    // Recreate ScrollTriggers for skew-up elements
    document.querySelectorAll('.skew-up').forEach((block) => {
        ScrollTrigger.create({
            trigger: block,
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none none',
            invalidateOnRefresh: true,
            onEnter: () => {
                gsap.to(block.querySelectorAll('.word'), {
                    y: 0,
                    stagger: 0.03,
                    ease: "power3.out",
                    duration: 1.5,
                });
            }
        });
    });

    // Pin hero-vid (only on homepage)
    if (document.querySelector('.home-hero')) {
        gsap.to('.hero-vid', {
            clipPath: "inset(0% round 30px)", 
            scrollTrigger: {
                trigger: ".home-hero",
                start: "top top",
                end: "bottom top",
                scrub: 1,
                pin: true,
                anticipatePin: 1,
                invalidateOnRefresh: true,
            }
        });
    }

    // Initialize Ukiyo parallax elements
    document.querySelectorAll(".ukiyo").forEach((el) => {
        el.ukiyoInstance?.destroy();
        el.ukiyoInstance = new Ukiyo(el, { speed: 1.3 });
    });

    lenis.resize();
    ScrollTrigger.refresh(); // Always refresh at the end
}

// Ensure animations work correctly after resizing or loading
window.addEventListener('resize', refreshAll);
window.addEventListener('load', refreshAll);


  
  // Animate the clip-path of the hero-img
  gsap.to('.scale-hero-img', {
	clipPath: 'inset(0% round 30px)', 
	duration: 3, 
	ease: 'power3.inOut' 
  });
  
  // Animate the scale of the hero-img img 
  gsap.to('.scale-hero-img img', {
	scale: 1, 
	duration: 3, 
	ease: 'power3.inOut' 
  });
  






$(function() {  
	$('.btn')
	  .on('mouseenter', function(e) {
			  var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
			  $(this).find('span').css({top:relY, left:relX})
	  })
	  .on('mouseout', function(e) {
			  var parentOffset = $(this).offset(),
				relX = e.pageX - parentOffset.left,
				relY = e.pageY - parentOffset.top;
		  $(this).find('span').css({top:relY, left:relX})
	  });
  });
  



const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));






document.querySelectorAll(".home-scroll_section").forEach((section) => {
	let childTriggers = section.querySelectorAll(".home-scroll_text-item");
	let childTargets = section.querySelectorAll(".home-scroll_img-item");
  
	// switch active class
	function makeItemActive(index) {
	  childTriggers.forEach(trigger => trigger.classList.remove("is-active"));
	  childTargets.forEach(target => target.classList.remove("is-active"));
	  childTriggers[index].classList.add("is-active");
	  childTargets[index].classList.add("is-active");
	}
	makeItemActive(0);
  
	// create triggers
	childTriggers.forEach((trigger, index) => {
	  ScrollTrigger.create({
		trigger: trigger,
		start: "top center",
		end: "bottom center",
		onToggle: ({isActive}) => {
		  if (isActive) {
			makeItemActive(index);
		  }
		}
	  });
	});
  });

window.addEventListener('load', function() {
    setTimeout(function() {
        const heroVid = document.querySelector('.hero-vid');
        if (heroVid) {
            heroVid.classList.add('active');
        }
    }, 1200); // delay

});




// Function to create FAQ ScrollTriggers (only on the FAQ page)
function createFaqScrollTriggers() {
    if (!document.querySelector('.faq-section')) return; // Ensure this only runs on FAQ page

    gsap.registerPlugin(ScrollTrigger);

    // Pin the FAQ section's .w30 element
    gsap.to(".faq-section .w30", {
        scrollTrigger: {
            trigger: ".faq-section .w100",
            start: "top 160px",
            end: "bottom-=150px 80%",
            pin: ".faq-section .w30",
            markers: true,  // Enable markers to verify functionality
            invalidateOnRefresh: true, // Refresh positioning on window resize
        },
    });

    // Define fade-in elements and triggers
    const fadeInSelectors = [
        { fade: '[fade-in1]', trigger: '.faq-cat-1' },
        { fade: '[fade-in2]', trigger: '.faq-cat-2' },
        { fade: '[fade-in3]', trigger: '.faq-cat-3' },
        { fade: '[fade-in4]', trigger: '.faq-cat-4' },
        { fade: '[fade-in5]', trigger: '.faq-cat-5' }
    ];

    // Opacity calculation based on distance
    function getOpacity(index, currentIndex) {
        const distance = Math.abs(index - currentIndex);
        if (distance === 0) return 1;
        if (distance === 1) return 0.4;
        if (distance === 2) return 0.2;
        return 0.2;
    }

    // Create ScrollTriggers for fade-in elements
    fadeInSelectors.forEach(({ fade, trigger }, index) => {
        gsap.utils.toArray(fade).forEach((fadeInElement) => {
            gsap.timeline({
                scrollTrigger: {
                    trigger: trigger,
                    start: "top 60%",
                    end: "bottom 40%",
                    markers: true,  // Markers to ensure triggers are working
                    scrub: true,
                    onUpdate: () => {
                        fadeInSelectors.forEach((_, i) => {
                            const opacity = getOpacity(i, index);
                            gsap.to(fadeInSelectors[i].fade, { opacity: opacity, duration: 1 });
                        });
                    },
                }
            })
            .fromTo(fadeInElement, { opacity: 0.2 }, { opacity: 1, duration: 1 }) // Fade in
            .to(fadeInElement, { opacity: 0.2, duration: 1 });  // Fade out
        });
    });
}

// Initialize FAQ ScrollTriggers only when the page loads
window.addEventListener('load', () => {
    createFaqScrollTriggers();  // Initialize FAQ-specific ScrollTriggers
    ScrollTrigger.refresh();    // Refresh ScrollTrigger after initialization
});






const cursorDot = document.querySelector("[data-cursor-dot");
const cursorOutline = document.querySelector("[data-cursor-outline");

window.addEventListener("mousemove", function (e) {

	const posX = e.clientX;
	const posY = e.clientY;

	cursorDot.animate({
		left: `${posX}px`,
		top: `${posY}px`,
	}, { 
		duration: 1000, 
		fill: "forwards",
		easing: "ease-out" 
	});
	
	cursorOutline.animate({
		left: `${posX}px`,
		top: `${posY}px`,
	}, { 
		duration: 1000, 
		fill: "forwards",
		easing: "ease-out" 
	});

	cursorDot.style.mixBlendMode = 'difference';
	cursorOutline.style.mixBlendMode = 'difference';

});




const viewables = document.querySelectorAll('#viewable');
const dragables = document.querySelectorAll('#dragable');

viewables.forEach((viewable) => {
    viewable.addEventListener('mouseenter', () => {
        cursorDot.classList.add('viewing');
        cursorOutline.classList.add('viewing');
    });

    viewable.addEventListener('mouseleave', () => {
        cursorDot.classList.remove('viewing');
        cursorOutline.classList.remove('viewing');
    });
});

dragables.forEach((dragable) => {
    dragable.addEventListener('mouseenter', () => {
        cursorDot.classList.add('dragging');
        cursorOutline.classList.add('dragging');
    });

    dragable.addEventListener('mouseleave', () => {
        cursorDot.classList.remove('dragging');
        cursorOutline.classList.remove('dragging');
    });
});







$('.switch label').on('click', function() {
    var indicator = $(this).parent('.switch').find('span');
    
    $(indicator).removeClass('second third fourth'); // Remove all possible classes
    
    // Remove .active from all radio buttons first
    $('.radio2, .radio3, .radio4').removeClass('active');
    
    if ($(this).hasClass('second')) {
        $(indicator).addClass('second');
        $('.radio2').addClass('active');
		$('.radio1').removeClass('active');
    } else if ($(this).hasClass('third')) {
        $(indicator).addClass('third');
        $('.radio3').addClass('active');
		$('.radio1').removeClass('active');
    } else if ($(this).hasClass('fourth')) {
        $(indicator).addClass('fourth');
        $('.radio4').addClass('active');
		$('.radio1').removeClass('active');
    } else {
        // Default case for the first button
        $(indicator).removeClass('second third fourth');
		$('.radio1').addClass('active');
    }
});

