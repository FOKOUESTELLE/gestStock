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

                $sql = "SELECT * FROM produits WHERE id_produit = ?";
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
                    $categorie = $_POST['categorie'];
                    $id_categorie = $_POST['id_categorie'];
                    $nom_produit = $_POST['nom_produit'];
                    $nbre_exemp = $_POST['nbre_exemp'];
                    $description= $_POST['description'];

                    $sql = "UPDATE produits set categorie = ?, id_categorie = ?, nom_produit = ?, nbre_exemp = ?, description = ? WHERE id_produit = ?";
                    //echo json_encode($sql);
                    $conn = getConnection();
                    $result = $conn -> prepare($sql);
                    $result -> bind_param("sisisi", $categorie, $id_categorie, $nom_produit, $nbre_exemp, $description, $id_produit);
                    if($result->execute()){

                        $response = array(
                            'success' => true,
                            'message' => 'Mise a jour effectuee'
                        );

                    }else{

                        $response = array(
                            'success' => false,
                            'message' => 'Echec lors de la modification'
                        );

                    }
                    // var_dump($response);
                    echo json_encode($response);
                    // Fermer la connexion
                    //closeConnection($conn);
                    //exit();

                    break;

                    case 'deleteCategorie':

                        $id_categorie = $_POST['id_categorie'];
                        $sql =  "DELETE FROM categorie WHERE id_categorie = ?";
                        $conn = getConnection();
                        $result = $conn -> prepare($sql);
                        $result -> bind_param("i",  $id_categorie);
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
