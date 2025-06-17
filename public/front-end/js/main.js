
window.onscroll = function () { myFunction() };

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
   if (window.pageYOffset > sticky) {
      header.classList.add("sticky");

   } else {
      header.classList.remove("sticky");
   }
}

var swiper = new Swiper(".swiper-main", {
   loop: true, // Optional: Loop through the slides
   pagination: {
       el: '.swiper-pagination',
       clickable: true,
   },
   navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
   },
});

var swiper = new Swiper(".swiper-logo", {


   autoplay: {
      delay: 2500,
      disableOnInteraction: false,
   },


   // Navigation arrows
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },

   breakpoints: {
      0: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 3, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 5, // 4 slides for screen widths >= 1024px
      }
   }
});

var swiper = new Swiper(".swiper-newarrival", {


   // autoplay: {
   //    delay: 2500,
   //    disableOnInteraction: false,
   // },


   // Navigation arrows
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },

   breakpoints: {
      0: {
         slidesPerView: 2, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 4, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 4, // 4 slides for screen widths >= 1024px
      }
   }
});

var swiper = new Swiper(".popular-products", {


   // autoplay: {
   //    delay: 2500,
   //    disableOnInteraction: false,
   // },


   // Navigation arrows
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 4, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 4, // 4 slides for screen widths >= 1024px
      }
   }
});

var swiper = new Swiper(".popular-products", {


   // autoplay: {
   //    delay: 2500,
   //    disableOnInteraction: false,
   // },


   // Navigation arrows
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 4, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 4, // 4 slides for screen widths >= 1024px
      }
   }
});

var swiper = new Swiper(".youtube-gallery", {


   // autoplay: {
   //    delay: 2500,
   //    disableOnInteraction: false,
   // },


   // Navigation arrows
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 4, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 4, // 4 slides for screen widths >= 1024px
      }
   }
});

var swiper = new Swiper(".instagram-gallery", {


   autoplay: {
      delay: 2500,
      disableOnInteraction: false,
   },


   // Navigation arrows
   navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
   },
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 3, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 4, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 4, // 4 slides for screen widths >= 1024px
      }
   }
});



//  ccccccccccc
var swiper = new Swiper(".testimonial", {

   loop: true, // Optional: Loop through the slides
   autoplay: {
      delay: 2500,
      disableOnInteraction: false,
   },

  
   pagination: {
       el: '.swiper-pagination',
       clickable: true,
   },
   navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
   },



   breakpoints: {
      0: {
         slidesPerView: 1, // 2 slides for screen widths >= 640px
      },
      640: {
         slidesPerView: 2, // 2 slides for screen widths >= 640px
      },
      768: {
         slidesPerView: 2, // 3 slides for screen widths >= 768px
      },
      1024: {
         slidesPerView: 2, // 4 slides for screen widths >= 1024px
      }
   }
});



//mobile sliding box
const menuBtn = document.getElementById("menu-btn");
const closeBtn = document.getElementById("close-btn");
const box = document.getElementById("menu-box");

menuBtn.addEventListener("click", () => {
   box.classList.add("active");
});

closeBtn.addEventListener("click", () => {
   box.classList.remove("active");
});




document.addEventListener("DOMContentLoaded", function () {
   document.querySelectorAll(".sub-categories").forEach(category => {
       category.addEventListener("click", function (event) {
           // Prevents closing when clicking inside the submenu
           if (event.target.closest(".sub-list-mobile")) return;

           // Toggle current submenu
           const isActive = this.classList.contains("active");

           // Close all submenus
           document.querySelectorAll(".sub-categories").forEach(item => {
               item.classList.remove("active");
           });

           // If it wasn't active before, activate it
           if (!isActive) {
               this.classList.add("active");
           }
       });
   });

   // Close submenu when clicking outside
   document.addEventListener("click", function (event) {
       if (!event.target.closest(".sub-categories")) {
           document.querySelectorAll(".sub-categories").forEach(item => {
               item.classList.remove("active");
           });
       }
   });
});


