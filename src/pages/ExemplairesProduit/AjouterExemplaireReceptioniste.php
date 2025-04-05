
<?php
session_start();
ob_start();
require_once '../Nav/navbar.php';
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
  <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
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

    <!-- partial -->
    <br><br><br>
    <div class="container-fluid page-body-wrapper">      
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas mt-10" id="sidebar">
       
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <div class="badge badge-danger">new</div>
            </a>
          </li>               
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gestion-produits" aria-expanded="false" aria-controls="gestion-produits">
            <i class="typcn typcn-gift menu-icon"></i>
              <span class="menu-title">Gestion des Produits</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gestion-produits">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/Produits/AjouterProduiReceptioniste.php">Ajouter</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/Produits/ListeProduitsReceptioniste.php">Liste de produits</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ExemplairesProduit/AjouterExemplaireReceptioniste.php">AjouterExemplaire</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ExemplairesProduit/ListeExemplairesReceptioniste.php">Liste des Exemplaires</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#gestion-categorie" aria-expanded="false" aria-controls="gestion-produits">
              <i class="typcn typcn-gift menu-icon"></i>
                <span class="menu-title">Categories de Produits</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="gestion-categorie">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/Categories/AjouterCatProdReceptioniste.php">Ajouter</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/Categories/ListeCategoriesRecptioniste.php">Liste des categories</a></li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Deconnexion</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../samples/login.php"> Deconnexion </a></li>                              
              </ul>
            </div>
          </li>                            
        </ul>
      </nav>
      
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
                        <input type="text" class="form-control" id="code_bar" name="code_bar"  placeholder="Entrez le code barre du produit" required autofocus readonly>
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
    if (typeof Quagga === 'undefined') {
    console.error('QuaggaJS n\'est pas chargé !');
} else {
    console.log('QuaggaJS est chargé avec succès.');
    // Votre code QuaggaJS ici
}
document.addEventListener('DOMContentLoaded', function() {
    // Vérification de la disponibilité de la caméra
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: "environment",
                width: { ideal: 1280 }, // Résolution idéale
                height: { ideal: 720 },
                frameRate: { ideal: 30 } // Nombre d'images par seconde idéal
            }
        })
        .then(function(stream) {
            // Lien entre la vidéo et le flux de la caméra
            var videoElement = document.querySelector('#preview');
            videoElement.srcObject = stream;
            videoElement.play(); // Lancer la lecture du flux vidéo
            console.log('Caméra accessible');
        })
        .catch(function(err) {
            console.log('Erreur lors de l\'accès à la caméra : ', err);
        });
    } else {
        console.log('Votre navigateur ne supporte pas l\'accès à la caméra.');
    }

    // Initialisation du scanner avec QuaggaJS
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#preview'), // La vidéo de la caméra
            constraints: {
                facingMode: "environment" // Utiliser la caméra arrière (si disponible)
            }
        },
        decoder: {
            readers: ["code_128_reader"] // Utilisation d'un seul lecteur de code-barres pour simplifier
        },
    }, function(err) {
        if (err) {
            console.error("Erreur d'initialisation : ", err);
            document.getElementById('scan_status').textContent = "Erreur d'initialisation du scanner.";
            return;
        }
        console.log("Scanner initialisé avec succès !");
        Quagga.start(); // Démarrer le scanner
    });

    // Event listener pour le scan
    Quagga.onDetected(function(result) {
        if (result && result.codeResult && result.codeResult.code) {
            console.log("Code scanné : ", result.codeResult.code);
            document.getElementById('code_bar').value = result.codeResult.code;
            document.getElementById('scan_status').textContent = "Code scanné avec succès : " + result.codeResult.code;

            // Annonce vocale
            const utterance = new SpeechSynthesisUtterance("Le code scanné est : " + result.codeResult.code);
            utterance.lang = "fr-FR";
            speechSynthesis.speak(utterance);
        } else {
            document.getElementById('scan_status').textContent = "Erreur de lecture du code barre.";
        }
    });
});
    </script>
 </body>
</html>

