
// carrusel

const carousel = document.querySelector('.carousel-inner');
let currentIndex = 0;

function nextSlide() {
    currentIndex = (currentIndex + 1) % 3;
    carousel.style.transform = `translateX(-${currentIndex * 33.33}%)`;
}

setInterval(nextSlide, 4500); 

// fin carrusel





// productos 

$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });


// fin productos 