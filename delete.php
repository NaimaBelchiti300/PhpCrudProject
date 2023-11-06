<?php
require_once('connect.php');

// Vérifie si l'ID de l'enregistrement à supprimer est présent dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifie si l'utilisateur a confirmé la suppression
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Prépare la requête de suppression avec l'ID comme paramètre
        $deleteStmt = $pdo->prepare('DELETE FROM `passion` WHERE `id` = :id');
        $deleteStmt->bindParam(':id', $id);

        // Exécute la requête de suppression
        if ($deleteStmt->execute()) {
            // Redirige l'utilisateur vers la page de visualisation après suppression
            header('Location: view.php');
            exit;
        } else {
            // Affiche un message d'erreur si la suppression a échoué
            echo 'Failed to delete record.';
        }
    } else {
        // Affiche une boîte de dialogue de confirmation pour l'utilisateur
        echo '<script>
            var result = confirm("Are you sure you want to delete this record?");
            if (result) {
                window.location.href = "delete.php?id=' . $id . '&confirm=yes";
            } else {
                window.location.href = "view.php";
            }
        </script>';
    }
} else {
    // Redirige l'utilisateur vers la page de visualisation si l'ID n'est pas présent dans l'URL
    header('Location: view.php');
    exit;
}
?>
