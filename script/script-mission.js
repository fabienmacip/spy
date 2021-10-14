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
    if(item[1].indexOf(specialite) < 0){
      listeAgents2 += $('#unAgent'+item[0]).prop('outerHTML');
    } else {
      $('#unAgent'+item[0]).addClass("aumoinsun");
      listeAgents1 += $('#unAgent'+item[0]).prop('outerHTML');
    }
  });

  $('#listeAgents').replaceWith("<div id=\"listeAgents\"><label>Agents</label><br/>" + listeAgents1 + listeAgents2 + "</div>");
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


// MODIFICATIONS DES CARTES DE LA MISSION

function confirmeDeletePlanque(id_planque, code_planque, id_mission) {

      let lien = "mission.php?page=mission&action=delete&module=planque&id_planque=" + id_planque + "&id=" + id_mission ;
    
      if(!confirm("Supprimer " + code_planque + " ?")){
          //e.target.preventDefault();
          console.log("pas confirmé");
      } else {
        // Supprimer la ligne
        window.location.href = lien;
      }
  
}

function confirmeDeleteCible(id_cible, nom_cible, id_mission, okPourDelete) {

  // On vérifie si la cible peut être supprimée : il faut au moins 1 cible pour la mission
/*   console.log(listeCibles);
  if(listeCibles.length < 1) {
    console.log("trop petit");
  } else {
    console.log("C'est ok");
  }
 */
if(okPourDelete == 0) {
  alert("Impossible de supprimer la cible. Ajouter au moins une cible avant de pouvoir supprimer celle-ci.");
} else {
  let lien = "mission.php?page=mission&action=delete&module=personne&id_personne=" + id_cible + "&id=" + id_mission ;

  if(!confirm("Supprimer " + nom_cible + " ?")){
      //e.target.preventDefault();
      console.log("pas confirmé");
  } else {
    // Supprimer la ligne
    window.location.href = lien;
  }

}

} // FIN confirme Delete Cible d'une mission



function confirmeDeleteContact(id_contact, nom_contact, id_mission, okPourDelete) {
  if(okPourDelete == 0) {
    alert("Impossible de supprimer le contact. Ajouter au moins un contact avant de pouvoir supprimer celui-ci.");
  } else {
    let lien = "mission.php?page=mission&action=delete&module=personne&id_personne=" + id_contact + "&id=" + id_mission ;
  
    if(!confirm("Supprimer " + nom_contact + " ?")){
        //e.target.preventDefault();
        console.log("pas confirmé");
    } else {
      // Supprimer la ligne
      window.location.href = lien;
    }
  
  }
  
}

function confirmeDeleteAgent(id_agent, nom_agent, id_mission, okPourDelete) {
  if(okPourDelete == 0) {
    alert("Impossible de supprimer l'agent. Ajouter au moins un agent avant de pouvoir supprimer celui-ci.");
  } else {
    let lien = "mission.php?page=mission&action=delete&module=personne&id_personne=" + id_agent + "&id=" + id_mission ;
  
    if(!confirm("Supprimer " + nom_agent + " ?")){
        //e.target.preventDefault();
        console.log("pas confirmé");
    } else {
      // Supprimer la ligne
      window.location.href = lien;
    }
  
  }
  
}


function displayAddPlanque() {
  console.log("Add Planque");
}

function displayAddAgent() {
  //console.log("Add Agent"); 
}

function displayAddCible() {
  // Récupérer et affiche la liste des cibles
}

function displayAddContact() {
  //console.log("Add Contact");
}






// ########################            CHARGEMENT PAGE OK              #############################

// Fin du chargement de la page.
$(document).ready(() => {



  // Si une des listes pour sélectionner une nouvelle cible, un nouveau contact, un nouvel agent
  // ou une nouvelle planque est vide, on n'affiche pas la liste.
    if($('#nouvelleCible option').length === 0) {
      $('#nouvelleCible').prop('disabled',true);
      $('#btn-ajout-cible').prop('disabled',true);
    }

    if($('#nouveauContact option').length === 0) {
      $('#nouveauContact').prop('disabled',true);
      $('#btn-ajout-contact').prop('disabled',true);
    }

    if($('#nouvelAgent option').length === 0) {
      $('#nouvelAgent').prop('disabled',true);
      $('#btn-ajout-agent').prop('disabled',true);
    }

    if($('#nouvellePlanque option').length === 0) {
      $('#nouvellePlanque').prop('disabled',true);
      $('#btn-ajout-planque').prop('disabled',true);
    }

    
    
    // Si on n'est pas ADMIN connecté, alors on n'accède pas aux formulaires de CRUD.
    if($('#isAdmin').val() != 1) {
      $('form').hide(); 
      $('button').hide();
      $('button ').prop('disabled',true);
      /* $('button').addClass('inactif'); */
      
    } else {
      $('form').show();
      /* $('button').show(); */
      $('button').prop('disabled',false);
    }
    
    // Par défaut, le formulaire de modification des données générales d'une mission
    // est masqué.
    $('#form-update-mission').hide();
    
    // S'il n'y a qu'un seul agent de la même spécialité que la mission, 
    // On désactive le bouton supprimer de cet agent.
    if($('.agent-bonne-specialite').length === 1) {
      
      $('.agent-bonne-specialite h6 button').prop('disabled',true);
      
      //$('.agent-bonne-specialite h6 button').addClass('');
    } 
    
    // mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm














// CI-APRES, code à supprimer si inutile

/*   let pageMission ='';
  if (pageMission === 'toto')  {
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
 */  
  
}) // FIN DU document.READY

//  ##############  MISSION - 2  ###################

// Confirme suppression d'une mission
function confirmeSuppressionMission(id, titre, nom_de_code){
  
  let lien = "index.php?page=missions&action=delete&id=" + id + "&titre="+ titre + "&nom_de_code="+ nom_de_code;

  if(confirm("Supprimer la mission " + titre.toUpperCase() + ", nom de code << " + nom_de_code + " >> ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}

// Modifier les données générales
function displayUpdateMission() {

  // On masque la carte et on affiche le formulaire de modification
  $('#carte-mission').hide();
  $('#form-update-mission').show();

  // On frise tous les autres boutons "Modifier", "Ajouter", "Supprimer"
  $('.lesboutons').prop('disabled',true);


  // Si on clique sur ANNULER, on ré-affiche la ligne normale -> codeAConserver
  $( "#annuler" ).click(function() {
    $('#form-update-mission').hide();
    $('#carte-mission').show();
    $('.lesboutons').prop('disabled',false);
  });


  // On met en valeur les agents ayant la spécialité de la mission.
  // Et s'il ne reste qu'un seul agent ayant la bonne spécialité, on interdit la suppression de cet agent.
/*   function majSpecialiteMission(specialite,listeSpecialitesDesAgents = []) {
  }
 */
  
}
// FIN DU CHARGEMENT $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$





























