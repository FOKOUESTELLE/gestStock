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
  <title>ListeClients</title>
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
    <h1 class="text-center text-bold">Liste des Clients</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-group-outline"></i>Clients</h3>
            <button class="btn btn-add btn-success rounded-5 shadow" data-bs-toggle="modal" data-bs-target="#addStudentModal">
            <i class="typcn typcn-user-add"></i> Ajouter Client 

            </button>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                        <tr class="text-center fw-bold">
                        <th scope="col"><i class="typcn typcn-pencil menu-icon fs-3"></i> Code</th>
                        <th scope="col"><i class="typcn typcn-user menu-icon fs-3"></i> Nom</th>
                        <th scope="col"><i class="typcn typcn-phone menu-icon fs-3"></i> Numéro de téléphone</th>
                        <th scope="col"><i class="typcn typcn-location menu-icon fs-3"></i> Adresse de livraison</th>
                        <th scope="col"><i class="typcn typcn-location-outline menu-icon fs-3"></i> Ville</th>
                        <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>
                    </tr>
                    </thead>

                        <tbody id="productsList">
                                 
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
                    <h5 class="modal-title text-success" id="addStudentModalLabel"><i class="typcn typcn-user-add"></i>Ajouter un client <i class="fas fa-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                        <label for="matricule" class="form-label">
                        <i class="typcn typcn-tag menu-icon"></i> Code
                        </label>
                        <input type="text" class="form-control" id="code_client" name = "code_client" placeholder="Entrez le code" required maxlength="6" pattern="[A-Za-z0-9]{1,6}" title="Le matricule doit contenir 1 à 6 caractères alphanumériques."> 
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

    <?php

if(isset($_POST["enregistrer"])){
    $matricule = $_POST["matricule"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $sexe = $_POST["sexe"];
    $date_naissance = $_POST["date_naissance"];
    $code_filiere = $_POST["code_filiere"];
            
    $conn = getConnection();
    if ($conn){
        echo "Connexion réussie<br>";
            
        $sql = "INSERT INTO etudiants (matricule, nom, prenom, sexe, date_naissance, code_filiere) 
                VALUES ('$matricule', '$nom', '$prenom', '$sexe', '$date_naissance', '$code_filiere')";
            
        if ($conn->query($sql) === TRUE) {
            echo "Insertion effectuée";
        } else {
            echo "Insertion refusée : " . $conn->error;
        }
            
        $conn->close();
    } 
    
    
}   

    ?>
    
    
    
    <script>
    //Delegation pour

    $(document).on('click', '.btnEdit', function(){
        var matricule = $(this).attr('id');
        alert (matricule);
        $.ajax({
            url: 'EtudController.php',
            type: 'POST',
            data: {
                matricule:matricule,
                action: 'editEnseig'
            },
            dataType: 'json',
            success: function(data){

                $('#matricule').val(data.matricule);
                $('#nom').val(data.nom);
                $('#prenom').val(data.prenom);
                $('#sexe').val(data.sexe);
                $('#date_naissance').val(data.date_naissance);
                $('#code_filiere').val(data.code_filiere);
                updateBtn = document.getElementById('updateButton');
                saveBtn = document.getElementById('saveButton');
                updateBtn.classList.remove('d-none');
                saveBtn.classList.add('d-none');
                $('#ajoutEtudiantForm').modal('show');

            },
            error function(){

                console.error("");
            }
        });
    });
    </script>


    <?php
    if(isset($_POST["btnsup"])){
    $matricule = $_POST["matricule"];
    $conn = getConnection();

        // Utilisation d'une requête préparée
        $sql = "DELETE FROM etudiants WHERE matricule = ?";
        $result = $conn->prepare($sql);
        if ($result) {
            $result->bind_param("s", $matricule); // "s" pour string (changer en "i" si matricule est un entier)
            if ($result->execute()) {
                echo "Suppression effectuée";
            } else {
                echo "Suppression refusée : " . $result->error;
            }
            $result->close();
        } else {
            echo "Erreur lors de la préparation de la requête : " . $conn->error;
        }

        $conn->close();
    } 
  
?>

</body>
</html>

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
