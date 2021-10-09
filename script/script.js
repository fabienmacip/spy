//  ##############  MISSION - 1 ###################

// Mise à jour des cases à cocher pour le choix des planques, qui
// soient dans le même pays que la mission.
function majListePlanquesContacts(pays, listePlanques = [], listeContacts = []) {
  // Pour chaque checkbox, on vérifie s'il faut l'afficher ou pas.

  listePlanques.forEach(function(item){
    // Si le pays est différent de sonPays
    // Alors on n'affiche pas la div et on désactive la checkbox
    if($('#sonPays'+item).val() != pays) {
        $('#pl'+item).prop('disabled',true);
        $('#unePlanque'+item).hide();
      } else {
        $('#pl'+item).prop('disabled',false);
        $('#unePlanque'+item).show();
      }
    });

    listeContacts.forEach(function(item){
      // Si le pays est différent de paysContact
      // Alors on n'affiche pas la div et on désactive la checkbox
      if($('#paysContact'+item).val() != pays) {
          $('#contact'+item).prop('disabled',true);
          $('#unContact'+item).hide();
        } else {
          $('#contact'+item).prop('disabled',false);
          $('#unContact'+item).show();
        }
      });
}

function majListeAgents(listeCibles = [], listeAgents = []) {
      // Quand on clique sur une cible, on met à jour la liste d'agents possibles,
      // qui ne doivent pas être de la même nationalité que les cibles.
      
      // 1. Remplir un tableau des pays des cibles, en évitant les doublons.
      let lesPaysDesCibles = [];
      listeCibles.forEach(function(item){
        if($('#cible'+item).is(':checked')  && lesPaysDesCibles.indexOf($('#paysCible'+item).val()) < 0) {
          // On ajoute le pays
          lesPaysDesCibles.push($('#paysCible'+item).val());
          
        }
      })// FIN For Each listeCibles
      // 2. Afficher/activer ou masquer/désactiver les AGENTS
      listeAgents.forEach(function(item) {
        // SI le pays de l'agent ne fait pas partie des pays des cibles, ALORS on affiche/active l'agent.
        if(lesPaysDesCibles.indexOf($('#paysAgent'+item).val()) < 0) {
          $('#unAgent'+item).show();
          $('#agent'+item).prop('disabled',false);
        } else {
          $('#unAgent'+item).hide();
          $('#agent'+item).prop('disabled',true);
        }
      }) // FIN du forEach listeAgents
}

function majSpecialiteMission(specialite,listeSpecialitesDesAgents = []) {
  // On ajoute la classe aumoinsun aux agents dont la spécialité correspond à la mission
  // On met ces agents en premier dans la liste des agents
  listeAgents1 = '';
  listeAgents2 = '';
  listeSpecialitesDesAgents.forEach(function(item) {
    $('#unAgent'+item[0]).removeClass("aumoinsun");
    $('#unAgent'+item[0]+' label span').removeClass("listeDesSpes");
    if(item[1].indexOf(specialite) < 0){
      listeAgents2 += $('#unAgent'+item[0]).prop('outerHTML');
    } else {
      $('#unAgent'+item[0]+' label span').addClass("listeDesSpes");
      $('#unAgent'+item[0]).addClass("aumoinsun");
      listeAgents1 += $('#unAgent'+item[0]).prop('outerHTML');
    }
  });

  $('#listeAgents').replaceWith("<div id=\"listeAgents\"><label class=\"mb-2\">Agents</label><br/>" + listeAgents1 + "<br/>" + listeAgents2 + "</div>");
  $('#form-create-mission #listeAgents div input[type=checkbox]').on('click', function() {
    verifAuMoinsUnAgentSpe();
  });
}


// Si au moins un agent de la bonne spécialité est sélectionné, on active le bouton d'envoi
// du formulaire.
function verifAuMoinsUnAgentSpe() {
  let ok = false;
  $('#form-create-mission #listeAgents .aumoinsun input[type=checkbox]').each(function() {
    
    if($(this).is(':checked')) {
      ok = true;
    } 
  });

  $('#btn-create-mission').prop('disabled',!ok);

}


// ########################            CHARGEMENT PAGE OK              #############################

