
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
</body>

</html>
