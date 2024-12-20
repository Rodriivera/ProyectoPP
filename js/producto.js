function toggleContent() {
  const content = document.getElementById("content");
  const arrow = document.getElementById("arrow");

  if (content.classList.contains("hidden")) {
      content.classList.remove("hidden");
      content.classList.add("visible");
      arrow.classList.add("arrow-rotate"); // Añadir clase para rotar el icono
  } else {
      content.classList.remove("visible");
      content.classList.add("hidden");
      arrow.classList.remove("arrow-rotate"); // Quitar clase para volver a la posición original
      arrow.classList.add("arrow-default");
  }
}

  











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

    

      // Mostrar elementos ocultos al aparecer en pantalla

  const hiddenElements = document.querySelectorAll('.hiddenn');

  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              entry.target.classList.remove('hiddenn');
              entry.target.classList.add('show');
          }
      });
  });
  
  hiddenElements.forEach(element => {
      observer.observe(element);
  });
  
  // fin mostrar elementos ocultos al aparecer en pantalla