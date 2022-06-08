<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre de usuario</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Foto</th>
        </tr>
        <tbody>
            <tr>
                <td><?php echo $listaUsuarios->getId(); ?></td>
                <td><?php echo $listaUsuarios->getNombre(); ?></td>
                <td><?php echo $listaUsuarios->getContraseña(); ?></td>
                <td><?php echo $listaUsuarios->getCorreo(); ?></td>
                <td><img src="<?php echo $listaUsuarios->getFoto(); ?>" width="200px" </td>
                <td>
                    <form method="post" action="?controller=usuarioComun&action=update">
                        <input type="submit" value="Actualizar" class="btn btn-primary btn-lg">
                    </form>
                </td>
                <td>
                    <form method="post" action="?controller=usuarioComun&action=delete">
                        <input type="submit" value="Eliminar" class="btn btn-primary btn-lg">
                    </form>
                </td>
            </tr>

        </tbody>

        </thead>
    </table>

</div>

