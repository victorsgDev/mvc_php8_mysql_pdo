<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre Usuario</th>
        <th scope="col">Contraseña</th>
        <th scope="col">Correo</th>
        <th scope="col">Foto</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($resultado as $usuario){
        echo "<tr><td>";
        echo $usuario[0];
        echo "</td><td>";
        echo $usuario[1];
        echo "</td><td>";
        echo $usuario[2];
        echo "</td><td>";
        echo $usuario[3];
        echo "</td><td><img src='$usuario[4]' width='200px'";

        echo "</td></tr>";
    }
    ?>
    </tbody>
</table>
