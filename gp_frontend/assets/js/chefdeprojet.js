$(document).ready(function() {

	showChefs();

	$("#btnAddChef").click(function(){
		  var nom =$("#inputnomchefa").val();
      var prenom = $("#inputprenomchefa").val();
      var genre =$("#inputgenrea").val();
      var tel =$("#inputtelephonea").val();
      var email = $("#inputemaila").val();
      var pass =$("#inputpassa").val();
		  addChef(nom,prenom,genre,tel,email,pass);
	})
	
	$("#tblBody").on("click",".edit",function(){
        var id = $(this).attr('id');
        getChef(id);
    });

    $("#tblBody").on("click",".delete",function(){
        var id = $(this).attr('id');
        getChef(id);
    });

});

function showChefs() {
	var user = JSON.parse(getUser());
	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	url: 'http://localhost:8080/chefDeProjets/search/findByCreatorId?id='+user.id,
      	dataType: "json",
      	success: function(resp){ 
      		var html=""
      		var chefs = resp._embedded.chefDeProjets
      		for(var m in chefs){
      			html+="<tr>"+
                    "<td>"+chefs[m].nom+"</td>"+
                    "<td>"+chefs[m].prenom+" </td>"+
                    "<td>"+chefs[m].tel+"</td>"+
                    "<td>"+chefs[m].email+"</td>"+
                    "<td>"+chefs[m].genre+"</td>";
                    if (user.role=="admin") {
                      html+="<td>"+
                          "<a href='#modifierChef' id='"+chefs[m].id+"' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"+
                          "<a href='#suppChef' id='"+chefs[m].id+"' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>"+
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

function getChef(id) {
    $.ajax({
      url: 'http://localhost:8080/chefDeProjets/'+id,
      dataType: 'json',
      success: function(resp){
      	var id = resp.id;
		    $("#inputnomchef").val(resp.nom);
        $("#inputprenomchef").val(resp.prenom);
        $("#inputgenre").val(resp.genre.toLowerCase());
        $("#inputtelephone").val(resp.tel);
        $("#inputemail").val(resp.email);
        $("#btnUpdateChef").attr("onclick","updateChef("+id+")")
        $("#btnDeleteChef").attr("onclick","deleteChef("+id+")")
      }
    }); 
}

function addChef(nom,prenom,genre,tel,email,pass) {
  var userA = JSON.parse(getUser());
	var d = new Date();
  var user = JSON.stringify({"email":email,"password":pass,"etat" : "DISPONIBLE","role" : "chefDeProjet","dateCreation" : d.toISOString()})
  var chef = JSON.stringify({ "nom":nom,"prenom":prenom,"tel":tel,"genre":genre.toUpperCase(),"email":email})

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
              url: 'http://localhost:8080/chefDeProjets',
              dataType: "json",
              data: chef,
              success: function(chefR){ 
                $.ajax({
                    contentType: 'text/uri-list',
                    type: 'PUT',
                    url: 'http://localhost:8080/chefDeProjets/'+chefR.id+'/user',
                    data: 'http://localhost:8080/users/'+userR.id,
                    success: function(resp){ 
                        $.ajax({
                            contentType: 'text/uri-list',
                            type: 'PUT',
                            url: 'http://localhost:8080/chefDeProjets/'+chefR.id+'/creator',
                            data: 'http://localhost:8080/users/'+userA.id,
                            success: function(resp){ 
                                showChefs();
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

function updateChef(id) {
	  var nom =$("#inputnomchef").val();
    var prenom = $("#inputprenomchef").val();
    var genre =$("#inputgenre").val();
    var tel =$("#inputtelephone").val();
    var email = $("#inputemail").val();

	var chef = JSON.stringify({ "nom":nom,"prenom":prenom,"tel":tel,"genre":genre.toUpperCase(),"email":email})

	$.ajax({
		contentType: 'application/json; charset=utf-8',
      	type: 'PUT',
      	url: 'http://localhost:8080/chefDeProjets/'+id,
      	dataType: "json",
      	data: chef,
      	success: function(resp){ 
            console.log(resp)
            $.ajax({
                contentType: 'application/json; charset=utf-8',
                url: resp._links.user.href,
                success: function(userR){
                    var user = JSON.stringify({"email":email,"password":userR.password,"etat" : userR.etat,"role" : "chefDeProjet","dateCreation" : userR.dateCreation})
  
                    user.email = email;
                    $.ajax({
                        contentType: 'application/json; charset=utf-8',
                        type: 'PUT',
                        url: 'http://localhost:8080/users/'+userR.id,
                        dataType: "json",
                        data: user,
                        success: function(resp){ 
                            showNotification("nc-icon nc-app","Le chef de projet est modifié avec succes","success","top");
                            showChefs();
                        }
                    });
                }
            });
        },
        error: function (){
        	 showNotification("nc-icon nc-app","Erreur : Le chef de projet n'a ete pas modifier ! ","danger","top");
        }
    });
}

function deleteChef(id) {
	$.ajax({
      	type: 'DELETE',
      	url: 'http://localhost:8080/chefDeProjets/'+id,
      	dataType: "json",
      	success: function(resp){ 
            showNotification("nc-icon nc-app","Le client est supprimé avec succes","success","top");
            showChefs();
        },
        error: function (){
        	 showNotification("nc-icon nc-app","Erreur : Le client n'a ete pas supprimer ! ","danger","top");
        }
    });
}


