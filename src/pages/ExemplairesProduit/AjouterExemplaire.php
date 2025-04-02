
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
require_once '../Fonctions/db_connection.php';
$conn = getConnection();
$sql = "SELECT id_produit, nom_produit FROM produits";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AjouterExemplaire</title>
  <link rel = "stylesheet" href = "StyleScanner.css">
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script>
     // Fonction pour mettre à jour le champ id_produit en fonction du produit sélectionné
     function updateProduitId() {
       var produitSelect = document.getElementById('nom_produit');
       var produitIdInput = document.getElementById('id_produit');
       // Récupérer l'ID du produit à partir de l'attribut data-id_produit de l'option sélectionnée
       var selectedOption =produitSelect.options[produitSelect.selectedIndex];
      produitIdInput.value = selectedOption.getAttribute('data-id_produit');
     }
</script>
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
                    <video id = "preview" width = "400 px"></video>
                </div>

                    <div class="mb-3">
                        <label for="code_barre" class="form-label">
                            <i class="typcn typcn-credit-card menu-icon"></i> Code barre
                        </label>
                        <input type="text" class="form-control" id="code_bar" name="code_bar"  placeholder="Entrez le code barre du produit" required maxlength="13" autofocus>
                        <p id="scan_status"></p>
                    </div>
                    <div class="mb-3">
                         <label for="type" class="form-label">
                         <i class="typcn typcn-th-large-outline menu-icon"></i>Nom du produit
                         </label>
                         <select class="form-select" id="nom_produit" name = "nom_produit" onchange = "updateProduitId()" required>
                             <option value="">Sélectionnez le produit</option>
                             <?php
                                  if ($result->num_rows > 0) {
                                      while ($row = $result->fetch_assoc()) {
                                          echo "<option value='" . $row['id_produit'] . "' data-id_produit='" . $row['id_produit'] . "'>" . $row['nom_produit'] . "</option>";
                                      }
                                  } else {
                                      echo "<option value=''>Aucun produit disponible</option>";
                                  }
                                  ?>
                         </select>
                    </div>
                    <div class="mb-3">
                         <label for="nom" class="form-label">
                         <i class="typcn typcn-tag menu-icon"></i>ID produit
                         </label>
                         <input type="text" class="form-control" id="id_produit" name = "id_produit" readonly> 
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

  <?php
  
  if (isset($_POST["enregistrer"])) {
      $code_bar = $_POST["code_bar"];
      $nom_produit = $_POST["nom_produit"];
      $id_produit = $_POST["id_produit"];
      $original_price = $_POST["original_price"];
      $special_price = $_POST["special_price"];
      $conn = getConnection();
      
      if (!$conn) {
          die("Échec de la connexion à la base de données !");
      }

      // Vérifier si le code-barres existe déjà
    //   $check_sql = "SELECT COUNT(*) FROM produits WHERE code_bar = ?";
    //   $stmt = $conn->prepare($check_sql);
    //   $stmt->bind_param("s", $code_bar);
    //   $stmt->execute();
    //   $stmt->bind_result($count);
    //   $stmt->fetch();
    //   $stmt->close();
  
    //   if ($count > 0) {
        //   echo "<script>alert('Ce code-barres existe déjà !'); window.history.back();</script>";
        //   exit();
    //   }
    //  
      $sql = "INSERT INTO exemplaire (code_bar, nom_produit, original_price, special_price, id_produit) VALUES (?, ?, ?, ?, ?)";
      $result = $conn->prepare($sql);
      if (!$result) {
       die("Erreur lors de la préparation de la requête: " . $conn->error);
   }    
      if ($result) {
         
          $result->bind_param("ssiii", $code_bar, $nom_produit, $original_price,  $special_price, $id_produit);
          if ($result->execute()) {
              $_SESSION["code_bar"] = $code_bar;
              $_SESSION["nom_produit"] = $nom_produit;
              $_SESSION["original_price"] = $original_price;
              $_SESSION["special_price"] = $special_price;
              $_SESSION["id_produit"] = $id_produit;
              header("Location: ../../pages/samples/succes.php");
              exit();
          } else {
              // En cas d'erreur
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


<script>
        document.addEventListener('DOMContentLoaded', function() {
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

            // Récupération des caméras disponibles
            Instascan.Camera.getCameras().then(function(cameras) {
                console.log("Caméras détectées:", cameras);

                if (cameras.length > 0) {
                    // Si la caméra est disponible, démarrer le scanner
                    scanner.start(cameras[0]);
                } else {
                    alert('Aucune caméra trouvée');
                }
            }).catch(function(e) {
                console.error('Erreur d’accès à la caméra:', e);
            });

            // Ajouter un écouteur pour l'événement "scan"
            scanner.addListener('scan', function(content) {
                // Affiche le code scanné dans la console
                console.log("Code scanné : ", content);

                // Affiche le contenu scanné dans le champ "code_bar"
                document.getElementById('code_bar').value = content;

                // Affiche un message de confirmation sous le champ de texte
                document.getElementById('scan_status').textContent = "Code scanné avec succès : " + content;

                // Annonce vocale du code scanné
                const utterance = new SpeechSynthesisUtterance("Le code scanné est : " + content);
                utterance.lang = "fr-FR";  // Choisir la langue (ici français)
                speechSynthesis.speak(utterance);
            });
        });
    </script>

 </body>
</html>

