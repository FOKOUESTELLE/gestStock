
<?php
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
  <title>AjoutUsers</title>
</head>

<body>
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter un utilisateur</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Ajouter un utilisateur<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
                <form  enctype="multipart/form-data" id="ajoutClientForm" method = "POST" action ="">
        
                    <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-key-outline menu-icon"></i>ID User
                        </label>
                        <input type="number" class="form-control" id="id_user" name = "id_user" placeholder="Entrez l'identifiant de l'utilisateur">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-user menu-icon fs-3"></i></i> Nom
                        </label>
                        <input type="text" class="form-control" id="nom_user" name = "nom_user" placeholder="Entrez le nom de l'utilisateur" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide.">
                    </div>
                    <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-key-outline menu-icon"></i>ID role
                        </label>
                        <input type="number" class="form-control" id="id_role" name = "id_role" placeholder="identifiant du role" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-user-outline menu-icon"></i>Role
                        </label>
                        <select class="form-select" id="role" name = "role" required>
                            <option value="">Sélectionnez le role</option>
                        </select>
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

        <?php
        
            if(isset($_POST["enregistrer"])){
                // $code_client = $_POST["code_client"];
                $nom_client = $_POST["nom_client"];
                $num_tel= $_POST["num_tel"];
                $adresse = $_POST["adresse"];
                $ville = $_POST["ville"];

                $conn = getConnection();

                $sql = "INSERT INTO client VALUES (' $nom_client', '$num_tel', ' $adresse', '$ville')";

                if ($conn->query($sql) === TRUE) {
                    echo "Insertion effectuée";
                } else {
                    echo "Insertion refusée : " . $conn->error;
                }

                $conn->close();
            } 
    
    
    
    
        ?>






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



</body>
</html>
