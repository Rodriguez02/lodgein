<?php

include("includes/header.php");

$insert_lodging = false;

if (isset($_POST['publicButton'])) {

    $title = $_POST['titulo'];
    $desc = $_POST['desc'];
    $tipo_alojamiento = $_POST['tipo_alojamiento'];
    $ciudad = $_POST['tipo_ciudad'];
    $username = $_SESSION['userLoggedIn'];

    $result = mysqli_query($con, "SELECT  users.id
                                    FROM users 
                                    WHERE users.username = '$username'");

    while ($row = mysqli_fetch_assoc($result)) {
        $id_user = $row['id'];
    }

    $result = mysqli_query($con, "SELECT *
                                        FROM lodgings
                                        ORDER BY id DESC
                                        LIMIT 1");

    while ($row = mysqli_fetch_assoc($result)) {
        $id_lodging = $row['id'] + 1;
    }

    $nom_imagen = $_FILES['images']['name'];
    $tmp = explode('.', $nom_imagen);
    $extension = end($tmp);

    $archivo = $_FILES['images']['tmp_name'];

    $nuevo_nom_imagen = "alojamiento" . $id_lodging . "." . $extension;
    $ruta = "assets/images/photos/" . $nuevo_nom_imagen;

    if (!move_uploaded_file($archivo, $ruta)) {
        echo "No se pudo cargar el archivo";
    }
    $insert_lodging = mysqli_query($con, "INSERT INTO lodgings (id, title, publisher, description, type, city, photo) VALUES (null,'$title', $id_user, '$desc', $tipo_alojamiento, $ciudad, '$ruta')") or die(mysqli_error($con));
    if (!$insert_lodging) {
        echo "No se pudo guardar en la base de datos";
    } else {
        echo    '<script>swal.fire(
            "Publicado!",
            "Tu publicación ha sido cargada con éxito",
            "success"
            ).then(() => {
            location.href = "main.php";
            });</script>';
    }
}

?>

<div class="flex-public-form">
    <div class="card card-public-form shadow mx-auto">
        <form id="publicForm" class="public-form" name="form" action="publish.php" enctype="multipart/form-data" method="POST" onsubmit="return validate()">
            <h2>Publicar</h2>
            <div class="line">
                <div class="txtc">
                    <input id="titulo" name="titulo" class="form-control" type="text" autocomplete="off" onblur="blurEvent('titulo')" onfocus="eventInput('titulo')">
                    <span data-placeholder="Titulo"></span>
                </div>
                <span id="error-title" name="error-title"></span>
            </div>
            <div class="line">
                <div class="txtc">
                    <input id="desc" name="desc" class="form-control" type="text" autocomplete="off" onblur="blurEvent('desc')" onfocus="eventInput('desc')">
                    <span data-placeholder="Descripción"></span>
                </div>
                <span id="error-desc" name="error-title"></span>
            </div>
            <div class="line">
                <div class="txtc">
                    <select style="background: #f1f1f1" id="tipo_alojamiento" name="tipo_alojamiento" class="form-control" id="tipo_alojamiento" onblur="blurEvent('tipo_alojamiento')" onfocus="eventInput('tipo_alojamiento')">
                        <option value="" selected disabled hidden></option>
                        <option value="1">Departamento Entero</option>
                        <option value="2">Habitacion de hotel</option>
                        <option value="3">Habitacion de Departamento</option>
                        <option value="4">Casa Entera</option>
                        <option value="5">Habitacion Compartida</option>
                    </select>
                    <span data-placeholder="Tipo alojamiento"></span>
                </div>
                <span id="error-tipo" name="error-title"></span>
            </div>
            <div class="line">
                <div class="txtc">
                    <input id="cities" name="ciudad" class="form-control" type="text" autocomplete="off" onblur="blurEvent('cities')" onfocus="eventInput('cities')">
                    <span data-placeholder="Ciudad"></span>
                    <input name="tipo_ciudad" type='text' id='selectuser_id' hidden />
                </div>
                <span id="error-cities" name="error-title"></span>
            </div>
            <div class="line">
                <div class="txtc">
                    <input id="images" class="form-control-file" type="file" name="images" onblur="blurEventFile('images')" onfocus="eventInput('images')">
                    <span data-placeholder="Imagen"></span>
                </div>
                <span id="error-images-1" name="error-title"></span>
                <span id="error-images-2" name="error-title"></span>
            </div>
            <div class="flex-button">
                <button type="submit" class="submitbtn" name="publicButton">Publicar</button>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/publish.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>