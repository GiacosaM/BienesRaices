document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();

} );

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme:dark)');

    console.log(prefiereDarkMode.matches);
    
    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });



    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener ('click', function () {
        document.body.classList.toggle('dark-mode');

    });


}

function eventListeners() {
    
    
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra campos condicionaes 
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]'); // Selecciona todos los imput que tengan el name contacto[contacto]+
    metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto))


}

function navegacionResponsive() {

    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e) { // Le paso un eveneto en la funcion
    const contactoDiv = document.querySelector('#contacto');
     // selecciona el elemento con ID contacto
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `

        
        <input data-cy="input-telefono" type="tel" placeholder="Tu telefono" id="telefono" name= "contacto[telefono]">

        <p> Elija la fecha y hora para la llamada </p>

        <label for="fecha"> Fecha </label>
        <input data-cy="input-fecha" type="date"  id="fecha" name= "contacto[fecha]">

        <label for="hora"> Hora </label>    
        <input data-cy="input-hora" type="time"  id="hora" min= "09:00" max="18:00" name= "contacto[hora]">

        `;
    } else{
        contactoDiv.innerHTML = `
        
        <input type="email" placeholder="Tu Email" id="email" name= "contacto[email]" required>
        `;
    }

}
