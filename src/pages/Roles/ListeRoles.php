<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
require '../Fonctions/fonctions.php';
$sql = "SELECT* FROM roles";
$conn = getConnection();
$result = $conn -> query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ListeRoles</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>

      
<!-- Liste des produits  -->

<div class="container my-5">
    <h1 class="text-center text-bold">Liste des Roles</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-cube"></i> Roles</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" id = "btnAddRole" data-bs-toggle="modal" data-bs-target="#addRoleModal" data-action="add">
            <i class="typcn typcn-plus m-lg-1"></i> Ajouter Role
            </button>
        </div>
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                            <th scope="col"><i class="typcn typcn-key-outline menu-icon"></i> IDRole
                            <th scope="col"><i class="typcn typcn-user-outline menu-icon"></i>Nom
                            <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>

                        </tr>
                    </thead>
                        <tbody id="rolesList">
                            <?php
                            if($result -> num_rows >0){
                                While($row = $result->fetch_assoc()){
                                    ?>
                                    <tr>
                                         <td><?=$row["id_role"]?></td>
                                         <td><?=$row["nom_role"]?></td>     
                                         <td class='text-center'>
                                         <button class="btn btn-warning rounded btnEdit" id="<?= $row["id_role"] ?>" name="btnmod" data-action="edit"> <i class="typcn typcn-edit fs-3"></i></button>
                                         <button class="btn btn-danger rounded btnDel" id="<?= $row["id_role"] ?>" name="btnsup"><i class="typcn typcn-trash fs-3"></i></button>
                                        </td>
                                       </tr>
                                    <?php
                                }
                            }else{
                                echo "<tr><td colspan='6' style='text-align:center;'>Aucun role trouvé</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Précédent">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Suivant">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Modal pour ajouter un produit -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addRoleModalLabel"><i class="typcn typcn-plus m-lg-1"></i> Ajouter un role <i class="typcn typcn-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajoutRoleForm" method = "post" action ="">
                        <div class="mb-3">
                            <label for="id_role" class="form-label">
                                <i class="typcn typcn-key-outline menu-icon"></i> ID du rôle
                            </label>
                            <input type="number" class="form-control" id="id_role" name="id_role" placeholder="Entrez l'identifiant du rôle">   
                        </div>                             
                        <div class="mb-3">
                            <label for="nom" class="form-label">
                                <i class="typcn typcn-user-outline menu-icon"></i> Nom du rôle
                            </label>
                            <input type="text" class="form-control" id="nom_role" name="nom_role" placeholder="Entrez le nom du rôle" title="Veuillez entrer un nom valide.">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times-circle me-2"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-success" name = "enregistrer" id ="saveButton">
                                <i class="fas fa-check-circle me-2"></i> Enregistrer
                            </button>
                            <button type="button" class="btn btn-warning d-none"  name = "modifier" id ="updateButton">
                                <i class="fas fa-check-circle me-2"></i> Modifier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript"></script>



        <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.php -->
      <?php
          require_once '../Nav/footer.php';
      ?> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/template.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../assets/vendors/chart.js/chart.umd.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/chart.js"></script>
  <!-- End custom js for this page-->
   
  <?php
    if (isset($_POST["enregistrer"])) {
        if (isset($_POST["nom_role"]) && !empty($_POST["nom_role"])) {
            $nom = $_POST["nom_role"];
    
            $conn = getConnection();
    
            if (!$conn) {
                die("Échec de la connexion à la base de données !");
            }
    
            $sql = "INSERT INTO roles (nom_role) VALUES (?)";
            $result = $conn->prepare($sql);
    
            if ($result) {
        
                $result->bind_param("s", $nom);
    
                if ($result->execute()) {
    
                    $_SESSION["id"] = $id;
                    $_SESSION["nom"] = $nom;
    
                    header("Location: ../../pages/samples/succes.php");
        
                } else {
                    header("Location: ../../pages/samples/succes.php");

                }
                $result->close();
            } else {
                die("Erreur lors de la préparation de la requête : " . $conn->error);
            }
            $conn->close();
        } else {
            echo "Le nom du rôle est requis.<br>";
        }
    }
    ?>




  <script>

    $(document).ready(function () {
          $('#btnAddRole').click(function () {
              $('#ajoutRoleForm')[0].reset();
              $('#id_role').parent().hide(); 
              $('#id_role').val(''); 
              // Changer l'affichage des boutons
              $('#saveButton').removeClass('d-none');
              $('#updateButton').addClass('d-none'); 
              // Afficher le modal
              $('#addRoleModal').modal('show');
         });
      })

    $(document).on('click', '.btnEdit', function(){
        var id_role = $(this).attr('id');
        var actionType = $(this).data('action');
    //    alert (id_role);
       console.log('Envoi de la requête AJAX...');
       $.ajax({
        url: 'TraitementRole.php',
        type: 'POST',
        data: {
        id_role: id_role,
        action: 'editRole'
    },
    success: function(response) {
        // Affiche toute la réponse du serveur dans la console
        console.log("Réponse du serveur : ", response);
        
        // On vérifie si la réponse est bien en JSON
        try {
            const data = JSON.parse(response); // Essaie de parser la réponse JSON
            console.log("Données reçues :", data);
            if (data.error) {
                alert(data.error); // Affiche l'erreur s'il y en a
            } else {
                $('#id_role').val(data.id_role);
                $('#nom_role').val(data.nom_role);
                updateBtn = document.getElementById('updateButton');
                saveBtn = document.getElementById('saveButton');
                updateBtn.classList.remove('d-none');
                saveBtn.classList.add('d-none');
                $('#id_role').prop('disabled', true);
                $('#addRoleModal').modal('show');
            }
        } catch (e) {
            console.error("Erreur lors du parsing de la réponse JSON :", e);
            console.log("Réponse brute du serveur :", response);
        }
    },
    error: function(xhr, status, error) {
        console.log("Erreur AJAX :", status, error);  // Affiche l'erreur AJAX si elle existe
    }
});
    $('#openAddRoleModal').click(function() {
        $('#resetButton').click();
        $('#saveButton').removeClass('d-none');
        $('#updateButton').addClass('d-none');

        $('#id_role').val('').prop('disabled', false);

        // Réinitialiser les champs du formulaire
        $('#id_role').val('');
        $('#nom_role').val('');
    });
    })

// evenement applique sur le bouton ajoutRole
$('#updateButton').click(function(){
    var id_role = $('#id_role').val();
    var nom_role = $('#nom_role').val();
    $.ajax({
    url: 'TraitementRole.php',
    type: 'POST',
    data: {
            id_role: id_role,
            nom_role: nom_role,
            action: 'updateRole'
        },

        dataType: 'json',
        success: function(data){
            alert(data.message);
            $('#addRoleModal').modal('hide');
            location.reload();
        },
        error: function(){

            alert("Une erreur est survenue lors de la reccuperation des details du role!");
            console.error("Une erreur est survenue lors de la reccuperation des details du role!");       
        }
    })
});

   //suppression d'un role
   $('#openAddRoleModal').click(function(){
    $('#resetButton').click();
    updateBtn = document.getElementById('updateButton');
    saveBtn = document.getElementById('saveButton');
    saveBtn.classList.remove('d-none');
    updateBtn.classList.add('d-none');
});

$(document).on('click', '.btnDel', function(){
    var id_role = $(this).attr('id');
    alert (id_role);
    $.ajax({
        url: 'TraitementRole.php',
        type: 'POST',
        data: {
            id_role:id_role,
            action: 'deleteRole'
        },
        dataType: 'json',
        success: function(data){
           location.reload();
        },
        error:function(){
            alert("Une erreur est survenue lors de la reccuperation des details du role!");
            console.error("Une erreur est survenue lors de la reccuperation des details du role..");
           // console.error("");
        }
    });
})

    
    </script>
</body>
</html>
