
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
require '../Fonctions/fonctions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AjoutRole</title>
  </script>
 <script>
    function resetForm() {
        document.getElementById('ajoutRoleForm').reset();
    }
</script>
</head>

<body>
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter un role</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Ajouter un role<i class="fas fa-plus-circle"></i></h3>             
            </div>
                    <div class="card-body shadow">
                        <form  enctype="multipart/form-data" id="ajoutRoleForm" method = "POST" action ="">
                        <!-- <div class="mb-3"> -->
                             <!-- <label for="id_role" class="form-label"> -->
                                 <!-- <i class="typcn typcn-key-outline menu-icon"></i> ID du rôle -->
                             <!-- </label> -->
                             <!-- <input type="number" class="form-control" id="id_role" name="id_role" placeholder="Entrez l'identifiant du rôle" required>    -->
                        <!-- </div>                              -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">
                                <i class="typcn typcn-user-outline menu-icon"></i> Nom du rôle
                            </label>
                            <input type="text" class="form-control" id="nom_role" name="nom_role" placeholder="Entrez le nom du rôle" required title="Veuillez entrer un nom valide.">
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
        if (isset($_POST["nom_role"]) && !empty($_POST["nom_role"])) {
            $nom = $_POST["nom_role"];
            $conn = getConnection();
    
            if (!$conn) {
                die("Échec de la connexion à la base de données !");
            }
    
            $sql = "INSERT INTO roles (nom_role) VALUES (?)";
            $result = $conn->prepare($sql);
    
            if ($result) {
        
                $result->bind_param("s", $nom);
    
                if ($result->execute()) {
    
                    $_SESSION["id"] = $id;
                    $_SESSION["nom"] = $nom;
    
                    header("Location: ../../pages/samples/succes.php");
        
                } else {
                    header("Location: ../../pages/samples/succes.php");

                }
                $result->close();
            } else {
                die("Erreur lors de la préparation de la requête : " . $conn->error);
            }
            $conn->close();
        } else {
            echo "Le nom du rôle est requis.<br>";
        }
    }
    ?>





</body>
</html>
