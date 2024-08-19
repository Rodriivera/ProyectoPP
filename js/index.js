// carrusel

const carousel = document.querySelector('.carousel-inner');
let currentIndex = 0;

function nextSlide() {
    currentIndex = (currentIndex + 1) % 3;
    carousel.style.transform = `translateX(-${currentIndex * 33.33}%)`;
}

setInterval(nextSlide, 3000); 

// fin carrusel

// productos slider



// fin productos slider