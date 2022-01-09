$(document).ready(function() {
  init();
	showMembres();

	$("#btnAddMembre").click(function(){
		  var nom =$("#inputnommembrea").val();
      var prenom = $("#inputprenommembrea").val();
      var type = $("#inputtypea").val();
      var genre =$("#inputgenrea").val();
      var tel =$("#inputtelephonea").val();
      var email = $("#inputemaila").val();
      var pass =$("#inputpassa").val();
		  addMembre(nom,prenom,type,genre,tel,email,pass);
	})

  $("#btnAddMembreToEquipe").click(function() {
      var equipe = $("#inputequipe").val();
      var membre = $("#inputmembre").val();
      addMembreToEquipe(equipe,membre);
  })
	
	$("#tblBody").on("click",".edit",function(){
        var id = $(this).attr('id');
        getMembre(id);
    });

    $("#tblBody").on("click",".delete",function(){
        var id = $(this).attr('id');
        getMembre(id);
    });

});

function init() {
    var user = JSON.parse(getUser());
    $.ajax({
        contentType: 'application/json; charset=utf-8',
        url: 'http://localhost:8080/equipes/search/findByProjetChefDeProjetUserId?id='+user.id,
        dataType: "json",
        success: function(resp){ 
            var html=""
            var equipes = resp._embedded.equipes
            for(var c in equipes){
                html+="<option value='"+equipes[c].id+"'>"+equipes[c].nom+"</option>";
            }
            $("#inputequipe").html(html);
        },
        error: function (){
          showNotification("nc-icon nc-app","Erreur Not found : 404","danger","top");
        }
    });

    $.ajax({
        contentType: 'application/json; charset=utf-8',
        url: 'http://localhost:8080/membres/search/findByCreatorChefDeProjetsUserIdAndUserEtat?etat=DISPONIBLE&id='+user.id,
        dataType: "json",
        success: function(resp){ 
            var html=""
            var membres = resp._embedded.membres
            for(var c in membres){
                html+="<option value='"+membres[c].id+"'>"+membres[c].nom + " " +membres[c].prenom +"</option>";
            }
            $("#inputmembre").html(html);
        },
        error: function (){
          showNotification("nc-icon nc-app","Erreur Not found : 404","danger","top");
        }
    });
}

