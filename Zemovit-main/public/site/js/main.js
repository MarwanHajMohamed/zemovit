// تسجيل ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

// تهيئة Lenis للتمرير السلس
const lenis = new Lenis();

lenis.on("scroll", () => {
  ScrollTrigger.update();
});

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

// معالجة تحميل الصفحة
document.addEventListener("DOMContentLoaded", function () {
  // إخفاء شاشة التحميل
  const preloader = document.querySelector(".preLoader");
  if (preloader) {
    setTimeout(() => {
      preloader.style.display = "none";
    }, 1000);
  }
});

window.addEventListener("load", () => {
  animateSplitText();
  animateSplitLines();
  animateImages();
  animateFadeIn();
});

// 👇 This is the  preloader animation

// 👇 This function sets up the SplitText animation
function animateSplitText() {
  const splitElements = document.querySelectorAll(".split-text");

  splitElements.forEach((el) => {
    const split = new SplitText(el, { type: "lines,words" });

    gsap.from(split.words, {
      opacity: 0,
      x: 20,
      stagger: 0.05,
      duration: 1,
      delay: 0.3,
      ease: "power3.out",
      autoAlpha: 0,
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
        end: "top 40%",
        toggleActions: "play none none none",
        markers: false, // Set to true for debugging
      },
    });
  });
}
// 👇 This function sets up the SplitText animation
function animateSplitLines() {
  const splitElements = document.querySelectorAll(".split-lines");

  splitElements.forEach((el) => {
    const split = new SplitText(el, { type: "lines" });

    gsap.from(split.lines, {
      opacity: 0,
      x: 20,
      stagger: 0.05,
      duration: 1,
      delay: 0.3,
      ease: "power3.out",
      autoAlpha: 0,
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
        end: "top 40%",
        toggleActions: "play none none none",
        markers: false, // Set to true for debugging
      },
    });
  });
}
function animateImages() {
  gsap.utils.toArray(".imgDownUp").forEach((img) => {
    gsap.to(img, {
      opacity: 1,
      clipPath: "inset(0 0 0 0)",
      y: 0,
      duration: 0.7,
      ease: "cubic-bezier(0.645, 0.045, 0.355, 1)",
      scrollTrigger: {
        trigger: img,
        start: "top 80%",
        toggleActions: "play none none none",
      },
    });
  });

  gsap.utils.toArray(".imgUpDown").forEach((img) => {
    gsap.to(img, {
      opacity: 1,
      clipPath: "inset(0 0 0 0)",
      y: 0,
      duration: 0.7,
      ease: "cubic-bezier(0.645, 0.045, 0.355, 1)",
      scrollTrigger: {
        trigger: img,
        start: "top 80%",
        toggleActions: "play none none none",
      },
    });
  });
}

function animateFadeIn() {
  gsap.utils.toArray(".fadeIn").forEach((fade) => {
    gsap.fromTo(
      fade,
      { opacity: 0, y: 50 },
      {
        opacity: 1,
        y: 0,
        duration: 0.9,
        scrollTrigger: {
          trigger: fade,
          start: "top 90%",
          end: "bottom center",
          toggleActions: "play none none none",
          // markers: true // Remove this after debugging
        },
      }
    );
  });
}

// تهيئة FAQ
const initFAQ = () => {
  const faqItems = document.querySelectorAll(".faq-item");

  if (!faqItems.length) return; // التحقق من وجود العناصر

  faqItems.forEach((item) => {
    const question = item.querySelector(".faq-question");

    if (!question) return; // التحقق من وجود السؤال

    question.addEventListener("click", () => {
      const currentlyActive = document.querySelector(".faq-item.active");

      if (currentlyActive && currentlyActive !== item) {
        currentlyActive.classList.remove("active");
      }

      item.classList.toggle("active");
    });
  });
};

// استدعاء الدالة بعد تحميل DOM
document.addEventListener("DOMContentLoaded", initFAQ);

// =============
window.addEventListener("scroll", function() {
  let scrollPosition = window.scrollY;
  let header = document.querySelector("header");
  let body = document.querySelector("body");
  let padding = header.offsetHeight;
  if(scrollPosition >= 120){
    header.classList.add("scroll");
    body.style.paddingTop = `${padding}px`;
  }else{
    header.classList.remove("scroll");
    body.style.paddingTop = "0";
  }

})

// test




// ScrollTrigger.create({
//   trigger: ".pin",
//   start: "top top",
//   endTrigger: "#expand-trigger",
//   end: "bottom bottom",
//   pin: true,
//   pinSpacing: false,
//   // markers: true,
// });

