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
  <title>Creer une commande</title>
</head>

<body>
      
<!-- formulaire d'ajout -->
    <div class="container my-5">
    
        <h1 class="text-center text-bold">Creer une commande</h1>
        <div class="card border-primary mb-4 rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-plus-outline menu-icon"></i> Creer une commande<i class="fas fa-plus-circle"></i></h3>             
            </div>
            <div class="card-body shadow">
            <form enctype="multipart/form-data" id="ajoutCmdForm" method="POST" action="">
                    
                    <div class="mb-3">
                        <label for="num_cmd" class="form-label">
                        <i class="typcn typcn-tag"></i> Numéro de commande
                        </label>
                        <input type="text" class="form-control" id="num_cmd" name="num_cmd" placeholder="Entrez le numéro de commande" required maxlength="6" pattern="[A-Za-z0-9]{1,6}" title="Le numéro doit contenir 1 à 6 caractères alphanumériques.">
                    </div>
                    <div class="mb-3">
                  <label for="code_client" class="form-label">
                  <i class="typcn typcn-tag"></i> CodeClient
                  </label>
                  <input type="text" class="form-control" id="code_client" name="code_client" placeholder="Code Client" required >
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
                        <label for="sous_total" class="form-label">
                        <i class="typcn typcn-credit-card"></i>Sous Total
                        </label>
                        <input type="text" class="form-control" id="sous_total" name="sous_total" required>
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
                    
                    <div class="mb-3">
                        <label for="frais_livraison" class="form-label">
                        <i class="typcn typcn-location-arrow"></i> Frais de livraison
                        </label>
                        <input type="text" class="form-control" id="frais_livraison" name="frais_livraison" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="metode_paiement" class="form-label">
                        <i class="typcn typcn-credit-card"></i> Méthode de paiement
                        </label>
                        <select class="form-select" id="metode_paiement" name="metode_paiement" required>
                            <option value="">Sélectionnez la méthode de paiement</option>
                            <option value="Espece">Espèce</option>
                            <option value="Orange money">Orange Money</option>
                            <option value="Mobile money">Mobile Money</option>
                        </select>
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
                        <label for="adresse_facturation" class="form-label">
                        <i class="typcn typcn-document"></i> Adresse de facturation
                        </label>
                        <input type="text" class="form-control" id="adresse_facturation" name="adresse_facturation" required>
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
</body>

</html>
