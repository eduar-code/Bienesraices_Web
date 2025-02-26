<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
    header('Location: /');
}

//validad que sea un id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

//base de datos
require '../../includes/config/database.php';
$db = conectarDB();

//obtener los datos de la propiedad para llenar campos
$consulta = "SELECT * FROM propiedades where id = $id";
$resultado = mysqli_query($db, $consulta);

$propiedad = mysqli_fetch_assoc($resultado);

// consultar venddores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//arreglo con msj de errores
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //asignar file a una imagen

    $imagen = $_FILES['imagen'];


    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Precio obligatorio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "La descripcion es obligatorio y debe tener mas de 50 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "Las habitaciones obligatorio";
    }

    if (!$wc) {
        $errores[] = "Los wc son obligatorios";
    }

    if (!$estacionamiento) {
        $errores[] = "Los estacionamientos son obligatorio";
    }

    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }

    // if (!$imagen['name'] || $imagen['error']) {
    //     $errores[] = "La imagen es obligatoria";
    // }


    //validar por tamano de imagen (1mb maximo)
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }


    //revisar si no hay errores
    if (empty($errores)) {

        //subida de archivo

        //crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        $nombreImagen = '';

        if ($imagen['name']) {
            //eliminar la imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);

            //generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            //subir la imagen disk
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }



        //insertar bd
        $query = "UPDATE propiedades SET titulo = '$titulo', precio = $precio, imagen = '$nombreImagen',  
        descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, 
        estacionamiento = $estacionamiento, vendedores_id = $vendedorId WHERE id = $id; ";


        // echo $query;

        // exit;

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            //redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }
}



incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small" alt="">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="" disabled selected>--Seleccione--</option>
                <?php while ($vendedor =  mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>