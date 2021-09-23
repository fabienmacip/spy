// Fin du chargement de la page.
$(document).ready(() => {
  // Notre code utilisant jQuery
//  alert('page chargée, jQuery ok');
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
  console.log("FONCTION DELETE");
  let lien = "index.php?page=administrateurs&action=delete&id=" + id + "&nom="+ nom + "&prenom="+ prenom;

  if(confirm("Supprimer " + nom + " " + prenom + " ?")){
    // Supprimer la ligne dans la BDD
    window.location.href = lien;
  }
}