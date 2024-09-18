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



const allSideMenu = document.querySelectorAll('.menu li span');
let active = document.getElementById('active')

allSideMenu.forEach(item=> {
	const li = item.parentElement;
	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

document.addEventListener('DOMContentLoaded', (event) => {
    var boton = document.getElementById('active');
    boton.disabled = false; // Asegúrate de que el botón esté habilitado
});


// mostrar y ocultar secciones

function showSection(sectionId) {
    // Oculta todas las secciones
    const sections = document.querySelectorAll('.secciones');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Muestra la sección correspondiente
    const sectionToShow = document.getElementById(sectionId);
    if (sectionToShow) {
        sectionToShow.style.display = 'block';
    }
}

// Mostrar la primera sección por defecto
showSection('estadisticas-section');




///////  Preview Images 

document.getElementById('file').onchange = function(e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]); // Changed 'File' to 'files'
    reader.onload = function() {
        let preview = document.getElementById('preview');
        let img = document.createElement('img');
        img.src = reader.result;
        preview.innerHTML = ''; // Clear previous images
        preview.appendChild(img); // Use appendChild for better compatibility
    };
};
