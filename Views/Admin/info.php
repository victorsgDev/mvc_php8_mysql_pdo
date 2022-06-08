<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Administrador</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Foto</th>
        </tr>
        <tbody>
        <tr>
            <td><?php echo $listaAdmin->getId(); ?></td>
            <td><?php echo $listaAdmin->getNombre(); ?></td>
            <td><?php echo $listaAdmin->getContraseña(); ?></td>
            <td><?php echo $listaAdmin->getCorreo(); ?></td>
            <td><img src="<?php echo $listaAdmin->getFoto(); ?>" width="200px" </td>
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
            <td>
                <form method="post" action="?controller=admin&action=show">
                    <input type="submit" value="Ver usuarios" class="btn btn-primary btn-lg">
                </form>
            </td>
        </tr>

        </tbody>

        </thead>
    </table>

</div>

