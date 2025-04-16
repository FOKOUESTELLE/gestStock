
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
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
  <title>AjoutUsers</title>
  <script>
      // Fonction pour mettre à jour le champ id_role en fonction du rôle sélectionné
      function updateRoleId() {
        var roleSelect = document.getElementById('role');
        var roleIdInput = document.getElementById('id_role');
        // Récupérer l'ID du rôle à partir de l'attribut data-id_role de l'option sélectionnée
        var selectedOption = roleSelect.options[roleSelect.selectedIndex];
        roleIdInput.value = selectedOption.getAttribute('data-id_role');
      }
 </script>
 <script>
    function resetForm() {
        document.getElementById('ajoutUserForm').reset();
    }
</script>
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
                <form  enctype="multipart/form-data" id="ajoutUserForm" method = "POST" action ="">
        
                    <!-- <div class="mb-3"> -->
                        <!-- <label for="matricule" class="form-label"> -->
                        <!-- <i class="typcn typcn-key-outline menu-icon"></i>ID User -->
                        <!-- </label> -->
                        <!-- <input type="number" class="form-control" id="id_user" name = "id_user" placeholder="Entrez l'identifiant de l'utilisateur" required> -->
                    <!-- </div> -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-user menu-icon fs-3"></i></i> Nom
                        </label>
                        <input type="text" class="form-control" id="nom_user" name = "nom_user" placeholder="Entrez le nom de l'utilisateur" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide.">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">
                        <i class="typcn typcn-user menu-icon fs-3"></i></i> Adresse mail
                        </label>
                        <input type="email" class="form-control" id="email_user" name = "email_user" placeholder="Entrez l'adresse mail de l'utilisateur" required title="Veuillez entrer une adresse mail valide.">
                    </div>
                    <div class="mb-3">
                        <label for="password_user" class="form-label">
                        <i class="typcn typcn-lock-closed menu-icon fs-3"></i>Mot de passe
                        </label>
                        <input type="password" class="form-control" id="password_user" name="password_user" placeholder="Entrez le mot de passe de l'utilisateur" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et avoir une longueur minimale de 8 caractères.">
                    </div>
                    <div class="mb-3">
                         <label for="matricule" class="form-label">
                         <i class="typcn typcn-user-outline menu-icon"></i>Role
                         </label>
                         <select class="form-select" id="role" name="role" required onchange="updateRoleId()">
                             <option value="">Sélectionnez le rôle</option>
                             <?php
                             if ($result->num_rows > 0) {
                                 while ($row = $result->fetch_assoc()) {
                                     echo "<option value='" . $row['nom_role'] . "' data-id_role='" . $row['id_role'] . "'>" . $row['nom_role'] . "</option>";
                                 }
                             } else {
                                 echo "<option value=''>Aucun rôle disponible</option>";
                             }
                             ?>
                         </select>
                     </div>                          
                    <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-key-outline menu-icon"></i>ID role
                        </label>
                        <input type="number" class="form-control" id="id_role" name = "id_role" placeholder="identifiant du role" readonly>
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
      $nom = $_POST["nom_user"];
      $email = $_POST["email_user"];
      $password = $_POST["password_user"];
      $id_role = $_POST["id_role"];
      $role = $_POST["role"];  

      $conn = getConnection();
      
      if (!$conn) {
          die("Échec de la connexion à la base de données !");
      }
     
      
      $sql = "INSERT INTO users (nom_user, adresse_mail, password, role, id_role) VALUES (?, ?, ?, ?, ?)";
      $result = $conn->prepare($sql);
      if ($result) {
          
          $result->bind_param("ssssi", $nom, $email, $password, $role, $id_role);
          
          if ($result->execute()) {
              $_SESSION["nom"] = $nom;
              $_SESSION["email"] = $email;
              $_SESSION["password"] = $password;
              $_SESSION["id_role"] = $id_role;
              $_SESSION["role"] = $role;
              
              
              header("Location: ../../pages/samples/succes.php");
              exit();
          } else {
              // En cas d'erreur d'exécution
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
