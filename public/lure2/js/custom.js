$(".ripple").ripples({
  resolution: 512,
  dropRadius: 20,
  perturbance: 0.04,
});

$(window).scroll(function(){
  if ($(this).scrollTop() > 300) {
     $('.site_header').addClass('fix_header');
  } else {
     $('.site_header').removeClass('fix_header');
  }
});




// live strteam
document.addEventListener("DOMContentLoaded", () => {
  function counter(id, start, end, duration) {
    let obj = document.getElementById(id),
        current = start,
        range = end - start,
        increment = end > start ? 1 : -1,
        step = Math.abs(Math.floor(duration / range)),
        timer;

    function startCounter() {
      current = start;
      timer = setInterval(() => {
        current += increment;
        obj.textContent = current;
        if (current == end) {
          // clearInterval(timer);
          setTimeout(startCounter, 1000); // Add delay before restarting the counter
        }
      }, step);
    }

    startCounter(); // Initial start
  }

  counter("viewerCount_less", 100, 200, 10000); // Slower animation for viewerCount_less
  counter("viewerCount_more", 2000, 5000, 30000); // Slower animation for viewerCount_more
});

// hearet animation
function createHeart() {
  const heartContainer = document.querySelector('.heart_container');
  const heart = document.createElement('i');
  heart.classList.add('fa-solid', 'fa-heart', 'heart');
  heart.style.left = `${Math.random() * 50}px`; // Random horizontal position
  heartContainer.appendChild(heart);

  setTimeout(() => {
    heart.remove();
  }, 3000); // Remove the heart after it finishes the animation
}
setInterval(createHeart, 500); // Create a new heart every 500ms

function createHeartmore() {
  const heartContainermore = document.querySelector('.heart_container_more');
  const heartmore = document.createElement('i');
  heartmore.classList.add('fa-solid', 'fa-heart', 'heartmore');
  heartmore.style.left = `${Math.random() * 50}px`; // Random horizontal position
  heartContainermore.appendChild(heartmore);

  setTimeout(() => {
    heartmore.remove();
  }, 3000); // Remove the heart after it finishes the animation
}

setInterval(createHeartmore, 100); // Create a new heart every 500ms

// before after sectiion

document.addEventListener('DOMContentLoaded', function () {
  const beforeBtn = document.querySelector('.before_btn');
  const afterBtn = document.querySelector('.after_btn');
  const lotieImage = document.querySelector('.lotie_abs');
  const followerValue = document.querySelector('.follower_value');
  
  // Save the initial follower value
  const initialFollowerValue = followerValue.textContent.trim();

  beforeBtn.addEventListener('click', function () {
      beforeBtn.classList.add('active');
      afterBtn.classList.remove('active');
      lotieImage.classList.remove('open_image');
      followerValue.classList.remove('active');
      followerValue.textContent = initialFollowerValue; // Revert to initial value
  });

  afterBtn.addEventListener('click', function () {
      afterBtn.classList.add('active');
      beforeBtn.classList.remove('active');
      lotieImage.classList.add('open_image');
      followerValue.classList.add('active');
      increaseFollowers(followerValue); // Increase the follower value
  });

  function increaseFollowers(element) {
      let currentFollowers = parseInt(element.textContent.replace(/,/g, ''), 10);
      let newFollowers = currentFollowers + Math.floor(Math.random() * 1000) + 1; // Random increase
      element.textContent = newFollowers.toLocaleString();
  }
});

// mouse move js start
var timeout;
$('.move_container').mousemove(function(e){
  if(timeout) clearTimeout(timeout);
  setTimeout(callParallax.bind(null, e), 200);
  
});

function callParallax(e){
  parallaxIt(e, '.move_element_large', -100);
  parallaxIt(e, '.move_element_small', -30);
}

function parallaxIt(e, target, movement){
  var $this = $('.move_container');
  var relX = e.pageX - $this.offset().left;
  var relY = e.pageY - $this.offset().top;
  
  TweenMax.to(target, 1, {
    x: (relX - $this.width()/2) / $this.width() * movement,
    y: (relY - $this.height()/2) / $this.height() * movement,
    ease: Power2.easeOut
  })
}

// mouse move js end

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 600) {
        $(".banner").addClass("hide_banner");
    } else {
        $(".banner").removeClass("hide_banner");
    }
});

    window.addEventListener('load', () => {
      setTimeout(() => {
        document.getElementById('loading-screen').style.display = 'none';
      }, 4000); // Hide the loading screen after the animation ends
    });
gsap.to(".lemon_slide h2", {
  transform: "translateX(-100%)",
  scrollTrigger: {
    trigger: ".banner",
    scroller: "body",
    // markers: true,
    start: "top -40%",
    end: "top -110%",
    scrub: 3,
    // pin: true,
  },
});

gsap.to(".lemon_slide2  .lemon_cont2 h2", {
  transform: "translateX(-150%)",
  // x:-100,
  yoyo: true,
  repeat: -1,
  duration: 20,
});

$(document).ready(function () {
  $(".clients_slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    centerMode: true,
    dots: true,
    autoplay:true,
    autoplaySpeed:2000,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $('.logo_Marquee').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 0,
  speed: 8000,
  pauseOnHover: true,
  arrows:false,
  dots:false,
  cssEase: 'linear',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
  ],
});

});

// change text animated
// scripts.js

