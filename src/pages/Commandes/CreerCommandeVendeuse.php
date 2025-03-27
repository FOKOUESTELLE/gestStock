<?php
session_start();
require_once '../Nav/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Creer une commande</title>
</head>

<body>
      <!-- partial -->
    <br><br><br>
    <div class="container-fluid page-body-wrapper">      
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas mt-10" id="sidebar">
    
        <ul class="nav">
          <li class="nav-item">      
          </li>          
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gestion-commandes" aria-expanded="false" aria-controls="gestion-achats">
             <i class="typcn typcn-shopping-bag menu-icon"></i>  
             <span class="menu-title">Gestion des commandes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gestion-commandes">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/commandes/ListeCommandesVendeuse.php">Liste des commandes</a></li>
              </ul>
            </div>   
        </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../samples/login.php"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../samples/login.php"> Deconnexion</a></li>                             
              </ul>
            </div>
          </li>                            
          <li class="nav-item">
            <a class="nav-link" href="../../../docs/documentation.html">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
    <!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Creer une commande</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Creer une commande<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
            <form enctype="multipart/form-data" id="ajoutCmdForm" method="POST" action="">
              <div>  
                  <label for="code_client" class="form-label">
                  <i class="typcn typcn-tag"></i> ID Client
                  </label>
                  <input type="text" class="form-control" id="id_client" name="id_client" required >
              </div>
              <div>  
                <label for="code_client" class="form-label">
                <i class="typcn typcn-tag"></i> Date
                </label>
                <input type="date" class="form-control" id="date_cmd" name="date_cmd" required >
              </div>

              <div class="mb-3">
                  <label for="raison_achat" class="form-label">
                  <i class="typcn typcn-lightbulb"></i> Type de commande
                  </label>
                  <select class="form-select" id="raison_achat" name="raison_achat" required>
                      <option value="">Sélectionnez le type de commande</option>
                      <option value="Stocker">Plus</option>
                      <option value="Vendre">Fleet</option>
                  </select>
              </div>                  
              <div class="mb-3">
                  <label for="reduction" class="form-label">
                  <i class="typcn typcn-credit-card"></i>Reduction
                  </label>
                  <input type="text" class="form-control" id="reduction" name="reduction" required>
              </div>
              <div class="mb-3">
                  <label for="frais_livraison" class="form-label">
                  <i class="typcn typcn-location-arrow"></i> Frais de livraison
                  </label>
                  <input type="text" class="form-control" id="frais_livraison" name="frais_livraison" required>
              </div>  
              <div class="mb-3">
                  <label for="methode_livraison" class="form-label">
                  <i class="typcn typcn-location"></i> Méthode de livraison
                  </label>
                  <select class="form-select" id="methode_livraison" name="methode_livraison" required>
                      <option value="">Sélectionnez la méthode de livraison</option>
                       <option value="Sur place">Retrait en magasin</option>
                       <option value="A domicile"> Livraison À domicile</option>
                  </select>
              </div>
                    
              <div class="mb-3">
                  <label for="adresse_livraison" class="form-label">
                  <i class="typcn typcn-home"></i> Adresse de livraison
                  </label>
                  <input type="text" class="form-control" id="adresse_livraison" name="adresse_livraison" required>
              </div>
              
              <div class="mb-3">
                  <label for="frais_transport" class="form-label">
                  <i class="typcn typcn-plane"></i> Frais de transport
                  </label>
                  <input type="text" class="form-control" id="frais_transport" name="frais_transport" required>
              </div>
             <div class="mb-3">
                  <label for="total" class="form-label">
                  <i class="typcn typcn-credit-card"></i> Total
                  </label>
                  <input type="text" class="form-control" id="total" name="total" required>
              </div>
              <div class="mb-3">
                 <label for="statut" class="form-label">
                 <i class="typcn typcn-info-large"></i> Statut
                 </label>
                 <input type="text" class="form-control" id="statut" name="statut" required>
              </div>
              
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
         require_once "../Nav/footer.php";
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
       $id_client = $_POST["id_client"];
       $date_cmd = $_POST["date_cmd"];
       $type_cmd = $_POST["type_cmd"];
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
