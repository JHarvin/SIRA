<!DOCTYPE html>
<html lang="es">
<head>
<title>Bitacora</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
     
     <?php
      include"menu.php";
      ?>
     
      <main class="app-content">
      <div class="row user">
        
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Bitacora</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Usuarios</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
               
                  <div class="content">
                    <h5><a href="#">Harvin Jeffeth Ramos Alfaro</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                
                <div class="post-content">
                  <p>Incio de sesion.</p>
                </div>
               
              </div>
              <div class="timeline-post">
              
                  <div class="content">
                    <h5><a href="#">Harvin Jeffeth Ramos Alfaro</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                
                <div class="post-content">
                  <p>Registro de usuario.</p>
                </div>
               
              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Datos de Usuario</h4>
                <form>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>First Nombre</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Telefono</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Office Phone</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Home Phone</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
  </body>
</html>