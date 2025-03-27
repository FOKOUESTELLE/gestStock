<?php
require_once '../Nav/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ListeCommandes</title>
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
     <!-- partial -->
     <br><br><br>
   <div class="container-fluid page-body-wrapper">      
     <!-- partial:../../partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas mt-10" id="sidebar">
   
       <ul class="nav">
         <li class="nav-item">      
         </li>          
       <li class="nav-item">
           <a class="nav-link" data-bs-toggle="collapse" href="#gestion-commandes" aria-expanded="false" aria-controls="gestion-commandes">
            <i class="typcn typcn-shopping-bag menu-icon"></i>  
            <span class="menu-title">Gestion des commandes</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="gestion-commandes">
             <ul class="nav flex-column sub-menu">
             <li class="nav-item"> <a class="nav-link" href="../../pages/Commandes/CreerCommandeVendeuse.php">Creer</a></li>
               <li class="nav-item"> <a class="nav-link" href="../../pages/Commandes/ListeCommandesVendeuse.php">Liste des commandes</a></li>
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
      
<!-- Liste des produits  -->

<div class="container my-5">
    <h1 class="text-center text-bold">Liste des Commandes</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-cube"></i> Commandes</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" data-bs-toggle="modal" data-bs-target="#addCmdModal">
            <i class="typcn typcn-plus m-lg-1"></i> CreerCommande


            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                            <th scope="col"><i class="typcn typcn-tag menu-icon fs-3"></i> Numero
                            <th scope="col"><i class="typcn typcn-tag menu-icon fs-3"></i> CodeClient
                            <th scope="col"> <i class="typcn typcn-lightbulb"></i> Type de commande
                            <th scope="col"><i class="typcn typcn-credit-card"></i> Reduction
                            <th scope="col"><i class="typcn typcn-credit-card"></i> Sous Total
                            <th scope="col"><i class="typcn typcn-credit-card"></i> Total
                            <th scope="col"><i class="typcn typcn-info-large"></i> Statut
                            <i class="typcn typcn-location-arrow"></i> Frais de livraison
                            <th scope="col"> <i class="typcn typcn-credit-card"></i> Méthode de paiement
                            <th scope="col"> <i class="typcn typcn-location"></i> Méthode de livraison
                            <th scope="col"> <i class="typcn typcn-home"></i> Adresse de livraison
                            <th scope="col"> <i class="typcn typcn-plane"></i> Frais de transport
                            <th scope="col"> <i class="typcn typcn-document"></i> Adresse de facturation


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
    <div class="modal fade" id="addCmdModal" tabindex="-1" aria-labelledby="addCmdModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addStudentModalLabel"><i class="typcn typcn-plus m-lg-1"></i> Creer une commande <i class="typcn typcn-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajoutCmdForm" method = "post" action ="">
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