function showMembres() {
	var user = JSON.parse(getUser());
  var url='';
  if (user.role=="admin") {
    url='http://localhost:8080/membres/search/findByCreatorId?id='+user.id;
  }
  if (user.role=="chefDeProjet") {
    url='http://localhost:8080/membres/search/findByCreatorChefDeProjetsUserId?id='+user.id;
  }
  if (user.role=="membre") {
    url='http://localhost:8080/membres/search/findByAssociationsActuelleAndAssociationsEquipeAssociationsMembreUserId?actuelle=true&id='+user.id;
  }
  $.ajax({
      contentType: 'application/json; charset=utf-8',
      url: url,
      dataType: "json",
      success: function(resp){ 
        var html=""
        var membres = resp._embedded.membres
        for(var m in membres){
          html+="<tr>"+
                  "<td>"+membres[m].nom+"</td>"+
                  "<td>"+membres[m].prenom+" </td>"+
                  "<td>"+membres[m].type+"</td>"+
                  "<td>"+membres[m].genre+"</td>"+
                  "<td>"+membres[m].tel+"</td>"+
                  "<td>"+membres[m].email+"</td>";
                  if (user.role=="admin") {
                    html+="<td>"+
                        "<a href='#modifierMembre' id='"+membres[m].id+"' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
                        "<a href='#suppMembre' id='"+membres[m].id+"' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
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

function getMembre(id) {
    $.ajax({
      url: 'http://localhost:8080/membres/'+id,
      dataType: 'json',
      success: function(resp){
      	var id = resp.id;
		    $("#inputnommembre").val(resp.nom);
        $("#inputprenommembre").val(resp.prenom);
        $("#inputtype").val(resp.type);
        $("#inputgenre").val(resp.genre.toLowerCase());
        $("#inputtelephone").val(resp.tel);
        $("#inputemail").val(resp.email);
        $("#btnUpdateMembre").attr("onclick","updateMembre("+id+")")
        $("#btnDeleteMembre").attr("onclick","deleteMembre("+id+")")
      }
    }); 
}

function addMembreToEquipe(equipe,membre) {
    var association = JSON.stringify({"actuelle":true})
  
    $.ajax({
        contentType: 'application/json; charset=utf-8',
        url: 'http://localhost:8080/associations/search/desassociate?membre_id='+membre,
        success: function(resp){ 
          $.ajax({
              contentType: 'application/json; charset=utf-8',
              type: 'POST',
              url: 'http://localhost:8080/associations',
              dataType: "json",
              data: association,
              success: function(resp){ 
                  $.ajax({
                      contentType: 'application/json; charset=utf-8',
                      url: 'http://localhost:8080/associations/search/associate?id='+resp.id+'&equipe_id='+equipe+'&membre_id='+membre,
                      success: function(resp){ 
                          updateMembreUser(membre);
                          showNotification("nc-icon nc-app","Le membre est ajouté à l'équipe avec succes","success","top");
                      },
                      error: function(){
                        alert("delete user and chef!");
                      }
                  });
              },
              error: function (){
                  alert("error!");
              }
          });
        },
        error: function(){
          alert("delete user and chef!");
        }
    });
}

function addMembre(nom,prenom,type,genre,tel,email,pass) {
  var userA = JSON.parse(getUser());
  var d = new Date();
  var user = JSON.stringify({"email":email,"password":pass,"etat" : "DISPONIBLE","role" : "membre","dateCreation" : d.toISOString()})
  var membre = JSON.stringify({ "nom":nom,"prenom":prenom,"tel":tel,"genre":genre.toUpperCase(),"email":email,"type":type})

  $.ajax({
      contentType: 'application/json; charset=utf-8',
      type: 'POST',
      url: 'http://localhost:8080/users',
      dataType: "json",
      data: user,
      success: function(userR){ 
          $.ajax({
              contentType: 'application/json; charset=utf-8',
              type: 'POST',
              url: 'http://localhost:8080/membres',
              dataType: "json",
              data: membre,
              success: function(membreR){ 
                  $.ajax({
                    contentType: 'text/uri-list',
                    type: 'PUT',
                    url: 'http://localhost:8080/membres/'+membreR.id+'/user',
                    data: 'http://localhost:8080/users/'+userR.id,
                    success: function(resp){ 
                        $.ajax({
                            contentType: 'text/uri-list',
                            type: 'PUT',
                            url: 'http://localhost:8080/membres/'+membreR.id+'/creator',
                            data: 'http://localhost:8080/users/'+userA.id,
                            success: function(resp){ 
                                showMembres();
                                showNotification("nc-icon nc-app","Le chef de projet est ajouté avec succes","success","top");
                            },
                            error: function(){
                              alert("delete user and admin!");
                            }
                        });
                    },
                    error: function(){
                      alert("delete user and admin!");
                    }
                });
              },
              error: function(){
                  alert("delete user!");
              }
            });
      },
      error: function (){
          alert("error!");
      }
  });
}

function updateMembreUser(id) {
    $.ajax({
        url: 'http://localhost:8080/membres/'+id+'/user',
        dataType: 'json',
        success: function(resp){
            $.ajax({
                contentType: 'application/json; charset=utf-8',
                url: 'http://localhost:8080/users/search/occuper?user_id='+resp.id,
                success: function(resp){
                    init();
                },
                error: function(){
                  alert("delete user and chef!");
                }
            });
        }
    }); 
}

function updateMembre(id) {
	  var nom =$("#inputnommembre").val();
    var prenom = $("#inputprenommembre").val();
    var type =$("#inputtype").val();
    var genre =$("#inputgenre").val();
    var tel =$("#inputtelephone").val();
    var email = $("#inputemail").val();

	var membre = JSON.stringify({ "nom":nom,"prenom":prenom,"tel":tel,"genre":genre.toUpperCase(),"email":email,"type":type})

	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	type: 'PUT',
      	url: 'http://localhost:8080/membres/'+id,
      	dataType: "json",
      	data: membre,
      	success: function(resp){ 
            console.log(resp)
            $.ajax({
                contentType: 'application/json; charset=utf-8',
                url: resp._links.user.href,
                success: function(userR){
                    var user = JSON.stringify({"email":email,"password":userR.password,"etat" : userR.etat,"role" : "membre","dateCreation" : userR.dateCreation})
  
                    user.email = email;
                    $.ajax({
                        contentType: 'application/json; charset=utf-8',
                        type: 'PUT',
                        url: 'http://localhost:8080/users/'+userR.id,
                        dataType: "json",
                        data: user,
                        success: function(resp){ 
                            showNotification("nc-icon nc-app","Le membre est modifié avec succes","success","top");
                            showMembres();
                        }
                    });
                }
            });
        },
        error: function (){
        	 showNotification("nc-icon nc-app","Erreur : Le membre n'a ete pas modifier ! ","danger","top");
        }
    });
}

function deleteMembre(id) {
	$.ajax({
      	type: 'DELETE',
      	url: 'http://localhost:8080/membres/'+id,
      	dataType: "json",
      	success: function(resp){ 
            showNotification("nc-icon nc-app","Le client est supprimé avec succes","success","top");
            showMembres();
        },
        error: function (){
        	 showNotification("nc-icon nc-app","Erreur : Le client n'a ete pas supprimer ! ","danger","top");
        }
    });
}


