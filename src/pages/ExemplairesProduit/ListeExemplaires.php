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
  <title>ListeExemplaires</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>

      
<!-- Liste des produits  -->

<div class="container my-5">
    <h1 class="text-center text-bold">Liste des Exemplaires</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-cube"></i> Exemplaires</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" data-bs-toggle="modal" data-bs-target="#addStudentModal">
            <i class="typcn typcn-plus m-lg-1"></i> Ajouter un Exemplaire


            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                            <th scope="col"><i class="typcn typcn-tag menu-icon fs-3"></i> SKU
                            <th scope="col"><i class="typcn typcn-credit-card menu-icon"></i> Code barre
                            <th scope="col">  <i class="typcn typcn-tag menu-icon"></i> CodeProduit
                            <th scope="col"><i class="typcn typcn-th-large-outline menu-icon fs-3"></i>Type
                            <th scope="col"><i class="typcn typcn-document-text menu-icon fs-3"></i>Description
                            <th scope="col"><i class="typcn typcn-tag menu-icon"></i> Prix original
                            <th scope="col"><i class="typcn typcn-star menu-icon"></i> Prix spécial
                            <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>

                        </tr>
                    </thead>

                        <tbody id="productsList">
                                 
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>

                                      <td class='text-center'>

                                      <button class="btn btn-info rounded"><i class="typcn typcn-eye-outline me-2 fs-3"></i></button>
                                      <button class="btn btn-warning rounded btnEdit" name="btnmod"> <i class="typcn typcn-edit fs-3"></i></button>
                                        <button class="btn btn-danger rounded" name="btnsup"><i class="typcn typcn-trash fs-3"></i></button>
                                     </td>
                                    </tr>

                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Précédent">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Suivant">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   
    <!-- Modal pour ajouter un produit -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addStudentModalLabel"><i class="typcn typcn-plus m-lg-1"></i> Ajouter un Exemplaire <i class="typcn typcn-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajoutProduitForm" method = "post" action ="">
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
                                <i class="fas fa-times-circle me-2"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-success" name = "enregistrer" id ="saveButton">
                                <i class="fas fa-check-circle me-2"></i> Enregistrer
                            </button>
                            <button type="button" class="btn btn-warning d-none"  name = "modifier" id ="updateButton">
                                <i class="fas fa-check-circle me-2"></i> Modifier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="js/popper.min.js" type="text/javascript"></script>



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
