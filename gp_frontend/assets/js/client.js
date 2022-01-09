$(document).ready(function() {

	showClients();

	$("#btnAddClient").click(function(){
		var nom =$("#inputnomclienta").val();
        var prenom = $("#inputprenomclienta").val();
        var entreprise =$("#inputnomentreprisea").val();
        var adresse = $("#inputadressea").val();
        var ville =$("#inputvillea").val();
        var pays = $("#inputpaysa").val();
        var tel =$("#inputtela").val();
        var email = $("#inputemaila").val();
        var site =$("#inputsitea").val();
		addClient(nom,prenom,entreprise,adresse,ville,pays,tel,email,site);
	})
	
	$("#tblBody").on("click",".edit",function(){
        var id = $(this).attr('id');
        getClient(id);
    });

    $("#tblBody").on("click",".delete",function(){
        var id = $(this).attr('id');
        getClient(id);
    });

});

function showClients() {
	var user = JSON.parse(getUser());
	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	url: 'http://localhost:8080/clients/search/findByCreatorId?id='+user.id,
      	dataType: "json",
      	success: function(resp){ 
      		var html=""
      		var clients = resp._embedded.clients
      		for(var c in clients){
      			html+="<tr>"+
                    "<td>"+clients[c].nom+"</td>"+
                    "<td>"+clients[c].prenom+" </td>"+
                    "<td>"+clients[c].nom_entreprise+"</td>"+
                    "<td>"+clients[c].adresse+"</td>"+
                    "<td>"+clients[c].ville+"</td>"+
                    "<td>"+clients[c].pays+"</td>"+
                    "<td>"+clients[c].tel+"</td>"+
                    "<td>"+clients[c].email+"</td>"+
                    "<td>"+clients[c].siteWeb+"</td>";
                    if (user.role!="membre") {
                      html+="<td>"+
                          "<a href='#modifierClient' id='"+clients[c].id+"' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
                          "<a href='#suppClient' id='"+clients[c].id+"' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
                      "</td>";
                    }
                html+="</tr>";
      		}
      		$("#tblBody").html(html);
        },
        error: function (){
        	showNotification("nc-icon nc-app","Erreur Not found : 404","danger","top");
        }
    });
}

function getClient(id) {
    $.ajax({
      url: 'http://localhost:8080/clients/'+id,
      dataType: 'json',
      success: function(resp){
      	var id = resp.id;
		$("#inputnomclient").val(resp.nom);
        $("#inputprenomclient").val(resp.prenom);
        $("#inputnomentreprise").val(resp.nom_entreprise);
        $("#inputadresse").val(resp.adresse);
        $("#inputville").val(resp.ville);
        $("#inputpays").val(resp.pays);
        $("#inputtel").val(resp.tel);
        $("#inputemail").val(resp.email);
        $("#inputsite").val(resp.siteWeb);
        $("#btnUpdateClient").attr("onclick","updateClient("+id+")")
        $("#btnDeleteClient").attr("onclick","deleteClient("+id+")")
      }
    }); 
}

function addClient(nom,prenom,entreprise,adresse,ville,pays,tel,email,site) {
  var user = JSON.parse(getUser());
	var client = JSON.stringify({ "nom":nom,"prenom":prenom,"nom_entreprise":entreprise,"adresse":adresse,"ville":ville,"pays":pays,"tel":tel,"email":email,"siteWeb":site})

	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	type: 'POST',
      	url: 'http://localhost:8080/clients',
      	dataType: "json",
      	data: client,
      	success: function(resp){ 
            $.ajax({
                contentType: 'text/uri-list',
                type: 'PUT',
                url: 'http://localhost:8080/clients/'+resp.id+'/creator',
                data: 'http://localhost:8080/users/'+user.id,
                success: function(resp){ 
                    showNotification("nc-icon nc-app","Le client est ajouté avec succes","success","top");
                    showClients();
                },
                error: function(){
                  alert("delete user and admin!");
                }
            });
        },
        error: function (){
        	showNotification("nc-icon nc-app","Erreur : Le client n'a ete pas ajouter ! ","danger","top");
        }
    });
}

function updateClient(id) {
	var nom =$("#inputnomclient").val();
    var prenom = $("#inputprenomclient").val();
    var entreprise =$("#inputnomentreprise").val();
    var adresse = $("#inputadresse").val();
    var ville =$("#inputville").val();
    var pays = $("#inputpays").val();
    var tel =$("#inputtel").val();
    var email = $("#inputemail").val();
    var site =$("#inputsite").val();

	var client = JSON.stringify({ "nom":nom,"prenom":prenom,"nom_entreprise":entreprise,"adresse":adresse,"ville":ville,"pays":pays,"tel":tel,"email":email,"siteWeb":site})

	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	type: 'PUT',
      	url: 'http://localhost:8080/clients/'+id,
      	dataType: "json",
      	data: client,
      	success: function(resp){ 
			showNotification("nc-icon nc-app","Le client est modifié avec succes","success","top");
			showClients();
        },
        error: function (){
        	showNotification("nc-icon nc-app","Erreur : Le client n'a ete pas modifier ! ","danger","top");
        }
    });
}

function deleteClient(id) {
	$.ajax({
      	type: 'DELETE',
      	url: 'http://localhost:8080/clients/'+id,
      	dataType: "json",
      	success: function(resp){ 
			showNotification("nc-icon nc-app","Le client est supprimé avec succes","success","top");
			showClients();
        },
        error: function (){
        	showNotification("nc-icon nc-app","Erreur : Le client n'a ete pas supprimer ! ","danger","top");
        }
    });
}


