
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
$conn = getConnection();
$sql = "SELECT id_categorie, nom_cat FROM categorie";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AjoutProduit</title>

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
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter un Produit</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Ajouter un Produit<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
                <form  enctype="multipart/form-data" id="ajoutProduitForm" method = "POST" action ="">
                    <div class="mb-3">
                        <!-- <label for="code" class="form-label"> -->
                        <!-- <i class="typcn typcn-tag menu-icon"></i> ID produit -->
                        <!-- </label> -->
                        <!-- <input type="text" class="form-control" id="id_prod" name = "id_prod" placeholder="Entrez l'identifiant du produit'" required> -->
                    <!-- </div> -->
                    <div class="mb-3">
                       <label for="type" class="form-label">
                       <i class="typcn typcn-th-large-outline menu-icon"></i>Categorie
                       </label>
                       <select class="form-select" id="nom_cat" name = "nom_cat" onchange = "updateCategorieId()" required>
                           <option value="">Sélectionnez la categorie</option>
                           <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
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
                        <input type="text" class="form-control" id="nom" name = "nom" placeholder="Entrez le nom du produit" required title="Veuillez entrer un nom valide.">
                    </div>
                    <div class="mb-3">
                        <label for="qte" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Nombre d'exemplaire
                        </label>
                        <input type="number" class="form-control" id="nbre_exemp" name = "nbre_exemp" required> 
                    </div>        
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">
                        <i class="typcn typcn-document-text menu-icon"></i>Description
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez la description du produit"></textarea>
                    <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="typcn typcn-times me-2"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-success" name="enregistrer">
                        <i class="typcn typcn-tick me-2"></i> Enregistrer
                    </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->
    <!-- <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script> -->
    <!-- <script src="js/popper.min.js" type="text/javascript"></script> -->



        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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
       $nom = $_POST["nom"];
       $nbre_exemp = $_POST["nbre_exemp"];
       $description = $_POST["description"];
       $conn = getConnection();
       
       if (!$conn) {
           die("Échec de la connexion à la base de données !");
       }
      
       // Utiliser une requête préparée pour éviter l'injection SQL
       $sql = "INSERT INTO produits (categorie, id_categorie, nom_produit, nbre_exemp, description) VALUES (?, ?, ?, ?, ?)";
       $result = $conn->prepare($sql);
       if (!$result) {
        die("Erreur lors de la préparation de la requête: " . $conn->error);
    }    
       if ($result) {
          
           $result->bind_param("sisis", $categorie, $id_categorie, $nom,  $nbre_exemp, $description);
           if ($result->execute()) {
               $_SESSION["categorie"] = $categorie;
               $_SESSION["id_categorie"] = $id_categorie;
               $_SESSION["nom"] = $nom;
               $_SESSION["nbre_exemp"] = $nbre_exemp;
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


</body>
</html>
