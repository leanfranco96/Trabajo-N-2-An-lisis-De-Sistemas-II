<html lang="es">
<head>
<title>Lista de Partidos</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-image: url("img/fondo3.jpg");
  }

  .container {
    max-width: 1500px;
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
  <h1>Lista de Partidos</h1>
  <table border="1">
    <thead>
      <tr>
        <th>ID Partido</th>
        <th>ID Equipo Local</th>
        <th>ID Equipo Visitante</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Lugar</th>
        <th>Resultado Local</th>
        <th>Resultado Visitante</th>
        <th>Editar / Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

      if (!$scon) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT ID_partido, EquipoLocalID, EquipoVisitanteID, Fecha, Hora, Lugar, ResultadoLocal, ResultadoVisitante FROM partidos";

      $result = mysqli_query($scon, $sql);

     
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
              echo "<tr>";
                echo "<td>" . $row["ID_partido"] . "</td>";
                echo "<td>" . $row["EquipoLocalID"] . "</td>";
                echo "<td>" . $row["EquipoVisitanteID"] . "</td>";
                echo "<td>" . $row["Fecha"] . "</td>";
                echo "<td>" . $row["Hora"] . "</td>";
                echo "<td>" . $row["Lugar"] . "</td>";
                echo "<td>" . $row["ResultadoLocal"] . "</td>";
                echo "<td>" . $row["ResultadoVisitante"] . "</td>";
                echo '<td class="actions">
                <a href="#"><img src="img/editar.png" alt="editar" height="50"></a> |
                <a href="#" onclick="eliminarpartido(' . $row["ID_partido"] . ')"><img src="img/eliminar.png" alt="Eliminar" height="30"></a>
              </td>';
        echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No hay lista de Partidos disponibles.</td></tr>";
      }
      mysqli_close($scon);
      ?>
    </tbody>
  </table>

<!-- Vertically centered scrollable modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Partido Nuevo
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Agregar Partido</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="container">
          <form id="equipoForm">
            <div class="mb-3">
            <label for="EquipoLocalID" class="form-label">Equipo Local:</label>
              <select class="form-select form-select-sm" aria-label="Small select example" id="EquipoLocalID">
                <option selected>Seleccionar</option>
                <option value="6">Boca Juniors C5</option>
                <option value="27">River Plate FC</option>
                <option value="29">San Lorenzo</option>
                <option value="30">Estudiantes</option>
                <option value="31">Racing</option>

              </select>
            </div>
            <div class="mb-3">
            <label for="EquipoVisitanteID" class="form-label">Equipo Visitante:</label>
              <select class="form-select form-select-sm" aria-label="Small select example" id="EquipoVisitanteID">
                <option selected>Seleccionar</option>
                <option value="6">Boca Juniors C5</option>
                <option value="27">River Plate FC</option>
                <option value="29">San Lorenzo</option>
                <option value="30">Estudiantes</option>
                <option value="31">Racing</option>

              </select>
            </div>
            <div class="mb-3">
              <label for="Fecha" class="form-label">Fecha:</label>
              <input type="date" class="form-control" id="Fecha" name="Fecha" required>
            </div>
            <div class="mb-3">
              <label for="Hora" class="form-label">Hora:</label>
              <input type="time" class="form-control" id="Hora" name="Hora" required>
            </div>
            <div class="mb-3">
              <label for="Lugar" class="form-label">Lugar:</label>
              <input type="text" class="form-control" id="Lugar" name="Lugar" required>
            </div>
            <div class="mb-3">
              <label for="ResultadoLocal" class="form-label">Resultado Local:</label>
              <input type="number" class="form-control" id="ResultadoLocal" name="ResultadoLocal" required>
            </div>
            <div class="mb-3">
              <label for="ResultadoVisitante" class="form-label">Resultado Visitante:</label>
              <input type="number" class="form-control" id="ResultadoVisitante" name="ResultadoVisitante" required>
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

  var EquipoLocalID = document.getElementById("EquipoLocalID").value;
  var EquipoVisitanteID = document.getElementById("EquipoVisitanteID").value;
  var Fecha = document.getElementById("Fecha").value;
  var Hora = document.getElementById("Hora").value;
  var Lugar = document.getElementById("Lugar").value;
  var ResultadoLocal = document.getElementById("ResultadoLocal").value;
  var ResultadoVisitante = document.getElementById("ResultadoVisitante").value;

  if (EquipoLocalID.trim() === "") {
          alert("Por favor, ingrese Equipo Local.");
          return false;
        }

        else if (EquipoVisitanteID.trim() === "") {
          alert("Por favor, ingrese Equipo Visitante.");
          return false;
        }

        else if (Fecha.trim() === "") {
          alert("Por favor, ingrese Fecha.");
          return false;
        }
        else if (Hora.trim() === "") {
          alert("Por favor, seleccione Hora.");
          return false;
        }
        else if (Lugar.trim() === "") {
          alert("Por favor, ingrese Lugar.");
          return false;
        }
        else if (ResultadoLocal.trim() === "") {
          alert("Por favor, ingrese Resultado del Equipo Local");
          return false;
        }
        else if (ResultadoVisitante.trim() === "") {
          alert("Por favor, ingrese Resultado del Equipo Visitante");
          return false;
        }
  else {
    $.ajax({
                type: 'POST',
                url: 'partidos/insertarpartido.php',
                data: {
                  EquipoLocalID: EquipoLocalID,
                  EquipoVisitanteID: EquipoVisitanteID,
                  Fecha: Fecha,
                  Hora: Hora,
                  Lugar: Lugar,
                  ResultadoLocal: ResultadoLocal,
                  ResultadoVisitante: ResultadoVisitante,
                } ,
                
            });
            document.getElementById('mensajeExito').classList.remove('d-none');
    }
}
function eliminarpartido(ID_partido) {
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar este Partido?");
    if (confirmacion) {
        $.ajax({
            type: 'POST',
            url: 'partidos/eliminarpartido.php',
            data: {ID_partido: ID_partido},
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
