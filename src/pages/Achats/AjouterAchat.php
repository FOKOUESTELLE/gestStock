
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
                 <!-- Code achat -->
                 <div class="mb-3">
                     <label for="code_client" class="form-label">
                         <i class="typcn typcn-tag"></i> Code
                     </label>
                     <input type="text" class="form-control" id="code_achat" name="code_achat" 
                            placeholder="Entrez le code" required maxlength="6" 
                            pattern="[A-Za-z0-9]{1,6}" 
                            title="Le code doit contenir 1 à 6 caractères alphanumériques.">
                     <small class="form-text text-muted">
                         <i class="typcn typcn-info-large"></i> Par exemple : A12345
                     </small>
                 </div>

                 <!-- Type d'Achat -->
                 <div class="mb-3">
                     <label for="type_achat" class="form-label">
                         <i class="typcn typcn-th-large-outline"></i> Type
                     </label>
                     <select class="form-select" id="type_achat" name="type_achat" required>
                         <option value="">Sélectionnez le type</option>
                         <option value="M">Local</option>
                         <option value="F">Import</option>
                     </select>
                 </div>

                               <!-- Raison de l'Achat -->
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
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Hand-crafted & made with <i class="typcn typcn-heart-full-outline text-danger"></i></span>
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
</body>

</html>
