


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
        icon3.style.rotate = '180deg';
        icon3.style.transition = '0.3s';
    }
    list3.classList.toggle('show3');
};

// Cerrar el dropdown si se hace clic fuera de él
document.addEventListener('click', function(event) {
    if (!list3.contains(event.target)) {
        list3.classList.remove('show3');
        icon3.style.rotate = '0deg'; // Restaurar rotación del icono
        icon3.style.transition = '0.3s';
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
        icon2.style.rotate = '180deg';
        icon2.style.transition = '0.3s';
    }
    list2.classList.toggle('show2');
};

// Cerrar el dropdown si se hace clic fuera de él
document.addEventListener('click', function(event) {
    if (!list2.contains(event.target)) {
        list2.classList.remove('show2');
        icon2.style.rotate = '0deg'; // Restaurar rotación del icono
        icon2.style.transition = '0.3s';
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

