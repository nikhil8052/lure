$(document).ready(function(){
  $(".ripple").ripples({
    resolution: 512,
    dropRadius: 20,
    perturbance: 0.04,
  });
});

$(window).scroll(function(){
  if ($(this).scrollTop() > 300) {
     $('.site_header').addClass('fix_header');
  } else {
     $('.site_header').removeClass('fix_header');
  }
});

// stepo form
document.addEventListener('DOMContentLoaded', function () {
  const nextBtns = document.querySelectorAll('.next-btn');
  const prevBtns = document.querySelectorAll('.prev-btn');
  const formSteps = document.querySelectorAll('.form-step');
  let formStepIndex = 0;

  const updateFormStep = (action) => {
    if (action) {
      formSteps[formStepIndex].classList.remove('active');
      formStepIndex++;
      formSteps[formStepIndex].classList.add('active');
    }
  };

  const validateStep1 = () => {
    const checkedValue = document.querySelectorAll('input[name="application"]:checked');
    return checkedValue.length > 0;
  };

  const validateStep2 = async () => {
    const fullName = document.getElementById('full-name');
    const email = document.getElementById('email');
    const nameErrorSpan = document.getElementById('name-error');
    const emailErrorSpan = document.getElementById('email-error');

    const isFullName = fullName.value.trim() !== '';
    const isEmail = validateEmail(email.value.trim());
    let isRegisteredEmail = false;

    if (isFullName) {
      fullName.classList.remove('error');
    } else {
      fullName.classList.add('error');
    }

    if (isEmail) {
      email.classList.remove('error');
      isRegisteredEmail = await registeredEmail(email.value.trim(), 'apply'); // Wait for the response
    } else {
      email.classList.add('error');
    }

    return isFullName && isEmail && isRegisteredEmail;
  };

  const validateStep3 = () => {
    const contactMethod = document.getElementById('contact-method-select');
    const instaAccount = document.getElementById('instagram');
    const method = contactMethod.value.trim();

    if (!method) {
      contactMethod.classList.add('error');
      return false;
    }

    const contactValue = document.getElementById(method);
    const isContactValue = contactValue.value.trim() !== '';
    let isValid = false;

    if (isContactValue) {
      if (method === 'cemail') {
        isValid = validateEmail(contactValue.value.trim());
      } else if (method === 'number') {
        isValid = validateNumber(contactValue.value.trim());
      } else {
        isValid = true;
      }
    }

    if (!isValid) {
      contactValue.classList.add('error');
    }

    const isInstaAccount = instaAccount.value.trim() !== '';
    if (!isInstaAccount) {
      instaAccount.classList.add('error');
    } else {
      instaAccount.classList.remove('error');
    }

    return isContactValue && isValid && isInstaAccount;
  };

  const validateStep4 = () => {
    const travelRadioBtn = document.querySelectorAll('input[name="travel"]:checked');
    return travelRadioBtn.length > 0;
  };

  const sendMail = () => {
    return new Promise((resolve, reject) => {
      const form = document.querySelector('#applyform');
      const formData = new FormData(form);
      const url = form.getAttribute('data-url');

      const xhr = new XMLHttpRequest();
      xhr.open('POST', url, true);

      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
          resolve(true);
        } else {
          reject(false);
        }
      };

      xhr.onerror = function () {
        reject(false);
      };

      xhr.send(formData);
    });
  };

  const registeredEmail = async (email, action) => {
    const form = document.querySelector('#applyform');
    const checkMailUrl = form.getAttribute('data-checkmail-url');

    try {
      const response = await fetch(checkMailUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email, validatefor: action })
      });

      if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
      }

      const data = await response.json();
      if (data.success) {
        document.querySelector('#email-error').style.display = 'none';
        return true;
      } else {
        document.querySelector('#email-error').style.display = '';
        return false;
      }
    } catch (error) {
      console.error('There has been a problem with your fetch operation:', error);
      return false;
    }
  };

  const validateEmail = (email) => {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
  };

  const validateNumber = (phoneNumber) => {
    const re = /^\d{10}$/;
    return re.test(phoneNumber);
  };

  nextBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
      let action = false;

      if (formStepIndex === 0) {
        action = validateStep1();
      } else if (formStepIndex === 1) {
        action = await validateStep2();  
      } else if (formStepIndex === 2) {
        action = validateStep3();
      } else if (formStepIndex === 3) {
        if (validateStep4()) {
          nextBtns.forEach(function(button) {
              button.disabled = true;
          });
          prevBtns.forEach(function(button) {
            button.disabled = true;
          });
          action = await sendMail();  
        }
      }

      updateFormStep(action);
    });
  });

  prevBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      formSteps[formStepIndex].classList.remove('active');
      formStepIndex--;
      formSteps[formStepIndex].classList.add('active');
    });
  });
});

