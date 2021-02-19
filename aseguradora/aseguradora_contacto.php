<?php include_once '../../common/main.php'; ?>
<div ng-app="app" ng-controller="AsegudaroraContacto">
    <div class="pageheader">
        <h1><i class="fa fa-institution"></i><?php texto('ASEGURADORAS') ?></h1>
    </div>
    <section id="main-content">
        <div class="row">
            <div ng-include="'./00-entorno/aseguradora/aseguradora_menu.php'"></div>
            <div id="MyWizard" class="wizard">
                <ul class="steps">
                    <li ng-click="navForm()">
                        <?php texto('DATOS_GENERALES'); ?>
                    </li>
                    <li ng-click="navCuentas()">
                        <?php texto('INFORMACION_FINANCIERA'); ?>
                    </li>
                    <li class="active">
                        <?php texto('INFORMACION_CONTACTOS'); ?>
                    </li>
                    <li ng-click="navAgenciamiento()">
                        <?php texto('AGENCIAMIENTO'); ?>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="fuelux">
                    <div ng-include="'./common/contacto_list.php'"></div>
                </div>
            </div>
            <div class="row">
                <div class="fuelux" style="margin-top: 10px">
                    <div ng-app="app">

                        <div class="row texto-titulo-contenedor">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="texto-titulo">
                           Contactos Negocios
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6  menu-contenedor">
                                <div ng-if="broker == brokercifra" class="fa fa-plus" ng-click="nuevo_contacto()">
                                    <?php texto('NUEVO') ?>
                                </div>
                                <div ng-if="broker != brokercifra" class="fa fa-plus" ng-click="nuevo_contactoGenerico()">
                                    <?php texto('NUEVO') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                                <div class="panel" style="margin-top: 25px">
                                    <table id="idContactos"
                                           class="table table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="no-ordenable" style="display: none"></th>
                                            <th style="text-align: center"><?php texto('NOMBRE') ?></th>
                                            <th style="text-align: center"><?php texto('CORREO_ELECTRONICO') ?></th>
                                            <th ng-if="broker != brokercifra" style="text-align: center">Procesos</th>
                                            <th ng-if="broker != brokercifra" class="no-ordenable with-fijo"
                                                style="text-align: center;width: 80px"></th>
                                            <th class="no-ordenable with-fijo"
                                                style="text-align: center;width: 80px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="rep" ng-repeat="p in contactosAseglist">
                                            <td style="display: none"></td>
                                            <td>{{p.cont_nombre}}</td>
                                            <td>{{p.cont_email}}</td>
                                            <td ng-if="broker != brokercifra">
                                                <ul>
                                                    <li ng-repeat="pr in p.procesos">
                                                        {{pr.modu_nombre}}
                                                        <div class="fa fa-minus-circle"
                                                             tooltip="Eliminar Proceso"
                                                             style="float: right; color:#e25d5d"
                                                             ng-click="deleteContactoProceso(pr.contproc_id)">
                                                        </div>
                                                        <div id="co_{{pr.contproc_id}}" class="eliminar row panel-default">
                                                            <div class="panel-body">
                                                                <div class="col-md-12">
                                            <span class="text-info">
                                                Desea eliminar el proceso: {{pr.modu_nombre}}?
                                            </span>
                                                                </div>
                                                                <div class="col-md-12" style="margin-top: 15px; z-index: 8888">
                                                                    <button class="btn btn-sm btn-danger"
                                                                            ng-click="eliminarProceso(pr.contproc_id)">
                                                                        Aceptar
                                                                    </button>
                                                                    <button class="btn btn-sm btn-default "
                                                                            style="margin-left: 15px"
                                                                            ng-click=" cancelarEliminarProceso(pr.contproc_id)">Cancelar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td ng-if="broker != brokercifra">
                                                <div class="fa fa-pencil"
                                                     style="cursor: pointer"
                                                     tooltip="Asignar Procesos"
                                                     tooltip-placement="top"
                                                     ng-click="selectProcesos(p)"></div>
                                            </td>
                                            <td style="text-align: center">
                                                <div class="fa fa-trash"
                                                     style="cursor: pointer"
                                                     tooltip="Eliminar Contacto"
                                                     tooltip-placement="top"
                                                     ng-click="deleteContacto(p)"></div>
                                                <div id="co_{{p.cont_id}}" class="eliminar row panel-default">
                                                    <div class="panel-body">
                                                        <div class="col-md-12">
                                            <span
                                                    class="text-info"><?php texto('ELIMINAR_CONTACTO') ?>
                                                {{p.cont_nombre}}
                                            </span>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 15px; z-index: 8888">
                                                            <button class="btn btn-sm btn-danger"
                                                                    ng-click="eliminarContactoBroker(p)">
                                                                Aceptar
                                                            </button>
                                                            <button class="btn btn-sm btn-default "
                                                                    style="margin-left: 15px"
                                                                    ng-click=" cancelarEliminar(p)">Cancelar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