// ScrollTrigger.create({
//   trigger: "#About",
//   start: "top top",
//   endTrigger: "#expand-trigger",
//   end: "bottom bottom",
//   pin: true,
//   pinSpacing: false,
//   // markers: true,
// });

// ScrollTrigger.create({
//   trigger: ".pin",
//   start: "top top",
//   endTrigger: "#About",
//   end: "bottom bottom",
//   scrub: 1,
//   onUpdate: (self) => {
//     const progress = self.progress;
//     let clipPath = `polygon(
//       ${50 - progress * 50}% 0%, 
//       ${50 + progress * 50}% 0%, 
//       100% ${50 - progress * 50}%, 
//       100% ${50 + progress * 50}%, 
//       ${50 + progress * 50}% 100%, 
//       ${50 - progress * 50}% 100%, 
//       0% ${50 + progress * 50}%, 
//       0% ${50 - progress * 50}%
//     )`;
//     if (progress >= .7) {
//       // تغيير theme بعد تكبير الكرة
//       document.querySelector(".ball").classList.add("changeColor");
//     } else {
//       document.querySelector(".ball").classList.remove("changeColor");
//     }
//     gsap.to(".ball", { clipPath });
//   },
// });
// ScrollTrigger.create({
//   trigger: "#About",
//   start: "top top",
//   endTrigger: "#expand-trigger",
//   end: "bottom+=20 bottom",
//   // scrub: 1,
//   onUpdate: (self) => {
//     const progress = self.progress;
//     const scale = 1 + 21.5 * progress;
//     gsap.to(".ball", { scale });

//   },
// });
// ScrollTrigger.create({
//   trigger: "#About",
//   start: "top top",
//   endTrigger: "#expand-trigger",
//   end: "bottom+=10 78%",
//   // scrub: 1,
//   onUpdate: (self) => {
//     const progress = self.progress;
//     const websiteContent = document.querySelector(".websiteContent");

//     if (progress >= 1) {
//       // تغيير theme بعد تكبير الكرة
//       document.documentElement.setAttribute("data-theme", "dark");
//     } else {
//       document.documentElement.setAttribute("data-theme", "light");
//     }

//     if (progress >= 0.8 && websiteContent) {
//       // إضافة class على why section
//       websiteContent.classList.add("visible");
//     } else if (websiteContent) {
//       websiteContent.classList.remove("visible");
//     }
//   },
// });



// تنظيم ScrollTrigger Animations مع معالجة الأخطاء وتسلسل الأحداث

// 1. Pin Elements (تثبيت العناصر)
// const pinElements = () => {
//   // تثبيت العنصر الرئيسي
//   ScrollTrigger.create({
//     trigger: ".pin",
//     start: "top top",
//     endTrigger: "#expand-trigger",
//     end: "bottom bottom",
//     pin: true,
//     pinSpacing: false,
//     id: "pin-main",
//     // markers: true,
//   });

//   // تثبيت قسم About
//   ScrollTrigger.create({
//     trigger: "#About",
//     start: "top top", 
//     endTrigger: "#expand-trigger",
//     end: "bottom bottom",
//     pin: true,
//     pinSpacing: false,
//     id: "pin-about",
//     // markers: true,
//   });
// };

// // 2. Ball Shape Animation (تحريك شكل الكرة)
// const ballShapeAnimation = () => {
//   ScrollTrigger.create({
//     trigger: ".pin",
//     start: "top top",
//     endTrigger: "#About", 
//     end: "bottom bottom",
//     scrub: 1,
//     id: "ball-shape",
//     onUpdate: (self) => {
//       try {
//         const progress = self.progress;
//         const ballElement = document.querySelector(".ball");
        
//         if (!ballElement) {
//           console.warn("Ball element not found");
//           return;
//         }
//         if (progress === 0) {
//           gsap.to(ballElement, {
//             clipPath: "circle(50% at 50% 50%)",
//             zIndex: 1,
//             duration: 0.1,

//           ease: "none"
//           });
         
//           return;
//         }
//         // إنشاء clip-path للشكل المضلع
//         const clipPath = `polygon(
//           ${50 - progress * 50}% 0%, 
//           ${50 + progress * 50}% 0%, 
//           100% ${50 - progress * 50}%, 
//           100% ${50 + progress * 50}%, 
//           ${50 + progress * 50}% 100%, 
//           ${50 - progress * 50}% 100%, 
//           0% ${50 + progress * 50}%, 
//           0% ${50 - progress * 50}%
//         )`;

//         // تطبيق التحريك
//         gsap.to(".ball", { 
//           clipPath,
//           duration: 0.1,
//           ease: "none"
//         });
        
