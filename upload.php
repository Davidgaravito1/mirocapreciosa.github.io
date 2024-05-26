<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directorio de destino para las imágenes
    $targetDir = "uploads/";
    // Sección seleccionada por el usuario
    $section = $_POST['section'];
    // Ruta completa del directorio de destino
    $targetDir .= $section . "/";

    // Verificar si el directorio existe, si no, crearlo
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Ruta de destino de la imagen
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    // Intentar mover el archivo cargado al directorio de destino
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "La imagen " . htmlspecialchars(basename($_FILES["image"]["name"])) . " ha sido subida.";
    } else {
        echo "Hubo un error al subir la imagen.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>