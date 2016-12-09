
<!DOCTYPE html>
<html>
  <head>
    <title>Projet SGBD - Spectacles</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
    (function(){
	if (location.hash) {
	    setTimeout(function() {
		window.scrollTo(0, 0);
	    }, 1);
	} else {
	    location.hash = '#spectacles';
	}
    })();
    </script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
	<div class="navbar-header">
	  <h1>Bienvenue sur la base Spectacles ! </h1>
	</div>
	<div class="navbar-collapse collapse">
	</div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
	<div class="col-sm-3 col-md-2" >
	  <ul id="menu" class="nav nav-pills nav-stacked">
	    <li class="active" ><a id="clients" href="#">Clients</a></li>
	    <li><a id="types_clients" href="#">Types de clients</a></li>
	    <li><a id="spectacles" href="#">Spectacles</a></li>
	    <li><a id="lieux" href="#">Lieux</a></li>
	    <li><a id="seances" href="#">Séances</a></li>
	    <li><a id="categorie_places" href="#">Catégories de places</a></li>
	    <li><a id="place_categorie" href="#">Répartitions des places</a></li>
	    <li><a id="reservation_place" href="#">Réservations des places</a></li>
	    <li><a id="prix" href="#">Gestion des prix</a></li>
	    <li><a id="recettes" href="#">Recettes et Entrées</a></li>
	  </ul>
	</div>
	<div class="col-sm-9 col-md-10 ">
	  <div id="content">
	    <!-- insert content here -->
	  </div>
	</div>
      </div>
    </div>
    <script>
    (function(){
	$("#menu li a").each(function() {
	    var target = $(this).attr('id');
	    $(this).attr('href',"#"+target);
	    target +=".php"
	    
	    var lol = $(this);
	    $(this).click(function(){
		$.ajax({
		    url: target,
		    success: function(result){
			$("#content").html(result);
			$("#menu li").each(function(){$(this).removeClass("active");});
			lol.parent().addClass("active");
		    },
		    error: function(){
			$("#content").html("<p>Aucune page ne correspond.</p>");
		    }});
	    })
	});
	if (window.location.href.indexOf('#') !== -1)
	{
	    var tab = window.location.href.split("#");
	    tab = tab[tab.length-1];
	    $("#"+tab).click();
	}
    })();
    </script>
  </body>
</html>
