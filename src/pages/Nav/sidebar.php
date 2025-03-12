<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <!-- partial -->
    <br><br><br>
    <div class="container-fluid page-body-wrapper">      
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas mt-10" id="sidebar">
       
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <div class="badge badge-danger">new</div>
            </a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a></li>              
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/Produits/AjouterProduit.php">Ajouter</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/Produits/ListeProduits.php">Liste de produits</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ExemplairesProduit/AjouterExemplaire.php">AjouterExemplaire</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ExemplairesProduit/ListeExemplaires.php">Liste des Exemplaires</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#gestion-produits" aria-expanded="false" aria-controls="gestion-produits">
              <i class="typcn typcn-gift menu-icon"></i>
                <span class="menu-title">Categories de Produits</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="gestion-produits">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/Categories/AjouterCatProd.php">Ajouter</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/Categories/ListeCategories.php">Liste des categories</a></li>
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
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Clients/AjouterClient.php">Ajouter</a></li>
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Clients/ListeClients.php">Liste des clients</a></li>
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
               <li class="nav-item"> <a class="nav-link" href="../../pages/Paiements/AjouterPaiement.php">Ajouter</a></li>
               <li class="nav-item"> <a class="nav-link" href="../../pages/Paiements/ListePaiements.php">Liste des paiements</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="../../pages/Fournisseurs/AjouterFourn.php">Ajouter</a></li>
              <li class="nav-item"> <a class="nav-link" href="../../pages/Fournisseurs/ListeFourns.php">Liste des fournisseurs</a></li>
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
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Achats/AjouterAchat.php">Ajouter</a></li>
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Achats/ListeAchats.php">Liste des achats</a></li>
                 <li class="nav-item"> <a class="nav-link" href="../../pages/Achats/ListeProduitsAchetes.php">Liste des produits achetes</a></li>
                 

               </ul>
             </div>
             
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gestion-commandes" aria-expanded="false" aria-controls="gestion-achats">
             <i class="typcn typcn-shopping-bag menu-icon"></i>  
             <span class="menu-title">Gestion des commandes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gestion-commandes">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/Commandes/CreerCommande.php">Creer</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/commandes/ListeCommandes.php">Liste des commandes</a></li>
              </ul>
            </div>
            
       </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="typcn typcn-compass menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/font-awesome.html">Font Awesome</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>                                
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
</body>
</html>