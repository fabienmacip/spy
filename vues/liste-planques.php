<?php
$titre = 'Liste des planques';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col-10">

      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des planques</caption>
          <thead class="table-dark">
              <tr>
                  <th width="5%">Id</th>
                  <th width="10%">Code</th>
                  <th width="25%">Adresse</th>
                  <th width="15%">Ville</th>
                  <th width="15%">Pays</th>
                  <th width="15%"></th>
                  <th width="15%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($planques as $planque): ?>
                  <tr>
                      <td>
                          <?= $planque->getId() ?>
                      </td>
                      <td>
                          <?= $planque->getCode() ?>
                      </td>
                      <td>
                          <?= $planque->getAdresse() ?>
                      </td>

                      <td>
                          <?= $planque->getVille() ?>
                      </td>

                      <td>
                          <?= $planque->getPaysNom() ?>
                      </td>
                      <td>
                          <a href="planque.php?action=edit&id=<?= $planque->getId() ?>" class="link-secondary">
                            Modifier
                          </a>
                      </td>
                      <td>
                      <a href="planque.php?action=delete&id=<?= $planque->getId() ?>" class="link-secondary">
                            Supprimer
                          </a>
                      </td>
                  </tr>
              <?php endforeach; ?>
    
          </tbody>
      </table>

    </div>
    <div class="col-1">
    </div>
  </div>
</div>


		
<?php
$contenu = ob_get_clean();
require_once('layout.php');