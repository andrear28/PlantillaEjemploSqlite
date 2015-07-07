<?php require_once "crudConfigUser.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Configuracion de Usuarios</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="js/bootgrid-1.2.0/jquery.bootgrid.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin ConfigUser</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Andrea Rodriguez</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ayer a las 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Andrea Rodriguez</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ayer a las 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Leer Todos Los Mensajes</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Nueva<span class="label label-default">Alert Default</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Nueva <span class="label label-primary">Alert Primary</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Nueva <span class="label label-success">Alert Success</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Nueva <span class="label label-info">Alert Info</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Nueva <span class="label label-warning">Alert Warning</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Nueva <span class="label label-danger">Alert Danger</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Ver Todas</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Andrea Rodriguez <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Mensajes</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Config</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <?php include_once "menu.php"; ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administracion <small>de ConfigUser</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Principal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> Configuracio usuarios</h3>
                            </div>
                            <div class="panel-body">
                                
                        <table id="grid-basic" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" data-row-select="true">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-align="left" data-width="40px" data-type="numeric" data-order="asc">ID</th>
                                    <th data-column-id="Usuario" data-width="25%">Usuario</th>
                                    <th data-column-id="Piel" data-width="25%">Piel</th>
                                    <th data-column-id="Respuestas" data-width="20%">Respuestas</th>
                                   
                                   
                                    <th data-column-id="actions" align="center" data-formatter="actions" data-width="100px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo verConfiguracionUsuarios(); ?>
                            </tbody>
                        </table>

                            </div>
                        </div>
                    </div>
                </div>
                <a type="button" href="addConfigUser.php" class="btn btn-primary pull-right"><i class="fa fa-plus fa-fw"></i> Agregar</a>

                

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootgrid-1.2.0/jquery.bootgrid.js"></script>
    <script src="js/bootgrid-1.2.0/jquery.bootgrid.fa.js"></script>

    <script>

        function init()
        {
            $("#grid-basic").bootgrid({
                formatters: {
                    "actions": function(column, row)
                    {
                        return "<a href=\"editConfigUser.php?id="+row.id+"\"><i class='fa fa-pencil fa-fw'></i></a> "+
                        " <a href=\"crudConfigUser.php?id="+row.id+"&action=delete\"><i class='fa fa-minus-circle fa-fw'></i></a>";
                    }
                },
                rowCount: [-1, 25, 50, 75]
            });
        }
        
        init();

    </script>

</body>

</html>
