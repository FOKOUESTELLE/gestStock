<?php
    include_once '../Fonctions/db_connection.php';

    // Activer le mode debug pour afficher les erreurs PHP
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $conn = getConnection();
        $action = $_POST['action'];

        switch ($action) {
            case 'editProduit':
                $id_produit = intval($_POST['id_produit']);

                $sql = "SELECT P.id_produit, C.nom_cat, C.id_categorie, P.nom_produit, P.prix_unitaire, P.description
                        FROM produits P, categorie C WHERE P.id_categorie = C.id_categorie AND P.id_produit = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_produit);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'Aucun produit trouvé pour cet ID']);
                }
                break;
                case 'updateProduit':
                    $id_produit = $_POST['id_produit']; 
                    $id_categorie = $_POST['id_categorie'];  
                    $nom_produit = $_POST['nom_produit'];
                    $prix_unitaire = $_POST['prix_unitaire'];
                    $description = $_POST['description'];
                
                    // Correction de la requête
                    $sql = "UPDATE produits 
                            SET nom_produit = ?, prix_unitaire = ?, description = ?, id_categorie = ? 
                            WHERE id_produit = ?";
                
                    $conn = getConnection();
                    $result = $conn->prepare($sql);
                
                    // Correction des types et du nombre de paramètres
                    $result->bind_param("sisii", $nom_produit, $prix_unitaire, $description, $id_categorie, $id_produit);
                
                    if ($result->execute()) {
                        $response = array(
                            'success' => true,
                            'message' => 'Mise à jour effectuée'
                        );
                    } else {
                        $response = array(
                            'success' => false,
                            'message' => 'Échec lors de la modification'
                        );
                    }
                
                    echo json_encode($response);
                    break;
                
                

                    case 'deleteProduit':

                        $id_produit = $_POST['id_produit'];
                        $sql =  "DELETE FROM produits WHERE id_produit = ?";
                        $conn = getConnection();
                        $result = $conn -> prepare($sql);
                        $result -> bind_param("i", $id_produit);
                        if($result->execute()){
                            $response = array(
                                'succes' => true,
                                'message' => 'Supression effectuee'
                            );
                        }else{
                            $response = array(
                                'succes' => false,
                                'message' => 'Echec de la Supression'
                            );

                        }
                        echo json_encode($response);
                        break;
                default:
                //Action inconnue

                http_response_code(400);
                $response = array(
                    'sucess' => false,
                    'message' => 'Action inconnue'


                );

                echo json_encode($response);
                break;


            }
        }

            
?>