// Fin du chargement de la page.
$(document).ready(() => {
let pageMission ='';
  if (pageMission = document.getElementById('form-create-mission'))  {
      // ########### PLANQUES ##############
      // On affecte la liste des planques dans une variable en JS
      let listePlanques = [];
      $('#listePlanques div input[type=checkbox]').each(function(){
        listePlanques.push(this.value);
      });

      // ########### AGENTS #############

      // On affecte la liste des agents dans une variable en JS
      let listeAgents = [];
      // On les trie selon la spécialité, afin d'obliger à choisir au moins un agent de la même
      // spécialité que la mission
      let listeSpecialitesDesAgents = [];
      $('#listeAgents div input[type=checkbox]').each(function(){
        // Génération de la liste des agents
        listeAgents.push([this.value,$('#paysAgent'+this.value).val()]);
        // Génération de liste des spécialités de chaque agent
        listeSpecialitesDesAgents.push([this.value,$('#specialitesAgent'+this.value).val()]);
      });

      majSpecialiteMission($('#form-create-mission div #specialite').val(),listeSpecialitesDesAgents);

      // ############# SPECIALITES #############
      $('#form-create-mission div #specialite').on('change', function() {
        majSpecialiteMission(this.value, listeSpecialitesDesAgents);
      });


      // ########### CIBLES ##############
      // On affecte la liste des cibles dans une variable en JS
      let listeCibles = [];
      $('#listeCibles div input[type=checkbox]').each(function(){
        listeCibles.push(this.value);
      });  

      // ########### CONTACTS ##############
      // On affecte la liste des cibles dans une variable en JS
      let listeContacts = [];
      $('#listeContacts div input[type=checkbox]').each(function(){
        listeContacts.push(this.value);
      });  

      // ####### PLANQUES et CONTACTS ##########
      // Masquer toutes les planques et tous les contacts qui ne sont pas du pays.
      majListePlanquesContacts($('#form-create-mission div #pays').val(), listePlanques, listeContacts);

      // A chaque changement de sélection du pays, masquer toutes les "planques et contacts" qui ne sont pas du pays.
      $('#form-create-mission div #pays').on('change', function() {
        majListePlanquesContacts(this.value, listePlanques, listeContacts);
      });

      // La liste d'agents contient des tableaux : id_agent et id_pays_de_l_agent
      $('#form-create-mission #listeCibles div input[type=checkbox]').on('click', function() {
        //majListeAgents($('#cible'+this.value).val(),$('#paysCible'+this.value).val(), listeAgents);
        majListeAgents(listeCibles, listeAgents);
      });

      // Activer le bouton de validation du formulaire de création d'agent quand on a choisi au moins
      // un agent de la bonne spécialité
      $('#form-create-mission #listeAgents div input[type=checkbox]').on('click', function() {
        verifAuMoinsUnAgentSpe();
      });
      
      
    } // FIN du IF pageMission

    // Si on n'est pas ADMIN connecté, alors on n'accède pas aux formulaires de CRUD.
    if($('#isAdmin').val() != 1) {
      $('form').hide(); 
      /* $('button').hide(); */
      $('button ').prop('disabled',true);
      $('button').addClass('inactif');
      $('#form-connexion').show();
      /* $('.btn-connexion').show(); */
      $('.btn-connexion').prop('disabled',false);
      $('.btn-connexion').removeClass('inactif');
      /* $('#navbarDropdown').prop('disabled',false); */
    } else {
      $('form').show();
      /* $('button').show(); */
      $('button').prop('disabled',false);
    }
    
  
}) // FIN DU document.READY

//  ##############  MISSION - 2  ###################


// ##############  PAYS  ###################

// Affiche le formulaire de modification du pays
function displayUpdatePays(id, nom){

  let updateForm = '<form method="post" action="index.php">' + 
                '<label for="nom"></label><input type="text" maxlength="50" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + '">' +
                '<input type="hidden" name="idPaysToUpdate" id="idPaysToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="updatePays">' +
                '<input type="hidden" name="page" id="page" value="payss">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
                '</form>';

  //let codeAConserver = $(`#tr${id}`);
  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='4'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updatePays').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updatePays').prop('disabled',false);
  });
}

// Confirme suppression d'un Pays
function confirmeSuppressionPays(id,nom){
  console.log(id,nom);

  let lien = "index.php?page=payss&action=delete&id=" + id + "&nom="+ nom;

  console.log(lien);

  if(!confirm("Supprimer " + nom + " ?")){
      //e.target.preventDefault();
      console.log("pas confirmé");
  } else {
    // Supprimer la ligne
    window.location.href = lien;
  }
}

