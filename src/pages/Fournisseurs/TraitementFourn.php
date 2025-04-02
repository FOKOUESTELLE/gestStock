<?php
    include_once '../Fonctions/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $conn = getConnection();
        $action = $_POST['action'];

        switch ($action) {
            case 'editFourn':
                $id_fourn = intval($_POST['id_fourn']);

                $sql = "SELECT* FROM fournisseur WHERE id_fourn = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_fourn);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'Aucun fournisseur trouvé pour cet ID']);
                }
                break;
                case 'updateFourn':
                    $id_fourn = $_POST['id_fourn']; 
                    $nom_fourn = $_POST['nom_fourn'];
                    $email = $_POST['email'];
                
                    $sql = "UPDATE fournisseur 
                            SET nom_fourn = ?, email = ?
                            WHERE id_fourn = ?";
                
                    $conn = getConnection();
                    $result = $conn->prepare($sql);
                
                    $result->bind_param("ssi", $nom_fourn, $email, $id_fourn);
                
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

                    case 'deleteFourn':

                        $id_fourn = $_POST['id_fourn'];
                        $sql = "DELETE FROM fournisseur WHERE id_fourn = ?";
                        $conn = getConnection();
                        $result = $conn -> prepare($sql);
                        $result -> bind_param("i", $id_fourn);
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
