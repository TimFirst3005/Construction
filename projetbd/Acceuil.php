
<?php

	session_start();

   require 'php/db.php';
   
   $db = Database::connect();

   if(isset($_POST['inscription'])){
       
		$nom = checkInput($_POST['nom']);
		$prenom = checkInput($_POST['prenom']);
		$email = checkInput($_POST['mail']);
		$pass = $_POST['mdp'];

		$insc = $db->prepare("INSERT INTO client (nom, prenom, email, mdp) VALUES(?,?,?,?)");
	    $result=$insc->execute(array($nom, $prenom, $email, $pass));
         
  }

  if(isset($_POST['connetion'])) { 
    if(empty($_POST['username'])) {
        echo "Le champ Pseudo est vide.";
    } else {
        
        if(empty($_POST['mdpuser'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            
            $username = checkInput($_POST['username'], ENT_QUOTES, "ISO-8859-1"); 
            $passuser = checkInput($_POST['mdpuser'], ENT_QUOTES, "ISO-8859-1");
          
            
                $con = $db->query("SELECT email, mdp FROM client WHERE email = '".$username."' AND mdpuser = '".$passuser."'");
                if(empty($Requete)) {
                    echo "Le username ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    
                    $_SESSION['username'] = $username;
                   
                }
           
             
        }
    }
}


    
 function checkInput($var) 
    {
      $var = trim($var);
      $var = stripslashes($var);
      $var = htmlspecialchars($var);
      return $var;
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACCEUIL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet"s href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="" id="haut">
		
		<div id="baniereimg">
			<div class="row">

				<div class="col-md-3">
					<!--LOGO -->
					<nav class="navbar navbar-light ">
						<p>
							<span id="fondnoir" class="font-weight-bold"> ASSISTANCE </span><br>
							<span id="posrel" class="font-weight-bold"> IMMOBILIERE </span>
						</p>
					</nav>
				</div>
					
				<div class="col-md-9">

					<nav class="navbar navbar-expand-md navbar-light  bg-light mt-2" >
					  <a class="navbar-brand" href="#"></a>
					  <button id="" class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup bg-light">
					    <div class="navbar-nav">
					      <a class="nav-item nav-link font-weight-bold active red" href="#acceuil">Acceuil<span class="sr-only">(current)</span></a>
					      <a class="nav-item nav-link font-weight-bold red" href="#services"> Nos Services </a>
					      <a class="nav-item nav-link font-weight-bold red" href="#realisation">Nos Réalisations</a>
					      <a class="nav-item nav-link font-weight-bold red" href="#contact">Contact</a>
					  </div>
					  <div class="navbar-nav bg-danger">
					      	<!-- Button trigger modal -->
					      <a class="nav-item nav-link red" href="#"><button type="button" class="btn btn-danger btn-outline-light font-weight-bold" data-toggle="modal" data-target="#connectionmodal"> Connection <i class="fas fa-sign-in-alt"></i></button>						
							<!-- Modal -->
							<div class="modal fade" id="connectionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title text-center red" id="exampleModalLabel">Veillez vous connecter avec vos identifiants corrects</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <form>
							        	<div  class="form-group">
							        		<label for="username" class="font-weight-bold col-form-label">Username</label>
							        		<input type="email" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur">
							        	</div>
							        	<div  class="form-group">
							        		<label for="mdp" class="font-weight-bold col-form-label">Password</label>
							        		<input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">
							        	</div>
							        	 <button type="submit" name="connection" class="btn btn-outline-danger form-control">Connection</button>
							        </form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
							       
							      </div>
							    </div>
							  </div>
							</div>
					      </a>
					    </div>
					    <div class="navbar-nav bg-danger">
					      	
					      	<!-- Button trigger modal -->
	
					      <a class="nav-item nav-link" href="#"><button type="button" class="btn btn-danger btn-outline-light font-weight-bold" data-toggle="modal" data-target="#inscriptionmodal"> INSCRIPTION <i class="fas fa-sign-in-alt"></i></button>						

							<!-- Modal -->
							<div class="modal fade" id="inscriptionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title text-center red" id="exampleModalLabel"> Veillez vous inscrire avec vos informations exactes afin d'éviter tout désagrement dans le futur</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        
							        <form class="form-group">
							        	<div>
							        		<label for="nom" class="col-form-label font-weight-bold"> NOM </label>
							        		<input type="text" name="nom" id="nom" class="form-control">
							        	</div>
							        	<div>
							        		<label for="prenom" class="col-form-label font-weight-bold"> Prenom </label>
							        		<input type="text" name="prenom" id="prenom" class="form-control">
							        	</div>
							        	<div>
							        		<label for="mail" class="col-form-label font-weight-bold"> Email </label>
							        		<input type="email" name="mail" id="mail" class="form-control">
							        	</div>
							        	<div>
							        		<label for="mdp" class="col-form-label font-weight-bold"> Password </label>
							        		<input type="Password" name="mdp" id="mdp" class="form-control">
							        	</div>
							        	<button type="submit" name="inscription" class="form-control btn btn-outline-danger text-center font-weight-bold">M'inscrire</button>
							        </form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
							        
							      </div>
							    </div>
							  </div>
							</div>

					      </a>
					    </div>
					  </div>
					</nav>
				</div>
			</div><br><br><br><br><br>
			<div class="row">
				<div class="text-center col-md-8">

				<button type="button" class="btn btn-outline-danger btn-lg font-weight-bold ">A propos</button>
			</div>
			</div>
			
		</div>

		 
	</div>
	
											<!-- NOS SERVICES   -->
	<div class="container mt-3" id="services">
		<h2 class="text-center color-danger">Nos Produits & Services</h2>
		<div class="text-center white-div"></div>
		<div class="row">
			<div class="col-md-4">
                <div class="card text-center" style="width: 18rem;">
				  <img src="img/icon1.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Assistance</h5>
				    <div class="text-center red-div"></div>
				    <p class="card-text">Nos experts vous accompagnent durant tout le processus pour une meilleure finition. </p>
				    <a href="services.php"><button  class="btn btn-danger">Plus d'info</button></a>
				  </div>
				</div>
				
			</div>
			<div class="col-md-4 ">
               <div class="card text-center" style="width: 18rem;">
				  <img src="img/icon2.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Achat</h5>
				    <div class="text-center red-div"></div>
				    <p class="card-text">Nous vous offrons des Maisons achevés et des terrains en règles et à des prix incroyables.</p>
				    <a href="services.php"><button class="btn btn-danger">Plus d'info</button></a>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
               <div class="card text-center" style="width: 18rem;">
				  <img src="img/icon3.jpg" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Stage de fin de cycle</h5>
				    <div class="text-center red-div"></div>
				    <p class="card-text">Vous avez besoin d'un stage, vous desirez être meilleur dans le domaine de l'architecture.</p>
				    <a href="services.php"><button class="btn btn-danger">Plus d'info</button></a>
				  </div>
				</div>
				
			</div>
		</div>
	</div>

	<h3 id="up"><a href="#haut"><i class="fas fa-chevron-up"></i></a></h3>

	<!-- NOS SERVICES   -->
	<div class="container" id="realisation">
		<h2 class="text-center">Nos Réalisation</h2>
		<div class="text-center white-div"></div>
	</div>

	<div class="container" id="contact">
		<h2 class="text-center">Nous Contacter</h2>
		<div class="text-center white-div"></div>



	</div>

	<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-5 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">	</h5>
          <p class="text-center font-weight-bold text-uppercase text-danger">Nous faisons de vos rêves une réalité </p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="ttext-center font-weight-bold text-uppercase text-danger">Où nous trouver</h5>

            

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-center font-weight-bold text-uppercase text-danger">Comment nous joindre</h5>

            
          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a class="font-weight-bold text-danger text-center"> AssistanceImmobilière.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->




<!--
	<script type="text/javascript" src="bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>

-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>