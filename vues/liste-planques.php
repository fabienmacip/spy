<?php
?>
<!-- pas utilisé pour le moment -->




        <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
        <caption class="text-center fs-3 text-primary">Liste des planques</caption>
            <thead class="table-dark">
                <tr>
                    <th>Titre</th>
                    <th>Nom de code</th>
                    <th>Pays</th>
                    <th>Sp&eacute;cialit&eacute;</th>
                    <th>Type de mission</th>
                    <th>Date d&eacute;but</th>
                    <th>Date fin</th>
                    <th>Statut</th>
                </tr>
            </thead>
            
            <tbody>

                <?php foreach ($missions as $mission): ?>
                    <tr>
                        <td>
                            <a href="mission.php?id=<?= $mission->getId() ?>" class="link-secondary">
                                <?= $mission->getTitre() ?>
                            </a>
                        </td>
                        <td>
                            <?= $mission->getNomDeCode() ?>
                        </td>
                        <td>
                            <?= $mission->getPays() ?>
                        </td>
                        <td>
                            <?= $mission->getSpecialite() ?>
                        </td>
                        <td>
                            <?= $mission->getTypeDeMission() ?>
                        </td>
                        <td>
                            <?= //setlocale(LC_TIME, "fra", "fr_FR");
                                strftime("%a %d %b %G",strtotime($mission->getDateDebut())); ?>
                        </td>
                        <td>
                            <?= strftime("%a %d %b %G",strtotime($mission->getDateFin())); ?>
                        </td>
                        <td>
                            <?= $mission->getStatut() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>


		
<?php
$contenu = ob_get_clean();
require_once('layout.php');