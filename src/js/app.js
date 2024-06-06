document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
    darkMode();
    mostrarMetodosContacto();
    tecnologiasSeleccionadas();
    obtenerTecnologiasSeleccionadas();
});

function tecnologiasSeleccionadas() {
    // Selecciona todos los checkboxes dentro del contenedor de tecnologías
    const checkboxes = document.querySelectorAll('.formulario__contenedor-tecnologias input[type="checkbox"]');

    let tecnologias = [];
    const inputHidden = document.getElementById('tecnologiasSeleccionadas');
    // Añade el EventListener de tipo click a cada checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function (event) {
            console.log('Checkbox clickeado:', event.target.id);
            if (tecnologias.includes(event.target.id)) {
                tecnologias = tecnologias.filter(elemento => elemento !== event.target.id);
            } else {
                tecnologias.push(event.target.id);
            }

            inputHidden.value = JSON.stringify(tecnologias);

            console.log(tecnologias);
        });
    });
}

function obtenerTecnologiasSeleccionadas() {
    const inputHidden = document.getElementById('tecnologiasSeleccionadas').value;

    const checkboxes = document.querySelectorAll('.formulario__contenedor-tecnologias input[type="checkbox"]');

    inputHidden.foreach(id => {
        console.log(id);
    });
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function () {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra campos condicionales 
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto))

}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <label for="telefono">Numero Telefono</label>
        <input data-cy="input-telefono" type="tel" placeholder="Tu Telefono" id="telefono" name="contacto[telefono]" >
        
        <p>Elija la fecha y la hora para ser contactado</p>

        <label for="fecha">Fecha:</label>
        <input data-cy="input-fecha"  type="date"  id="fecha" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input data-cy="input-hora" type="time"  id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }
    console.log(e);
}
