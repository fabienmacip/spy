<?php
$titre = 'Liste des personnes';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col-10">

      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des personnes</caption>
          <thead class="table-dark">
              <tr>
                  <th width="5%">Id</th>
                  <th width="15%">Nom</th>
                  <th width="15%">Pr&eacute;nom</th>
                  <th width="10%">Date naissance</th>
                  <th width="10%">Nom de code</th>
                  <th width="15%">Nationalit&eacute;</th>
                  <th width="6%">Type</th>
                  <th width="12%"></th>
                  <th width="12%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($personnes as $personne): ?>
                    <tr>
                      <td>
                          <?= $personne->getId() ?>
                      </td>
                      <td>
                          <?= $personne->getNom() ?>
                      </td>
                      <td>
                          <?= $personne->getPrenom() ?>
                      </td>
                      <td>
                          <?= $personne->getDob() ?>
                      </td>
                      <td>
                          <?= $personne->getSecretCode() ?>
                      </td>
                      <td>
                          <?= $personne->getPaysNom() ?>
                      </td>                            
                      <td>
                          <?= $personne->getType() ?>
                      </td>                                                            
                      <td>
                          <a href="personne.php?action=edit&id=<?= $personne->getId() ?>" class="link-secondary">
                            Modifier
                          </a>
                      </td>
                      <td>
                      <a href="personne.php?action=delete&id=<?= $personne->getId() ?>" class="link-secondary">
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