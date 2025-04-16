<?php
 session_start();
 ob_start();
 require_once 'pages/Fonctions/db_connection.php';
 require 'pages/Fonctions/fonctions.php';
 $sql = "SELECT P.id_produit, C.nom_cat, C.id_categorie, P.nom_produit, P.prix_unitaire, P.description
         FROM produits P, categorie C, exemplaire E WHERE P.id_categorie = C.id_categorie ";
 $conn = getConnection();
 $result = $conn -> query($sql);
 $sql2 = "SELECT id_categorie, nom_cat FROM categorie";
 $result2 = $conn->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="CSS/nav.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <!-- Lien vers Bootstrap CSS via CDN -->

  <script>
     // Fonction pour mettre à jour le champ id_categorie en fonction de la categorie sélectionnée
     function updateCategorieId() {
       var categorieSelect = document.getElementById('nom_cat');
       var categorieIdInput = document.getElementById('id_categorie');
       // Récupérer l'ID de la categorie à partir de l'attribut data-id_categorie de l'option sélectionnée
       var selectedOption =categorieSelect.options[categorieSelect.selectedIndex];
      categorieIdInput.value = selectedOption.getAttribute('data-id_categorie');
     }
</script>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-Logo1" href="index.php"><img src="assets/images/Logo1.jpeg" alt="logo" class="img-fluid w-102 w-sm-50"></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../assets/images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav me-lg-2">
          <li class="nav-item nav-profile dropdown">
            
            <p>Bienvenue sur le tableau de bord</p>
            
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
              <h6 class="date mb-0">Today : Mar 23</h6>
              <i class="typcn typcn-calendar"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
              <i class="typcn typcn-mail mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 fw-normal float-start dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis fw-normal">David Grey
                  </h6>
                  <p class="fw-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis fw-normal">Tim Cook
                  </h6>
                  <p class="fw-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis fw-normal"> Johnson
                  </h6>
                  <p class="fw-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown me-0">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="typcn typcn-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 fw-normal float-start dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="typcn typcn-info mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal">Application Error</h6>
                  <p class="fw-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="typcn typcn-cog-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal">Settings</h6>
                  <p class="fw-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="typcn typcn-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal">New user registration</h6>
                  <p class="fw-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-links-wrapper d-flex align-items-stretch">
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-calendar-outline"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-mail"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-folder"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-document-text"></i></a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav me-lg-2">
          <li class="nav-item ms-0">
            <h4 class="mb-0">Dashboard</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Main Dahboard</p>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-search d-none d-md-block me-0">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search">
              <div class="input-group-prepend d-flex">
                <span class="input-group-text" id="search">
                  <i class="typcn typcn-zoom"></i>
                </span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
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
                <li class="nav-item"> <a class="nav-link" href="pages/Produits/AjouterProduit.php">Ajouter</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/Produits/ListeProduits.php">Liste de produits</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ExemplairesProduit/AjouterExemplaire.php">AjouterExemplaire</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ExemplairesProduit/ListeExemplaires.php">Liste des Exemplaires</a></li>
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
                  <li class="nav-item"> <a class="nav-link" href="pages/Categories/AjouterCatProd.php">Ajouter</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/Categories/ListeCategories.php">Liste des categories</a></li>
                </ul>
              </div>
          </li>
          <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#gestion-clients" aria-expanded="false" aria-controls="gestion-clients">
             <i class="typcn typcn-group-outline"></i>
               <span class="menu-title">Gestion des clients</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="gestion-clients">
               <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="pages/Clients/AjouterClient.php">Ajouter</a></li>
                 <li class="nav-item"> <a class="nav-link" href="pages/Clients/ListeClients.php">Liste des clients</a></li>
               </ul>
             </div>
        </li>
        <li class="nav-item">
           <a class="nav-link" data-bs-toggle="collapse" href="#gestion-paiements" aria-expanded="false" aria-controls="gestion-paiements">
           <i class="typcn typcn-credit-card"></i> 
             <span class="menu-title">Gestion des paiements</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="gestion-paiements">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="pages/Paiements/AjouterPaiement.php">Ajouter</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/Paiements/ListePaiements.php">Liste des paiements</a></li>
             </ul>
           </div>
      </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#gestion-clients" aria-expanded="false" aria-controls="charts">
          <i class="typcn typcn-group-outline"></i>
            <span class="menu-title">Gestion des fournisseurs</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="gestion-clients">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/Fournisseurs/AjouterFourn.php">Ajouter</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/Fournisseurs/ListeFourns.php">Liste des fournisseurs</a></li>
            </ul>
          </div>
        </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#gestion-achats" aria-expanded="false" aria-controls="gestion-achats">
               <i class="typcn typcn-shopping-cart menu-icon"></i>
               <span class="menu-title">Gestion des achats</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="gestion-achats">
               <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="pages/Achats/AjouterAchat.php">Ajouter</a></li>
                 <li class="nav-item"> <a class="nav-link" href="pages/Achats/ListeAchats.php">Liste des achats</a></li>
                 <li class="nav-item"> <a class="nav-link" href="pages/Achats/ListeProduitsAchetes.php">Liste des produits achetes</a></li>
                 

               </ul>
             </div>
             
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gestion-commandes" aria-expanded="false" aria-controls="gestion-commandes">
             <i class="typcn typcn-shopping-bag menu-icon"></i>  
             <span class="menu-title">Gestion des commandes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gestion-commandes">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/Commandes/CreerCommande.php">Creer</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/commandes/ListeCommandes.php">Liste des commandes</a></li>
              </ul>
            </div>   
       </li>
       <li class="nav-item">
           <a class="nav-link" data-bs-toggle="collapse" href="#gestion-roles" aria-expanded="false" aria-controls="gestion-roles">
             <i class="typcn typcn-group-outline menu-icon"></i>
             <span class="menu-title">Gestion des rôles</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="gestion-roles">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item">
                 <a class="nav-link" href="../../pages/Roles/AjouterRole.php">
                   <i class="typcn typcn-user-add"></i> Ajouter
                 </a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../../pages/Roles/ListeRoles.php">
                   <i class="typcn typcn-th-list"></i> Liste des rôles
                 </a>
               </li>     
             </ul>
           </div>
        </li>
      <li class="nav-item">
         <a class="nav-link" data-bs-toggle="collapse" href="#gestion-users" aria-expanded="false" aria-controls="gestion-users">
             <i class="typcn typcn-group-outline"></i>
               <span class="menu-title">Gestion des utilisateurs</span>
               <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="gestion-users">
             <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                     <a class="nav-link" href="../../pages/Users/AjouterUser.php">
                         <i class="typcn typcn-user-add"></i> Ajouter
                     </a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="pages/Users/ListeUsers.php">
                     <i class="typcn typcn-th-list"></i> Liste des utilisateurs
                   </a>
                 </li>     
               </ul>
       </div>
    </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Login Page</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.php"> Login </a></li>                                
              </ul>
            </div>
          </li>                            
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-xl-6 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">Status des statistiques</h5>
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0 text-muted">Transactions</p>
                        <p class="mb-0 text-muted">+1.37%</p>
                      </div>
                      <h4>1352</h4>
                      <canvas id="transactions-chart" class="mt-auto" height="65"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                          <p class="mb-2 text-muted">Ventes</p>
                          <h6 class="mb-0">563</h6>
                        </div>
                        <div>
                          <p class="mb-2 text-muted">Autres</p>
                          <h6 class="mb-0">720</h6>
                        </div>
                        <div>
                          <p class="mb-2 text-muted">Revenue</p>
                          <h6 class="mb-0">5900</h6>
                        </div>
                      </div>
                      <canvas id="sales-chart-a" class="mt-auto" height="65"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row h-100">
                <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                  <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <p class="text-muted">Analyse de vente</p>
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="mb-">27632</h3>
                        <h3 class="mb-">78%</h3>
                      </div>
                      <canvas id="sales-chart-b" class="mt-auto" height="38"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row h-100">
                        <div class="col-6 d-flex flex-column justify-content-between">
                          <p class="text-muted">État des Stocks</p>
                          <h4>75%</h4>
                          <canvas id="cpu-chart" class="mt-auto"></canvas>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-between">
                          <p class="text-muted">Stock Disponible</p>
                          <h4>123344</h4>
                          <canvas id="memory-chart" class="mt-auto"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <!-- <div class="row"> -->
            <!-- <div class="col-xl-4 grid-margin stretch-card"> -->
              <!-- <div class="card"> -->
                <!-- <div class="card-body border-bottom"> -->
                  <!-- <div class="d-flex justify-content-between align-items-center flex-wrap"> -->
                    <!-- <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">ventes globales</h6> -->
                    <!-- <div class="dropdown"> -->
                      <!-- <button class="btn bg-white p-0 pb-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                         <!-- 30 derniers jours -->
                      <!-- </button> -->
                      <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3"> -->
                       <!-- <h6 class="dropdown-header">Paramètres de GlotoStock</h6> -->
                       <!-- <a class="dropdown-item" href="javascript:;">Gérer les stocks</a> -->
                       <!-- <a class="dropdown-item" href="javascript:;">Gestion des utilisateurs</a> -->
                       <!-- <a class="dropdown-item" href="javascript:;">Rapports financiers</a> -->
                       <!-- <div class="dropdown-divider"></div> -->
                       <!-- <a class="dropdown-item" href="javascript:;">Paramètres généraux</a> -->
                    <!-- </div> -->

                    <!-- </div> -->
                  <!-- </div> -->
                <!-- </div> -->
                <!-- <div class="card-body"> -->
                  <!-- <div class="daoughnut-chart-sm"> -->
                    <!-- <canvas id="sales-chart-c" class="mt-2"></canvas> -->
                  <!-- </div> -->
                  <!-- <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 mt-4"> -->
                    <!-- <div class="d-flex flex-column justify-content-center align-items-center"> -->
                      <!-- <p class="text-muted">Ventes Brutes</p> -->
                      <!-- <h5>492</h5> -->
                      <!-- <div class="d-flex align-items-baseline"> -->
                        <!-- <p class="text-success mb-0">55%</p> -->
                        <!-- <i class="typcn typcn-arrow-up-thick text-success"></i> -->
                      <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="d-flex flex-column justify-content-center align-items-center"> -->
                      <!-- <p class="text-muted">Achats</p> -->
                      <!-- <h5>87k</h5> -->
                      <!-- <div class="d-flex align-items-baseline"> -->
                        <!-- <p class="text-success mb-0">80%</p> -->
                        <!-- <i class="typcn typcn-arrow-up-thick text-success"></i> -->
                      <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="d-flex flex-column justify-content-center align-items-center"> -->
                      <!-- <p class="text-muted">Déclaration Fiscale</p> -->
                      <!-- <h5>882</h5> -->
                      <!-- <div class="d-flex align-items-baseline"> -->
                        <!-- <p class="text-danger mb-0">-25%</p> -->
                        <!-- <i class="typcn typcn-arrow-down-thick text-danger"></i> -->
                      <!-- </div> -->
                    <!-- </div> -->
                  <!-- </div> -->
                  <!-- <div class="d-flex justify-content-between align-items-center"> -->
                    <!-- <div class="dropdown"> -->
                      <!-- <button class="btn bg-white p-0 pb-1 pt-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <!-- 7 derniers jours -->
                      <!-- </button> -->
                      <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3"> -->
                        <!-- <h6 class="dropdown-header">Paramètres</h6> -->
                        <!-- <a class="dropdown-item" href="javascript:;">Gestion des stocks</a> -->
                        <!-- <a class="dropdown-item" href="javascript:;">Historique des transactions</a> -->
                        <!-- <a class="dropdown-item" href="javascript:;">Rapports financiers</a> -->
                        <!-- <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="javascript:;">Paramètres du compte</a> -->
                      <!-- </div> -->
                    <!-- </div> -->
                    <!-- <p class="mb-0">Vue d'ensemble financière</p> -->
                  <!-- </div> -->
                <!-- </div> -->
              <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="col-md-6 col-xl-4 grid-margin stretch-card"> -->
              <!-- <div class="row"> -->
                <!-- <div class="col-md-12 grid-margin stretch-card"> -->
                  <!-- <div class="card newsletter-card bg-gradient-warning"> -->
                    <!-- <div class="card-body"> -->
                      <!-- <div class="d-flex flex-column align-items-center justify-content-center h-100"> -->
                        <!-- <h5 class="mb-3 text-white">Recevoir les rapports de gestion</h5> -->
                        <!-- <form class="form d-flex flex-column align-items-center justify-content-between w-100"> -->
                          <!-- <div class="form-group mb-2 w-100"> -->
                            <!-- <input type="text" class="form-control" placeholder="email address"> -->
                          <!-- </div> -->
                          <!-- <button class="btn btn-danger btn-rounded mt-1" type="submit">S'inscrire</button> -->
                        <!-- </form> -->
                      <!-- </div> -->
                    <!-- </div> -->
                  <!-- </div> -->
                <!-- </div> -->
                <!-- <div class="col-md-12 stretch-card"> -->
                  <!-- <div class="card profile-card bg-gradient-primary"> -->
                    <!-- <div class="card-body"> -->
                      <!-- <div class="row align-items-center h-100"> -->
                        <!-- <div class="col-md-4"> -->
                          <!-- <figure class="avatar mx-auto mb-4 mb-md-0"> -->
                            <!-- <img src="assets/images/faces/face.jpg" alt="avatar"> -->
                          <!-- </figure> -->
                        <!-- </div> -->
                        <!-- <div class="col-md-8"> -->
                          <!-- <h5 class="text-white text-center text-md-left">Estelle fokou</h5> -->
                          <!-- <p class="text-white text-center text-md-left">estelle@gmail.com</p> -->
                          <!-- <div class="d-flex align-items-center justify-content-between info pt-2"> -->
                            <!-- <div> -->
                                  <!-- <p class="text-white fw-bold">Poste</p> -->
                                  <!-- <p class="text-white fw-bold">Agence</p> -->
                            <!-- </div> -->
                            <!-- <div> -->
                             <!-- <p class="text-white">Responsable Stock</p> -->
                             <!-- <p class="text-white">Douala</p> -->
                            <!-- </div> -->
                          <!-- </div> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </div> -->
                  <!-- </div> -->
                <!-- </div> -->
              <!-- </div> -->
            <!-- </div> -->
            <!-- <div class="col-md-6 col-xl-4 grid-margin stretch-card"> -->
              <!-- <div class="card"> -->
                <!-- <div class="card-body border-bottom"> -->
                  <!-- <div class="d-flex justify-content-between align-items-center flex-wrap"> -->
                    <!-- <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Statistiques de vente</h6> -->
                    <!-- <div class="dropdown"> -->
                      <!-- <button class="btn bg-white p-0 pb-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <!-- 7 derniers annees -->
                      <!-- </button> -->
                   <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton4"> -->
                     <!-- <h6 class="dropdown-header">Paramètres</h6> -->
                     <!-- <a class="dropdown-item" href="javascript:;">Gérer les utilisateurs</a> -->
                     <!-- <a class="dropdown-item" href="javascript:;">Préférences d'affichage</a> -->
                     <!-- <a class="dropdown-item" href="javascript:;">Notifications</a> -->
                     <!-- <div class="dropdown-divider"></div> -->
                     <!-- <a class="dropdown-item text-danger" href="pages/samples/login.php">Déconnexion</a> -->
                   <!-- </div> -->
                    <!-- </div> -->
                  <!-- </div> -->
                <!-- </div> -->
                <!-- <div class="card-body"> -->
                  <!-- <canvas id="sales-chart-d" height="320"></canvas> -->
                <!-- </div> -->
              <!-- </div> -->
            <!-- </div> -->
          <!-- </div> -->

          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                     <p class="mb-2 text-md-center text-lg-left">Dépenses totales</p>
                     <h1 class="mb-0 text-success">8 742 FCFA</h1>
                    </div>
                    <i class="typcn typcn-briefcase icon-xl text-secondary"></i>
                  </div>
                  <canvas id="expense-chart" height="80"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                    <p class="mb-2 text-md-center text-lg-left">Budget total</p>
                    <h1 class="mb-0 text-primary">47 840 FCFA</h1>
                    </div>
                    <i class="typcn typcn-chart-pie icon-xl text-secondary"></i>
                  </div>
                  <canvas id="budget-chart" height="80"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                  <div>
                      <p class="mb-2 text-md-center text-lg-left">Solde total</p>
                      <h1 class="mb-0 text-success">39 098 FCFA</h1>
                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-primary"></i>

                  <canvas id="balance-chart" height="80"></canvas>
                </div>
              </div>
            </div>
          </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
            require_once 'pages/Nav/footer.php';
        ?> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->

</body>
</html>

