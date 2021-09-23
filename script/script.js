// Fin du chargement de la page.
$(document).ready(() => {
  // Notre code utilisant jQuery
//  alert('page chargée, jQuery ok');
})

// Affiche le formulaire de modification du pays
function displayUpdatePays(id, nom){

//  console.log("coucou" + " " + $id + " NOM : " + $nom);
let updateForm = '<form method="post" action="index.php">' + 
              '<label for="nom"></label><input type="text" name="nom" value="'+ nom + '" id="nom" placeholder="'+ nom + '">' +
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
//$(".updatePays").click(function() {
//})