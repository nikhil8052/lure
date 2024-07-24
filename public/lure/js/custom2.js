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

// stepo form

document.addEventListener('DOMContentLoaded', function () {
  const nextBtns = document.querySelectorAll('.next-btn');
  const prevBtns = document.querySelectorAll('.prev-btn');
  const formSteps = document.querySelectorAll('.form-step');
  let formStepIndex = 0;

  nextBtns.forEach(btn => {
      btn.addEventListener('click', () => {

        if(formStepIndex == 0) {
          const validate = () => {
            const checkedValue = document.querySelectorAll('input[name="application"]:checked');
            return checkedValue.length ? true : false;
          }
          action = validate();

        } else if(formStepIndex == 1) {
          const validateInput = () => {
              const full_name =  document.getElementById('full-name');
              const email =  document.getElementById('email');
              const nameErrorSpan = document.getElementById('name-error');
              const emailErrorSpan = document.getElementById('email-error');
              const IsfullName = () => {
                return full_name.value ? true : false;
              }

              if(!IsfullName()) {
                full_name.classList.add('error');
              } else {
                full_name.classList.remove('error');
              }

              const isEmail = () => {
                return email.value ? true : false;
              }
              isValidEmail = false;
              if(isEmail()) {
                isValidEmail = validateEmail(email.value);
              } else {
                isValidEmail = false;
              }

              if(!isValidEmail) {
                email.classList.add('error');
              } else {
                email.classList.remove('error');
              }

              if(IsfullName() && isEmail() && isValidEmail) {
                return true;
              } else {
                return false;
              }
          }
          action = validateInput();

        } else if(formStepIndex == 2) {

          const validateContact = () => {
            const contact_method =  document.getElementById('contact-method-select');
            const insta_account =  document.getElementById('instagram');

            const method = () =>{
              return contact_method.value ? contact_method.value : null;
            }
            if(method() != null) {
              email.classList.remove('error');
              const contact_value = document.getElementById(method());

              const Iscontact_value = () => {
                return contact_value.value ? true : false;
              }
              isValid = false;
              if(Iscontact_value()) {
                if(contact_method.value == 'cemail') {  
                  isValid = validateEmail(contact_value.value);
                } else if(contact_method.value == 'number'){
                  isValid = validatenumber(contact_value.value);
                } else {
                  isValid = true;
                }
              }

              if(!isValid) {
                contact_value.classList.add('error');
              }

              const isInsta_account = () => {
                return insta_account.value ? true : false;
              }

              if(!isInsta_account()){
                insta_account.classList.add('error');
              } else {
                insta_account.classList.remove('error');
              }

              if(Iscontact_value() && isInsta_account() && isValid) {
                return true;
              } else {
                return false;
              }
            } else {
              contact_method.classList.add('error');
              return false;
            }
          }
          action = validateContact();

        } else if(formStepIndex == 3) {
          travelradiobtn= document.querySelectorAll('input[name="travel"]');
          var checkedtravel_value;
          travelradiobtn.forEach(function(tradiobtn) {
              if (tradiobtn.checked) {
                checkedtravel_value = tradiobtn.value;
              }
          });
          const validate = () => {
            const checkedValue = document.querySelectorAll('input[name="travel"]:checked');
            return checkedValue.length ? true : false;
          }
          
           const sendMail = () => {
            return new Promise((resolve, reject) => {
              const form = document.querySelector('#applyform');
              const formData = new FormData(form);
              url = form.getAttribute('data-url');

              let xhr = new XMLHttpRequest();
              xhr.open('POST', url, true);

              xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                  resolve(true);
                } else {
                  reject(false);
                }
              };
              xhr.onerror = function() {
                reject(false);
              };
              xhr.send(formData);
            });
          }
          if (validate()) {
            sendMail().then((result) => {
              action = result;
            }).catch((error) => {
              action = error;
            });
          } else {
            action = false;
          }
        }
        if(action) {
          formSteps[formStepIndex].classList.remove('active');
          formStepIndex++;
          formSteps[formStepIndex].classList.add('active');
        } 
      });
  });

  prevBtns.forEach(btn => {
      btn.addEventListener('click', () => {
          formSteps[formStepIndex].classList.remove('active');
          formStepIndex--;
          formSteps[formStepIndex].classList.add('active');
      });
  });

  // submitBtn.addEventListener('click', () => {
  //     formSteps[formStepIndex].classList.remove('active');
  //     loadingScreen.classList.add('active');
  // });

  const validateEmail = (email) => {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
  };

  const validatenumber = (phoneNumber) => {
    const re = /^\d{10}$/;
    return re.test(phoneNumber);
  };
});


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
    counter("viewerCount_less", 100, 200, 10000); // Slower animation for viewerCount_less
  }

  if (document.getElementById("viewerCount_more")) {
    counter("viewerCount_more", 2000, 5000, 30000); // Slower animation for viewerCount_more
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

document.addEventListener('DOMContentLoaded', function () {
  const beforeBtn = document.querySelector('.before_btn');
  const afterBtn = document.querySelector('.after_btn');
  const lotieImage = document.querySelector('.lotie_abs');
  const followerValue = document.querySelector('.follower_value');
  
  // Exit if any element is not found
  if (!beforeBtn || !afterBtn || !lotieImage || !followerValue) return;

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

  $('.mobile_services').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    pauseOnHover: true,
    arrows:false,
    dots:false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
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

// rol slider
class Alpha {
  constructor() {
    this.container = document.querySelector(".alphaer");
    this.slides = this.container.querySelectorAll(".alpha");
    this.active = 0;
    this.activeElement = this.slides[this.active];

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

