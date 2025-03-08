
<?php
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AjoutClient</title>
</head>

<body>
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter un Client</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Ajouter un Client<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
                <form  enctype="multipart/form-data" id="ajoutClientForm" method = "POST" action ="">
                    <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Code
                        </label>
                        <input type="text" class="form-control" id="code_client" name = "code_client" placeholder="Entrez le code" required maxlength="6" pattern="[A-Za-z0-9]{1,6}" title="Le code doit contenir 1 à 6 caractères alphanumériques.">
                        <small class="form-text text-muted">Par exemple : A12345</small>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Nom
                        </label>
                        <input type="text" class="form-control" id="nom" name = "nom" placeholder="Entrez le nom du produit" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide.">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            <i class="typcn typcn-phone-outline menu-icon"></i> Numéro de téléphone
                        </label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required pattern="^\+?[0-9]{1,4}?[-. \(\)]?(\(?\d{1,3}?\)?[-. \(\)]?)?[\d- .]{5,15}$" title="Entrez un numéro de téléphone valide (ex : +1234567890)">
                        <small class="form-text text-muted">Exemple : +1 (234) 567-8901</small>
                    </div>
                    <div class="mb-3">
                         <label for="adresse" class="form-label">
                            <i class="typcn typcn-location-outline menu-icon"></i> Adresse de Livraison
                         </label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrez l'adresse de livraison" required>
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">
                        <i class="typcn typcn-location-outline menu-icon"></i> Ville
                      </label>
                      <input type="text" class="form-control" id="ville" name="ville" placeholder="Entrez la ville" required pattern="^[A-Za-zÀ-ÿ\s-]+$" title="La ville doit contenir uniquement des lettres et des espaces.">
                        <small class="form-text text-muted">Exemple : Paris</small>
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
</body>

</html>