submitBtn = document.querySelector('#submitBtn');
if(submitBtn) {
  submitBtn.addEventListener('click', () => {
      formSteps[formStepIndex].classList.remove('active');
      loadingScreen.classList.add('active');
  });
}


 

// horizontal scroll with mouse start
let lastScrollTop = 0;
let scrollAmount = 0;
let isInView = false;
// Function to handle scrolling
function handleScroll() {
    if (isInView) {
        var element = document.querySelector('.horizontal_scroll_element');
        if (element) {
          let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
          // Calculate scroll amount
          scrollAmount += scrollTop - lastScrollTop;
          // Adjust transform property based on scroll amount
          element.style.transform = `translateX(${100 - scrollAmount}px)`;
          lastScrollTop = scrollTop;
      }
    }
}
// Intersection Observer callback
function onIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            isInView = true;
            lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
        } else {
            isInView = false;
        }
    });
}
// Create Intersection Observer
let observer = new IntersectionObserver(onIntersection, {
    root: null,
    threshold: 1.0 // Trigger when the bottom of the element is in view
});
// Observe the shedule_block
observerElement = document.querySelector('.horizontal_scroll_wrapper');
if(observerElement) {
  observer.observe(observerElement);

  // Listen for scroll events
  window.addEventListener('scroll', handleScroll);
  document.querySelector('.horizontal_scroll_wrapper').addEventListener('mouseenter', function() {
      document.querySelector('.horizontal_scroll_element').style.transition = 'none'; // Pause transition
  });
  document.querySelector('.horizontal_scroll_wrapper').addEventListener('mouseleave', function() {
      document.querySelector('.horizontal_scroll_element').style.transition = 'transform 0.5s ease-in-out'; // Resume transition
  });
}




// horizontal scroll with mouse end

// marquee
var elements = $(".marquee-item-list .lemon_cont2").length;
for (var i = 0; i < elements; i++) {
  $(".marquee-item-list").clone().prependTo(".marquee-block");
}
var liEle = [];
var liEle = $(".marquee-item-list .lemon_cont2");


// live strteam
// live strteam
document.addEventListener("DOMContentLoaded", () => {
  function counter(id, start, end, duration) {
    let obj = document.getElementById(id);
    
    // Check if obj exists before proceeding
    if (!obj) {
      // console.error(`Element with id "${id}" not found.`);
      return;
    }

    let current = start,
        range = end - start,
        increment = end > start ? 1 : -1,
        step = Math.abs(Math.floor(duration / range)),
        timer;

    function startCounter() {
      current = start;
      timer = setInterval(() => {
        current += increment;
        obj.textContent = current;
        if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
          clearInterval(timer); // Stop the interval when the target value is reached
          setTimeout(startCounter, 1000); // Add delay before restarting the counter
        }
      }, step);
    }

    startCounter(); // Initial start
  }

  // Call counter function only if the elements exist
  if (document.getElementById("viewerCount_less")) {
    counter("viewerCount_less", 650, 950, 10000); // Slower animation for viewerCount_less
  }

  if (document.getElementById("viewerCount_more")) {
    counter("viewerCount_more", 3500, 4500, 30000); // Slower animation for viewerCount_more
  }
});

