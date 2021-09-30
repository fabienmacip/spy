// Fin du chargement de la page.
$(document).ready(() => {
  // Notre code utilisant jQuery
//  alert('page chargée, jQuery ok');
/* console.log("coucou");
let listePays = document.getElementById(listePays);
console.log(listePays.value); */
})

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


// ####################  ADMINISTRATEUR ####################

// Affiche le formulaire de modification d'un administrateur
function displayUpdateAdministrateur(id, nom, prenom, mail, mot_de_passe){

  let updateForm = '<form method="post" action="index.php">' + 
                '<div class="form-group">' +
                '<label for="nom"></label><input type="text" maxlength="40" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + '">' +
                '<label for="prenom"></label><input type="text" name="prenom" value="'+ prenom + '" maxlength="30" id="prenom" placeholder="' + prenom + '" class="form-control"></div>' +
                '<label for="mail"></label><input type="mail" name="mail" value="' + mail + '" maxlength="50" id="mail" placeholder="' + mail + '" class="form-control">' +
                '<label for="mot_de_passe"></label><input type="text" name="mot_de_passe" value="' + mot_de_passe + '" maxlength="40" id="mot_de_passe" placeholder="' + mot_de_passe + '" class="form-control"></div>' +               
                '<input type="hidden" name="idAdministrateurToUpdate" id="idAdministrateurToUpdate" value="' + id + '">' +
                '<input type="hidden" name="action" id="action" value="update">' +
                '<input type="hidden" name="page" id="page" value="administrateurs">' +
                '<button type="reset">Reset</button>' +
                '<button type="button" id="annuler">Annuler</button>' +
                '<button type="submit">Envoyer</button>' +
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
function displayUpdatePlanque(id, code, adresse, ville, pays){

  let selectPays = $('#pays').prop('outerHTML');;
  // On place le sélecteur de la liste déroulante sur le bon pays
  selectPays = selectPays.replace("value=\""+pays.toString()+"\"","value=\""+pays.toString()+"\" selected");
  
  let updateForm = '<form method="post" action="index.php">' + 
                '<div class="form-group">' +
                '<label for="code"></label><input type="text" maxlength="30" name="code" value="'+ code + '" id="code" placeholder="'+ code + '">' +
                '<label for="adresse"></label><input type="text" name="adresse" value="'+ adresse + '" maxlength="50" id="adresse" placeholder="' + adresse + '" class="form-control"></div>' +
                '<label for="ville"></label><input type="text" name="ville" value="' + ville + '" maxlength="40" id="ville" placeholder="' + ville + '" class="form-control"></div>' +               
                '<input type="hidden" name="idPlanqueToUpdate" id="idPlanqueToUpdate" value="' + id + '">' +
                selectPays +
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


