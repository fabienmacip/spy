<?php
$titre = 'Liste des administrateurs';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col-10">

      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des administrateurs</caption>
          <thead class="table-dark">
              <tr>
                  <th width="6%">Id</th>
                  <th width="15%">Nom</th>
                  <th width="15%">Pr&eacute;nom</th>
                  <th width="15%">Mail</th>
                  <th width="10%">Cr&eacute;&eacute; le</th>
                  <th width="15%">Mot de passe</th>
                  <th width="12%"></th>
                  <th width="12%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($administrateurs as $administrateur): ?>
                  <tr>
                      <td>
                          <?= $administrateur->getId() ?>
                      </td>
                      <td>
                          <?= $administrateur->getNom() ?>
                      </td>
                      <td>
                          <?= $administrateur->getPrenom() ?>
                      </td>
                      <td>
                          <?= $administrateur->getMail() ?>
                      </td>
                      <td>
                          <?= $administrateur->getDateCreation() ?>
                      </td>
                      <td>
                          <?= $administrateur->getMotDePasse() ?>
                      </td>                                                                                        
                      <td>
                          <a href="administrateur.php?action=edit&id=<?= $administrateur->getId() ?>" class="link-secondary">
                            Modifier
                          </a>
                      </td>
                      <td>
                      <a href="administrateur.php?action=delete&id=<?= $administrateur->getId() ?>" class="link-secondary">
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