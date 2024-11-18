<?php require_once 'header.php'; ?>

<h1>Reservas</h1>

<form action="" method="post">
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha"><br><br>
    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora"><br><br>
    <label for="usuario">Usuario:</label>
    <select id="usuario" name="usuario">
        <?php
        // Cargar usuarios desde la base de datos
        $usuarioController = new UsuarioController();
        $usuarios = $usuarioController->obtenerUsuarios();
        foreach ($usuarios as $usuario) {
            echo "<option value='$usuario[id]'>$usuario[nombre] $usuario[apellido]</option>";
        }
        ?>
    </select><br><br>
    <label for="mesa">Mesa:</label>
    <select id="mesa" name="mesa">
        <?php
        // Cargar mesas desde la base de datos
        $mesaController = new MesaController();
        $mesas = $mesaController->obtenerMesas();
        foreach ($mesas as $mesa) {
            echo "<option value='$mesa[id]'>$mesa[numero]</option>";
        }
        ?>
    </select><br><br>
    <input type="submit" value="Crear Reserva">
</form>

<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Usuario</th>
            <th>Mesa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $reservaController = new ReservaController();
        $reservas = $reservaController->obtenerReservas();
        foreach ($reservas as $reserva) {
            echo "<tr>
                    <td>$reserva[fecha]</td>
                    <td>$reserva[hora]</td>
                    <td>$reserva[usuario]</td>
                    <td>$reserva[mesa]</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php require_once 'footer.php'; ?>
