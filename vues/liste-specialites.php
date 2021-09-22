<?php
$titre = 'Liste des spécialités';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">

      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des spécialités</caption>
          <thead class="table-dark">
              <tr>
                  <th width="10%">Id</th>
                  <th width="50%">Intutul&eacute;</th>
                  <th width="20%"></th>
                  <th width="20%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($specialites as $specialite): ?>
                  <tr>
                      <td>
                          <?= $specialite->getId() ?>
                      </td>
                      <td>
                          <?= $specialite->getIntitule() ?>
                      </td>
                      <td>
                          <a href="specialite.php?action=edit&id=<?= $specialite->getId() ?>" class="link-secondary">
                            Modifier
                          </a>
                      </td>
                      <td>
                      <a href="specialite.php?action=delete&id=<?= $specialite->getId() ?>" class="link-secondary">
                            Supprimer
                          </a>
                      </td>
                  </tr>
              <?php endforeach; ?>
    
          </tbody>
      </table>

    </div>
    <div class="col-3">
    </div>
  </div>
</div>


		
<?php
$contenu = ob_get_clean();
require_once('layout.php');