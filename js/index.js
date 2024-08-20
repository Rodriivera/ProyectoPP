// barra de busqueda

let dropdownBtn = document.getElementById('drop-text');
let list = document.getElementById('list');
let icon= document.getElementById('icon');
let span = document.getElementById('span');
let input = document.getElementById('search-input'); 

let listItems = document.querySelectorAll('.dropdown-list-item');

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
}

// Add event listener to the document
document.addEventListener("click", function(event) {
    if (!subMenu.contains(event.target) && !event.target.matches('.ri-menu-line')) {
        subMenu.classList.remove("open-menu");
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





// productos slider




// fin productos slider