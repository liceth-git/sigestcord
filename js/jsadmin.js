document.addEventListener("DOMContentLoaded", function () {
  // JavaScript para Usuarios

  // Botón para administrar usuarios
  const userAdminBtn = document.getElementById("user-admin-btn");
  const userAdminArea = document.getElementById("user-admin-area");
  userAdminBtn.addEventListener("click", () => {
    if (userAdminArea.style.display === "none") {
      userAdminArea.style.display = "block";
    } else {
      userAdminArea.style.display = "none";
    }
  });

  // Botón para crear usuario
  const createUserBtn = document.getElementById("create-user-btn");
  const userCreateForm = document.getElementById("user-create-form");
  createUserBtn.addEventListener("click", () => {
    if (userCreateForm.style.display === "none") {
      userCreateForm.style.display = "block";
    } else {
      userCreateForm.style.display = "none";
    }
  });

  // Botón para consultar usuario
  const userConsultBtn = document.getElementById("user-consult-btn");
  const userConsultForm = document.getElementById("user-consult-form");
  userConsultBtn.addEventListener("click", () => {
    if (userConsultForm.style.display === "none") {
      userConsultForm.style.display = "block";
    } else {
      userConsultForm.style.display = "none";
    }
  });

  // Botón para actualizar usuario
  const userUpdateBtn = document.getElementById("user-update-btn");
  userUpdateBtn.addEventListener("click", () => {
    // Ocultar otros formularios y detalles si están visibles
    userCreateForm.style.display = "none";
    userConsultForm.style.display = "none";
    userDeleteForm.style.display = "none";
    userDeleteDetails.style.display = "none";
    userUpdateForm.style.display = "block"; // Mostrar el formulario de actualización
  });

  // JavaScript para Solicitudes

  // Botón para administrar solicitudes
  const solicitudesAdminBtn = document.getElementById("solicitudes-admin-btn");
  const solicitudesAdminArea = document.getElementById("solicitudes-admin-area");
  solicitudesAdminBtn.addEventListener("click", () => {
    if (solicitudesAdminArea.style.display === "none") {
      solicitudesAdminArea.style.display = "block";
    } else {
      solicitudesAdminArea.style.display = "none";
    }
  });

  // JavaScript para Entrantes

  // Botón para administrar entrantes
  const entrantesAdminBtn = document.getElementById("entrantes-admin-btn");
  const entrantesAdminArea = document.getElementById("entrantes-admin-area");
  entrantesAdminBtn.addEventListener("click", () => {
    if (entrantesAdminArea.style.display === "none") {
      entrantesAdminArea.style.display = "block";
    } else {
      entrantesAdminArea.style.display = "none";
    }
  });

  // Botón para eliminar usuario
  const deleteUserBtn = document.getElementById("delete-user-btn");
  const userDeleteForm = document.getElementById("user-delete-form");
  deleteUserBtn.addEventListener("click", () => {
    if (userDeleteForm.style.display === "none") {
      userDeleteForm.style.display = "block";
    } else {
      userDeleteForm.style.display = "none";
    }
  });

  const userDeleteDetails = document.getElementById("user-delete-details");
  const deleteUserName = document.getElementById("delete-user-name");
  const deleteUserDocumentType = document.getElementById("delete-user-document-type");
  const confirmDeleteUserBtn = document.getElementById("confirm-delete-user");
  const consultUserBtn = document.getElementById("consult-user-btn");

  // Función para eliminar un usuario
  function eliminarUsuario() {
    // Pide confirmación antes de eliminar
    const confirmDelete = confirm(`¿Estás seguro de que deseas eliminar el registro de ${deleteUserName.textContent}?`);

    if (confirmDelete) {
      // Obtén el número de documento del usuario a eliminar
      const numeroDocumento = deleteUserDocumentType.textContent;

      // Realiza una solicitud al servidor para eliminar el usuario usando AJAX
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "php/eliminar_usuario.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      // Envía los datos al servidor (puedes agregar más datos según tus necesidades)
      xhr.send(`numero-documento=${numeroDocumento}`);

      // Maneja la respuesta del servidor
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Verifica si la eliminación fue exitosa
          if (xhr.responseText === "exito") {
            // Eliminación exitosa, puedes mostrar un mensaje o realizar otras acciones
            alert("Usuario eliminado exitosamente");
          } else {
            // Hubo un error en la eliminación, puedes manejarlo de acuerdo a tus necesidades
            alert("Error al eliminar el usuario");
          }

          // Después de eliminar el registro, puedes ocultar los detalles
          userDeleteDetails.style.display = "none";

          // También puedes reiniciar los campos de detalles si lo deseas
          deleteUserName.textContent = "";
          deleteUserDocumentType.textContent = "";
        }
      };
    }
  }

  // Agregar el evento de clic al botón para confirmar eliminación de usuario
  confirmDeleteUserBtn = document.getElementById("confirm-delete-user");
  confirmDeleteUserBtn.addEventListener("click", eliminarUsuario);

  // ...
});

