<?php include '../../common/main.php'; ?>
<div>
    <div class="pageheader">
        <h2>
            <i class="fa fa-check-circle"></i>
            <?php texto('LISTADO_PROCESO_SISTEMA') ?>
            <i class="actions pull-right fa fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>

    <div class="panel-body" style="padding: -15px">
        <section id="main-content" class="animated fadeInRight">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <input class="form-control" id="idBuscarProceso"
                               ng-model="buscar" ng-change="buscar_proceso()" type="search"
                               placeholder="<?php texto('BUSCAR') ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow-y:scroll; height: 250px">
                    <table class="table table-bordered table-responsive" cellspacing="0" width="100%"
                           style="margin-top: 25px">

                        <thead>
                        <tr>
                            <th style="width: 250px">
                                <?php texto('PROCESO') ?>
                            </th>
                            <th style="cursor: pointer;text-align: center;width: 100px">
                                <div class="form-inline"> <?php texto('TODOS') ?>
                                    <div class="radio">
                                        <input ng-click="marcarTodos()"
                                               ng-checked ="ma_todo" type="checkbox">
                                    </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="p in listaModulos">
                            <td>
                                <div class="radio">{{p.modu_nombre}}</div>
                            </td>
                            <td style="text-align: center">
                                <div class="radio"
                                     tooltip-placement="top" tooltip="<?php texto('SELECCIONAR') ?>">
                                    <input type="checkbox" ng-checked="p.marca==1"
                                           ng-click="modProducto(p)">
                                </div>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="row pie-flotante"></div>
            <h6>&nbsp;</h6>
            <div class="row" style="float: right">
                <div class="col-sm-12 col-lg-12">
                    <button type="button" ng-click="guardarProceso()" class="btn btn-sm btn-danger actions pull-right">
                        <?php texto('GUARDAR') ?>
                    </button>
                </div>
            </div>

        </section>
    </div>
