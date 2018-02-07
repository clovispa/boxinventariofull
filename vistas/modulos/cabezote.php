 <header class="main-header">
 	    <!-- Logo -->
 	    <a href="inicio" class="logo">
		 <!-- Logo mini -->
		  <span class="logo-mini">
		  	<img src="vistas/img/plantilla/logomini.jpg" class="img-responsive" style="padding: 2px ">
		  </span>

		  <!-- Logo normal -->
		   <span class="logo-lg">
		  	<img src="vistas/img/plantilla/box logosmall-02.png" class="img-responsive">
		  </span>

		</a>
             
  <!--=====================================
  =          Barra de navegacion   =
  ======================================-->
        <nav class="navbar navbar-static-top" role="navigation">
        	 <!-- boton de barra-->
		      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			        <span class="sr-only">Toggle navigation</span> 
		      </a>
          <!-- perfil de usuario-->
           	<div class="navbar-custom-menu">
       			<ul class="nav navbar-nav">
       				 <li class="dropdown user user-menu">

       				 	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

       				 	  	<?php 

       				 	  	if($_SESSION["foto"] != ""){

       				 	  		echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
       				 	  	}else{

       				 	  		echo '<img src="vistas/img/usuarios/anonimo.png" class="user-image">';


       				 	  	}



       				 	  	?>

       				 	  

       				 	  	<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
       				 	  </a>
       				 	  	<!-- dropdown toggle-->
					       		<ul class="dropdown-menu">

					       		 	<li class="user-body">

					       		 		<div class="pull-right">

					       		 			<a href="salir" class="btn btn-default btn-flat">Salir</a>
					       		 		</div>
					       		 	</li>    		 	
					       		 </ul>
       				 </li>
       			</ul>
       		</div>
        </nav>
 </header>