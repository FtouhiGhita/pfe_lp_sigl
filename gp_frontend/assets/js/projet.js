$(document).ready(function() {
  init()
	showProjets();

	$("#btnAddProjet").click(function(){
		    var titre =$("#inputtitrea").val();
        var desc = $("#inputdesca").val();
        var dateD =$("#inputdatedebuta").val();
        var dateL = $("#inputdatelimitea").val();
        var prix =$("#inputprixa").val();
        var client_id = $("#inputclienta").val();
        var chef_id =$("#inputchefa").val();
		    addProjet(titre,desc,dateD,dateL,prix,client_id,chef_id);
	})
	
	$("#tblBody").on("click",".edit",function(){
        var id = $(this).attr('id');
        getProjet(id);
    });

    $("#tblBody").on("click",".delete",function(){
        var id = $(this).attr('id');
        getProjet(id);
    });

});

function init() {
    var user = JSON.parse(getUser());
    $.ajax({
        contentType: 'application/json; charset=utf-8',
        url: 'http://localhost:8080/clients/search/findByCreatorId?id='+user.id,
        dataType: "json",
        success: function(resp){ 
            var html=""
            var clients = resp._embedded.clients
            for(var c in clients){
                html+="<option value='"+clients[c].id+"'>"+clients[c].nom + " " +clients[c].prenom +"</option>";
            }
            $("#inputclient").html(html);
            $("#inputclienta").html(html);
        },
        error: function (){
          showNotification("nc-icon nc-app","Erreur Not found : 404","danger","top");
        }
    });

    $.ajax({
        contentType: 'application/json; charset=utf-8',
        url: 'http://localhost:8080/chefDeProjets/search/findByCreatorIdAndUserEtat?etat=DISPONIBLE&id='+user.id,
        dataType: "json",
        success: function(resp){ 
            var html=""
            var chefs = resp._embedded.chefDeProjets
            for(var c in chefs){
                html+="<option value='"+chefs[c].id+"'>"+chefs[c].nom + " " +chefs[c].prenom +"</option>";
            }
            $("#inputchef").html(html);
            $("#inputchefa").html(html);
        },
        error: function (){
          showNotification("nc-icon nc-app","Erreur Not found : 404","danger","top");
        }
    });
}

