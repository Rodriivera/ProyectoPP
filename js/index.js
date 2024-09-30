
// carrusel

const carousel = document.querySelector('.carousel-inner');
let currentIndex = 0;

function nextSlide() {
    currentIndex = (currentIndex + 1) % 3;
    carousel.style.transform = `translateX(-${currentIndex * 33.33}%)`;
}

setInterval(nextSlide, 4500); 

// fin carrusel






var swiper = new Swiper('.swiper', {
    slidesPerView: 6,
    spaceBetween: 10,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

     // Aquí añades los breakpoints
breakpoints: {
  // Cuando la ventana sea <= 1024px
  1024: {
    slidesPerView: 6, // Mostrará 4 slides
    spaceBetween: 10,
  },
  // Cuando la ventana sea <= 768px
  768: {
    slidesPerView: 4, // Mostrará 2 slides
    spaceBetween: 10,
  },
  // Cuando la ventana sea <= 480px
  480: {
    slidesPerView: 2, // Mostrará 1 slide
    spaceBetween: 5,
  },
  // Cuando la ventana sea <= 320px
  0: {
    slidesPerView: 2, // Mostrará 1 slide
    spaceBetween: 5,
  }
}
  });
