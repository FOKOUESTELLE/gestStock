<?php
    session_start();
    ob_start();
    require_once '../Nav/navbar.php';
    require_once '../Nav/sidebar.php';
    require_once '../Fonctions/db_connection.php';
    require '../Fonctions/fonctions.php';
    $sql = "SELECT P.id_produit, C.nom_cat, C.id_categorie, P.nom_produit, P.description
            FROM produits P, categorie C WHERE P.id_categorie = C.id_categorie";
    $conn = getConnection();
    $result = $conn -> query($sql);
    $sql2 = "SELECT id_categorie, nom_cat FROM categorie";
    $result2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ListeProduits</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  <script>
     // Fonction pour mettre à jour le champ id_categorie en fonction de la categorie sélectionnée
     function updateCategorieId() {
       var categorieSelect = document.getElementById('nom_cat');
       var categorieIdInput = document.getElementById('id_categorie');
       // Récupérer l'ID de la categorie à partir de l'attribut data-id_categorie de l'option sélectionnée
       var selectedOption =categorieSelect.options[categorieSelect.selectedIndex];
      categorieIdInput.value = selectedOption.getAttribute('data-id_categorie');
     }
</script>
</head>

<body>

      
<!-- Liste des produits  -->

<div class="container my-5">
    <h1 class="text-center text-bold">Liste des Produits</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-cube"></i> Produits</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" id ="btnAddProduit" data-bs-toggle="modal" data-bs-target="#addProduitModal" data-action="add">
            <i class="typcn typcn-plus m-lg-1"></i> Ajouter Produit


            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                            <th scope="col"><i class="typcn typcn-tag menu-icon fs-3"></i> ID Produit
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> Categorie
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i>ID Categorie
                            <th scope="col"> <i class="typcn typcn-tag menu-icon fs-3"></i> Nom du produit
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> Total d'exemplaire
                            <th scope="col"><i class="typcn typcn-document-text menu-icon fs-3"></i>Description
                            <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>

                        </tr>
                    </thead>

                        <tbody id="productsList">

                                            <?php
                              if ($result->num_rows > 0) {
                                  while ($row = $result->fetch_assoc()) {
                                      // Récupérer l'ID du produit
                                      $id_produit = $row["id_produit"];
                                      
                                      // Requête pour compter le nombre d'exemplaires associés au produit
                                      $conn = getConnection();
                                      $sql = "SELECT COUNT(E.id_exemplaire) AS total_exemplaires
                                              FROM exemplaire E
                                              WHERE E.id_produit = ?";
                                      $stmt = $conn->prepare($sql);
                                      if ($stmt) {
                                          $stmt->bind_param("i", $id_produit); // Lier l'ID produit
                                          $stmt->execute();
                                          $stmt->bind_result($total_exemplaires);
                                          $stmt->fetch();
                                          $stmt->close();
                                      } else {
                                          // Si la requête échoue
                                          $total_exemplaires = 0;
                                      }
                                      $conn->close();
                          ?>
                  <tr>
                      <td><?= $row["id_produit"] ?></td>
                      <td><?= $row["nom_cat"] ?></td>
                      <td><?= $row["id_categorie"] ?></td>
                      <td><?= $row["nom_produit"] ?></td>
                      <td><?= isset($total_exemplaires) ? $total_exemplaires : 0 ?></td> <!-- Afficher le nombre d'exemplaires -->
                      <td><?= $row["description"] ?></td>
                      <td class="text-center">
                          <button class="btn btn-warning rounded btnEdit" id="<?= $row["id_produit"] ?>" name="btnmod">
                              <i class="typcn typcn-edit fs-3"></i>
                          </button>
                          <button class="btn btn-danger rounded btnDel" id="<?= $row["id_produit"] ?>" name="btnsup">
                              <i class="typcn typcn-trash fs-3"></i>
                          </button>
                      </td>
                  </tr>
      <?php
              }
          } else {
              echo "<tr><td colspan='7' style='text-align:center;'>Aucun produit trouvé</td></tr>";
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
    <div class="modal fade" id="addProduitModal" tabindex="-1" aria-labelledby="#addProduitModalLabel" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addProduitModalLabel"><i class="typcn typcn-plus m-lg-1"></i> Ajouter un produit <i class="typcn typcn-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajoutProduitForm" method = "post" action ="">
                        <div class="mb-3">
                           <label for="id_produit" class="form-label">
                               <i class="typcn typcn-key-outline menu-icon"></i> ID Produit
                           </label>
                           <input type="number" class="form-control" id="id_produit" name="id_produit" required readonly>   
                        </div>                             
                            <div class="mb-3">
                              <label for="type" class="form-label">
                              <i class="typcn typcn-th-large-outline menu-icon"></i>Categorie
                              </label>
                              <select class="form-select" id="nom_cat" name = "nom_cat" onchange = "updateCategorieId()" required>
                                  <option value="">Sélectionnez la categorie</option>
                                  <?php
                                       if ($result2->num_rows > 0) {
                                           while ($row = $result2->fetch_assoc()) {
                                               echo "<option value='" . $row['id_categorie'] . "' data-id_categorie='" . $row['id_categorie'] . "'>" . $row['nom_cat'] . "</option>";
                                           }
                                       } else {
                                           echo "<option value=''>Aucune categorie disponible</option>";
                                       }
                                       ?>
                              </select>
                          </div>
                           <div class="mb-3">
                               <label for="nom" class="form-label">
                               <i class="typcn typcn-tag menu-icon"></i>ID categorie
                               </label>
                               <input type="text" class="form-control" id="id_categorie" name = "id_categorie" readonly> 
                           </div>
                           <div class="mb-3">
                               <label for="nom" class="form-label">
                               <i class="typcn typcn-tag menu-icon"></i> Nom du produit
                               </label>
                               <input type="text" class="form-control" id="nom_produit" name = "nom_produit" placeholder="Entrez le nom du produit" required title="Veuillez entrer un nom valide.">
                           </div>
                           <div class="mb-3">
                               <label for="description" class="form-label">
                               <i class="typcn typcn-document-text menu-icon"></i>Description
                               </label>
                               <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez la description du produit"></textarea>
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
            $categorie = $_POST["nom_cat"];
            $id_categorie = $_POST["id_categorie"];
            $nom = $_POST["nom_produit"];
            $description = $_POST["description"];
            $conn = getConnection();
            
            if (!$conn) {
                die("Échec de la connexion à la base de données !");
            }
           
            // Utiliser une requête préparée pour éviter l'injection SQL
            $sql = "INSERT INTO produits (categorie, id_categorie, nom_produit, description) VALUES (?, ?, ?, ?)";
            $result = $conn->prepare($sql);
            if (!$result) {
             die("Erreur lors de la préparation de la requête: " . $conn->error);
         }    
            if ($result) {
               
                $result->bind_param("siss", $categorie, $id_categorie, $nom, $description);
                if ($result->execute()) {
                    $_SESSION["categorie"] = $categorie;
                    $_SESSION["id_categorie"] = $id_categorie;
                    $_SESSION["nom_produit"] = $nom_produit;
                    $_SESSION["description"] = $description;
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

    $('#btnAddProduit').click(function () {

        $('#ajoutProduitForm')[0].reset();
        $('#id_produit').parent().hide(); 
        $('#id_produit').val(''); 

        // Changer l'affichage des boutons
        $('#saveButton').removeClass('d-none');
        $('#updateButton').addClass('d-none'); 

        // Afficher le modal
        $('#addProduitModal').modal('show');
   });
})

$(document).on('click', '.btnEdit', function(){
    var id_produit = $(this).attr('id');
    // alert(id_produit);
    console.log('Envoi de la requête AJAX... ID:', id_produit);
    $.ajax({
        url: 'TraitementProd.php',
        type: 'POST',
        data: {
            id_produit: id_produit,
            action: 'editProduit'
        },
        success: function(response) {
            console.log("Réponse du serveur :", response);

            try {
                const data = JSON.parse(response);

                if (data.error) {
                    alert(data.error);
                } else {
                    $('#id_produit').val(data.id_produit).prop('readonly', true);
                    $('#nom_cat').val(data.id_categorie);
                    $('#id_categorie').val(data.id_categorie).prop('readonly', true);
                    $('#nom_produit').val(data.nom_produit);
                    $('#description').val(data.description);
                    // $('#addProduitModalLabel').html("Modifier un produit");

                    $('#updateButton').removeClass('d-none');
                    $('#saveButton').addClass('d-none');

                    $('#addProduitModal').removeAttr('aria-hidden');
                    $('#addProduitModal').modal('show'); 
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