document.addEventListener('DOMContentLoaded', () => {
    const changebox = document.querySelector('.changebox');
    const spans = document.querySelectorAll('.changebox span');
    let currentIndex = 0;

    const changeText = () => {
        spans.forEach((span, index) => {
            span.classList.remove('active');
            if (index === currentIndex) {
                span.classList.add('active');
                changebox.style.height = `${span.offsetHeight}px`;
            }
        });

        currentIndex = (currentIndex + 1) % spans.length;
    };

    // Initial height setting
    changebox.style.height = `${spans[0].offsetHeight}px`;

    setInterval(changeText, 2000); // Change text every 2 seconds
});

document.addEventListener('DOMContentLoaded', () => {
    gsap.registerPlugin(ScrollTrigger);

    // Horizontal scrolling
    const sections = gsap.utils.toArray('.scroll_left');

    gsap.to(sections, {
        xPercent: -100 * (sections.length - 1),
        ease: 'none',
        scrollTrigger: {
            trigger: '.services',
            pin: true,
            scrub: true,
            snap: 1 / (sections.length - 1),
            end: () => "+=" + document.querySelector(".horizontal_slide_boxes").offsetWidth
        }
    });
});


// model slider
$(document).ready(function () {
  var $slider = $(".model_slider");
  var $progressBar = $(".progress");
  var $progressBarLabel = $(".slider__label");

  $slider.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
    var calc = (nextSlide / (slick.slideCount - 1)) * 100;
    $progressBar
      .css("background-size", calc + "% 100%")
      .attr("aria-valuenow", calc);

    $progressBarLabel.text(calc + "% completed");
  });

  $slider.slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    speed: 400,
    arrows:false,
    centerMode:false,
    dots:false,
    infinite:true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
  });
  $(".prev-btn").click(function () {
		$(".model_slider").slick("slickPrev");
	});

	$(".next-btn").click(function () {
		$(".model_slider").slick("slickNext");
	});
	$(".prev-btn").addClass("slick-disabled");
	$(".model_slider").on("afterChange", function () {
		if ($(".slick-prev").hasClass("slick-disabled")) {
			$(".prev-btn").addClass("slick-disabled");
		} else {
			$(".prev-btn").removeClass("slick-disabled");
		}
		if ($(".slick-next").hasClass("slick-disabled")) {
			$(".next-btn").addClass("slick-disabled");
		} else {
			$(".next-btn").removeClass("slick-disabled");
		}
	});
});

// rol slider
class Alpha {
  constructor() {
    this.container = document.querySelector(".alphaer");
    this.slides = this.container.querySelectorAll(".alpha");
    this.active = 0;
    this.activeElement = this.slides[this.active];
    console.log(this.activeElement);

    this.next = this.next.bind(this);
    this.prev = this.prev.bind(this);
    this.setAlpha = this.setAlpha.bind(this);

    this.setAlpha();
  }

  setAlpha() {
    this.activeElement.classList.remove("active");
    this.activeElement = this.slides[this.active];
    this.activeElement.classList.add("active");

    let i = this.slides.length - this.active;
    this.slides.forEach((slide, index) => {
      if (index === this.active) {
        i = 0;
      }
      if (i === this.slides.length - 1) {
        slide.style.transitionDelay = "0ms";
      } else {
        slide.style.transitionDelay = "";
      }
      slide.setAttribute("data-alpha", i);
      i++;
    });
  }

  next() {
    if (this.active === this.slides.length - 1) {
      this.active = 0;
    } else {
      this.active++;
    }
    this.setAlpha();
  }

  prev() {
    if (this.active === 0) {
      this.active = this.slides.length - 1;
    } else {
      this.active--;
    }
    this.setAlpha();
  }
}

const alpha1 = new Alpha();
document.querySelector(".alphanext").onclick = alpha1.next;
document.querySelector(".alphaback").onclick = alpha1.prev;
document.querySelector(".alphas").onclick = alpha1.next;

class Beta {
  constructor() {
    this.container = document.querySelector(".betaer");
    this.slides = this.container.querySelectorAll(".beta");
    this.active = 0;
    this.activeElement = this.slides[this.active];
    console.log(this.activeElement);

    this.next = this.next.bind(this);
    this.prev = this.prev.bind(this);
    this.setBeta = this.setBeta.bind(this);

    this.setBeta();
  }

  setBeta() {
    this.activeElement.classList.remove("active");
    this.activeElement = this.slides[this.active];
    this.activeElement.classList.add("active");

    let i = this.slides.length - this.active;
    this.slides.forEach((slide, index) => {
      if (index === this.active) {
        i = 0;
      }
      if (i === this.slides.length - 1) {
        slide.style.transitionDelay = "0ms";
      } else {
        slide.style.transitionDelay = "";
      }
      slide.setAttribute("data-beta", i);
      i++;
    });
  }

  next() {
    if (this.active === this.slides.length - 1) {
      this.active = 0;
    } else {
      this.active++;
    }
    this.setBeta();
  }

  prev() {
    if (this.active === 0) {
      this.active = this.slides.length - 1;
    } else {
      this.active--;
    }
    this.setBeta();
  }
}

const beta1 = new Beta();
document.querySelector(".betanext").onclick = beta1.next;
document.querySelector(".betaback").onclick = beta1.prev;
document.querySelector(".betas").onclick = beta1.next;







 
 






























