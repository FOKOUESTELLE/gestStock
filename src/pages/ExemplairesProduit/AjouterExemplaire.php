
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
  <title>AjouterExemplaire</title>
</head>

<body>
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Ajouter un Exemplaire</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i>Ajouter un Exemplaire<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
                <form  enctype="multipart/form-data" id="ajoutProduitForm" method = "POST" action ="">
                    <div class="mb-3">
                        <label for="sku" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> SKU
                        </label>
                        <input type="text" class="form-control" id="sku_prod" name="sku_prod" placeholder="Entrez le SKU du produit" required maxlength="6" pattern="[A-Za-z0-9]{1,6}" title="Le SKU doit contenir 1 à 6 caractères alphanumériques.">
                    </div>  
                    <div class="mb-3">
                        <label for="code_barre" class="form-label">
                            <i class="typcn typcn-credit-card menu-icon"></i> Code barre
                        </label>
                        <input type="text" class="form-control" id="code_barre" name="code_barre" placeholder="Entrez le code barre du produit" required maxlength="13">
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> CodeProduit
                        </label>
                        <input type="text" class="form-control" id="code_prod" name = "code_prod" placeholder="code du produit" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="original_price" class="form-label">
                            <i class="typcn typcn-tag menu-icon"></i> Prix original
                        </label>
                        <input type="text" class="form-control" id="original_price" name="original_price" placeholder="Entrez le prix original du produit" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="special_price" class="form-label">
                            <i class="typcn typcn-star menu-icon"></i> Prix spécial
                        </label>
                        <input type="text" class="form-control" id="special_price" name="special_price" placeholder="Entrez le prix spécial du produit" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="type" class="form-label">
                            <i class="typcn typcn-th-large-outline menu-icon"></i> Type
                        </label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="">Sélectionnez le type</option>
                            <option value="M">Télévision</option>
                            <option value="F">Ordinateur</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            <i class="typcn typcn-document-text menu-icon"></i> Description
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez la description du produit"></textarea>
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
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 
                            <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Hand-crafted & made with 
                            <i class="typcn typcn-heart-full-outline text-danger"></i></span>
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