// hearet animation
function createHeart() {
  const heartContainer = document.querySelector('.heart_container');
  if (!heartContainer) return; // Exit if element not found
  const heart = document.createElement('i');
  heart.classList.add('fa-solid', 'fa-heart', 'heart');
  heart.style.left = `${Math.random() * 50}px`; // Random horizontal position
  heartContainer.appendChild(heart);

  setTimeout(() => {
    heart.remove();
  }, 3000); // Remove the heart after 3 seconds
}

// Set interval to create a new heart every 500ms
setInterval(createHeart, 500);

// Function to create hearts in heart_container_more
function createHeartmore() {
  const heartContainermore = document.querySelector('.heart_container_more');
  if (!heartContainermore) return; // Exit if element not found
  const heartmore = document.createElement('i');
  heartmore.classList.add('fa-solid', 'fa-heart', 'heartmore');
  heartmore.style.left = `${Math.random() * 50}px`; // Random horizontal position
  heartContainermore.appendChild(heartmore);

  setTimeout(() => {
    heartmore.remove();
  }, 3000); // Remove the heart after 3 seconds
}

// Set interval to create a new heart every 100ms
setInterval(createHeartmore, 100);

// before after sectiion

// document.addEventListener('DOMContentLoaded', function () {
//   const beforeBtn = document.querySelector('.before_btn');
//   const afterBtn = document.querySelector('.after_btn');
//   const lotieImage = document.querySelector('.lotie_abs');
//   const followerValue = document.querySelector('.follower_value');
  
//   // Exit if any element is not found
//   if (!beforeBtn || !afterBtn || !lotieImage || !followerValue) return;

//   // Save the initial follower value
//   const initialFollowerValue = followerValue.textContent.trim();

//   beforeBtn.addEventListener('click', function () {
//     beforeBtn.classList.add('active');
//     afterBtn.classList.remove('active');
//     lotieImage.classList.remove('open_image');
//     followerValue.classList.remove('active');
//     followerValue.textContent = initialFollowerValue; // Revert to initial value
//   });

//   afterBtn.addEventListener('click', function () {
//     afterBtn.classList.add('active');
//     beforeBtn.classList.remove('active');
//     lotieImage.classList.add('open_image');
//     followerValue.classList.add('active');
//     increaseFollowers(followerValue); // Increase the follower value
//   });

//   function increaseFollowers(element) {
//     let currentFollowers = parseInt(element.textContent.replace(/,/g, ''), 10);
//     let newFollowers = currentFollowers + Math.floor(Math.random() * 1000) + 1; // Random increase
//     element.textContent = newFollowers.toLocaleString();
//   }
// });


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

$('.mobile_services').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  pauseOnHover: true,
  arrows:false,
  dots:false,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
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
    if(changebox) {
      changebox.style.height = `${spans[0].offsetHeight}px`;
    }

    setInterval(changeText, 2000); // Change text every 2 seconds
});

document.addEventListener('DOMContentLoaded', () => {
    gsap.registerPlugin(ScrollTrigger);

    // Horizontal scrolling
    horizontal_slide_boxes = document.querySelector(".horizontal_slide_boxes");
    if(horizontal_slide_boxes) {
      const sections = gsap.utils.toArray('.scroll_left');
      gsap.to(sections, {
          xPercent: -100 * (sections.length - 1),
          ease: 'none',
          scrollTrigger: {
              trigger: '.services',
              pin: true,
              scrub: true,
              snap: 1 / (sections.length - 1),
              end: () => "+=" + horizontal_slide_boxes.offsetWidth
          }
      });
    }
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
    arrows:false,
    centerMode:false,
    dots:false,
    infinite:true,
    speed: 5000,
		autoplay: true,
		autoplaySpeed: 0,
		cssEase: 'linear',
    swipeToSlide: true,
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
		$(".slick-slider").slick("slickPrev");
	});

	$(".next-btn").click(function () {
		$(".slick-slider").slick("slickNext");
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













 
 






























