<?php
    include_once '../Fonctions/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $conn = getConnection();
        $action = $_POST['action'];

        switch ($action) {
            case 'editFourn':
                $id_fourn = intval($_POST['id_fourn']);

                $sql = "SELECT* FROM fournisseur";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_exemplaire);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'Aucun exemplaire trouvé pour cet ID']);
                }
                break;
                case 'updateExemp':
                    $id_exemplaire = $_POST['id_exemplaire']; 
                    $code_bar = $_POST['code_bar'];  
                    $nom_produit = $_POST['nom_produit'];
                    $original_price = $_POST['original_price'];
                    $special_price = $_POST['special_price'];
                    $id_produit = $_POST['id_produit'];
                
                    // Correction de la requête
                    $sql = "UPDATE exemplaire 
                            SET nom_produit = ?, original_price = ?, special_price = ?, id_produit = ? 
                            WHERE id_exemplaire = ?";
                
                    $conn = getConnection();
                    $result = $conn->prepare($sql);
                
                    // Correction des types et du nombre de paramètres
                    $result->bind_param("siiii", $nom_produit, $original_price, $special_price, $id_produit, $id_exemplaire);
                
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

                    case 'deleteExemp':

                        $id_exemplaire = $_POST['id_exemplaire'];
                        $sql = "DELETE FROM exemplaire WHERE id_exemplaire = ?";
                        $conn = getConnection();
                        $result = $conn -> prepare($sql);
                        $result -> bind_param("i", $id_exemplaire);
                        if($result->execute()){
                            $response = array(
                                'success' => true,
                                'message' => 'Supression effectuee'
                            );
                        }else{
                            $response = array(
                                'success' => false,
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
