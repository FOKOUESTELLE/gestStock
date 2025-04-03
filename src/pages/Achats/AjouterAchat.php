
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
  <title>AjoutAchat</title>
</head>

<body>  
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter un achat</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Ajouter un achat          
            </div>
            <div class="card-body shadow">
            <form enctype="multipart/form-data" id="ajoutAchatForm" method="POST" action="">
                 <div class="mb-3">
                     <label for="type_achat" class="form-label">
                         <i class="typcn typcn-th-large-outline"></i> Type Achat
                     </label>
                     <select class="form-select" id="type_achat" name="type_achat" required>
                         <option value="">Sélectionnez le type de l'achat</option>
                         <option value="M">Local</option>
                         <option value="F">Import</option>
                     </select>
                 </div>
                  <div class="mb-3">
                      <label for="raison_achat" class="form-label">
                          <i class="typcn typcn-lightbulb"></i> Raison de l'Achat
                      </label>
                      <select class="form-select" id="raison_achat" name="raison_achat" required>
                          <option value="">Sélectionnez la raison</option>
                          <option value="Stocker">Stocker</option>
                          <option value="Vendre">Vendre directement</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="qte" class="form-label">
                      <i class="typcn typcn-th-list menu-icon"></i>Quantite
                      </label>
                      <input type="number" class="form-control" id="qte" name="qte" required>   
                  </div>                             
                  <div class="mb-3">
                        <label for="qte" class="form-label">
                        <i class="typcn typcn-th-list menu-icon"></i> Prix unitaire d'achat
                        </label>
                        <input type="number" class="form-control" id="pu_achat" name="pu_achat" required>   
                    </div>                                 
                  <!-- Boutons -->
                  <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="typcn typcn-times"></i> Annuler
                </button>
                <button type="submit" class="btn btn-success" name="enregistrer">
                    <i class="typcn typcn-tick"></i> Enregistrer
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
       $type_achat = $_POST["type_achat"];
       $raison_achat = $_POST["raison_achat"];
       $qte = $_POST["qte"];
       $pu_achat = $_POST["pu_achat"]; 
       $conn = getConnection();
       
       if (!$conn) {
           die("Échec de la connexion à la base de données !");
       }
      
       // Utiliser une requête préparée pour éviter l'injection SQL
       $sql = "INSERT INTO achat (type_achat, raison_achat, qte, pu_achat) VALUES (?, ?, ?, ?)";
       $result = $conn->prepare($sql);
       if (!$result) {
        die("Erreur lors de la préparation de la requête: " . $conn->error);
    }    
       if ($result) {
          
           $result->bind_param("ssii", $type_achat, $raison_achat, $qte, $pu_achat);
           if ($result->execute()) {
               $_SESSION["type_achat"] = $type_achat;
               $_SESSION["raison_achat"] = $raison_achat;
               $_SESSION["qte"] = $qte;
               $_SESSION["pu_achat"] = $pu_achat;
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
