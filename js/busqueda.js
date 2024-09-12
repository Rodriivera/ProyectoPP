// barra de busqueda

let dropdownBtn = document.getElementById('drop-text');
let list = document.getElementById('list');
let icon= document.getElementById('icon');
let span = document.getElementById('span');
let input = document.getElementById('search-input'); 
let listItems = document.querySelectorAll('.dropdown-list-item');







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





// nav cuenta

let subMenu2 = document.getElementById("subMenu2");

function toggleMenu2() {
    subMenu2.classList.toggle("open-menu2");
    const menuIcon2 = document.getElementById('menu2');
    if (subMenu2.classList.contains("open-menu2")) {
        menuIcon2.classList.remove("ri-menu-line");
        menuIcon2.classList.add("ri-close-line");
    } else {
        menuIcon2.classList.remove("ri-close-line");
        menuIcon2.classList.add("ri-menu-line");
    }
}

// Add event listener to the document
document.addEventListener("click", function(event) {
    if (!subMenu2.contains(event.target) && !event.target.matches('.menu-icon2')) {
        subMenu2.classList.remove("open-menu2");
        const menuIcon2 = document.getElementById('menu2');
        menuIcon2.classList.remove("ri-close-line");
        menuIcon2.classList.add("ri-menu-line");
    }
});


// fin nav cuenta


// cuenta mobile
let subMenu3 = document.getElementById("subMenu3");

function toggleMenu3() {
    subMenu3.classList.toggle("open-menu3");
    
    
}

// Add event listener to the document
document.addEventListener("click", function(event) {
    if (!subMenu3.contains(event.target) && !event.target.matches('.menu-icon3')) {
        subMenu3.classList.remove("open-menu3");
        
    }
});






function toggleAccountMenu() {
    var menu = document.getElementById('accountMenu');
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
}

// fin cuenta mobile






// seleccionar categoria


let dropdownBtn3 = document.getElementById('drop-text3');
let list3 = document.getElementById('list3');
let icon3 = document.getElementById('icon3');
let span3 = document.getElementById('span3');
let listItems3 = document.querySelectorAll('.dropdown-list-item3');

dropdownBtn3.onclick = function(event) {
    // Evitar que el clic en el botón cierre el dropdown
    event.stopPropagation();
    
    // Rotar icono
    if (list3.classList.contains('show3')) {
        icon3.style.rotate = '0deg';
    } else {
        icon3.style.rotate = '-180deg';
    }
    list3.classList.toggle('show3');
};

// Cerrar el dropdown si se hace clic fuera de él
document.addEventListener('click', function(event) {
    if (!list3.contains(event.target)) {
        list3.classList.remove('show3');
        icon3.style.rotate = '0deg'; // Restaurar rotación del icono
    }
});

//fin seleccionar categoria







// ordenar productos

let dropdownBtn2 = document.getElementById('drop-text2');
let list2 = document.getElementById('list2');
let icon2 = document.getElementById('icon2');
let span2 = document.getElementById('span2');
let listItems2 = document.querySelectorAll('.dropdown-list-item2');

dropdownBtn2.onclick = function(event) {
    // Evitar que el clic en el botón cierre el dropdown
    event.stopPropagation();
    
    // Rotar icono
    if (list2.classList.contains('show2')) {
        icon2.style.rotate = '0deg';
    } else {
        icon2.style.rotate = '-180deg';
    }
    list2.classList.toggle('show2');
};

// Cerrar el dropdown si se hace clic fuera de él
document.addEventListener('click', function(event) {
    if (!list2.contains(event.target)) {
        list2.classList.remove('show2');
        icon2.style.rotate = '0deg'; // Restaurar rotación del icono
    }
});


//cerrar al clickear en otro lado








// fin ordenar propductos








// ver si se muestra menos de 3 productos

const div = document.getElementById('productos');

if (div.children.length < 5) {
    div.classList.add('menos-de-cinco-productos');
}

// fin ver si se muestra menos de 3 productos

