<html lang="es">
<head>
<title>Lista de Jugadores</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-image: url("img/fondo3.jpg");
  }

  .container {
    max-width: 1200px;
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
  <h1>Lista de Jugadores</h1>
  <table border="1">
    <thead>
      <tr>
        <th>ID jugador</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Fecha de Nacimiento</th>
        <th>EquipoID</th>
        <th>Posicion</th>
        <th>Editar / Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

      if (!$scon) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT ID_jugador, jugadores.Apellido, jugadores.Nombre, jugadores.FechaNacimiento, jugadores.EquipoID, jugadores.Posicion FROM jugadores";

      $result = mysqli_query($scon, $sql);

     
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
              echo "<tr>";
                echo "<td>" . $row["ID_jugador"] . "</td>";
                echo "<td>" . $row["Apellido"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["FechaNacimiento"] . "</td>";
                echo "<td>" . $row["EquipoID"] . "</td>";
                echo "<td>" . $row["Posicion"] . "</td>";
                echo '<td class="actions">
                <a href="#"><img src="img/editar.png" alt="editar" height="50"></a> |
                <a href="#" onclick="eliminarjugador(' . $row["ID_jugador"] . ')"><img src="img/eliminar.png" alt="Eliminar" height="30"></a>
              </td>';
        echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No lista de jugadores disponibles.</td></tr>";
      }

      mysqli_close($scon);
      ?>
    </tbody>
  </table>

<!-- Vertically centered scrollable modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Nuevo Jugador
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Agregar Jugador</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="container">
          <form id="equipoForm">
            <div class="mb-3">
              <label for="Nombre" class="form-label">Apellido:</label>
              <input type="text" class="form-control" id="Apellido" name="Apellido" required>
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="Nombre" name="Nombre" required>
            </div>
            <div class="mb-3">
              <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" required>
            </div>
            <div class="mb-3">
              <label for="Equipo" class="form-label">Equipo:</label>
              <select class="form-select form-select-sm" aria-label="Small select example" id="EquipoID">
                <option selected>Seleccionar</option>
                <option value="6">Boca Juniors C5</option>
                <option value="27">River Plate FC</option>
                <option value="29">San Lorenzo</option>
                <option value="30">Estudiantes</option>
                <option value="31">Racing</option>

              </select>
            </div>
            </div>
            <div class="mb-3">
              <label for="Posicion" class="form-label">Posición:</label>
              <input type="text" class="form-control" id="Posicion" name="Posicion" required>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function validarFormulario() {

var Apellido = document.getElementById("Apellido").value;
var Nombre = document.getElementById("Nombre").value;
var FechaNacimiento = document.getElementById("FechaNacimiento").value;
var EquipoID = document.getElementById("EquipoID").value;
var Posicion = document.getElementById("Posicion").value;

if (Apellido.trim() === "") {
        alert("Por favor, ingrese Apellido");
        return false;
      }

      if (Nombre.trim() === "") {
        alert("Por favor, ingrese Nombre.");
        return false;
      }

      if (FechaNacimiento.trim() === "") {
        alert("Por favor, ingrese Fecha de Nacimiento");
        return false;
      }
      if (EquipoID.trim() === "") {
        alert("Por favor, seleccione Equipo");
        return false;
      }
      if (Posicion.trim() === "") {
        alert("Por favor, ingrese Posicion");
        return false;
      }
else {
  $.ajax({
              type: 'POST',
              url: 'jugadores/insertarjugador.php',
              data: {
                Apellido: Apellido, 
                Nombre: Nombre, 
                FechaNacimiento: FechaNacimiento, 
                EquipoID: EquipoID,
                Posicion: Posicion,
              } ,
              
          });
          document.getElementById('mensajeExito').classList.remove('d-none');
  }
}
function eliminarjugador(ID_jugador) {
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar este Jugador?");
    if (confirmacion) {
        $.ajax({
            type: 'POST',
            url: 'jugadores/eliminarjugador.php',
            data: {ID_jugador: ID_jugador},
            success: function(response) {
                // Puedes manejar la respuesta del servidor aquí si es necesario
                // Por ejemplo, recargar la página o actualizar la tabla
            }
        });
    }
}
</script>
</body>
</html>