// ##############  SPECIALITE  ###################

// Affiche le formulaire de modification d'une spécialité
function displayUpdateSpecialite(id, intitule){

  let updateForm = '<form method="post" action="index.php">' + 
                '<label for="nom"></label><input type="text" maxlength="50" name="intitule" value="'+ intitule + '" id="intitule" placeholder="'+ intitule + '">' +
                '<input type="hidden" name="idSpecialiteToUpdate" id="idSpecialiteToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="updateSpecialite">' +
                '<input type="hidden" name="page" id="page" value="specialites">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='4'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updateSpecialite').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updateSpecialite').prop('disabled',false);
  });
}

// Confirme suppression d'une Spécialité
function confirmeSuppressionSpecialite(id,intitule){
  
  let lien = "index.php?page=specialites&action=delete&id=" + id + "&intitule="+ intitule;

  if(confirm("Supprimer " + intitule + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}

// ##############  TYPE MISSION  ###################

// Affiche le formulaire de modification d'un type de mission
function displayUpdateTypeMission(id, intitule){

  let updateForm = '<form method="post" action="index.php">' + 
                '<label for="nom"></label><input type="text" maxlength="60" name="intitule" value="'+ intitule + '" id="intitule" placeholder="'+ intitule + '">' +
                '<input type="hidden" name="idTypeMissionToUpdate" id="idTypeMissionToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="typemissions">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='4'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updateTypeMission').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updateTypeMission').prop('disabled',false);
  });
}

// Confirme suppression d'un type de mission
function confirmeSuppressionTypeMission(id,intitule){
  
  let lien = "index.php?page=typemissions&action=delete&id=" + id + "&intitule="+ intitule;

  if(confirm("Supprimer " + intitule + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}

// ##############  TYPE PLANQUE  ###################

// Affiche le formulaire de modification d'un type de planque
function displayUpdateTypePlanque(id, intitule){

  let updateForm = '<form method="post" action="index.php">' + 
                '<label for="nom"></label><input type="text" maxlength="40" name="intitule" value="'+ intitule + '" id="intitule" placeholder="'+ intitule + '">' +
                '<input type="hidden" name="idTypePlanqueToUpdate" id="idTypePlanqueToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="typeplanques">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='4'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updateTypePlanque').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updateTypePlanque').prop('disabled',false);
  });
}

// Confirme suppression d'un type de planque
function confirmeSuppressionTypePlanque(id,intitule){
  
  let lien = "index.php?page=typeplanques&action=delete&id=" + id + "&intitule="+ intitule;

  if(confirm("Supprimer " + intitule + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}




// ####################  ADMINISTRATEUR ####################

// Affiche le formulaire de modification d'un administrateur
function displayUpdateAdministrateur(id, nom, prenom, mail, mot_de_passe){

  let updateForm = '<form method="post" action="index.php">' + 
                '<div class="form-group row my-3">' +
                '<div class="col-7 col-lg-3 form-floating"><input type="text" maxlength="40" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + ' " class="form-control"><label for="nom">Nom</label></div>' +
                '<div class="col-7 col-lg-3 form-floating"><input type="text" name="prenom" value="'+ prenom + '" maxlength="30" id="prenom" placeholder="' + prenom + '" class="form-control"><label for="prenom">Pr&eacute;nom</label></div>' +
                '<div class="col-7 col-lg-3 form-floating"><input type="mail" name="mail" value="' + mail + '" maxlength="50" id="mail" placeholder="' + mail + '" class="form-control"><label for="mail">Mail</label></div>' +
                '<div class="col-7 col-lg-3 form-floating"><input type="text" name="mot_de_passe" value="' + mot_de_passe + '" maxlength="40" id="mot_de_passe" placeholder="' + mot_de_passe + '" class="form-control"><label for="mot_de_passe">Mot de passe</label></div></div>' +               
                '<div class="row text-center"><div class="col-0 col-lg-3"><input type="hidden" name="idAdministrateurToUpdate" id="idAdministrateurToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="administrateurs"></div>' +
                '<div class="col-7 col-lg-6 d-flex justify-content-around"><button type="reset" class="btn btn-primary">Reset</button>' +
                '<button type="button" id="annuler" class="btn btn-primary">Annuler</button>' +
                '<button type="submit" class="btn btn-primary">Envoyer</button></div><div class="col-0 col-lg-3"></div></div>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='8'>" + updateForm + "</td></tr>");

  // On frise tous les autres boutons "Modifier"
  $('.updateAdministrateur').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updateAdministrateur').prop('disabled',false);
  });
}