function showProjets() {
	var user = JSON.parse(getUser());
  var url='';
  if (user.role=="admin") {
    url='http://localhost:8080/projets/search/findByAdminUserId?id='+user.id;
  }else{
    url='http://localhost:8080/projets/search/findByChefDeProjetUserId?id='+user.id;
  }
	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	url: url,
      	dataType: "json",
      	success: function(resp){ 
      		var html=""
      		var projets = resp._embedded.projets
      		for(var c in projets){
      			html+="<tr>"+
                    "<td>"+projets[c].titre+"</td>"+
                    "<td>"+projets[c].description+" </td>"+
                    "<td>"+projets[c].dateDebut.split('T')[0]+"</td>"+
                    "<td>"+projets[c].dateLimite.split('T')[0]+"</td>"+
                    "<td>"+projets[c].dateCreation.split('T')[0]+"</td>"+
                    "<td>"+projets[c].prix+"</td>"+
                    "<td>"+projets[c].status+"</td>";
                    if (user.role=="admin") {
                      html+="<td>"+
                          "<a href='#modifierProjet' id='"+projets[c].id+"' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
                          "<a href='#suppProjet' id='"+projets[c].id+"' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
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

function getProjet(id) {
    $.ajax({
      url: 'http://localhost:8080/projets/'+id,
      dataType: 'json',
      success: function(resp){
      	var id = resp.id;
        var dateCreation = resp.dateCreation;
        var status = resp.status;
        $("#inputtitre").val(resp.titre);
        $("#inputdesc").val(resp.description);
        $("#inputdatedebut").val(resp.dateDebut);
        $("#inputdatelimite").val(resp.dateLimite);
        $("#inputprix").val(resp.prix);
        $("#btnUpdateProjet").attr("onclick","updateProjet("+id+",'"+dateCreation+"','"+status+"')");
        $("#btnDeleteProjet").attr("onclick","deleteProjet("+id+")");
        $.ajax({
            url: resp._links.client.href,
            dataType: 'json',
            success: function(resp){
              $("#inputclient").val(resp.id);
            }
        }); 
        $.ajax({
            url: resp._links.chefDeProjet.href,
            dataType: 'json',
            success: function(resp){
              $("#inputchef").val(resp.id);
            }
        }); 

      }
    }); 
}

function addProjet(titre,desc,dateD,dateL,prix,client_id,chef_id) {
  var user = JSON.parse(getUser())
  var d = new Date();
	var projet = JSON.stringify({ "titre":titre,"description":desc,"dateDebut":dateD,"dateLimite":dateL,"dateCreation":d.toISOString(),"status":"PLANIFIE","prix":prix})
        
  $.ajax({
    contentType: 'application/json; charset=utf-8',
    url: 'http://localhost:8080/chefDeProjets/'+chef_id,
    success: function(resp){ 
      $.ajax({
          contentType: 'application/json; charset=utf-8',
          url: resp._links.user.href,
          success: function(resp){ 
            var chefuserid=resp.id
          $.ajax({
              contentType: 'application/json; charset=utf-8',
              type: 'POST',
              url: 'http://localhost:8080/projets',
              dataType: "json",
              data: projet,
              success: function(resp){ 
                  $.ajax({
                        contentType: 'application/json; charset=utf-8',
                        url: 'http://localhost:8080/projets/search/associate?admin_id='+user.id+'&chef_id='+chef_id+'&client_id='+client_id+'&projet_id='+resp.id,
                        success: function(resp){ 
                          $.ajax({
                              contentType: 'application/json; charset=utf-8',
                              url: 'http://localhost:8080/users/search/occuper?user_id='+chefuserid,
                              success: function(resp){ 
                                  showNotification("nc-icon nc-app","Le projet est ajouté avec succes","success","top");
                                  showProjets();
                                  init();
                              },
                              error: function(){
                                alert("delete user and chef!");
                              }
                          });
                        },
                        error: function(){
                          alert("delete user and chef!");
                        }
                    });
              },
              error: function (){
                showNotification("nc-icon nc-app","Erreur : Le projet n'a ete pas ajouter ! ","danger","top");
              }
            });
            }
        });
    }
  });

}

function updateProjet(id,dateCreation,status) {
  var titre =$("#inputtitre").val();
  var desc = $("#inputdesc").val();
  var dateD =$("#inputdatedebut").val();
  var dateL = $("#inputdatelimite").val();
  var prix =$("#inputprix").val();

  var user = JSON.parse(getUser())
	var projet = JSON.stringify({ "titre":titre,"description":desc,"dateDebut":dateD,"dateLimite":dateL,"dateCreation":dateCreation,"status":status,"prix":prix})
        
	$.ajax({
      contentType: 'application/json; charset=utf-8',
      type: 'PUT',
      url: 'http://localhost:8080/projets/'+id,
      dataType: "json",
      data: projet,
      success: function(resp){ 
          showNotification("nc-icon nc-app","Le projet est ajouté avec succes","success","top");
          showProjets();
          init();
      },
      error: function (){
        showNotification("nc-icon nc-app","Erreur : Le projet n'a ete pas ajouter ! ","danger","top");
      }
  });
}

function deleteProjet(id) {
	$.ajax({
      	type: 'DELETE',
      	url: 'http://localhost:8080/projets/'+id,
      	dataType: "json",
      	success: function(resp){ 
			showNotification("nc-icon nc-app","Le projet est supprimé avec succes","success","top");
			showProjets();
        },
        error: function (){
        	showNotification("nc-icon nc-app","Erreur : Le projet n'a ete pas supprimer ! ","danger","top");
        }
    });
}


