<?php
// Simulación de datos de clientes (reemplaza con tus propios datos o consulta a tu base de datos)
$clientes = array(
    array("id" => 1, "nombre" => "Cliente 1", "correo" => "cliente1@example.com"),
    array("id" => 2, "nombre" => "Cliente 2", "correo" => "cliente2@example.com"),
    array("id" => 3, "nombre" => "Cliente 3", "correo" => "cliente3@example.com")
);
?>

<!-- Contenido del módulo de clientes -->
<div>
    <h2>Listado de Clientes</h2>

    <!-- Tabla de clientes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['correo']; ?></td>
                    <td>
                        <!-- Botones de acciones (editar, eliminar) -->
                        <button class="btn btn-primary btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botón para agregar nuevo cliente -->
    <button class="btn btn-success">Agregar Cliente</button>
</div>