// Confirme suppression d'un administrateur
function confirmeSuppressionAdministrateur(id, nom, prenom){
  
  let lien = "index.php?page=administrateurs&action=delete&id=" + id + "&nom="+ nom + "&prenom="+ prenom;

  if(confirm("Supprimer " + nom + " " + prenom + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}

// ####################  PLANQUE ####################

// Affiche le formulaire de modification d'une planque
function displayUpdatePlanque(id, code, adresse, ville, pays, type){

  let selectPays = $('#pays').prop('outerHTML');;
  // On place le sélecteur de la liste déroulante sur le bon pays
  selectPays = selectPays.replace("value=\""+pays.toString()+"\"","value=\""+pays.toString()+"\" selected");
  
  let selectType = $('#type').prop('outerHTML');;
  // On place le sélecteur de la liste déroulante sur le bon type
  selectType = selectType.replace("value=\""+type.toString()+"\"","value=\""+type.toString()+"\" selected");
  
  
  let updateForm = '<form method="post" action="index.php">' + 
                '<div class="form-group">' +
                '<label for="code"></label><input type="text" maxlength="30" name="code" value="'+ code + '" id="code" placeholder="'+ code + '">' +
                '<label for="adresse"></label><input type="text" name="adresse" value="'+ adresse + '" maxlength="50" id="adresse" placeholder="' + adresse + '" class="form-control"></div>' +
                '<label for="ville"></label><input type="text" name="ville" value="' + ville + '" maxlength="40" id="ville" placeholder="' + ville + '" class="form-control"></div>' +               
                '<input type="hidden" name="idPlanqueToUpdate" id="idPlanqueToUpdate" value="' + id + '">' +
                selectPays +
                selectType +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="planques">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='8'>" + updateForm + "</td></tr>");
  
  // On frise tous les autres boutons "Modifier"
  $('.updatePlanque').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updatePlanque').prop('disabled',false);
  });
}

