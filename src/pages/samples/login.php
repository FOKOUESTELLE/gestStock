<?php
session_start();
ob_start();
// require_once '../Nav/navbar.php';
require_once "../Fonctions/db_connection.php";
require "../Fonctions/fonctions.php";

$conn = getConnection();
$sql = "SELECT id_role, nom_role FROM roles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="CSS/login2.css" rel = "stylesheet"> 
</head>
<body>
    <div class = "container">


        <!-- formulaire -->
            <form action ="" method = "post">
                <h1>Se connecter</h1>
                <select class="select" id="role" name="role" required>
                    <option value="">Sélectionnez le rôle</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['nom_role'] . "' data-id_role='" . $row['id_role'] . "'>" . $row['nom_role'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucun rôle disponible</option>";
                    }
                    ?>
                </select>
                <div class="box">
                    <input type = "password" id = "password" name = "password" placeholder ="Entrez votre mot de passe" required>
                </div>
                <div class="box">
                  <button type = "submit" id = "envoyer" name="envoyer">Connexion</a></button>
                </div>
                <div class="oublier">
                   <p><a href ="#">mot de passe oublie?</a>
                </div>

            </form>
   <!-- form-right -->
    <div class="form-right">    
    </div>
    </div> 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['envoyer'])) {
        if (!empty($_POST['role']) && !empty($_POST['password'])) {
            $role = $_POST['role'];
            $password = $_POST['password'];

            // Requête préparée pour récupérer l'utilisateur par rôle
            $sql = "SELECT * FROM users WHERE role = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $role, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                // Vérification du mot de passe
                if ($password === $user['password']) {
                    $_SESSION['user_id'] = $user['id_user'];
                    $_SESSION['role'] = $user['role'];

                    // Gestion des rôles avec switch case
                    switch ($role) {
                        case 'Admin':
                            redirection("../../index.php") ;
                            exit();
                        case 'Vendeuse':
                           redirection("../Commandes/CreerCommandeVendeuse.php");
                            exit();
                        default:
                            echo "<p style='color:red;'>Rôle non reconnu.</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Mot de passe incorrect.</p>";
                }
            } else {
                echo "<p style='color:red;'>Utilisateur non trouvé.</p>";
            }
        } else {
            echo "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
        }
    }
    ?>


</body>
</html>