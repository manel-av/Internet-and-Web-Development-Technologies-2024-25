<?php
require_once __DIR__.'/../models/connectaBD.php';
require_once __DIR__.'/../models/modificar_compte.php';
require_once __DIR__.'/../models/compte.php';

$connexio = connectaBD();
$usuari = getUsuari($connexio, $_SESSION['user_id']);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Enviar'])) {
    $nouNom = $_POST['Nombre'];
    $nouEmail = $_POST['Email'];
    $novaContrasenya = $_POST['Contraseña'];
    $repetirContrasenya = $_POST['Contraseña2'];
    $novaAdreça = $_POST['Dirección'];
    $novaPoblacio = $_POST['Población'];
    $nouCP = $_POST['CP'];
    
    if ($novaContrasenya == $repetirContrasenya) {
        $rutaImatge = $usuari[0]['img'];
        if (isset($_FILES['upload-button']) && !empty($_FILES['upload-button']['name'])) {
            if (file_exists($usuari[0]['img'])) {
                unlink($usuari[0]['img']);
            }

            // Generar un nombre único para evitar colisiones
            $nombreArchivo = basename($_FILES['upload-button']['name']);
            $nombreUnico = uniqid() . '-' . preg_replace("/[^a-zA-Z0-9\._-]/", "", $nombreArchivo);

            // Ruta absoluta y pública
            $rutaDestino = $filesAbsolutePath . $nombreUnico;
            $rutaImatge = $filesPublicPath . $nombreUnico;

            // Mover el archivo al directorio uploadedFiles
            if (!move_uploaded_file($_FILES['upload-button']['tmp_name'], $rutaDestino)) {
                die("Error: No s'ha pogut desar la imatge de perfil.");
            }
        }

        $resultat = actualitzaUsuari(
            $connexio,
            $_SESSION['user_id'],
            $nouNom,
            $nouEmail,
            password_hash($novaContrasenya, PASSWORD_DEFAULT),
            $novaAdreça,
            $novaPoblacio,
            $nouCP,
            $rutaImatge
        );

        if ($resultat) {
            header("Location: /index.php?accio=compte");
            exit;
        } else {
            die("Error: No s'ha pogut actualitzar la informació.");
        }
    } else {
        $_SESSION['error_message'] = "*Les contrasenyes han de ser iguals.";
        header("Location: /index.php?accio=modificar_compte");
    }
} else {
    require __DIR__.'/../vistes/modificar_compte.php';
}
?>
