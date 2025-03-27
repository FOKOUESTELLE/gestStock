
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AjoutProduit</title>
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
                       <select class="form-select" id="nom_cat" name = "nom_cat" required>
                           <option value="">Sélectionnez la categorie</option>
                       </select>
                   </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i>ID categorie
                        </label>
                        <input type="text" class="form-control" id="id_cat" name = "id_cat" required> 
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Nom du 
                        </label>
                        <input type="text" class="form-control" id="nom" name = "nom" placeholder="Entrez le nom du produit" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide.">
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
                
                    <div class="mb-3">
                     <label for="enabled" class="form-label">
                       <i class="typcn typcn-tick-outline menu-icon"></i> Enabled
                     </label>
                     <input type="checkbox" class="form-check-input" id="enabled" name="enabled" value="1">
                     <label class="form-check-label" for="enabled">Produit activé</label>
                   </div>
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
       <footer class="footer">
           <div class="card">
               <div class="card-body">
                   <div class="d-sm-flex justify-content-center justify-content-sm-between">
                       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; 2025 
                           <a href="https://www.glotelho.com/" class="text-muted" target="_blank">Glotelho</a>. Tous droits réservés.</span>
                       <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Développé avec passion  <i class="typcn typcn-heart-full-outline text-danger"></i> par GlotoStock.</span>
                   </div>
               </div>    
           </div>        
       </footer>
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
       // $id = $_POST["id_user"];
       $nom = $_POST["nom_user"];
       $email = $_POST["email_user"];
       $password = $_POST["password_user"];
       $id_role = $_POST["id_role"];
       $role = $_POST["role"];
       $conn = getConnection();
       
       if (!$conn) {
           die("Échec de la connexion à la base de données !");
       }
      
       // Utiliser une requête préparée pour éviter l'injection SQL
       $sql = "INSERT INTO users (nom_user, adresse_mail, password, id_role, role) VALUES (?, ?, ?, ?, ?)";
       $result = $conn->prepare($sql);
       if ($result) {
          
           $result->bind_param("sssis", $nom, $email, $password, $id_role, $role);
           if ($result->execute()) {
               $_SESSION["id"] = $id;
               $_SESSION["nom"] = $nom;
               $_SESSION["email"] = $email;
               $_SESSION["password"] = $password;
               $_SESSION["id_role"] = $id_role;
               $_SESSION["role"] = $role;
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
