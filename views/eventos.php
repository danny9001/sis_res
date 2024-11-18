<?php require_once 'header.php'; ?>

<h1>Eventos</h1>

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"><br><br>
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha"><br><br>
    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora"><br><br>
    <input type="submit" value="Crear Evento">
</form>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Hora</th>
	    <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $eventoController = new EventoController();
        $eventos = $eventoController->obtenerEventos();
        foreach ($eventos as $evento) {
            echo "<tr>
                    <td>$evento[nombre]</td>
                    <td>$evento[fecha]</td>
                    <td>$evento[hora]</td>
		    <td><a href='evento_detalle.php?id=$evento[id]'>Detalle</a></td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php require_once 'footer.php'; ?>
