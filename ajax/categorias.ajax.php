<?php

 	require_once "../controladores/categoria.controlador.php";
  	 require_once "../modelos/categoria.modelo.php";

     

     class AjaxCategorias{
			 /*=============================================
			 =  Activar categoria
			 =============================================*/
			 public $idCategoria;
			 public function ajaxEditarCategoria(){

			 	$item = "id";
			 	$valor = $this->idCategoria;


			 	$respuesta = ControladorCategoria::ctrMostrarCategoria($item, $valor);

			 	echo json_encode($respuesta);


			 }


			  /*=============================================
			 =  Validar no repetir  categoria
			 =============================================*/

			 public $validarCategoria;

			 public function ajaxValidarCategoria(){


			 	$item = "categoria";
			 	$valor = $this->validarCategoria;


			 	$respuesta = ControladorCategoria::ctrMostrarCategoria($item, $valor);

			 	echo json_encode($respuesta);





			 }

     }



        




            /*=============================================
			 =  Editar Categoria
			 =============================================*/

			 if(isset($_POST["idCategoria"])){

			 	$categoria = new AjaxCategorias();
			 	$categoria -> idCategoria = $_POST["idCategoria"];
			 	$categoria -> ajaxEditarCategoria();
			 }


			  /*=============================================
			 =  validar no repetir Categoria
			 =============================================*/


                 if(isset($_POST["validarCategoria"])){


                 	$valCategoria = new AjaxCategorias();
                 	$valCategoria -> validarCategoria = $_POST["validarCategoria"];
                 	$valCategoria -> ajaxValidarCategoria();






                 }

