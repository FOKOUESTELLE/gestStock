<?php
// session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
require '../Fonctions/fonctions.php';
$sql = "SELECT* FROM users";       
$conn = getConnection();
$result = $conn -> query($sql);
$sql2 = "SELECT id_role, nom_role FROM roles";
$result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ListeUtilisateur</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />

  <script>
     // Fonction pour mettre à jour le champ id_role en fonction du rôle sélectionné
     function updateRoleId() {
       var roleSelect = document.getElementById('role');
       var roleIdInput = document.getElementById('id_role');
       // Récupérer l'ID du rôle à partir de l'attribut data-id_role de l'option sélectionnée
       var selectedOption = roleSelect.options[roleSelect.selectedIndex];
       roleIdInput.value = selectedOption.getAttribute('data-id_role');
     }
</script>
</head>
<body>
     
<!-- Liste des produits  -->

<div class="container my-5">
    <h1 class="text-center text-bold">Liste des utilisateurs</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-group-outline"></i>Users</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" id = "btnAddUser" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="typcn typcn-user-add"></i> Add User 
            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                        <th scope="col"> <i class="typcn typcn-key-outline menu-icon fs-3"></i> ID user</th>
                        <th scope="col"><i class="typcn typcn-user menu-icon fs-3"></i> Nom</th>
                        <th scope="col"><i class="typcn typcn-user menu-icon fs-3"></i>Adresse mail</th>
                        <th scope="col"><i class="typcn typcn-key-outline menu-icon fs-3"></i>Password</th>
                        <th scope="col"><i class="typcn typcn-user-outline menu-icon fs-3"></i> Role</th>
                        <th scope="col"> <i class="typcn typcn-key-outline menu-icon fs-3"></i> ID Role</th>
                        <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>
                    </tr>
                    </thead>

                        <tbody id="clientsList">
                                <?php
                                    if($result -> num_rows >0){
                                        While($row = $result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?=$row["id_user"]?></td>
                                    <td><?=$row["nom_user"]?></td>
                                    <td><?=$row["adresse_mail"]?></td>
                                    <td><?=$row["password"]?></td>
                                    <td><?=$row["role"]?></td>
                                    <td><?=$row["id_role"]?></td>
                                    <td class="text-center">
                                    <button class="btn btn-warning rounded btnEdit" id="<?= $row["id_user"] ?>" name="btnmod">
                                        <i class="typcn typcn-edit fs-3"></i>
                                    </button>
                                    <button class="btn btn-danger rounded btnDel" id="<?= $row["id_user"] ?>" name="btnsup">
                                        <i class="typcn typcn-trash fs-3"></i>
                                    </button>
                                </td>
                                </tr>
                                <?php
                                    }
                                }
                                else{
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
         <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addStudentModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-3 shadow">
                    <div class="modal-header bg-dark-subtle">
                        <h5 class="modal-title text-success" id="addUserModalLabel"><i class="typcn typcn-user-add"></i>Ajouter un utilisateur <i class="fas fa-plus-circle"></i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times text-danger"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form id="ajoutUserForm" method = "post" action ="">
                    <div class="mb-3">
                         <label for="matricule" class="form-label">
                         <i class="typcn typcn-key-outline menu-icon"></i>ID User
                         </label>
                         <input type="number" class="form-control" id="id_user" name = "id_user" readonly>
                    </div>
                 <div class="mb-3">
                     <label for="nom" class="form-label">
                     <i class="typcn typcn-user menu-icon"></i></i> Nom
                     </label>
                     <input type="text" class="form-control" id="nom_user" name = "nom_user" placeholder="Entrez le nom de l'utilisateur" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide">
                 </div>
                 <div class="mb-3">
                     <label for="email" class="form-label">
                     <i class="typcn typcn-user menu-icon fs-3"></i></i> Adresse mail
                     </label>
                     <input type="email" class="form-control" id="email_user" name = "email_user" placeholder="Entrez l'adresse mail de l'utilisateur" required title="Veuillez entrer une adresse mail valide">
                </div>
                <div class="mb-3">
                    <label for="password_user" class="form-label">
                    <i class="typcn typcn-lock-closed menu-icon fs-3"></i>Mot de passe
                    </label>
                    <input type="password" class="form-control" id="password_user" name="password_user" placeholder="Entrez le mot de passe de l'utilisateur" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!]).{8,}" title="Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spécial (@#$%^&+=!) et avoir une longueur minimale de 8 caractères.">
                </div>
                <div class="mb-3">
                  <label for="matricule" class="form-label">
                  <i class="typcn typcn-user-outline menu-icon"></i>Role
                  </label>
                  <select class="form-select" id="role" name="role" required onchange="updateRoleId()">
                      <option value="">Sélectionnez le rôle</option>
                      <?php
                      if ($result2->num_rows > 0) {
                          while ($row = $result2->fetch_assoc()) {
                              echo "<option value='" . $row['id_role'] . "' data-id_role='" . $row['id_role'] . "'>" . $row['nom_role'] . "</option>";
                          }
                      } else {
                          echo "<option value=''>Aucun rôle disponible</option>";
                      }
                      ?>
                  </select>
              </div>                          
                 </div>                          
                 <div class="mb-3">
                     <label for="matricule" class="form-label">
                     <i class="typcn typcn-key-outline menu-icon"></i>ID role
                     </label>
                     <input type="number" class="form-control" id="id_role" name = "id_role" placeholder="identifiant du role" readonly>
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

</body>
</html>

                    </tbody>
                </table>
                 
                    <!-- <nav aria-label="Page navigation"> -->
                     <!-- <ul class="pagination justify-content-center"> -->
                         <!-- <li class="page-item"> -->
                             <!-- <a class="page-link" href="#" aria-label="Précédent"> -->
                                 <!-- <span aria-hidden="true">&laquo;</span> -->
                             <!-- </a> -->
                         <!-- </li> -->
                         <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
                         <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                         <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                         <!-- <li class="page-item"> -->
                             <!-- <a class="page-link" href="#" aria-label="Suivant"> -->
                                 <!-- <span aria-hidden="true">&raquo;</span> -->
                             <!-- </a> -->
                         <!-- </li> -->
                     <!-- </ul> -->
                 <!-- </nav> -->
             <!-- </div> -->
         <!-- </div> -->
     <!-- </div> -->
 <!-- </div> -->


    <!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->
    <!-- <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script> -->
    <!-- <script src="js/popper.min.js" type="text/javascript"></script> -->



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
      $nom = $_POST["nom_user"];
      $email = $_POST["email_user"];
      $password = $_POST["password_user"];
      $id_role = $_POST["id_role"];  // Tu récupères toujours l'ID du rôle
      $role = $_POST["role"];  // Le nom du rôle

      $conn = getConnection();
      
      if (!$conn) {
          die("Échec de la connexion à la base de données !");
      }
     
      // Utiliser une requête préparée pour éviter l'injection SQL
      $sql = "INSERT INTO users (nom_user, adresse_mail, password, role, id_role) VALUES (?, ?, ?, ?, ?)";
      $result = $conn->prepare($sql);
      if ($result) {
          // Ici, tu passes le nom du rôle et l'ID du rôle
          $result->bind_param("ssssi", $nom, $email, $password, $role, $id_role);
          
          if ($result->execute()) {
              $_SESSION["nom"] = $nom;
              $_SESSION["email"] = $email;
              $_SESSION["password"] = $password;
              $_SESSION["id_role"] = $id_role;
              $_SESSION["role"] = $role;
              
              // Redirection vers la page de succès
              header("Location: ../../pages/samples/succes.php");
              exit();
          } else {
              // En cas d'erreur d'exécution
              header("Location: ../../pages/samples/error-500.php");
              exit();
          }
          $result->close(); 
      } else {
          die("Erreur lors de la préparation de la requête.");
      }
      $conn->close(); 
  }
