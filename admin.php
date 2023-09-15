<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/estilosadmin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <title>SIGESTCOR</title>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
          <div class="user-profile">
            <div class="profile-image">
            <img src="images/user.png" alt="User Image">
            </div>
            <h2>Nombre de Usuario</h2>
            <p>Rol del Usuario</p>
          </div>
          <ul class="menu">
            <li><a href="index.html"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="error500.html"><i class="fas fa-tasks"></i> Solicitudes</a></li>
            <li><a href="error404.html"><i class="fas fa-download"></i> Entrantes</a></li>
            <li><a href="salientes.html"><i class="fas fa-upload"></i> Salientes</a></li>
            <li><a href="admin.php"><i class="fas fa-cog"></i> Administración</a></li>
            <li><a href="formularioinicio.html"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
          </ul>
        </div>
    <div class="content">
        <div class="navbar">
          <div class="logo">
            <img src="images/carta_logo.png" alt="Logo">
            <img src="images/letra_sigestcor.png" alt="letra logo" style="width: 100px; height: 20px;">
          </div>
          <div class="notifications">
            <i class="fas fa-bell"></i>
            <span class="badge">5</span>
          </div>
        </div>

        
        <div class="crud-container">
          <!-- CRUD de Usuarios -->
          <div class="crud-card">
            <i class="fas fa-users"></i>
            <h2>Usuarios</h2>
            <p>Administra usuarios</p>
            <button class="crud-button" id="user-admin-btn">Administrar</button>
            <!-- Área de Administración de Usuarios (inicialmente oculta) -->
            <div id="user-admin-area" style="display: none;">
              <!-- Botones CRUD de Usuarios -->
              <div class="button-area">
                <button class="crud-button" id="create-user-btn">Asignar</button>
                <button class="crud-button" id="user-consult-btn">Consultar</button> <br>
                <button class="crud-button" id="user-update-btn">Actualizar</button>
                <button class="crud-button" id="delete-user-btn">Eliminar</button>
              </div>
            </div>
          </div>
              <!--Asignar usuario, contraseña y rol  -->
          <div id="user-create-form" style="display: none;">
            <form class="user-form" action="php/ActualizarUsuario.php" method="POST">
              <h2>Asignar Usuario y Contraseña</h2>
              <div class="form-group">
                <label for="numero-documento">Número de Documento:</label>
                <input type="text" id="numero-documento" name="numero-documento" required>
              </div>
              <div class="form-group">
                <label for="nombre-usuario">Nombre de Usuario:</label>
                <input type="text" id="nombre-usuario" name="nombre-usuario" required>
              </div>
              <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
              </div>
              <button type="submit" class="btn-submit">Guardar</button>
            </form>
          </div>
       

          <!-- Formulario de Consulta de Usuario (inicialmente oculto) -->
          <div id="user-consult-form" style="display: none;">
            <form class="user-form" method="post" action="php/consultar.php">
              <h2>Consultar Usuario</h2>
              <div class="form-group">
                <label for="numero-documento-consulta">Número de Documento:</label>
                <input type="text" id="numero-documento-consulta" name="numero-documento-consulta" required>
              </div>
              <button type="submit" class="btn-submit">Consultar</button>
            </form>
            <?php
              if (!empty($mensaje)) {
                  echo '<div id="mensajeExito">' . $mensaje . '</div>';
              }
            ?>
                    <table id="user-table">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Las filas de datos de los usuarios se insertarán aquí dinámicamente -->
                    </tbody>
                  </table>
                </div>
          </div>

          <!-- Formulario de Actualización de Usuario (inicialmente oculto) -->
          <div id="user-update-form" style="display: none;">
            <form class="user-form" method="post" action="php/ActualizarUsuario.php">
              <h2>Actualizar Usuario</h2>
              <div class="form-group">
                <label for="numero-documento-actualizar">Número de Documento:</label>
                <input type="text" id="numero-documento-actualizar" name="numero-documento-actualizar" required>
              </div>
              <div class="form-group">
                <label for="nombre-usuario-actualizar">Nuevo Nombre de Usuario:</label>
                <input type="text" id="nombre-usuario-actualizar" name="nombre-usuario-actualizar" required>
              </div>
              <div class="form-group">
                <label for="contrasena-actualizar">Nueva Contraseña:</label>
                <input type="password" id="contrasena-actualizar" name="contrasena-actualizar" required>
              </div>
              <button type="submit" class="btn-submit">Actualizar</button>
            </form> 
            <?php
              if (!empty($mensaje)) {
                  echo '<div id="mensajeExito">' . $mensaje . '</div>';
              }
              ?>
          </div>

                  <!-- Formulario de Eliminación de Usuario (inicialmente oculto) -->
          <div id="user-delete-form" style="display: none;">
            <form class="user-form" method="post" action="php/eliminar_usuario.php">
              <h2>Eliminar Usuario</h2>
              <div class="form-group">
                <label for="tipo-documento-delete">Tipo de Documento:</label>
                <select id="tipo-documento-delete" name="tipo-documento-delete">
                  <option value="cedula">Cédula</option>
                  <option value="pasaporte">Pasaporte</option>
                </select>
              </div>
              <div class="form-group">
                <label for="numero-documento-delete">Número de Documento:</label>
                <input type="text" id="numero-documento-delete" name="numero-documento-delete">
              </div>
              <button type="submit" class="btn-submit">Eliminar</button>
            </form>
          </div>

          <!-- CRUD de Solicitudes -->
  <div class="crud-card">
    <i class="fas fa-tasks"></i>
    <h2>Solicitudes</h2>
    <p>Administra solicitudes</p>
    <button class="crud-button" id="solicitudes-admin-btn">Administrar</button>
    <!-- Área de Administración de Solicitudes (inicialmente oculta) -->
    <div id="solicitudes-admin-area" style="display: none;">
      <!-- Botones CRUD de Solicitudes -->
      <div class="button-area">
        <button class="crud-button">Crear</button>
        <button class="crud-button">Consultar</button>
        <button class="crud-button">Actualizar</button>
        <button class="crud-button">Eliminar</button>
      </div>
    </div>
  </div>

  <!-- CRUD de Entrantes -->
  <div class="crud-card">
    <i class="fas fa-download"></i>
    <h2>Entrantes</h2>
    <p>Administra entrantes</p>
    <button class="crud-button" id="entrantes-admin-btn">Administrar</button>
    <!-- Área de Administración de Entrantes (inicialmente oculta) -->
    <div id="entrantes-admin-area" style="display: none;">
      <!-- Botones CRUD de Entrantes -->
      <div class="button-area">
        <button class="crud-button">Crear</button>
        <button class="crud-button">Consultar</button>
        <button class="crud-button">Actualizar</button>
        <button class="crud-button">Eliminar</button>
      </div>
    </div>
  </div>
  
</div>
</div>
    </div>
  <script src="js/jsadmin.js"></script>
    </body>
    </html>