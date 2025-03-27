<?php
    include_once '../Fonctions/db_connection.php';

    // Activer le mode debug pour afficher les erreurs PHP
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $conn = getConnection();
        $action = $_POST['action'];

        switch ($action) {
            case 'editCategorie':
                $id_categorie = intval($_POST['id_categorie']);

                $sql = "SELECT * FROM categorie WHERE id_categorie = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_categorie);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'Aucune catégorie trouvée pour cet ID']);
                }
                break;

            case 'updateCategorie':

                    $id_categorie = $_POST['id_categorie'];
                    $nom_cat = $_POST['nom_cat'];
                    $description= $_POST['description'];

                    $sql = "UPDATE categorie set nom_cat = ?, description = ? WHERE id_categorie = ?";
                    //echo json_encode($sql);
                    $conn = getConnection();
                    $result = $conn -> prepare($sql);
                    $result -> bind_param("ssi", $nom_cat, $description, $id_categorie,);
                    //$result = true;
                    if($result->execute()){

                        $response = array(
                            'succes' => true,
                            'message' => 'Mise a jour effectuee'
                        );

                    }else{

                        $response = array(
                            'succes' => false,
                            'message' => 'Echec lors de la modification'
                        );

                    }
                    echo json_encode($response);

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
