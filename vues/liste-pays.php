<?php
$titre = 'Liste des pays';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">

      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des pays</caption>
          <thead class="table-dark">
              <tr>
                  <th width="10%">Id</th>
                  <th width="50%">Nom</th>
                  <th width="20%"></th>
                  <th width="20%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($payss as $pays): ?>
                  <tr>
                      <td>
                          <?= $pays->getId() ?>
                      </td>
                      <td>
                          <?= $pays->getNom() ?>
                      </td>
                      <td>
                          <a href="pays.php?action=edit&id=<?= $pays->getId() ?>" class="link-secondary">
                            Modifier
                          </a>
                      </td>
                      <td>
                      <a href="pays.php?action=delete&id=<?= $pays->getId() ?>" class="link-secondary">
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