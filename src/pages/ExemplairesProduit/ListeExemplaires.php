<?php
    session_start();
    ob_start();
    require_once '../Nav/navbar.php';
    require_once '../Nav/sidebar.php';
    require_once '../Fonctions/db_connection.php';
    require '../Fonctions/fonctions.php';
    $sql = "SELECT E.id_exemplaire, E.code_bar, P.nom_produit, E.original_price, E.special_price, P.id_produit
            FROM exemplaire E, produits P WHERE E.id_produit = P.id_produit";
    $conn = getConnection();
    $result = $conn -> query($sql);
    $sql2 = "SELECT id_produit, nom_produit FROM produits";
    $result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ListeExemplaires</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
  <script>
     // Fonction pour mettre à jour le champ id_produit en fonction du produit sélectionné
     function updateProduitId() {
       var produitSelect = document.getElementById('nom_produit');
       var produitIdInput = document.getElementById('id_produit');
       // Récupérer l'ID du produit à partir de l'attribut data-id_produit de l'option sélectionnée
       var selectedOption =produitSelect.options[produitSelect.selectedIndex];
      produitIdInput.value = selectedOption.getAttribute('data-id_produit');
     }
</script>
</head>

<body>

      
<!-- Liste des produits  -->

<div class="container my-5">
    <h1 class="text-center text-bold">Liste des Exemplaires</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-cube"></i> Exemplaires</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" id = "btnAddExemplaire" data-bs-toggle="modal" data-bs-target="#addExemplaireModal">
            <i class="typcn typcn-plus m-lg-1"></i> Ajouter un Exemplaire


            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> ID Exemplaire</th>
                            <th scope="col"><i class="typcn typcn-credit-card menu-icon"></i> Code barre</th>
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> NomProduit</th>
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> IDProduit</th>
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> Prix original</th>
                            <th scope="col"><i class="typcn typcn-star menu-icon"></i> Prix spécial</th>
                            <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>

                        </tr>
                    </thead>

                        <tbody id="productsList">
                                <?php
                                     if($result -> num_rows >0){
                                         While($row = $result->fetch_assoc()){
                                ?>
                         <tr>
                             <td><?=$row["id_exemplaire"]?></td>
                             <td><?=$row["code_bar"]?></td>
                             <td><?=$row["nom_produit"]?></td>
                             <td><?=$row["id_produit"]?></td>
                             <td><?=$row["original_price"]?></td>
                             <td><?=$row["special_price"]?></td>  
                             <td class='text-center'>
                               <button class="btn btn-warning rounded btnEdit" id="<?= $row["id_exemplaire"]?>" name="btnmod"> <i class="typcn typcn-edit fs-3"></i></button>
                                 <button class="btn btn-danger rounded btnDel" id="<?= $row["id_exemplaire"]?>" name="btnsup"><i class="typcn typcn-trash fs-3"></i></button>
                              </td>
                             </tr>
                             <?php
                                }
                            }
                            else{
                                echo "<tr><td colspan='6' style='text-align:center;'>Aucun exemplaire trouvé</td></tr>";
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
    <div class="modal fade" id="addExemplaireModal" tabindex="-1" aria-labelledby="addExemplaireModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addExemplaireModalLabel"><i class="typcn typcn-plus m-lg-1"></i> Ajouter un Exemplaire <i class="typcn typcn-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajoutExemplaireForm" method = "post" action ="">
                    <div class="mb-3">
                       <label for="nom" class="form-label">
                       <i class="typcn typcn-tag menu-icon"></i>ID exemplaire
                       </label>
                       <input type="text" class="form-control" id="id_exemplaire" name = "id_exemplaire" readonly> 
                   </div>
                    <div class="mb-3">
                       <label for="code_barre" class="form-label">
                           <i class="typcn typcn-credit-card menu-icon"></i> Code barre
                       </label>
                       <input type="text" class="form-control" id="code_bar" name="code_bar"  placeholder="Entrez le code barre du produit" required maxlength="13" autofocus>
                   </div>
                   <div class="mb-3">
                        <label for="type" class="form-label">
                        <i class="typcn typcn-th-large-outline menu-icon"></i>Nom du produit
                        </label>
                        <select class="form-select" id="nom_produit" name = "nom_produit" onchange = "updateProduitId()" required>
                            <option value="">Sélectionnez le produit</option>
                            <?php
                                 if ($result2->num_rows > 0) {
                                     while ($row = $result2->fetch_assoc()) {
                                         echo "<option value='" . $row['id_produit'] . "' data-id_produit='" . $row['id_produit'] . "'>" . $row['nom_produit'] . "</option>";
                                     }
                                 } else {
                                     echo "<option value=''>Aucun produit disponible</option>";
                                 }
                                 ?>
                        </select>
                   </div>
                   <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i>ID produit
                        </label>
                        <input type="text" class="form-control" id="id_produit" name = "id_produit" readonly> 
                    </div>
                   <div class="mb-3">
                       <label for="original_price" class="form-label">
                           <i class="typcn typcn-tag menu-icon"></i> Prix original
                       </label>
                       <input type="text" class="form-control" id="original_price" name="original_price" placeholder="Entrez le prix original du produit" required>
                   </div>
                   
                   <div class="mb-3">
                       <label for="special_price" class="form-label">
                           <i class="typcn typcn-star menu-icon"></i> Prix spécial
                       </label>
                       <input type="text" class="form-control" id="special_price" name="special_price" placeholder="Entrez le prix spécial du produit" required>
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
      $code_bar = $_POST["code_bar"];
      $nom_produit = $_POST["nom_produit"];
      $id_produit = $_POST["id_produit"];
      $original_price = $_POST["original_price"];
      $special_price = $_POST["special_price"];
      $conn = getConnection();
      
      if (!$conn) {
          die("Échec de la connexion à la base de données !");
      }

      //Vérifier si le code-barres existe déjà
    //   $check_sql = "SELECT COUNT(*) FROM produits WHERE code_bar = ?";
    //   $stmt = $conn->prepare($check_sql);
    //   $stmt->bind_param("s", $code_bar);
    //   $stmt->execute();
    //   $stmt->bind_result($count);
    //   $stmt->fetch();
    //   $stmt->close();
  
    //   if ($count > 0) {
        //   echo "<script>alert('Ce code-barres existe déjà !'); window.history.back();</script>";
        //   exit();
    //   }
     
      $sql = "INSERT INTO exemplaire (code_bar, nom_produit, original_price, special_price, id_produit) VALUES (?, ?, ?, ?, ?)";
      $result = $conn->prepare($sql);
      if (!$result) {
       die("Erreur lors de la préparation de la requête: " . $conn->error);
   }    
      if ($result) {
         
          $result->bind_param("ssiii", $code_bar, $nom_produit, $original_price,  $special_price, $id_produit);
          if ($result->execute()) {
              $_SESSION["code_bar"] = $code_bar;
              $_SESSION["nom_produit"] = $nom_produit;
              $_SESSION["original_price"] = $original_price;
              $_SESSION["special_price"] = $special_price;
              $_SESSION["id_produit"] = $id_produit;
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

    $('#btnAddExemplaire').click(function () {

        $('#ajoutExemplaireForm')[0].reset();
        $('#id_exemplaire').parent().hide(); 
        $('#id_exemplaire').val(''); 

        // Changer l'affichage des boutons
        $('#saveButton').removeClass('d-none');
        $('#updateButton').addClass('d-none'); 

        // Afficher le modal
        $('#addExemplaireModal').modal('show');
   });
})

$(document).on('click', '.btnEdit', function(){
    var id_exemplaire = $(this).attr('id');
    //alert(id_exemplaire);
    console.log('Envoi de la requête AJAX... ID:', id_exemplaire);
    $.ajax({
        url: 'TraitementExemp.php',
        type: 'POST',
        data: {
            id_exemplaire: id_exemplaire,
            action: 'editExemp'
        },
        success: function(response) {
            console.log("Réponse du serveur :", response);

            try {
                const data = JSON.parse(response);

                if (data.error) {
                    alert(data.error);
                } else {
                    $('#id_exemplaire').val(data.id_exemplaire).prop('readonly', true);
                    $('#code_bar').val(data.code_bar).prop('readonly', true);
                    $('#nom_produit').val(data.id_produit);
                    $('#original_price').val(data.original_price);
                    $('#special_price').val(data.special_price);
                    $('#id_produit').val(data.id_produit).prop('readonly', true);
                    // $('#addExemplaireModalLabel').html("Modifier un produit");

                    $('#updateButton').removeClass('d-none');
                    $('#saveButton').addClass('d-none');

                    $('#addExemplaireModal').removeAttr('aria-hidden');
                    $('#addExemplaireModal').modal('show'); 
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

// evenement applique sur le bouton ajoutExemplaire

$('#updateButton').click(function() {
    var id_exemplaire = $('#id_exemplaire').val(); // Récupérer l'ID du produit
    var code_bar = $('#code_bar').val();
    var nom_produit = $('#nom_produit').val();
    var original_price = $('#original_price').val();
    var special_price = $('#special_price').val();
    var id_produit = $('#id_produit').val();

    // Envoi de la requête Ajax pour mettre à jour l'exemplaire
    if (confirm("Êtes-vous sûr de vouloir modifier cet exemplaire ?")) {
    $.ajax({
        url: 'TraitementExemp.php',
        type: 'POST',
        data: {
            id_exemplaire: id_exemplaire,
            code_bar: code_bar,
            nom_produit: nom_produit,
            original_price: original_price,
            special_price: special_price,
            id_produit: id_produit,
            action: 'updateExemp'
        },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                alert(data.message); 
                $('#addExemplaireModal').modal('hide'); // Fermer le modal
                location.reload(); // Recharger la page pour voir les changements
            } else {
                alert(data.message); // Afficher l'erreur
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur lors de la mise à jour de l'exemplaire :", status, error);
            alert("Une erreur est survenue lors de la mise à jour de l'exemplaire.");
        }
    });
    }
});
//suppression d'un produit

$('#openAddExemplaireModal').click(function(){
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
