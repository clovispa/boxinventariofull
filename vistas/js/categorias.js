/*=============================================
 =            SUBIENDO FOTO DE USUARIO    =
 =============================================*/


 $(".btnEditarCategoria").click(function(){
     
     var idCategoria = $(this).attr("idCategoria");

     var datos = new FormData();
     datos.append("idCategoria", idCategoria);

     $.ajax({
     	url:"ajax/categorias.ajax.php",

     	method: "POST",
     	data: datos,
     	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

               $("#editarCategoria").val(respuesta["categoria"]);
                 $("#idCategoria").val(respuesta["id"]);


            
     		
     	}
     })



 })

 /*=============================================
 =            Eliminar Categoria   =
 =============================================*/


 $(".btnEliminarCategoria").click(function(){

     var idCategoria = $(this).attr("idCategoria");

     swal({

          title: '¿Esta seguro que desea borrar categoria?',
          text:  "si no lo esta puede cancelar la acción",
          type:  "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar categoria'

     }).then((result)=>{

          if(result.value){

               window.location = "index.php?ruta=categoria&idCategoria="+idCategoria;
          }


     })


     })
 /*=============================================
 =            revisar Categoria repetida   =
 =============================================*/

 $("#nuevaCategoria").change(function(){

  $(".alert").remove();


   var categoria = $(this).val();

   var datos = new FormData();

   datos.append("validarCategoria", categoria);


          $.ajax({
                  url:"ajax/categorias.ajax.php",
                  method:"POST",
                  data: datos,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",

                    success:function(respuesta){
                          
                          if(respuesta){

                              
                            $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                            $("#nuevaCategoria").val("");


                          }

                        }


        })

 })


