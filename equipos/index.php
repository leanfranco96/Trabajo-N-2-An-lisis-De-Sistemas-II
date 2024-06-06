<html lang="es">
<head>
<title>Lista de Equipos</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-image: url("img/fondo3.jpg");
  }

  .container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-image: url("img/fondo4.jpg")
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border-radius: 40px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #FFF;
    
  }

  table, th, td {
    border: 1px solid #ccc;
  }

  td {
    padding: 10px;
    text-align: center;
  }
  th {
    padding: 10px;
    text-align: center;
  }
  th {
    background-color: #007bff;
    color: #fff;
  }

  .actions {
    text-align: center;
  }

  .add-button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
  }

  .add-button:hover {
    background-color: #0056b3;
  }
  .container h1 {
    text-align: center;
    color: #fff
  }
  
</style>
</head>
<body>
<div class="container">
  <h1>Lista de Equipos</h1>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cuidad/Localidad</th>
        <th>Técnico</th>
        <th>Editar / Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

      if (!$scon) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT ID_equipo, Nombre, Ciudad, Tecnico FROM equipos";

      $result = mysqli_query($scon, $sql);

     
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
              echo "<tr>";
                echo "<td>" . $row["ID_equipo"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Ciudad"] . "</td>";
                echo "<td>" . $row["Tecnico"] . "</td>";
                echo '<td class="actions">
                <a href="#" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="' . $row["ID_equipo"] . '">
                <img src="img/editar.png" alt="editar" height="50"></a> |
                <a href="#" onclick="eliminarEquipo(' . $row["ID_equipo"] . ')"><img src="img/eliminar.png" alt="Eliminar" height="30"></a>
              </td>';
        echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No hay contactos disponibles.</td></tr>";
      }

      mysqli_close($scon);
      ?>
    </tbody>
  </table>

<!-- Vertically centered scrollable modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Equipo Nuevo
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Agregar Equipo</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="container">
          <form id="equipoForm">
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="Nombre" name="Nombre" required>
            </div>
            <div class="mb-3">
              <label for="Ciudad" class="form-label">Ciudad:</label>
              <input type="text" class="form-control" id="Ciudad" name="Ciudad" required>
            </div>
            <div class="mb-3">
              <label for="Tecnico" class="form-label">Técnico:</label>
              <input type="text" class="form-control" id="Tecnico" name="Tecnico" required>
            </div>
          </form>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="validarFormulario()">Grabar</button>
      </div>
      <div class="alert alert-success mt-3 d-none" id="mensajeExito">
         Los datos se han grabado correctamente.
      </div>
    </div>
  </div>
</div>
<!-- MODAL PARA EDITAR -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="editarModalLabel">Editar Equipo</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="container">
          <form id="editarEquipoForm">
          <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="Nombre2" name="Nombre" required>
            </div>
            <div class="mb-3">
              <label for="Ciudad" class="form-label">Ciudad:</label>
              <input type="text" class="form-control" id="Ciudad2" name="Ciudad" required>
            </div>
            <div class="mb-3">
              <label for="Tecnico" class="form-label">Técnico:</label>
              <input type="text" class="form-control" id="Tecnico2" name="Tecnico" required>
            </div>
          </form>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="guardarEdicionEquipo()">Guardar Cambios</button>
      </div>
      <div class="alert alert-success mt-3 d-none" id="mensajeExito">
         Los datos se han grabado correctamente.
      </div>
      
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function validarFormulario() {

var Nombre = document.getElementById("Nombre").value;
var Ciudad = document.getElementById("Ciudad").value;
var Tecnico = document.getElementById("Tecnico").value;

if (Nombre.trim() === "") {
  alert("Por favor, ingrese Nombre del Equipo");
  return false;
} else if (Ciudad.trim() === "") {
  alert("Por favor, ingrese su nombre de la Cuidad.");
  return false;
}else if (Tecnico.trim() === "") {
  alert("Por favor, ingrese Nombre del Tecnico");
  return false;
}
else {
  $.ajax({
              type: 'POST',
              url: 'equipos/insertarequipos.php',
              data: {Nombre1: Nombre, Ciudad1: Ciudad, Tecnico1: Tecnico } ,
              
          });
          document.getElementById('mensajeExito').classList.remove('d-none');
  }
}
function eliminarEquipo(ID_equipo) {
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar este equipo?");
    if (confirmacion) {
        $.ajax({
            type: 'POST',
            url: 'equipos/eliminarequipo.php',
            data: {ID_equipo: ID_equipo},
            success: function(response) {
                // Puedes manejar la respuesta del servidor aquí si es necesario
                // Por ejemplo, recargar la página o actualizar la tabla
            }
        });
    }
}
//editar
$('#editarModal').on('show.bs.modal', function (event) {
  var enlace = $(event.relatedTarget); // Enlace que activó el modal
  var ID_Equipo = enlace.data('ID_equipo'); // Obtener el ID del equipo de los datos del enlace

  // Ahora, puedes hacer una llamada AJAX para obtener los detalles del equipo con el ID correspondiente y llenar el formulario de edición.
  // Por ejemplo:
  $.ajax({
    type: 'GET',
    url: 'equipos/obtenerequipo.php',
    data: { ID_equipo: ID_Equipo },
    success: function(response) {
      // Llenar el formulario de edición con los datos obtenidos
      // Por ejemplo, algo como:
      var equipo = JSON.parse(response);
      $('#editarEquipoForm #Nombre').val(equipo.Nombre);
      $('#editarEquipoForm #Ciudad').val(equipo.Ciudad);
      $('#editarEquipoForm #Tecnico').val(equipo.Tecnico);
    }
  });
});

// Agrega una función para guardar los cambios en el script (puedes reutilizar la función validarFormulario con algunas modificaciones).
function guardarEdicionEquipo() {
var Nombre = document.getElementById("Nombre2").value;
var Ciudad = document.getElementById("Ciudad2").value;
var Tecnico = document.getElementById("Tecnico2").value;

if (Nombre.trim() === "") {
  alert("Por favor, ingrese Nombre del Equipo");
  return false;
} else if (Ciudad.trim() === "") {
  alert("Por favor, ingrese su nombre de la Cuidad.");
  return false;
}else if (Tecnico.trim() === "") {
  alert("Por favor, ingrese Nombre del Tecnico");
  return false;
}
else {
  $.ajax({
              type: 'POST',
              url: 'equipos/actualizarequipo.php',
              data: {Nombre2: Nombre, Ciudad2: Ciudad, Tecnico2: Tecnico } ,
              
          });
          document.getElementById('mensajeExito').classList.remove('d-none');
  }
}
  // Lógica para guardar los cambios después de la edición.
  // Puedes hacer una llamada AJAX similar a la función validarFormulario.


</script>
</body>
</html>