//         // تغيير اللون عند الوصول إلى 70%
//         if (progress >= 0.7) {
//           ballElement.classList.add("changeColor");
//         } else {
//           ballElement.classList.remove("changeColor");
//         }
//       } catch (error) {
//         console.error("Error in ball shape animation:", error);
//       }
//     },
//   });
// };

// // 3. Ball Scale Animation (تكبير الكرة)
// const ballScaleAnimation = () => {
//   ScrollTrigger.create({
//     trigger: "#About",
//     start: "top top",
//     endTrigger: "#expand-trigger", 
//     end: "bottom+=20 bottom",
//     scrub: 1, // إضافة scrub للحصول على تحريك سلس
//     id: "ball-scale",
//     onUpdate: (self) => {
//       try {
//         const progress = self.progress;
//         const scale = 1 + 21.5 * progress;
        
//         const ballElement = document.querySelector(".ball");
//         if (!ballElement) {
//           console.warn("Ball element not found for scaling");
//           return;
//         }

//         gsap.to(".ball", { 
//           scale,
//           zIndex: -1,
//           // x: "-50%",
//           // y: "-50%", // إضافة y للتوسيط الكامل
//           duration: 0.1,
//           ease: "none"
//         });
//       } catch (error) {
//         console.error("Error in ball scale animation:", error);
//       }
//     },
//   });
// };

// // 4. Theme and Content Animation (تغيير الثيم والمحتوى)
// const themeAndContentAnimation = () => {
//   ScrollTrigger.create({
//     trigger: "#About",
//     start: "top top",
//     endTrigger: "#expand-trigger",
//     end: "bottom+=10 78%",
//     scrub: 1, // إضافة scrub للتحريك السلس
//     id: "theme-content",
//     onUpdate: (self) => {
//       try {
//         const progress = self.progress;
//         const websiteContent = document.querySelector(".websiteContent");
//         const documentElement = document.documentElement;

//         // تغيير الثيم
//         if (progress >= 0.5) {
//           documentElement.setAttribute("data-theme", "dark");
//         } else {
//           documentElement.setAttribute("data-theme", "light");
//         }

//         // إظهار/إخفاء المحتوى
//         if (websiteContent) {
//           if (progress >= 0.7) {
//             websiteContent.classList.add("visible");
//           } else {
//             websiteContent.classList.remove("visible");
//           }
//         } else {
//           console.warn("Website content element not found");
//         }
//       } catch (error) {
//         console.error("Error in theme and content animation:", error);
//       }
//     },
//   });
// };

// // 5. تهيئة جميع الانيميشنز بالتسلسل الصحيح
// const initScrollAnimations = () => {
//   // التأكد من تحميل GSAP و ScrollTrigger
//   if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
//     console.error("GSAP or ScrollTrigger not loaded");
//     return;
//   }

//   // تسجيل ScrollTrigger
//   gsap.registerPlugin(ScrollTrigger);

//   // تنفيذ الانيميشنز بالترتيب
//   try {
//     pinElements();           // 1. تثبيت العناصر أولاً
//     ballShapeAnimation();    // 2. تحريك شكل الكرة
//     ballScaleAnimation();    // 3. تكبير الكرة  
//     themeAndContentAnimation(); // 4. تغيير الثيم والمحتوى

//     console.log("ScrollTrigger animations initialized successfully");
//   } catch (error) {
//     console.error("Error initializing scroll animations:", error);
//   }
// };

// // 6. تنظيف الانيميشنز (إضافة اختيارية)
// const cleanupAnimations = () => {
//   ScrollTrigger.getAll().forEach(trigger => {
//     if (["pin-main", "pin-about", "ball-shape", "ball-scale", "theme-content"].includes(trigger.vars.id)) {
//       trigger.kill();
//     }
//   });
// };

// // 7. إعادة تحديث الانيميشنز عند تغيير حجم الشاشة
// const handleResize = () => {
//   ScrollTrigger.refresh();
// };

// تهيئة الكود عند تحميل الصفحة
// document.addEventListener('DOMContentLoaded', initScrollAnimations);

// إعادة تحديث عند تغيير حجم الشاشة
// window.addEventListener('resize', handleResize);




let mobileList = document.querySelector("#mobileList")
let openMenu = document.querySelector("#openMenu")
let closeMenu = document.querySelector("#closeMenu")
openMenu.addEventListener("click", (event) => {
  if (mobileList.matches(':popover-open')) mobileList.showPopover();
  mobileList.classList.add('active')
});
closeMenu.addEventListener("click", (event) => {
  mobileList.classList.remove('active')
  if (mobileList.matches(':popover-open')) mobileList.hidePopover();
});
