
<!-- ######################## DEBUT FORM UPDATE MISSION #################### -->

<form method="post" action="mission.php" id="form-update-mission" class="mt-3 bg-info">
        <div class="form-group">
            <label for="nom_de_code">Nom de code</label>
            <input type="text" name="nom_de_code" maxlength="40" id="nom_de_code" placeholder="<?= $mission->getNomDeCode() ?>" value="<?= $mission->getNomDeCode() ?>" class="form-control" aria-describedby="nom_de_codeHelpBlock">
            <small id="nom_de_codeHelpBlock" class="form-text text-muted">
                Maximum 40 caract&egrave;res.
            </small>
        </div>

        <!-- Liste déroulante PAYS -->
        <div class="form-group overflow-hidden">
            <label class="my-1 mx-2" for="pays">Pays</label>
              <select class="custom-select my-1 mr-sm-2" id="pays" name="pays">
              <?php
              foreach ($listePays->listerPaysJson() as $pays): 
                if($pays[0] == $mission->getIdPays()) {
                  
                  echo "<option value=\"".$pays[0]."\" selected>".$pays[1]."</option>";  
                } else {
                  echo "<option value=\"".$pays[0]."\">".$pays[1]."</option>";
                }
              endforeach;              
              ?>  
            </select>
        </div>

        <!-- Liste déroulante SPECIALITE -->
        <div class="form-group overflow-hidden">
          <label class="my-1 mx-2" for="specialite">Sp&eacute;cialit&eacute;</label>
          <select class="custom-select my-1 mr-sm-2" id="specialite" name="specialite">
            <?php
              foreach ($listeSpecialites->listerSpecialitesJson() as $specialite): 
                if($specialite[0] == $mission->getIdSpecialite()) {
                  echo "<option value=\"".$specialite[0]."\" selected>".$specialite[1]."</option>";
                } else {
                  echo "<option value=\"".$specialite[0]."\">".$specialite[1]."</option>";
                }
              endforeach;              
              ?>  
            </select>
          </div>
          
          <!-- Liste déroulante TYPE DE MISSION -->
          <div class="form-group overflow-hidden">
            <label class="my-1 mx-2" for="pays">Type de mission</label>
            <select class="custom-select my-1 mr-sm-2" id="type_de_mission" name="type_de_mission">
              <?php
              foreach ($listeTypeMissions->listerTypeMissionsJson() as $typeMissions): 
                if($typeMissions[0] == $mission->getIdTypeDeMission()) {                
                  echo "<option value=\"".$typeMissions[0]."\" selected>".$typeMissions[1]."</option>";
                } else {
                  echo "<option value=\"".$typeMissions[0]."\">".$typeMissions[1]."</option>";
                }
              endforeach;              
              ?>  
            </select>
          </div>
          
          <div class="form-group">
              <label for="date_debut">Date d&eacute;but</label>
              <input type="date" name="date_debut" id="date_debut" value="<?= $mission->getDateDebut() ?>" min="2021-09-29" max="2050-12-31" class="form-control">
              <label for="date_fin">Date fin</label>
              <input type="date" name="date_fin" id="date_fin" value="<?= $mission->getDateFin() ?>" min="2021-09-29" max="2050-12-31" class="form-control">            
          </div>

          <!-- Boutons radio STATUT -->
          <div id="statut">
            <label>Statut</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="preparation" value="preparation" <?php if($mission->getStatut() === 'preparation') echo "checked"; ?>>
                <label class="form-check-label" for="preparation">
                    En pr&eacute;paration
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="cours" value="cours" <?php if($mission->getStatut() === 'cours') echo "checked"; ?>>
                <label class="form-check-label" for="cours">
                    En cours
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="terminee" value="terminee" <?php if($mission->getStatut() === 'terminee') echo "checked"; ?>>
                <label class="form-check-label" for="terminee">
                Termin&eacute;e
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="echec" value="echec"<?php if($mission->getStatut() === 'echec') echo "checked"; ?>>
                <label class="form-check-label" for="echec">
                Echec
                </label>
            </div>
        </div>

        <!-- Valeurs cachées -->
        <input type="hidden" name="id" id="id" value="<?= $mission->getId() ?>">
        <input type="hidden" name="action" id="action" value="update">
        <input type="hidden" name="page" id="page" value="missions" >
        <input type="hidden" name="module" id="module" value="mission" >

        <div class="form-group">
            <button type="button" id="annuler" class="btn btn-primary">Annuler</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit" id="btn-update-mission" class="btn btn-primary">Envoyer</button>
        </div>
    </form>

<!-- ******************** FIN FORM UPDATE MISSION ************************* -->