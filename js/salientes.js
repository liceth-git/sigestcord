const openFormButton = document.getElementById('openFormButton');
const createForm = document.getElementById('createForm');

// Agrega un evento clic al botón para mostrar u ocultar el formulario
openFormButton.addEventListener('click', () => {
    if (createForm.style.display === 'none' || createForm.style.display === '') {
        createForm.style.display = 'block'; // Mostrar el formulario
    } else {
        createForm.style.display = 'none'; // Ocultar el formulario
    }
});




document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault();
  alert('Correspondencia enviada con éxito');
});

const checkboxes = document.querySelectorAll('.checkbox-registro');
const botonEditar = document.getElementById('boton-editar');
const botonVisualizar = document.getElementById('boton-visualizar');

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        const selectedCheckboxes = document.querySelectorAll('.checkbox-registro:checked');
        if (selectedCheckboxes.length === 1) {
            botonEditar.style.display = 'inline-block';
            botonVisualizar.style.display = 'inline-block';
        } else {
            botonEditar.style.display = 'none';
            botonVisualizar.style.display = 'none';
        }
    });
});

function editarCorrespondencia() {
    // Implementa la lógica para editar el registro seleccionado
    alert('Editando correspondencia');
}

function visualizarCorrespondencia() {
    // Implementa la lógica para mostrar una vista previa del registro seleccionado
    alert('Visualizando correspondencia');
}

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Correspondencia creada con éxito');
});