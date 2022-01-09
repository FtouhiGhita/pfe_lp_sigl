$(document).ready(function() {
	$("#btnLogin").click(function(){
		var email =$("#email").val();
        var pass = $("#password").val();
		login(email,pass)
	})
});


function login(email,pass) {
	
	if (email!=""&&pass!="") {
		var obj = JSON.stringify({ "email" : email,"password" : pass})
	    $.ajax({
		    contentType: 'application/json; charset=utf-8',
		    url: 'http://localhost:8080/users/search/findByEmailAndPassword?email='+email+'&password='+pass,
	      dataType: "json",
		    success: function(resp){
	      		console.log(resp)
	      		if (resp.etat!="DESACTIVER") {
	      				creationSession(resp)
	    			}else{
				        $("#email").val("");
				        $("#password").val("");
				    	showNotification("nc-icon nc-app","Votre Compte n'est pas activé !","danger","top");
	    			}
	        	
		    },
		    error: function(){
		        $("#email").css("border-color", "red");
		        $("#email").val("");
	        	$("#password").css("border-color", "red");
		        $("#password").val("");
		    	showNotification("nc-icon nc-app","Email ou Mot de passe incorrect !","danger","top");
		    }
	    });
	}else{
		$("#email").css("border-color", "red");
    	$("#password").css("border-color", "red");
    	showNotification("glyphicon glyphicon-warning-sign","Please enter your data","danger","bottom");
	}


}