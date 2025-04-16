<?php
require_once '../Nav/navbar.php';
require_once '../Nav/sidebar.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Liste des achats </title>
  <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
<div class="container my-5">
    <h1 class="text-center text-bold">Produits achetes</h1>
    <div class="card border-primary mb-3 rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center bg-secondary-subtle text-success rounded-3">
        <h3 class="mb-0"><i class="typcn typcn-shopping-cart"></i> Produits</h3>
        </div>
        
        <div class="card-body shadow">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered rounded-3 align-middle mt-4">
                    <thead class="table-primary">
                    <tr class="text-center fw-bold">
                     <th scope="col"><i class="typcn typcn-tag menu-icon fs-3"></i> Code</th>
                     <th scope="col"><i class="typcn typcn-th-large-outline"></i> Type</th>
                     <th scope="col"><i class="typcn typcn-document-text menu-icon fs-3"></i> Raison</th>
                     <th scope="col"><i class="typcn typcn-flag menu-icon fs-3"></i> Statut</th>
                    </tr>

                    </thead>
                    <tbody id="achatsList">
                        <tr>
                            <td colspan="6" class="text-center">Aucun produit</td>
                        </tr>
                    </tbody>
                </table>
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

<!-- Modal pour ajouter un client -->
<div class="modal fade" id="addAchatModal" tabindex="-1" aria-labelledby="addClientModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header bg-dark-subtle">
                <h5 class="modal-title text-success" id="addClientModalLabel"><i class="typcn typcn-user-add"></i> Ajouter un achat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="ajouter_client.php">
                    <div class="mb-3">
                        <label for="code_achat" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code_achat" name="code_achat" required maxlength="6">
                    </div>
                <div class="mb-3">
                    <label for="type_achat" class="form-label">
                        <i class="typcn typcn-th-large-outline"></i> Type
                    </label>
                    <select class="form-select" id="type_achat" name="type_achat" required>
                        <option value="">Sélectionnez le type</option>
                        <option value="M">Local</option>
                        <option value="F">Import</option>
                    </select>
                </div>
                              <!-- Raison de l'Achat -->
                 <div class="mb-3">
                     <label for="raison_achat" class="form-label">
                         <i class="typcn typcn-lightbulb"></i> Raison de l'Achat
                     </label>
                     <select class="form-select" id="raison_achat" name="raison_achat" required>
                         <option value="">Sélectionnez la raison</option>
                         <option value="Stocker">Stocker</option>
                         <option value="Vendre">Vendre directement</option>
                     </select>
                 </div>
                </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   <!-- partial:../../partials/_footer.php -->
   <?php
          require_once '../Nav/footer.php';
      ?> 

<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/template.js"></script>
<script src="../../assets/vendors/chart.js/chart.umd.js"></script>
<script src="../../assets/js/chart.js"></script>
</body>
</html>
