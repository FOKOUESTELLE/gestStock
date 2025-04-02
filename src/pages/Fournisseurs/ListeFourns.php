<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
$sql = "SELECT * FROM fournisseur";
$conn = getConnection();
$result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ListeFournisseurs</title>
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
    <h1 class="text-center text-bold">Liste des Founnisseurs</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-group-outline"></i>Fournnisseur</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" id = "btnAddFourn" data-bs-toggle="modal" data-bs-target="#addFournModal">
            <i class="typcn typcn-user-add"></i> Ajouter Fournisseur 

            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                        <th scope="col"><i class="typcn typcn-pencil menu-icon fs-3"></i> ID fournisseur</th>
                        <th scope="col"><i class="typcn typcn-user menu-icon fs-3"></i> Nom</th>
                        <th scope="col"><i class="typcn typcn-mail menu-icon fs-3"></i> Email
                        <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>

                    </thead>

                        <tbody id="clientsList">
                                <?php
                                    if($result -> num_rows >0){
                                        While($row = $result->fetch_assoc()){
                               ?>
                        <tr>
                            <td><?=$row["id_fourn"]?></td>
                            <td><?=$row["nom_fourn"]?></td>
                            <td><?=$row["email"]?></td>
                            <td class='text-center'>
                              <button class="btn btn-warning rounded btnEdit" id="<?= $row["id_fourn"]?>" name="btnmod"> <i class="typcn typcn-edit fs-3"></i></button>
                                <button class="btn btn-danger rounded btnDel" id="<?= $row["id_fourn"]?>" name="btnsup"><i class="typcn typcn-trash fs-3"></i></button>
                             </td>
                            </tr>
                            <?php
                               }
                           }
                           else{
                               echo "<tr><td colspan='6' style='text-align:center;'>Aucun fournisseur trouvé</td></tr>";
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
    <div class="modal fade" id="addFournModal" tabindex="-1" aria-labelledby="addFournModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addFournModalLabel"><i class="typcn typcn-user-add"></i>Ajouter un Fournisseur <i class="fas fa-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="typcn typcn-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                <form id="ajoutFournForm" method = "post" action ="">
                    <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-key menu-icon fs-3"></i> ID Fournisseur
                        </label>
                        <input type="text" class="form-control" id="id_fourn" name = "id_fourn" required readonly> 
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Nom du fournisseur
                        </label>
                        <input type="text" class="form-control" id="nom_fourn" name = "nom_fourn" placeholder="Entrez le nom du fournisseur" required title="Veuillez entrer un nom valide.">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            <i class="typcn typcn-phone-outline menu-icon"></i> Adresse electronique
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse mail" >
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
      $nom_fourn = $_POST["nom_fourn"];
      $email = $_POST["email"];
      $conn = getConnection();
      
      if (!$conn) {
          die("Échec de la connexion à la base de données !");
      }
      $sql = "INSERT INTO fournisseur (nom_fourn, email) VALUES (?, ?)";
      $result = $conn->prepare($sql);
      if (!$result) {
       die("Erreur lors de la préparation de la requête: " . $conn->error);
   }    
      if ($result) {
         
          $result->bind_param("ss", $nom_fourn, $email);
          if ($result->execute()) {
              $_SESSION["nom_fourn"] = $nom_fourn;
              $_SESSION["email"] = $email;
              header("Location: ../../pages/samples/succes.php");
              exit();
          } else {
              // En cas d'erreur
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

    $('#btnAddFourn').click(function () {

        $('#ajoutFournForm')[0].reset();
        $('#id_fourn').parent().hide(); 
        $('#id_fourn').val(''); 

        // Changer l'affichage des boutons
        $('#saveButton').removeClass('d-none');
        $('#updateButton').addClass('d-none'); 

        // Afficher le modal
        $('#addFournModal').modal('show');
   });
})

$(document).on('click', '.btnEdit', function(){
    var id_fourn = $(this).attr('id');
    //alert(id_fourn);
    console.log('Envoi de la requête AJAX... ID:', id_fourn);
    $.ajax({
        url: 'TraitementFourn.php',
        type: 'POST',
        data: {
            id_fourn: id_fourn,
            action: 'editFourn'
        },
        success: function(response) {
            console.log("Réponse du serveur :", response);

            try {
                const data = JSON.parse(response);

                if (data.error) {
                    alert(data.error);
                } else {
                    $('#id_fourn').val(data.id_fourn).prop('readonly', true);
                    $('#nom_fourn').val(data.nom_fourn).prop('readonly', true);
                    $('#email').val(data.email);

                    $('#updateButton').removeClass('d-none');
                    $('#saveButton').addClass('d-none');

                    $('#addFournModal').removeAttr('aria-hidden');
                    $('#addFournModal').modal('show'); 
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

$('#updateButton').click(function() {
    var id_fourn = $('#id_fourn').val();
    var nom_fourn = $('#nom_fourn').val();
    var email = $('#email').val();

    if (confirm("Êtes-vous sûr de vouloir modifier ce fournisseur ?")) {
    $.ajax({
        url: 'TraitementFourn.php',
        type: 'POST',
        data: {
            id_fourn: id_fourn,
            nom_fourn: nom_fourn,
            email: email,
            action: 'updateFourn'
        },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                alert(data.message); 
                $('#addFournModal').modal('hide');
                location.reload(); 
            } else {
                alert(data.message); 
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur lors de la mise à jour du fournisseur :", status, error);
            alert("Une erreur est survenue lors de la mise à jour du fournisseur.");
        }
    });
    }
});
//suppression d'un produit

$('#openAddFournModal').click(function(){
    $('#resetButton').click();
    updateBtn = document.getElementById('updateButton');
    saveBtn = document.getElementById('saveButton');
    saveBtn.classList.remove('d-none');
    updateBtn.classList.add('d-none');
});

$(document).on('click', '.btnDel', function(){
    var id_exemplaire = $(this).attr('id');
    alert (id_exemplaire);

    if (confirm("Êtes-vous sûr de vouloir supprimer cet exemplaire ?")) {
        $.ajax({
            url: 'TraitementExemp.php',
            type: 'POST',
            data: {
                id_exemplaire: id_exemplaire,
                action: 'deleteExemp'
            },
            dataType: 'json',
            success: function(data){
                alert(data.message);
                if (data.success) {
                    location.reload();
                }
            },
            error: function(){
                alert("Une erreur est survenue lors de la suppression !");
                console.error("Erreur lors de la suppression de exemplaire.");
            }
        });
    }
});


</script>

</body>
</html>
