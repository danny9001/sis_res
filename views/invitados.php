<?php require_once 'header.php'; ?>

<h1>Invitados</h1>

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"><br><br>
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido"><br><br>
    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo"><br><br>
    <input type="submit" value="Crear Invitado">
</form>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $invitadoController = new InvitadoController();
        $invitados = $invitadoController->obtenerInvitados();
        foreach ($invitados as $invitado) {
            echo "<tr>
                    <td>$invitado[nombre]</td>
                    <td>$invitado[apellido]</td>
                    <td>$invitado[correo]</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php require_once 'footer.php'; ?>
