<?php
// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../Fonctions/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    switch ($action) {
        case 'editRole':
            if (!isset($_POST['id_role']) || !is_numeric($_POST['id_role'])) {
                echo json_encode(['error' => 'ID de rôle invalide']);
                exit;
            }

            $id_role = intval($_POST['id_role']);
            $conn = getConnection();
            $stmt = $conn->prepare("SELECT * FROM roles WHERE id_role = ?");
            $stmt->bind_param("i", $id_role);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $data = $result->fetch_assoc();
                echo json_encode($data);
            } else {
                echo json_encode(['error' => 'Aucun rôle trouvé']);
            }
            exit;

        case 'updateRole':
            if (!isset($_POST['id_role']) || !isset($_POST['nom_role'])) {
                echo json_encode(['succes' => false, 'message' => 'Données manquantes']);
                exit;
            }

            $id_role = intval($_POST['id_role']);
            $nom_role = trim($_POST['nom_role']);

            if (empty($nom_role)) {
                echo json_encode(['succes' => false, 'message' => 'Le nom du rôle est vide']);
                exit;
            }

            $conn = getConnection();
            $stmt = $conn->prepare("UPDATE roles SET nom_role = ? WHERE id_role = ?");
            $stmt->bind_param("si", $nom_role, $id_role);
            $result = $stmt->execute();

            if ($result) {
                echo json_encode(['succes' => true, 'message' => 'Mise à jour effectuée avec succès']);
            } else {
                echo json_encode(['succes' => false, 'message' => 'Erreur lors de la mise à jour']);
            }
            exit;

        case 'deleteRole':
            if (!isset($_POST['id_role']) || !is_numeric($_POST['id_role'])) {
                echo json_encode(['succes' => false, 'message' => 'ID de rôle invalide']);
                exit;
            }

            $id_role = intval($_POST['id_role']);
            $conn = getConnection();
            $stmt = $conn->prepare("DELETE FROM roles WHERE id_role = ?");
            $stmt->bind_param("i", $id_role);
            $result = $stmt->execute();

            if ($result) {
                echo json_encode(['succes' => true, 'message' => 'Suppression effectuée avec succès']);
            } else {
                echo json_encode(['succes' => false, 'message' => 'Erreur lors de la suppression']);
            }
            exit;

        default:
            http_response_code(400);
            echo json_encode(['succes' => false, 'message' => 'Action inconnue']);
            exit;
    }
}
?>
