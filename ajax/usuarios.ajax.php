<?php
   require_once "../controladores/usuarios.controlador.php";
   require_once "../modelos/usuarios.modelo.php";


		class AjaxUsuarios{

			/*=============================================
			 =  Editar Usuario
			 =============================================*/

			 public $idUsuario;

			 public function ajaxEditarUsuario(){

			 	$item = "Id";
			 	$valor = $this->idUsuario;

			 	$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

			 	echo json_encode($respuesta);

			 }


			 /*=============================================
			 =  Activar Usuario
			 =============================================*/

			 public $activarId;
			 public $activarUsuario;

			 public function ajaxActivarUsuario(){


			 	$tabla = "usuarios";

			 	$item1 = "estado";
			 	$valor1 = $this->activarUsuario;

			 	$item2 = "Id";
			 	$valor2 = $this->activarId;


			 	$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);


			 }


			 /*=============================================
			 =  validar Usuario
			 =============================================*/


			 public $validarUsuario;

			 public function ajaxValidarUsuario(){

			 	$item = "usuario";
			 	$valor = $this->validarUsuario;

			 	$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
			 	echo json_encode($respuesta);

			 }
              




		}


		/*=============================================
			 =  Editar Usuario
			 =============================================*/
              

             if(isset($_POST["idUsuario"])){


             $editar = new AjaxUsuarios();
			 $editar -> idUsuario = $_POST["idUsuario"];
			 $editar -> ajaxEditarUsuario();



             }



		/*=============================================
			 =  Activar Usuario
			 =============================================*/

			 if (isset($_POST["activarUsuario"])) {

			 	$activarUsuario = new AjaxUsuarios();
			 	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
			 	$activarUsuario -> activarId = $_POST["activarId"];
			 	$activarUsuario -> ajaxActivarUsuario();
			 	# code...
			 }


         /*=============================================
			 =  validar no repetir Usuario
			 =============================================*/

			 if (isset( $_POST["validarUsuario"])) {


			 	$valUsuario = new AjaxUsuarios();
			 	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
			 	$valUsuario -> ajaxValidarUsuario();
			 	# code...
			 }
			