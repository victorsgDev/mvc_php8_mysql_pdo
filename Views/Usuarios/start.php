<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>


<h1>Iniciar Sesión </h1>

<form action="?controller=usuarioComun&action=iniciar" method="post">
    <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="nombre" style="font-size: 140%">Nombre de usuario:</label>
        <input type="text" id="nombre" class="form-control" name="nombre"/>
    </div>
    <br>
    <div class="form-outline flex-fill mb-0">
        <label class="form-label" for="nombre" style="font-size: 140%">Contraseña:</label>
        <input type="password" id="contraseña" class="form-control" name="contraseña"/>
    </div>
    <br>
    <input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-lg">
</form>




<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

