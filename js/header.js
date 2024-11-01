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
    if(list.classList.contains('showw')){
    
        icon.style.rotate = '0deg';
    }else{
    icon.style.rotate = '180deg';
    icon.style.transition = '0.3s';
    }      
    list.classList.toggle('showw');
};

window.onclick = function(e) {
    if (
        e.target.id !== "drop-text" &&
        e.target.id !== "span" &&
         e.target.id !== "icon"
    ) {
        list.classList.remove('showw');
        icon.style.rotate = '0deg';
        icon.style.transition = '0.3s';
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


// // cuenta mobile
// let subMenu3 = document.getElementById("subMenu3");

// function toggleMenu3() {
//     subMenu3.classList.toggle("open-menu3");
    
    
// }

// // Add event listener to the document
// document.addEventListener("click", function(event) {
//     if (!subMenu3.contains(event.target) && !event.target.matches('.menu-icon3')) {
//         subMenu3.classList.remove("open-menu3");
        
//     }
// });






function toggleAccountMenu() {
    var menu = document.getElementById('accountMenu');
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
}

// fin cuenta mobile

