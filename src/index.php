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
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-film menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/forms/basic_elements.html">Basic Elements</a></li>                
              </ul>
            </div>
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
           <a class="nav-link" data-bs-toggle="collapse" href="#gestion-permissions" aria-expanded="false" aria-controls="gestion-permissions">
               <i class="typcn typcn-key-outline menu-icon"></i>
               <span class="menu-title">Gestion des permissions</span>
               <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="gestion-permissions">
               <ul class="nav flex-column sub-menu">
                   <li class="nav-item">
                       <a class="nav-link" href="../../pages/Permissions/AjouterPermission.php">
                           <i class="typcn typcn-user-add"></i> Ajouter
                       </a>
        </li>
             <li class="nav-item">
               <a class="nav-link" href="../../pages/Permissions/ListePermissions.php">
                 <i class="typcn typcn-th-list"></i> Liste des permissions
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
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.php"> Login </a></li>                                
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
            <div class="col-xl-6 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">statistiques des revenus</h5>
              <div class="row h-100">
                <div class="col-md-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                          <p class="mb-3">augmentation mensuelle</p>
                          <h3>67842</h3>
                        </div>
                        <div id="income-chart-legend" class="d-flex flex-wrap mt-1 mt-md-0"></div>
                      </div>
                      <canvas id="income-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body border-bottom">
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">ventes globales</h6>
                    <div class="dropdown">
                      <button class="btn bg-white p-0 pb-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         30 derniers jours
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                       <h6 class="dropdown-header">Paramètres de GlotoStock</h6>
                       <a class="dropdown-item" href="javascript:;">Gérer les stocks</a>
                       <a class="dropdown-item" href="javascript:;">Gestion des utilisateurs</a>
                       <a class="dropdown-item" href="javascript:;">Rapports financiers</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="javascript:;">Paramètres généraux</a>
                    </div>

                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="daoughnut-chart-sm">
                    <canvas id="sales-chart-c" class="mt-2"></canvas>
                  </div>
                  <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 mt-4">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <p class="text-muted">Ventes Brutes</p>
                      <h5>492</h5>
                      <div class="d-flex align-items-baseline">
                        <p class="text-success mb-0">55%</p>
                        <i class="typcn typcn-arrow-up-thick text-success"></i>
                      </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <p class="text-muted">Achats</p>
                      <h5>87k</h5>
                      <div class="d-flex align-items-baseline">
                        <p class="text-success mb-0">80%</p>
                        <i class="typcn typcn-arrow-up-thick text-success"></i>
                      </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                      <p class="text-muted">Déclaration Fiscale</p>
                      <h5>882</h5>
                      <div class="d-flex align-items-baseline">
                        <p class="text-danger mb-0">-25%</p>
                        <i class="typcn typcn-arrow-down-thick text-danger"></i>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="dropdown">
                      <button class="btn bg-white p-0 pb-1 pt-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          7 derniers jours
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                        <h6 class="dropdown-header">Paramètres</h6>
                        <a class="dropdown-item" href="javascript:;">Gestion des stocks</a>
                        <a class="dropdown-item" href="javascript:;">Historique des transactions</a>
                        <a class="dropdown-item" href="javascript:;">Rapports financiers</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">Paramètres du compte</a>
                      </div>
                    </div>
                    <p class="mb-0">Vue d'ensemble financière</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card newsletter-card bg-gradient-warning">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h5 class="mb-3 text-white">Recevoir les rapports de gestion</h5>
                        <form class="form d-flex flex-column align-items-center justify-content-between w-100">
                          <div class="form-group mb-2 w-100">
                            <input type="text" class="form-control" placeholder="email address">
                          </div>
                          <button class="btn btn-danger btn-rounded mt-1" type="submit">S'inscrire</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 stretch-card">
                  <div class="card profile-card bg-gradient-primary">
                    <div class="card-body">
                      <div class="row align-items-center h-100">
                        <div class="col-md-4">
                          <figure class="avatar mx-auto mb-4 mb-md-0">
                            <img src="assets/images/faces/face.jpg" alt="avatar">
                          </figure>
                        </div>
                        <div class="col-md-8">
                          <h5 class="text-white text-center text-md-left">Estelle fokou</h5>
                          <p class="text-white text-center text-md-left">estelle@gmail.com</p>
                          <div class="d-flex align-items-center justify-content-between info pt-2">
                            <div>
                                  <p class="text-white fw-bold">Poste</p>
                                  <p class="text-white fw-bold">Agence</p>
                            </div>
                            <div>
                             <p class="text-white">Responsable Stock</p>
                             <p class="text-white">Douala</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body border-bottom">
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Statistiques de vente</h6>
                    <div class="dropdown">
                      <button class="btn bg-white p-0 pb-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          7 derniers annees
                      </button>
                   <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton4">
                     <h6 class="dropdown-header">Paramètres</h6>
                     <a class="dropdown-item" href="javascript:;">Gérer les utilisateurs</a>
                     <a class="dropdown-item" href="javascript:;">Préférences d'affichage</a>
                     <a class="dropdown-item" href="javascript:;">Notifications</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-danger" href="pages/samples/login.php">Déconnexion</a>
                   </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="sales-chart-d" height="320"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between justify-content-md-center justify-content-xl-between flex-wrap mb-4">
                    <div>
                      <p class="mb-2 text-md-center text-lg-left">Total Expenses</p>
                      <h1 class="mb-0">8742</h1>
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
                      <p class="mb-2 text-md-center text-lg-left">Total Budget</p>
                      <h1 class="mb-0">47,840</h1>
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
                      <p class="mb-2 text-md-center text-lg-left">Total Balance</p>
                      <h1 class="mb-0">$7,243</h1>
                    </div>
                    <i class="typcn typcn-clipboard icon-xl text-secondary"></i>
                  </div>
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="container my-5">
            <h1 class="text-center text-bold">Gerer les Produits</h1>
            <div class="card border-primary mb-3 rounded-3">
                <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
                <h3 class="mb-0"><i class="typcn typcn-cube"></i> Produits</h3>
                    <button class="btn btn-add btn-success rounded-5 shadow" id ="btnAddProduit" data-bs-toggle="modal" data-bs-target="#addProduitModal" data-action="add">
                    <i class="typcn typcn-plus m-lg-1"></i> Ajouter Produit

                    </button>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                      <th scope="col"><i class="typcn typcn-key menu-icon fs-3"></i> ID Produit
                       <th scope="col"><i class="typcn typcn-tag menu-icon"></i> Categorie
                       <th scope="col"><i class="typcn typcn-key menu-icon fs-3"></i>ID Categorie
                       <th scope="col"> <i class="typcn typcn-tag menu-icon fs-3"></i> Nom du produit
                       <th scope="col"> <i class="typcn typcn-tag menu-icon fs-3"></i> Prix unitaire
                       <th scope="col"><i class="typcn typcn-tag menu-icon"></i> Total d'exemplaire
                       <th scope="col"> <i class="typcn typcn-tag menu-icon fs-3"></i> Prix Total
                       <th scope="col"><i class="typcn typcn-document-text menu-icon fs-3"></i>Description
                       <th scope="col"><i class="typcn typcn-cog fs-3"></i> Actions</th>
                      </tr>
                    </thead>
                    <tbody id = "productsList">
                    <?php
                           if ($result->num_rows > 0) {
                               while ($row = $result->fetch_assoc()) {
                                   // Récupérer l'ID du produit
                                   $id_produit = $row["id_produit"];
                                   
                                   // Requête pour compter le nombre d'exemplaires associés au produit
                                   $conn = getConnection();
                                   $sql = "SELECT COUNT(E.id_exemplaire) AS total_exemplaires
                                           FROM exemplaire E
                                           WHERE E.id_produit = ?";
                                   $stmt = $conn->prepare($sql);
                                   if ($stmt) {
                                       $stmt->bind_param("i", $id_produit); // Lier l'ID produit
                                       $stmt->execute();
                                       $stmt->bind_result($total_exemplaires);
                                       $stmt->fetch();
                                       $stmt->close();
                                   } else {
                                       // Si la requête échoue
                                       $total_exemplaires = 0;
                                   }
                                   $sql3 = " SELECT (P.prix_unitaire * COUNT(E.id_exemplaire)) AS prix_total WHERE E.id_produit = P.id_produit ";
                                   $result3 = $conn->query($sql3);
                       ?>
                           <tr>
                               <td><?= $row["id_produit"] ?></td>
                               <td><?= $row["nom_cat"] ?></td>
                               <td><?= $row["id_categorie"] ?></td>
                               <td><?= $row["nom_produit"] ?></td>
                               <td><?= $row["prix_unitaire"] ?> FCFA</td>
                               <td><?= isset($total_exemplaires) ? $total_exemplaires : 0 ?></td>
                               <td><?= number_format($row["prix_unitaire"], 0, ',', ' ') ?> FCFA</td>
                               <td><?= $row["description"] ?></td>
                               <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-success btn-sm btn-icon-text me-3">
                              Edit
                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                              Delete
                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php
                             }
                         } else {
                             echo "<tr><td colspan='7' style='text-align:center;'>Aucun produit trouvé</td></tr>";
                         }
                     ?>
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
    <div class="modal fade" id="addProduitModal" tabindex="-1" aria-labelledby="#addProduitModalLabel" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-dark-subtle">
                    <h5 class="modal-title text-success" id="addProduitModalLabel"><i class="typcn typcn-plus m-lg-1"></i> Ajouter un produit <i class="typcn typcn-plus-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajoutProduitForm" method = "post" action ="">
                        <div class="mb-3">
                           <label for="id_produit" class="form-label">
                               <i class="typcn typcn-key-outline menu-icon"></i> ID Produit
                           </label>
                           <input type="number" class="form-control" id="id_produit" name="id_produit" placeholder = "Ne rien saisir" required readonly>   
                        </div>                             
                            <div class="mb-3">
                              <label for="type" class="form-label">
                              <i class="typcn typcn-th-large-outline menu-icon"></i>Categorie
                              </label>
                              <select class="form-select" id="nom_cat" name = "nom_cat" onchange = "updateCategorieId()" required>
                                  <option value="">Sélectionnez la categorie</option>
                                  <?php
                                       if ($result2->num_rows > 0) {
                                           while ($row = $result2->fetch_assoc()) {
                                               echo "<option value='" . $row['id_categorie'] . "' data-id_categorie='" . $row['id_categorie'] . "'>" . $row['nom_cat'] . "</option>";
                                           }
                                       } else {
                                           echo "<option value=''>Aucune categorie disponible</option>";
                                       }
                                       ?>
                              </select>
                          </div>
                           <div class="mb-3">
                               <label for="nom" class="form-label">
                               <i class="typcn typcn-tag menu-icon"></i>ID categorie
                               </label>
                               <input type="text" class="form-control" id="id_categorie" name = "id_categorie" readonly> 
                           </div>
                           <div class="mb-3">
                               <label for="nom" class="form-label">
                               <i class="typcn typcn-tag menu-icon"></i> Nom du produit
                               </label>
                               <input type="text" class="form-control" id="nom_produit" name = "nom_produit" placeholder="Entrez le nom du produit" required title="Veuillez entrer un nom valide.">
                           </div>
                           <div class="mb-3">
                               <label for="id" class="form-label">
                               <i class="typcn typcn-tag menu-icon"></i>Prix unitaire
                               </label>
                               <input type="number" class="form-control" id="prix_unitaire" name = "prix_unitaire"  placeholder="Entrez le prix unitaire du produit" > 
                           </div>
                           <div class="mb-3">
                               <label for="description" class="form-label">
                               <i class="typcn typcn-document-text menu-icon"></i>Description
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
  <?php
           if (isset($_POST["enregistrer"])) {
            $categorie = $_POST["nom_cat"];
            $id_categorie = $_POST["id_categorie"];
            $nom = $_POST["nom_produit"];
            $prix_unitaire = $_POST["prix_unitaire"];
            $description = $_POST["description"];
            $conn = getConnection();
            
            if (!$conn) {
                die("Échec de la connexion à la base de données !");
            }
           
            // Utiliser une requête préparée pour éviter l'injection SQL
            $sql = "INSERT INTO produits (categorie, id_categorie, nom_produit, prix_unitaire, description) VALUES (?, ?, ?, ?, ?)";
            $result = $conn->prepare($sql);
            if (!$result) {
             die("Erreur lors de la préparation de la requête: " . $conn->error);
         }    
            if ($result) {
               
                $result->bind_param("sisis", $categorie, $id_categorie, $nom, $prix_unitaire, $description);
                if ($result->execute()) {
                    $_SESSION["categorie"] = $categorie;
                    $_SESSION["id_categorie"] = $id_categorie;
                    $_SESSION["nom_produit"] = $nom_produit;
                    $_SESSION["prix_unitaire"] = $prix_unitaire;
                    $_SESSION["description"] = $description;
                    header("Location:pages/samples/succes.php");
                    exit();
                } else {
                    // En cas d'erreur
                    header("Location: pages/samples/error-500.php");
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

$(document).ready(function () {

    $('#btnAddProduit').click(function () {

        $('#ajoutProduitForm')[0].reset();
        $('#id_produit').parent().hide(); 
        $('#id_produit').val(''); 

        // Changer l'affichage des boutons
        $('#saveButton').removeClass('d-none');
        $('#updateButton').addClass('d-none'); 

        // Afficher le modal
        $('#addProduitModal').modal('show');
   });
})

$(document).on('click', '.btnEdit', function(){
    var id_produit = $(this).attr('id');
    // alert(id_produit);
    console.log('Envoi de la requête AJAX... ID:', id_produit);
    $.ajax({
        url: 'TraitementProd.php',
        type: 'POST',
        data: {
            id_produit: id_produit,
            action: 'editProduit'
        },
        success: function(response) {
            console.log("Réponse du serveur :", response);

            try {
                const data = JSON.parse(response);

                if (data.error) {
                    alert(data.error);
                } else {
                    $('#id_produit').val(data.id_produit).prop('readonly', true);
                    $('#nom_cat').val(data.id_categorie);
                    $('#id_categorie').val(data.id_categorie).prop('readonly', true);
                    $('#nom_produit').val(data.nom_produit);
                    $('#prix_unitaire').val(data.prix_unitaire);
                    $('#description').val(data.description);
                    // $('#addProduitModalLabel').html("Modifier un produit");

                    $('#updateButton').removeClass('d-none');
                    $('#saveButton').addClass('d-none');

                    $('#addProduitModal').removeAttr('aria-hidden');
                    $('#addProduitModal').modal('show'); 
                }
            } catch (e) {
                console.error("Erreur JSON :", e);
                console.log("Réponse brute du serveur :", response);
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur AJAX :", status, error);
        }
    });
});

// evenement applique sur le bouton ajoutProduit

$('#updateButton').click(function() {
    var id_produit = $('#id_produit').val(); // Récupérer l'ID du produit
    var categorie = $('#nom_cat').val();
    var id_categorie = $('#id_categorie').val();
    var nom_produit = $('#nom_produit').val();
    var prix_unitaire = $('#prix_unitaire').val();
    var description = $('#description').val();

    // Envoi de la requête Ajax pour mettre à jour le produit
    if (confirm("Êtes-vous sûr de vouloir modifier ce produit ?")) {
    $.ajax({
        url: 'TraitementProd.php',
        type: 'POST',
        data: {
            id_produit: id_produit,
            categorie: categorie,
            id_categorie: id_categorie,
            nom_produit: nom_produit,
            prix_unitaire: prix_unitaire,
            description: description,
            action: 'updateProduit'
        },
        dataType: 'json',
        success: function(data) {
            if (data.success) {
                alert(data.message); 
                $('#addProduitModal').modal('hide'); // Fermer le modal
                location.reload(); // Recharger la page pour voir les changements
            } else {
                alert(data.message); // Afficher l'erreur
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur lors de la mise à jour du produit :", status, error);
            alert("Une erreur est survenue lors de la mise à jour du produit.");
        }
    });
    }
});
//suppression d'un produit

$('#openAddCategorieModal').click(function(){
    $('#resetButton').click();
    updateBtn = document.getElementById('updateButton');
    saveBtn = document.getElementById('saveButton');
    saveBtn.classList.remove('d-none');
    updateBtn.classList.add('d-none');
});

$(document).on('click', '.btnDel', function(){
    var id_produit = $(this).attr('id');

    if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
        $.ajax({
            url: 'TraitementProd.php',
            type: 'POST',
            data: {
                id_produit: id_produit,
                action: 'deleteProduit'
            },
            dataType: 'json',
            success: function(data){
                alert(data.message);
                if (data.succes) {
                    location.reload();
                }
            },
            error: function(){
                alert("Une erreur est survenue lors de la suppression !");
                console.error("Erreur lors de la suppression du produit.");
            }
        });
    }
});

</script>

</body>
</html>

