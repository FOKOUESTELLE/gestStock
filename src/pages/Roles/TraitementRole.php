<?php
    include_once '../Fonctions/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        switch ($action) {
            case 'editRole':
                $id_role = $_POST['id_role'];
                $sql = "SELECT* FROM roles WHERE id_role = $id_role";
                $conn = getConnection();
                $result = $conn -> query($sql);

                if ($result && $result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                    echo json_encode($data);
                } else {
                    // Si aucun résultat n'est trouvé
                    echo json_encode(['error' => 'Aucun rôle trouvé pour cet ID']);
                }
               
                break;


            case 'updateRole':

                    $id_role = $_POST['id_role'];
                    $nom_role = $_POST['nom_role'];

                    $sql = "UPDATE roles set nom_role = '$nom_role' WHERE id_role = $id_role";
                    //echo json_encode($sql);
                    $conn = getConnection();
                    $result = $conn -> query($sql);
                    //$result = true;
                    if($result){

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

                    case 'deleteRole':

                        $id_role = $_POST['id_role'];
                        $sql =  "DELETE FROM roles WHERE id_role = $id_role";
                        $conn = getConnection();
                        $result = $conn -> query($sql);
                        if($result){
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
