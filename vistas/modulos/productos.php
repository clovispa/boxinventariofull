 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Gestionar Productos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio </a></li>
        
        <li class="active">Productos</li>
      </ol>
    </section>

  
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar Producto
        </button>

          </div>
        <div class="box-body">

          
            <table class=" table table-bordered table-striped dt-responsive tablas" >
              <thead>
                <tr>
                   <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Categoria</th>
                  <th>Stock</th>
                  <th>Precio de Compra</th>
                  <th>Precio de Venta</th>
                  <th>Agregado</th>
                  <th>Acciones</th>



                </tr>
              </thead>
              <tbody>

                <?php 
                $item = null;
                $valor = null;
                $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
                foreach ($productos as $key => $value) {

                  echo '<tr>
                  <td>'.($key+1).'</td>

                  <td><img src="vistas/img/productos/photo2.png" class="img-thumbnail" width="40px"></td>

                  <td>'.$value["codigo"].'</td>

                  <td>'.$value["descripcion"].'</td>';

                  $item = "id";
                  $valor = $value["id_categoria"];

                  $categoria = ControladorCategoria::ctrMostrarCategoria($item, $valor);

                 echo '<td>'.$categoria["categoria"].'</td>
                  <td>'.$value["stock"].'</td>
                  <td>'.$value["precio_compra"].'</td>
                  <td>'.$value["precio_venta"].'</td>
                  <td>'.$value["fecha"].'</td>
                  
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning" > <i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-danger" > <i class="fa fa-times"></i> </button>
                    </div>
                  </td>
                </tr>';
                  # code...
                }
                ?>
                  
                   
              </tbody>
            </table>
          
          
        </div>
   
    

      </div>
     

  </section>
   
</div>


<!--=====================================
  =           Ventana modal agregar producto  =
  ======================================-->


  <div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-darta">

      <div class="modal-header" style="background:#3c8dbc; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Producto</h4>

      </div>

      <div class="modal-body">

        <div class="box-body">

           <!-- Ingresar Categoria -->
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fath"></i></span>

             <select class="form-control input-lg" id="nuevaCategoria"  name="nuevaCategoria" required>

               <option value="">Selecionar Categoría</option>
            
            
                 <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategoria::ctrMostrarCategoria($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
             </select>
            </div>
          </div>



 <!-- Ingresar Codigo -->



          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-code"></i></span>

              <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código"  readonly required>

            </div>
          </div>

         
              <!-- Ingresar Descripcion  -->
            <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required="">

            </div>
          </div>
               
         

     
          
      <!-- Ingresar Categoria -->
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fath"></i></span>

             <select class="form-control input-lg" name="nuevaCategoria">

               <option value="">Selecionar Categoría</option>

               <option value="Camaras">Camaras</option>

               <option value="Software">Software</option>

               <option value="Herramientas">Herramientas</option>
             </select>
            </div>
          </div>


                <!-- Ingresar stock  -->
            <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-check"></i></span>

              <input type="number" class="form-control input-lg" min="0" name="nuevoStock" placeholder="cantidad disponible" required>

            </div>
          </div>



                <!-- Ingresar precio compra  -->
            <div class="form-group row">
              <div class="col-xs-6">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                <input type="number" class="form-control input-lg" min="0" name="nuevoPrecioCompra" placeholder="Precio de Compra" required>

              </div>

              </div>
          

                  <!-- Ingresar precio venta -->
                  <div class="col-xs-6">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                      <input type="number" class="form-control input-lg" min="0" name="nuevoPrecioVenta" placeholder="Precio de Ventana" required>
                   </div>
    

                    <br>

                    <!-- checkbox para porcentaje -->
                    <div class="col-xs-6">
                      <div class="form-group">
                        
                        <label>
                          <input type="checkbox" class="minimal porcentaje" checked>
                          Utilizar Porcentaje
                        </label>
                      </div>
                      
                    </div>

                    <!-- entrada para porcentaje -->

                    <div class="col-xs-6" style="padding:0">
                      <div class="input-group">
                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                      </div>
                    </div>


              </div>
          </div>


                <!-- Ingresar foto -->
          <div class="form-group">

           <div class="panel">Subir Imagen</div>

           <input type="file" id="nuevaImagen" name="nuevaImagen">

           <p class="help-block"> Peso máximo de la foto 2mb</p>

           <img src="vistas/img/Productos/photo2.png" class="img-thumbnail" width="100px">

          </div>

        



        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"> Guardar</button>

      </div>

    </form>

    </div>

  </div>
</div>