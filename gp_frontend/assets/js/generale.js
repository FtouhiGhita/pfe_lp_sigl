$(document).ready(function() {
    getUserInfo()
});

function getUserInfo() {
    var user = JSON.parse(getUser());
    $.ajax({
      contentType: 'application/json; charset=utf-8',
      url: 'http://localhost:8080/users/'+user.id+'/'+user.role,
      dataType: "json",
      success: function(resp){
          $("#username").text("Bonjour, "+resp.nom+" "+resp.prenom)
      },
      error: function(){
          alert("error!");
      }
    });
}

function getUser() {
    var jqxhr = $.ajax({
        type: 'GET',
        url: 'http://localhost/gp_frontend/getUserId.php',
        cache: false,
        async: false
    });

    return jqxhr.responseText
}

function creationSession(obj){
		$.ajax({
      type: 'POST',
      url: 'http://localhost/gp_frontend/session.php',
      data: obj,
      success: function(resp){ 
    		document.location = "accueil.php";
        }
    }); 
}

function destructionSession() {
    $.ajax({
      type: 'POST',
      url: 'http://localhost/gp_frontend/destructionSession.php',
      success: function(resp){  
          document.location = "index.php";
      }
    }); 
}