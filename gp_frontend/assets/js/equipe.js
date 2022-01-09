$(document).ready(function() {
  init();
	showEquipes();

	$("#btnAddEquipe").click(function(){
		  var nom = $("#inputnoma").val();
      var titre = $("#inputtitrea").val();
      var projet = $("#inputprojeta").val();
      addEquipe(nom,titre,projet);
	})
	
	$("#tblBody").on("click",".edit",function(){
        var id = $(this).attr('id');
        getEquipe(id);
    });

    $("#tblBody").on("click",".delete",function(){
        var id = $(this).attr('id');
        getEquipe(id);
    });

});

function init() {
    var user = JSON.parse(getUser());
    $.ajax({
        contentType: 'application/json; charset=utf-8',
        url: url='http://localhost:8080/projets/search/findByChefDeProjetUserId?id='+user.id,
        dataType: "json",
        success: function(resp){ 
            var html=""
            var projets = resp._embedded.projets
            for(var c in projets){
                html+="<option value='"+projets[c].id+"'>"+projets[c].titre+"</option>";
            }
            $("#inputprojet").html(html);
            $("#inputprojeta").html(html);
        },
        error: function (){
          showNotification("nc-icon nc-app","Erreur Not found : 404","danger","top");
        }
    });
}

function showEquipes() {
	var user = JSON.parse(getUser());
	$.ajax({
		    contentType: 'application/json; charset=utf-8',
      	url: 'http://localhost:8080/equipes/search/findByProjetChefDeProjetUserId?id='+user.id,
      	dataType: "json",
      	success: function(resp){ 
      		var html=""
      		var equipes = resp._embedded.equipes
      		for(var m in equipes){
      			html+="<tr>"+
                    "<td>"+equipes[m].nom+"</td>"+
                    "<td>"+equipes[m].titre+" </td>"+
                    "<td>"+equipes[m].dateCreation.split('T')[0]+"</td>";
                    if (user.role=="chefDeProjet") {
                      html+="<td>"+
                          "<a href='#modifierEquipe' id='"+equipes[m].id+"' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
                          "<a href='#suppEquipe' id='"+equipes[m].id+"' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
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

function getEquipe(id) {
    $.ajax({
      url: 'http://localhost:8080/equipes/'+id,
      dataType: 'json',
      success: function(resp){
      	var id = resp.id;
        $("#inputnom").val(resp.nom);
        $("#inputtitre").val(resp.titre);

        $("#btnUpdateEquipe").attr("onclick","updateEquipe("+id+")")
        $("#btnDeleteEquipe").attr("onclick","deleteEquipe("+id+")")
      }
    }); 
}

function addEquipe(nom,titre,projet) {
	var d = new Date();
  var equipe = JSON.stringify({ "nom":nom,"titre":titre,"dateCreation":d.toISOString()})
  console.log(equipe)
  $.ajax({
      contentType: 'application/json; charset=utf-8',
      type: 'POST',
      url: 'http://localhost:8080/equipes',
      dataType: "json",
      data: equipe,
      success: function(resp){ 
          $.ajax({
              contentType: 'text/uri-list',
              type: 'PUT',
              url: 'http://localhost:8080/equipes/'+resp.id+'/projet',
              data: 'http://localhost:8080/projets/'+projet,
              success: function(resp){ 
                    showNotification("nc-icon nc-app","Le equipe est ajouté avec succes","success","top");
                    showEquipes();
              },
              error: function(){
                alert("delete user and admin!");
              }
          });
      },
      error: function (){
          alert("error!");
      }
  });
}

function updateEquipe(id) {
	  
  var nom = $("#inputnom").val();
  var titre = $("#inputtitre").val();

	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	type: 'GET',
      	url: 'http://localhost:8080/equipes/'+id,
      	dataType: "json",
      	success: function(resp){ 
            var equipe = JSON.stringify({ "nom":nom,"titre":titre,"dateCreation":resp.dateCreation})
            $.ajax({
                  contentType: 'application/json; charset=utf-8',
                  type: 'PUT',
                  url: 'http://localhost:8080/equipes/'+id,
                  dataType: "json",
                  data: equipe,
                  success: function(resp){ 
                      showNotification("nc-icon nc-app","Le equipe est modifié avec succes","success","top");
                      showEquipes();
                  }
              });
        },
        error: function (){
        	 showNotification("nc-icon nc-app","Erreur : Le equipe n'a ete pas modifier ! ","danger","top");
        }
    });
}

function deleteEquipe(id) {
	$.ajax({
      	type: 'DELETE',
      	url: 'http://localhost:8080/equipes/'+id,
      	dataType: "json",
      	success: function(resp){ 
            showNotification("nc-icon nc-app","Le client est supprimé avec succes","success","top");
            showEquipes();
        },
        error: function (){
        	 showNotification("nc-icon nc-app","Erreur : Le client n'a ete pas supprimer ! ","danger","top");
        }
    });
}


