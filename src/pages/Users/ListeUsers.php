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
  <title>ListeUtilisateur</title>
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
    <h1 class="text-center text-bold">Liste des utilisateurs</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-group-outline"></i>Users</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="typcn typcn-user-add"></i> Add User 
            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                        <th scope="col"> <i class="typcn typcn-key-outline menu-icon fs-3"></i> ID user</th>
                        <th scope="col"><i class="typcn typcn-user menu-icon fs-3"></i> Nom</th>
                        <th scope="col"><i class="typcn typcn-user menu-icon fs-3"></i>Adresse mail</th>
                        <th scope="col"><i class="typcn typcn-user-outline menu-icon fs-3"></i> Role</th>
                        <th scope="col"><i class="typcn typcn-key-outline menu-icon fs-3"></i> ID role</th>
                        <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>
                    </tr>
                    </thead>

                        <tbody id="clientsList">
                                 
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
         <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addStudentModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-3 shadow">
                    <div class="modal-header bg-dark-subtle">
                        <h5 class="modal-title text-success" id="addUserModalLabel"><i class="typcn typcn-user-add"></i>Ajouter un utilisateur <i class="fas fa-plus-circle"></i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times text-danger"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
              <label for="matricule" class="form-label">
              <i class="typcn typcn-key-outline menu-icon"></i>ID User
              </label>
              <input type="number" class="form-control" id="id_user" name = "id_user" placeholder="Entrez l'identifiant de l'utilisateur">
         </div>
         <div class="mb-3">
             <label for="nom" class="form-label">
             <i class="typcn typcn-user menu-icon"></i></i> Nom
             </label>
             <input type="text" class="form-control" id="nom_user" name = "nom_user" placeholder="Entrez le nom de l'utilisateur" required pattern="[A-Za-zÀ-ÿ '-]+" title="Veuillez entrer un nom valide">
         </div>
         <div class="mb-3">
             <label for="email" class="form-label">
             <i class="typcn typcn-user menu-icon fs-3"></i></i> Adresse mail
             </label>
             <input type="email" class="form-control" id="email_user" name = "email_user" placeholder="Entrez l'adresse mail de l'utilisateur" required title="Veuillez entrer une adresse mail valide">
        </div>
        <div class="mb-3">
            <label for="password_user" class="form-label">
            <i class="typcn typcn-lock-closed menu-icon fs-3"></i>Mot de passe
            </label>
            <input type="password" class="form-control" id="password_user" name="password_user" placeholder="Entrez le mot de passe de l'utilisateur" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!]).{8,}" title="Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spécial (@#$%^&+=!) et avoir une longueur minimale de 8 caractères.">
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

</body>
</html>

                    </tbody>
                </table>
                 
                    <!-- <nav aria-label="Page navigation"> -->
                     <!-- <ul class="pagination justify-content-center"> -->
                         <!-- <li class="page-item"> -->
                             <!-- <a class="page-link" href="#" aria-label="Précédent"> -->
                                 <!-- <span aria-hidden="true">&laquo;</span> -->
                             <!-- </a> -->
                         <!-- </li> -->
                         <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
                         <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                         <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                         <!-- <li class="page-item"> -->
                             <!-- <a class="page-link" href="#" aria-label="Suivant"> -->
                                 <!-- <span aria-hidden="true">&raquo;</span> -->
                             <!-- </a> -->
                         <!-- </li> -->
                     <!-- </ul> -->
                 <!-- </nav> -->
             <!-- </div> -->
         <!-- </div> -->
     <!-- </div> -->
 <!-- </div> -->


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
