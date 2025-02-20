<?php
//base de datos
require '../../includes/config/database.php';
$db = conectarDB();

//arreglo con msj de errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];

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


    //revisar si no hay errores
    if (empty($errores)) {
        //insertar bd
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones,
     wc, estacionamiento, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones',
     '$wc', '$estacionamiento', '$vendedorId' )";

        //  echo $query;

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo "Inserto Correctamente";
        }
    }
}


require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form action="" class="formulario" method="POST" action="/admin//propiedades/crear.php">
        <fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la Propiedad">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="1">Juan</option>
                <option value="2">Karen</option>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>