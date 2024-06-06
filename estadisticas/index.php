<html lang="es">
<head>
<title>Estadisticas</title>
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
  <h1>Estadisticas</h1>
  <table border="1">
    <thead>
      <tr>
        <th>ID Jugador</th>
        <th>ID Partido</th>
        <th>Goles</th>
        <th>Tarjetas Amarillas</th>
        <th>Tarjetas Rojas</th>
        <th>Editar / Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

      if (!$scon) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT ID_estadistica,JugadorID, PartidoID, Goles, TarjetasAmarillas, TarjetasRojas FROM estadisticas";

      $result = mysqli_query($scon, $sql);

     
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
              echo "<tr>";
                echo "<td>" . $row["JugadorID"] . "</td>";
                echo "<td>" . $row["PartidoID"] . "</td>";
                echo "<td>" . $row["Goles"] . "</td>";
                echo "<td>" . $row["TarjetasAmarillas"] . "</td>";
                echo "<td>" . $row["TarjetasRojas"] . "</td>";
                echo '<td class="actions">
                <a href="#"><img src="img/editar.png" alt="editar" height="50"></a> |
                <a href="#" onclick="eliminarestadistica(' . $row["ID_estadistica"] . ')"><img src="img/eliminar.png" alt="Eliminar" height="30"></a>
              </td>';
        echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No hay estadisticas disponibles.</td></tr>";
      }

      mysqli_close($scon);
      ?>
    </tbody>
  </table>

<!-- Vertically centered scrollable modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Nueva Estadistica
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Agregar Estadisticas</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="container">
          <form id="equipoForm">
          <div class="mb-3">
          <label for="JugadorID" class="form-label">ID Jugador:</label>
              <select class="form-select form-select-sm" aria-label="Small select example" id="JugadorID">
                <option selected>Seleccionar</option>
                <option value="9">Perez Pedro</option>
                <option value="10">Galeano Emmanuel</option>
                <option value="11">Franco Cristian</option>
                <option value="12">Galeano Leandro</option>
                <option value="15">Medina Carlos</option>
                <option value="18">Del Valle Marcos</option>

              </select>
            </div>
            <div class="mb-3">
            <label for="PartidoID" class="form-label">ID Partido:</label>
              <select class="form-select form-select-sm" aria-label="Small select example" id="PartidoID">
                <option selected>Seleccionar</option>
                <option value="1">Boca Juniors C5 vs River Plate FC</option>
                <option value="3">San Lorenzo vs Estudiantes</option>
                <option value="4">Estudiantes vs Boca Juniors C5</option>
                <option value="5">Boca Juniors C5 San Lorenzo</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="Goles" class="form-label">Goles:</label>
              <input type="number" class="form-control" id="Goles" name="Goles" required>
            </div>
            <div class="mb-3">
              <label for="TarjetasAmarillas" class="form-label">Tarjetas Amarillas:</label>
              <input type="number" class="form-control" id="TarjetasAmarillas" name="TarjetasAmarillas" required>
            </div>
            <div class="mb-3">
              <label for="TarjetasRojas" class="form-label">Tarjetas Rojas:</label>
              <input type="number" class="form-control" id="TarjetasRojas" name="TarjetasRojas" required>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function validarFormulario() {

  var JugadorID = document.getElementById("JugadorID").value;
  var PartidoID = document.getElementById("PartidoID").value;
  var Goles = document.getElementById("Goles").value;
  var TarjetasAmarillas = document.getElementById("TarjetasAmarillas").value;
  var TarjetasRojas = document.getElementById("TarjetasRojas").value;

  if (JugadorID.trim() === "") {
          alert("Por favor, ingrese Jugador.");
          return false;
        }

        else if (PartidoID.trim() === "") {
          alert("Por favor, ingrese Partido.");
          return false;
        }

        else if (Goles.trim() === "") {
          alert("Por favor, ingrese cantidad de Goles.");
          return false;
        }
        else if (TarjetasAmarillas.trim() === "") {
          alert("Por favor, cantidad de Tarjetas Amarillas.");
          return false;
        }
        else if (TarjetasRojas.trim() === "") {
          alert("Por favor, ingrese Cantidad de Tarjetas Rojas.");
          return false;
        }
else {
  $.ajax({
              type: 'POST',
              url: 'estadisticas/insertarestadistica.php',
              data: {
                JugadorID: JugadorID, 
                PartidoID: PartidoID,
                Goles: Goles, 
                TarjetasAmarillas: TarjetasAmarillas,
                TarjetasRojas: TarjetasRojas,
              } ,
              
          });
          document.getElementById('mensajeExito').classList.remove('d-none');
}
}
function eliminarestadistica(ID_estadistica) {
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar esta estadistica?");
    if (confirmacion) {
        $.ajax({
            type: 'POST',
            url: 'estadisticas/eliminarestadistica.php',
            data: {ID_estadistica: ID_estadistica},
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
