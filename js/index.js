// barra de busqueda

let dropdownBtn = document.getElementById('drop-text');
let list = document.getElementById('list');
let icon= document.getElementById('icon');
let span = document.getElementById('span');
let input = document.getElementById('search-input'); 

let listItems = document.querySelectorAll('.dropdown-list-item');


// busqueda
document.querySelectorAll('.dropdown-list-item').forEach(item => {
    item.addEventListener('click', function() {
        document.getElementById('selected-category').value = this.textContent;
        document.getElementById('span').textContent = this.textContent;
    });
});
// fin busqueda





// Manejo de la selección del dropdown
document.querySelectorAll('.dropdown-list-item').forEach(item => {
    item.addEventListener('click', function() {
        document.getElementById('span').innerText = this.innerText;
        document.getElementById('selected-category').value = this.innerText;
    });
});

// fin obligar que seleccione una categoria




// mostrar dropdown al clickear

dropdownBtn.onclick = function(){
    
    // rotar icono
    if(list.classList.contains('show')){
    
        icon.style.rotate = '0deg';
    }else{
    icon.style.rotate = '-180deg';
    }      
    list.classList.toggle('show');
};

window.onclick = function(e) {
    if (
        e.target.id !== "drop-text" &&
        e.target.id !== "span" &&
         e.target.id !== "icon"
    ) {
        list.classList.remove('show');
        icon.style.rotate = '0deg';
    }

}

for (item of listItems){
    item.onclick = function(e){
        span.innerText = e.target.innerHTML;
        if(e.target.innerText == "Todo"){
            input.placeholder = "Buscar";
        }else{
            input.placeholder = "Buscar en " + e.target.innerText;
        }

        input.placeholder = "Buscar en " + e.target.innerText;
    }
 
}






// fin barra de busqueda




// menu hamburguesa

let subMenu = document.getElementById("subMenu");

function toggleMenu() {
    subMenu.classList.toggle("open-menu");
    const menuIcon = document.getElementById('menu');
    if (subMenu.classList.contains("open-menu")) {
        menuIcon.classList.remove("ri-menu-line");
        menuIcon.classList.add("ri-close-line");
    } else {
        menuIcon.classList.remove("ri-close-line");
        menuIcon.classList.add("ri-menu-line");
    }
}

// Add event listener to the document
document.addEventListener("click", function(event) {
    if (!subMenu.contains(event.target) && !event.target.matches('.menu-icon')) {
        subMenu.classList.remove("open-menu");
        const menuIcon = document.getElementById('menu');
        menuIcon.classList.remove("ri-close-line");
        menuIcon.classList.add("ri-menu-line");
    }
});


// fin menu hamburguesa





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