?>



<script>

$(document).ready(function () {

    $('#btnAddUser').click(function () {

        $('#ajoutUserForm')[0].reset();
        $('#id_user').parent().hide(); 
        $('#id_user').val(''); 

        // Changer l'affichage des boutons
        $('#saveButton').removeClass('d-none');
        $('#updateButton').addClass('d-none'); 

        // Afficher le modal
        $('#addUserModal').modal('show');
   });
})

$(document).on('click', '.btnEdit', function(){
    var id_user = $(this).attr('id');
     //alert(id_user);
    console.log('Envoi de la requête AJAX... ID:', id_user);
    $.ajax({
        url: 'TraitementUser.php',
        type: 'POST',
        data: {
            id_user: id_user,
            action: 'editUser'
        },
        success: function(response) {
            console.log("Réponse du serveur :", response);

            try {
                const data = JSON.parse(response);

                if (data.error) {
                    alert(data.error);
                } else {
                    $('#id_user').val(data.id_user).prop('readonly', true);
                    $('#nom_role').val(data.role);
                    $('#nom_user').val(data.nom_user);
                    $('#id_role').val(data.id_role).prop('readonly', true);
                    $('#email_user').val(data.adresse_mail);
                    $('#password_user').val(data.password);

                    $('#updateButton').removeClass('d-none');
                    $('#saveButton').addClass('d-none');

                    $('#addUserModal').removeAttr('aria-hidden');
                    $('#addUserModal').modal('show'); 
                }
            } catch (e) {
                console.error("Erreur JSON :", e);
                console.log("Réponse brute du serveur :", response);
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur AJAX :", status, error);
        }
    });
});

// evenement applique sur le bouton ajoutProduit

$('#updateButton').click(function() {
    var id_produit = $('#id_produit').val(); // Récupérer l'ID du produit
    var categorie = $('#nom_cat').val();
    var id_categorie = $('#id_categorie').val();
    var nom_produit = $('#nom_produit').val();
    var prix_unitaire = $('#prix_unitaire').val();
    var description = $('#description').val();

    // Envoi de la requête Ajax pour mettre à jour le produit
    if (confirm("Êtes-vous sûr de vouloir modifier ce produit ?")) {
    $.ajax({
        url: 'TraitementProd.php',
        type: 'POST',
        data: {
            id_produit: id_produit,
            categorie: categorie,
            id_categorie: id_categorie,
            nom_produit: nom_produit,
            prix_unitaire: prix_unitaire,
            description: description,
            action: 'updateProduit'
        },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                alert(data.message); 
                $('#addProduitModal').modal('hide'); // Fermer le modal
                location.reload(); // Recharger la page pour voir les changements
            } else {
                alert(data.message); // Afficher l'erreur
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur lors de la mise à jour du produit :", status, error);
            alert("Une erreur est survenue lors de la mise à jour du produit.");
        }
    });
    }
});
//suppression d'un produit

$('#openAddCategorieModal').click(function(){
    $('#resetButton').click();
    updateBtn = document.getElementById('updateButton');
    saveBtn = document.getElementById('saveButton');
    saveBtn.classList.remove('d-none');
    updateBtn.classList.add('d-none');
});

$(document).on('click', '.btnDel', function(){
    var id_produit = $(this).attr('id');

    if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
        $.ajax({
            url: 'TraitementProd.php',
            type: 'POST',
            data: {
                id_produit: id_produit,
                action: 'deleteProduit'
            },
            dataType: 'json',
            success: function(data){
                alert(data.message);
                if (data.succes) {
                    location.reload();
                }
            },
            error: function(){
                alert("Une erreur est survenue lors de la suppression !");
                console.error("Erreur lors de la suppression du produit.");
            }
        });
    }
});


</script>

</body>
</html>
