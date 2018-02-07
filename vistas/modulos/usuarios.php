 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Gestionar Usuarios
        <small>Usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio </a></li>
        
        <li class="active">Usuarios</li>
      </ol>
    </section>

  
    <section class="content">

      <div class="box">
        <div class="box-header with-border">
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
        </button>

          </div>
        <div class="box-body">

          
            <table class=" table table-bordered table-striped dt-responsive tablas" >
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Último Login</th>
                  <th>Acciones</th>


                </tr>
              </thead>
              <tbody>

               <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/anonimo.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["Id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["Id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["Id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["Id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

      
              </tbody>
            </table>
          
          
        </div>
   
    

      </div>
     

  </section>
   
</div>


<!--=====================================
  =           Ventana modal agregar usuario         =
  ======================================-->


  <div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

      <div class="modal-header" style="background:#3c8dbc; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Usuario</h4>

      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
            </div>
          </div>

         
              <!-- Ingresar usuario -->
            <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" id="nuevoUsuario" required>

            </div>
          </div>
               
              <!-- Ingresar contraseña -->
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
            </div>
          </div>

     
          
      <!-- Ingresar perfil -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-group"></i></span>
             <select class="form-control input-lg" name="nuevoPerfil">
               <option value="">Selecionar Perfil</option>

               <option value="Administrador">Administrador</option>

               <option value="Especial">Especial</option>

               <option value="Vendedor">Vendedor</option>
             </select>
            </div>
          </div>


                <!-- Ingresar foto -->
          <div class="form-group">

           <div class="panel">Subir Foto</div>

           <input type="file" class="nuevafoto" name="nuevafoto">

           <p class="help-block"> Peso máximo de la foto 2 MB</p>

           <img src="vistas/img/usuarios/anonimo.png" class="img-thumbnail previsualizar" width="100px">

          </div>

        



        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"> Guardar</button>

      </div>
      <?php 

      $crearUsuario = new ControladorUsuarios();

      $crearUsuario -> ctrCrearUsuario();




       ?>

    </form>

    </div>

  </div>
</div>



<!--=====================================
  =           Ventana modal editar usuario         =
  ======================================-->


  <div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

      <div class="modal-header" style="background:#3c8dbc; color: white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Usuario</h4>

      </div>

      <div class="modal-body">

        <div class="box-body">

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

            </div>
          </div>

         
              <!-- Ingresar usuario -->
            <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value=""  readonly>
            </div>
          </div>
               
              <!-- Ingresar contraseña -->
            <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-lock"></i></span>

              <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba Nueva Contraseña">

              <input type="hidden" id="passwordActual" name="passwordActual">
            </div>
          </div>

     
          
      <!-- Ingresar perfil -->
          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-group"></i></span>

             <select class="form-control input-lg" name="editarPerfil">

               <option value="" id="editarPerfil"></option>

               <option value="Administrador">Administrador</option>

               <option value="Especial">Especial</option>

               <option value="Vendedor">Vendedor</option>
             </select>
            </div>
          </div>


                <!-- Ingresar foto -->
          <div class="form-group">

           <div class="panel">Subir Foto</div>

           <input type="file" class="nuevaFoto" name="editarFoto">

           <p class="help-block"> Peso máximo de la foto 2 MB</p>

           <img src="vistas/img/usuarios/anonimo.png" class="img-thumbnail previsualizar" width="100px">

           <input type="hidden" name="fotoActual" id="fotoActual">

          </div>

        



        </div>

      </div>

      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary"> Guardar Cambios</button>

      </div>
     
            <?php 

                  $editarUsuario = new ControladorUsuarios();

                  $editarUsuario -> ctrEditarUsuario();




             ?>

    </form>


    </div>

  </div>
</div>



            <?php 

                  $borrarUsuario = new ControladorUsuarios();

                  $borrarUsuario -> ctrBorrarUsuario();

             ?>


