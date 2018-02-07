<?php

		class ControladorCategoria{

			/*=============================================
			Crear Categorias
			=============================================*/

			static public function ctrCrearCategoria(){

				if(isset($_POST["nuevaCategoria"])){


						if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

							$tabla = "categorias";

							$datos = $_POST["nuevaCategoria"];

							$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);
							if($respuesta == "ok"){


											    	echo'<script>

													swal({

														type: "success",
														title: "¡la categoria  ha sido guardado correctamente pase un feliz día!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false

													}).then((result) => {

														if(result.value){

															window.location = "categoria";
														}

													})

												

													</script>';



							}

						}else{

									echo'<script>

									swal({

										type: "error",
										title: "¡la categoria no puede ir vacío o llevar caracteres especiales!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){

											window.location = "categoria";
										}

									})

								

									</script>';



						}
				}


			}

			     /* Mostrar categoria */

		      static public function ctrMostrarCategoria($item, $valor){

				      	$tabla ="categorias";

				       $respuesta = ModeloCategorias::MdlMostrarCategoria($tabla, $item, $valor);

				       return $respuesta;

		      }


		      	


		      	/*=============================================
			Editar Categorias
			=============================================*/

			static public function ctrEditarCategoria(){

				if(isset($_POST["editarCategoria"])){


						if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){

							$tabla = "categorias";

							$datos = array("categoria"=>$_POST["editarCategoria"],
											"id"=>$_POST["idCategoria"]);

							$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
							if($respuesta == "ok"){


											    	echo'<script>

													swal({

														type: "success",
														title: "¡la categoria  ha sido Cambiada correctamente  que pase un feliz día!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false

													}).then((result) => {

														if(result.value){

															window.location = "categoria";
														}

													})

												

													</script>';



							}

						}else{

									echo'<script>

									swal({

										type: "error",
										title: "¡la categoria no puede ir vacío o llevar caracteres especiales!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){

											window.location = "categoria";
										}

									})

								

									</script>';



						}
				}


			}


			 /*=============================================
			Borrar Categorias
			=============================================*/

			static public function ctrBorrarCategoria(){


					if(isset($_GET["idCategoria"])){

						$tabla = "categorias";
						$datos = $_GET["idCategoria"];

						$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

						if($respuesta == "ok"){


							echo '<script>

									swal({

										type: "success",
										title: "¡La categoria ha sido borrada correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){

											window.location = "categoria";
										}

									})

									</script>';


						}
					}

			}


		}