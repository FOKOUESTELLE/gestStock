
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Fonctions/db_connection.php';
$conn = getConnection();
$sql = "SELECT id_role, nom_role FROM roles";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AjoutCategorie</title>
</head>

<body>

   <!-- partial -->
   <br><br><br>
   <div class="container-fluid page-body-wrapper">      
     <!-- partial:../../partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas mt-10" id="sidebar">
      
       <ul class="nav">
         <li class="nav-item">
           <a class="nav-link" data-bs-toggle="collapse" href="#gestion-produits" aria-expanded="false" aria-controls="gestion-produits">
           <i class="typcn typcn-gift menu-icon"></i>
             <span class="menu-title">Gestion des Produits</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="gestion-produits">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="../../pages/Produits/AjouterProduitReceptioniste.php">Ajouter</a></li>
               <li class="nav-item"> <a class="nav-link" href="../../pages/Produits/ListeProduitsReceptioniste.php">Liste de produits</a></li>
               <li class="nav-item"> <a class="nav-link" href="../../pages/ExemplairesProduit/AjouterExemplaireReceptioniste.php">AjouterExemplaire</a></li>
               <li class="nav-item"> <a class="nav-link" href="../../pages/ExemplairesProduit/ListeExemplairesReceptioniste.php">Liste des Exemplaires</a></li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#gestion-categorie" aria-expanded="false" aria-controls="gestion-produits">
             <i class="typcn typcn-gift menu-icon"></i>
               <span class="menu-title">Categories de Produits</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="gestion-categorie">
               <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Categories/AjouterCatProdReceptioniste.php">Ajouter</a></li>
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Categories/ListeCategoriesReceptioniste.php">Liste des categories</a></li>
               </ul>
             </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
             <i class="typcn typcn-user-add-outline menu-icon"></i>
             <span class="menu-title">Deconnexion</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="auth">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="../samples/login.php"> Deconnexion </a></li>                              
             </ul>
           </div>
         </li>                            
       </ul>
     </nav>
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter une Categorie</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Ajouter une Categorie<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
                <form  enctype="multipart/form-data" id="ajoutProduitForm" method = "POST" action ="">
                    <!-- <div class="mb-3"> -->
                        <!-- <label for="code_cat" class="form-label"> -->
                        <!-- <i class="typcn typcn-tag menu-icon"></i> ID categorie -->
                        <!-- </label> -->
                        <!-- <input type="text" class="form-control" id="id_cat" name = "id_cat" placeholder="Entrez l'identifiant de la categorie" required> -->
                    <!-- </div> -->
                                      
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Nom Categorie
                        </label>
                        <input type="text" class="form-control" id="nom_cat" name = "nom_cat" placeholder="Entrez le nom de la categorie" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide.">
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">
                        <i class="typcn typcn-document-text menu-icon"></i>Description
                        </label>
                        <textarea class="form-control" id="description_cat" name="description_cat" rows="4" placeholder="Entrez la description de la categorie"></textarea>
                
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
       $nom = $_POST["nom_cat"];
       $description = $_POST["description_cat"];
       $conn = getConnection();
       
       if (!$conn) {
           die("Échec de la connexion à la base de données !");
       }
      
       // Utiliser une requête préparée pour éviter l'injection SQL
       $sql = "INSERT INTO categorie (nom_cat, description) VALUES (?, ?)";
       $result = $conn->prepare($sql);
       if ($result) {
          
           $result->bind_param("ss", $nom, $description);
           if ($result->execute()) {
               $_SESSION["id_cat"] = $id_cat;
               $_SESSION["nom_cat"] = $nom_cat;
               $_SESSION["description"] = $email;
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
