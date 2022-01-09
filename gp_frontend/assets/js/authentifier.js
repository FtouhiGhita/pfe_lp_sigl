$(document).ready(function() {
	$("#btnSignIn").click(function(){
		var nom =$("#inputNom").val();
        var prenom = $("#inputPrenom").val();
        var tel =$("#inputTelephone").val();
        var genre = $("#inputGenre").val();
        var email =$("#inputEmail").val();
        var pass = $("#inputPassword").val();
        var cPass =$("#inputConfirmePassword").val();
		signIn(nom,prenom,tel,genre,email,pass,cPass)
	})
});

function signIn(nom,prenom,tel,genre,email,pass,cPass) {
	
	if (pass==cPass) {
		var d = new Date();
		var user = JSON.stringify({"email":email,"password":pass,"etat" : "DISPONIBLE","role" : "admin","dateCreation" : d.toISOString()})
		var admin = JSON.stringify({ "nom":nom,"prenom":prenom,"tel":tel,"genre":genre,"email":email})

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
		          	url: 'http://localhost:8080/admins',
		          	dataType: "json",
		          	data: admin,
		          	success: function(adminR){ 
		        		$.ajax({
							contentType: 'text/uri-list',
							type: 'PUT',
				          	url: 'http://localhost:8080/admins/'+adminR.id+'/user',
				          	data: 'http://localhost:8080/users/'+userR.id,
				          	success: function(resp){ 
				        		creationSession(userR)
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

	}else{
		$("#inputPassword").css("border-color", "red");
    	$("#inputConfirmePassword").css("border-color", "red");
    	showNotification("glyphicon glyphicon-warning-sign","Les mots de passe que vous avez entre nous sont pas identique !","danger","bottom");
	}

}