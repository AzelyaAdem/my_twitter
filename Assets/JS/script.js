// var document = document.childNodes[1].childNodes[2].childNodes[1].children[0].children["Chat"];
// document.getElementById("Chat").setAttribute('readonly','readonly');
// $('input').text();



/*---------------------------*/


/*---------------------------------------------------------------*/
/* SCRIPT AJAX */
// try
// {
//     xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Essayer IE 
// }
// catch(e)   // Echec, utiliser l'objet standard 
// {
//   xhr = new XMLHttpRequest();
// }
// xhr.onreadystatechange = function()
// {
//     // instructions de traitement de la réponse
// };
// if (xhr.readyState == 4) 
// { 
//   console.log("Ok")  // Reçu, OK  
// }
// else
// { 
//     // Attendre...
//     console.log("Attendre ...")
// }
/*---------------------------------*/
// function Req(){
//     $.ajax({
//         type : "POST",
//         url: "../../View/Message.php",
//         dataType : "html",
//         // contient la valeur de la variable a envoyer 
//         data : "message=" +  + "contact=" + 

//         // Function qui contient le code html envoyé
//     succes : function (code_html,statut){

//     },
//     error : function (resultat, statut, erreur){

//     },
//     complete : function(resultat, statut){

//     },

// })
// }

// $('#Accepter').click(function(){

//     var select_label_message = $('#Message');

//     var select_text_area = $('#Chat');

//     console.log(select_label_message);

//     select_text_area.append(select_label_message);
// })
// $(document).ajaxSend(function(){
//     $("#Chat").text("#Message");
//     $("#Chat").text("#")
// });

/* JAVASCRIPT ----------- **/
// var chatDoc = document.body.children[0].children[4];
// var messageDoc = document.body.children[0].children[1];
// var contactDoc = document.body.children[0].children[2];
// var submitDoc = document.body.children[0].children[3];

/* Si j'ecris dans message et que je valide sur Submit alors j'envoi ma requete Ajax , et j'affiche le message 
avec le nom de l'utilisateur qui l'a envoyer plus le coprs du message   */

// submitDoc.onclick = function(){
//   /* Mettre la function ajax ?? */
// messageDoc.innerText = "Hello World";
// };


// $("#Contact").keypress(function(e){
//     e.preventDefault();
//     var valeurDeMonContact = $("#Contact").val();
//     $("#Chat").val(valeurDeMonContact);
// });
// $("#Recherche").click(function(){
//     $.ajax({
//         type: "GET",
//         url: "Message.php",
//         data: "membre" + User,
//         dataType: "html",
//         success: function (code_html,statut) {

//         },
//         error: function(resultat, statut, erreur){

//         },
//         complete: function(resultat , statut){

//         },

//     });
// }); 

/* jQuery ------------ */
$("#Accepter").click(function(e){
    e.preventDefault();
    var Contact = $("#membre").val("@" + Contact);
    var Message = $("#Message").val();
    var User = $("#id").val();
    console.log(User);
    $("#Chat").val(Message+Contact);
});



/* Ajax -------------------**/
function getMesage(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("POST","privateMessage.php");
    requeteAjax.onload = function(){
        const resultat = JSON.parse(requeteAjax.responseText);
    }
    requeteAjax.send();
    
}