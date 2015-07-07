<?php require_once "crudAutomoviles.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Usuarios</title>

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
                <a class="navbar-brand" href="index.html">Admin Users</a>
            </div>

            <?php include_once "menuitems.php" ?>

            <?php include_once "menu.php"; ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administracion <small>de Automoviles</small>
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
                                <h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Automoviles</h3>
                            </div>
                            <div class="panel-body">
                                
                        <table id="grid-basic" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" data-row-select="true">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-align="left" data-width="40px" data-type="numeric" data-order="asc">ID</th>
                                    <th data-column-id="marca" data-width="25%" data-align="left" data-header-align="center">marca</th>
                                    <th data-column-id="modelo" data-width="25%">Modelo</th>
                                    <th data-column-id="color" data-width="20%">Color</th>
                                    <th data-column-id="placa" data-width="100px">Placa</th>
                                    <th data-column-id="estado" data-width="100px">Estado</th>
                                    <th data-column-id="actions" align="center" data-formatter="actions" data-width="100px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo verAutomovil(); ?>
                            </tbody>
                        </table>

                            </div>
                        </div>
                    </div>
                </div>
                <a type="button" href="addAutomovil.php" class="btn btn-primary pull-right"><i class="fa fa-plus fa-fw"></i> Agregar</a>

                

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
                        return "<a href=\"editAutomovil.php?id="+row.id+"\"><i class='fa fa-pencil fa-fw'></i></a> "+
                        " <a href=\"crudAutomoviles.php?id="+row.id+"&action=delete\"><i class='fa fa-minus-circle fa-fw'></i></a>";
                    }
                },
                rowCount: [-1, 25, 50, 75]
            });
        }
        
        init();

    </script>

</body>

</html>