// Confirme suppression d'une planque
function confirmeSuppressionPlanque(id, code, ville){
  
  let lien = "index.php?page=planques&action=delete&id=" + id + "&code="+ code + "&ville="+ ville;
  
  if(confirm("Supprimer " + code + " de la ville " + ville + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}


function alertMe() {
  alert("Cliqué ! ");
}


// ################ SPECIALITES #####################


// Vérifier s'il y a au moins une spécialité
function verifUneSpecialite(numDiv = 1) {
  $envoyer = false;
  $('#listeSpecialites'+numDiv+' input[type=checkbox]').each(function () {
    if($(this).prop("checked") == true) {
      $envoyer = true;      
    } 
  });
  
  if($envoyer) {
    $('#btn-create-personne').prop('disabled',false);
    /* $('#form-create-personne').submit(function( event ) {
      event.preventDefault();
    }); */
  } else {
    $('#btn-create-personne').prop('disabled',true);
  }
}

// Affichage de la liste des spécialités si c'est un agent
function afficheSpecialites(numDiv = 1) {
  //if($('#typeDePersonne #agent').prop("checked") == true) {

    if($("#typeDePersonne"+numDiv+' #agent').prop("checked") == true) {
    $('#listeSpecialites'+numDiv).show();
  }
  else {
    $('#listeSpecialites'+numDiv).hide();
  }

  // Autoriser l'envoi du formulaire si ce n'est pas un agent -> Pas besoin de cocher au moins une spécialité.
  if($('#typeDePersonne'+numDiv+' #agent').prop("checked") == false) {
    $('#btn-create-personne').prop('disabled',false);
  } else {
    verifUneSpecialite(numDiv);
  }
}
// ####################  PERSONNE ####################

// Affiche le formulaire de modification d'une personne
// Ici, la variable pays = nationalite
function displayUpdatePersonne(id, nom, prenom, dob, secret_code, pays, type, specialites = ""){

  // PAYS
  let selectPays = $('#pays').prop('outerHTML');
  // On place le sélecteur de la liste déroulante sur le bon pays
  selectPays = selectPays.replace("value=\""+pays.toString()+"\"","value=\""+pays.toString()+"\" selected");
  
  // TYPE
  let selectType = $('#typeDePersonne1').prop('outerHTML');
  // On enlève la case sélectionnée car on ne sait pas laquelle est déjà sélectionnée
  selectType = selectType.replace("checked","");
  // Puis on sélectionne le bon bouton radio
  selectType = selectType.replace("value=\""+type.toString()+"\"","value=\""+type.toString()+"\" checked");

  // SPECIALITES
  let selectSpecialites = "";
  selectSpecialites = $('#listeSpecialites1').prop('outerHTML');
  // On enlève les cases sélectionnées car on ne sait pas lesquelles sont déjà sélectionnées
  selectSpecialites = selectSpecialites.replace("checked","");
  selectSpecialites = selectSpecialites.replace('id="listeSpecialites1"','id="listeSpecialites2"');
  // Puis on sélectionne les bonnes spécialités
  if(specialites !== "") {
    tableauDesSpecialites = specialites.split(",");
    tableauDesSpecialites.forEach(element => {
      selectSpecialites = selectSpecialites.replace("value=\""+element.toString()+"\"","value=\""+element.toString()+"\" checked");
    });
  }
  selectSpecialites = selectSpecialites.replaceAll("verifUneSpecialite(1)","verifUneSpecialite(2)");
  
  // Si AGENT, il faut aussi modifier l'id du sélecteur de TYPE
  selectType = selectType.replace('id="typeDePersonne1"','id="typeDePersonne2"');
  selectType = selectType.replace('afficheSpecialites(1)','afficheSpecialites(2)');
  
  
// FORMULAIRE de MODIFICATION d'une PERSONNE
// let updateForm = selectSpecialites;
   let updateForm = '<form method="post" action="index.php" class="text-start">' + 
                '<div class="form-group">' +
                '<label for="nom"></label><input type="text" maxlength="40" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + '">' +
                '<label for="prenom"></label><input type="text" maxlength="30" name="prenom" value="'+ prenom + '" id="prenom" placeholder="'+ prenom + '">' +
                '<label for="dob"></label><input type="date" name="dob" value="'+ dob + '" id="dob" placeholder="' + dob + '" min="1920-01-01" max="2040-12-31" class="form-control"></div>' +
                selectPays +
                '<label for="secret_code"></label><input type="text" name="secret_code" value="' + secret_code + '" maxlength="20" id="secret_code" placeholder="' + secret_code + '" class="form-control"></div>' +               
                selectType +
                selectSpecialites +
                '<input type="hidden" name="idPersonneToUpdate" id="idPersonneToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="personnes">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
                '</form>';

  let codeAConserver = $('#tr'+id);
  // <tr><td colspan='9'>"+selectSpecialites+"</td></tr>
  $('#tr'+id).replaceWith("<tr id='tr"+id+"'><td colspan='9'>" + updateForm + "</td></tr>");
  
  if (type === 'agent') {
    $('#trs'+id).hide();
    $('#listeSpecialites2').show();
  } else {
    $('#listeSpecialites2').hide();
  }


  // On frise tous les autres boutons "Modifier"
  $('.updatePersonne').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#tr'+id).replaceWith(codeAConserver);
    $('.updatePersonne').prop('disabled',false);
    if (type === 'agent') {
      $('#trs'+id).show();
    }
  
  });
}


// Confirme suppression d'une personne
function confirmeSuppressionPersonne(id, nom, prenom){
  
  let lien = "index.php?page=personnes&action=delete&id=" + id + "&nom="+ nom + "&prenom="+ prenom;

  if(confirm("Supprimer " + nom.toUpperCase() + "  " + prenom + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}


// ###################### MISSION #############################
// Confirme suppression d'une mission
function confirmeSuppressionMission(id, titre, nom_de_code){
  
  let lien = "index.php?page=missions&action=delete&id=" + id + "&titre="+ titre + "&nom_de_code="+ nom_de_code;

  if(confirm("Supprimer la mission " + titre.toUpperCase() + ", nom de code << " + nom_de_code + " >> ?" + lien)){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}

// Modifier les données générales
function displayUpdateMission() {
  let lien = "index.php?page=missions&action=update&module=mission";
}
