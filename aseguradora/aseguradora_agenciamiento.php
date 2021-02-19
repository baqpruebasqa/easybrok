<?php include '../../common/main.php'; ?>
<div ng-app="app">
    <div class="pageheader">
        <h1>
            <h1><i class="fa fa-institution"></i><?php texto('ASEGURADORAS') ?></h1>
        </h1>
    </div>
    <section id="main-content" ng-controller="AsegudaroraAgenciamiento">
        <div class="row">
            <div ng-include="'./00-entorno/aseguradora/aseguradora_menu.php'"></div>
            <div id="MyWizard" class="wizard">
                <ul class="steps">
                    <!--<li ng-click="navForm()" ng-show="getPermiso(PERMISOS.DATOS_GENERALES_ASEGURADORA)">
                        <?php /*texto('DATOS_GENERALES'); */?>
                    </li>
                    <li ng-click="navCuentas()" ng-show="getPermiso(PERMISOS.INFORMACION_FINANCIERA_ASEGURADORA)">
                        <?php /*texto('INFORMACION_FINANCIERA'); */?>
                    </li>
                    <li ng-click="navContacto()" ng-show="getPermiso(PERMISOS.CONTACTOS_ASEGURADORA)">
                        <?php /*texto('INFORMACION_CONTACTOS'); */?>
                    </li>
                    <li class="active">
                        <?php /*texto('AGENCIAMIENTO'); */?>
                    </li>-->
                    <li ng-click="navForm()" >
                        <?php texto('DATOS_GENERALES'); ?>
                    </li>
                    <li ng-click="navCuentas()">
                        <?php texto('INFORMACION_FINANCIERA'); ?>
                    </li>
                    <li ng-click="navContacto()" >
                        <?php texto('INFORMACION_CONTACTOS'); ?>
                    </li>
                    <li class="active">
                        <?php texto('AGENCIAMIENTO'); ?>
                    </li>

                </ul>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row texto-titulo-contenedor">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="texto-titulo">
                            <?php texto('CONTRATO_AGENCIAMIENTO') ?>
                        </span>
                            </div>
                        </div>
                        <div class="row row-cuerpo">
                            <div class="row row-cuerpo">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="menu-generico">
                                        <div class="fa fa-plus" style="margin-left: 10px"
                                             ng-if="listaAgenciamiento.length==0"
                                             ng-show="estado == 1"
                                             ng-click="nuevoAgenciamiento()">
                                            <?php texto('NUEVO') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-inline pull-right" style="margin-right:10px;">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" ng-model="estado" ng-click="listarAgenciamientos()"
                                                       name="opciones" id="opciones_1" value="1" checked>
                                                <?php texto('ACTIVOS') ?>
                                            </label>
                                        </div>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" ng-model="estado" ng-click="listarAgenciamientos()"
                                                       name="opciones" id="opciones_2" value="0">
                                                <?php texto('INACTIVOS') ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" ng-if="estado==1">
                                <div class="dataTables_wrapper form-inline">
                                    <div style="margin-top: 25px" class="dataTables_wrapper form-inline">
                                        <table id="idAgenciamiento"
                                               class="table table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center">
                                                    <?php texto('DOCUMENTO') ?>
                                                </th>
                                                <th style="text-align: center"><?php texto('FECHA_DOCUMETO') ?>
                                                </th>
                                                <th style="text-align: center"><?php texto('RESOLUCION') ?>
                                                </th>
                                                <th style="text-align: center"><?php texto('FECHA_RESOLUCION') ?>
                                                </th>
                                                <th style="text-align: center"><?php texto('FECHA_CANCELACION') ?>
                                                </th>
                                                <th class="no-ordenable with-fijo"></th>

                                            </thead>
                                            <tbody>
                                            <tr ng-repeat="con in listaAgenciamiento"
                                                class="{{$index %2!==0 ?'active':'no-active'}}">
                                                <td>
                                                    <div>
                                                        {{con.cont_numerodocumento}}
                                                    </div>
                                                </td>
                                                <td>
                                                    {{con.cont_fechadocumento}}
                                                </td>
                                                <td>
                                                    {{con.cont_numeroresolucion}}
                                                </td>
                                                <td>{{con.cont_fecharesolucion}}</td>
                                                <td>
                                                    {{con.cont_fechacancelacion}}
                                                </td>
                                                <td style="text-align: center">
                                                    <div ng-if="estado == 1" class="fa fa-pencil"
                                                         tooltip="<?php texto("EDITAR") ?>"
                                                         tooltip-placement="top"
                                                         ng-click="updateAgenciamiento(con)"></div>
                                                </td>
                                                <td ng-if="estado == 0" style="text-align: center">
                                                    <div class="fa fa-refresh" tooltip="<?php texto("ACTIVAR") ?>"
                                                         tooltip-placement="top" ng-click="eliminar(con)"
                                                         style="cursor: pointer; text-align: center"></div>
                                                    <div id="con_{{con.cont_id}}" class="eliminar row panel-default">
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                    <span class="text-info">
                                                        Desea activar el contrato: {{con.cont_numerodocumento}}
                                                    </span>
                                                            </div>
                                                            <div class="col-md-12"
                                                                 style="margin-top: 10px; z-index: 8888">
                                                                <button class="btn btn-sm btn-danger"
                                                                        ng-click="eliminarContrato(con)">
                                                                    Aceptar
                                                                </button>
                                                                <button class="btn btn-sm btn-default"
                                                                        style="margin-left: 15px"
                                                                        ng-click=" cancelarEliminar()">
                                                                    Cancelar
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
                            <div class="col-lg-12" ng-if="estado==1">
                                <div style="height: 10px;"></div>
                                <div class="row texto-titulo-contenedor">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="texto-titulo">
                                    <?php texto('PORCENTAJE_RAMO') ?>
                                </span>
                                    </div>
                                </div>
                                <div class="menu-generico">
                                    <div class="fa fa-plus" ng-click="nuevoPorcentaje()">
                                        <?php texto('NUEVO') ?>
                                    </div>
                                </div>
                                <div class="dataTables_wrapper form-inline">
                                    <div class="dataTables_wrapper form-inline">
                                        <div style="margin-top: 25px" class="dataTables_wrapper form-inline">
                                            <table id="example" class="table table-bordered"
                                                   cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th class="no-ordenable with-fijo"></th>
                                                    <th style="text-align: center"><?php texto('RAMO') ?>
                                                    </th>
                                                    <th ng-if="broker != brokerssasesores && broker != brokermilenial" style="text-align: center"><?php texto('COMISION') ?>
                                                    </th>
                                                    <th ng-if="broker == brokerssasesores || broker == brokermilenial" style="text-align: center"><?php texto('NUEVO') ?>
                                                    </th>
                                                    <th ng-if="broker == brokerssasesores || broker == brokermilenial" style="text-align: center"><?php texto('RENOVACION_COMPLETO') ?>
                                                    </th>
                                                    <th style="text-align: center"><?php texto('OBSERVACIONES') ?>
                                                    </th>
                                                    <th class="no-ordenable with-fijo"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr ng-repeat="por in listaPorcentaje"
                                                    class="{{$index %2!==0 ?'active':'no-active'}}">
                                                    <td style="text-align: center">
                                                        <i class="icon icon-doc"
                                                           tooltip-placement="top" tooltip="<?php texto('VER') ?>"
                                                           ng-click="verPorcentaje(por)"></i>
                                                    </td>
                                                    <td>
                                                        {{por.ramo_nombre}}
                                                    </td>
                                                    <td ng-if="broker != brokerssasesores && broker != brokermilenial">
                                                        {{por.cont_ramo_valorcomision |number:2}}%
                                                    </td>
                                                    <td ng-if="broker == brokerssasesores || broker == brokermilenial">
                                                        {{por.cont_ramo_porcentajenuevo |number:2}}%
                                                    </td>
                                                    <td ng-if="broker == brokerssasesores || broker == brokermilenial">
                                                        {{por.cont_ramo_porcentajerenovacion |number:2}}%
                                                    </td>
                                                    <td>
                                                        {{por.cont_descripcion}}
                                                    </td>
                                                    <td style="text-align: center">
                                                        <div class="fa fa-pencil"
                                                             tooltip="<?php texto("EDITAR") ?>"
                                                             tooltip-placement="top"
                                                             ng-click="updatePorcentaje(por)"></div>
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
                    <div class="col-lg-12" ng-if="estado==0">
                        <div class="dataTables_wrapper form-inline">
                            <div style="margin-top: 25px" class="dataTables_wrapper form-inline">
                                <table id="idAgenciamiento"
                                       class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">
                                            <?php texto('DOCUMENTO') ?>
                                        </th>
                                        <th style="text-align: center"><?php texto('FECHA_DOCUMETO') ?>
                                        </th>
                                        <th style="text-align: center"><?php texto('RESOLUCION') ?>
                                        </th>
                                        <th style="text-align: center"><?php texto('FECHA_RESOLUCION') ?>
                                        </th>
                                        <th style="text-align: center"><?php texto('FECHA_CANCELACION') ?>
                                        </th>
                                        <th class="no-ordenable with-fijo"></th>

                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="con in listaAgenciamiento"
                                        class="{{$index %2!==0 ?'active':'no-active'}}">
                                        <td>
                                            <div>
                                                {{con.cont_numerodocumento}}
                                            </div>
                                        </td>
                                        <td>
                                            {{con.cont_fechadocumento}}
                                        </td>
                                        <td>
                                            {{con.cont_numeroresolucion}}
                                        </td>
                                        <td>{{con.cont_fecharesolucion}}</td>
                                        <td>
                                            {{con.cont_fechacancelacion}}
                                        </td>
                                        <td ng-if="estado == 0" style="text-align: center">
                                            <div class="fa fa-refresh" tooltip="<?php texto("ACTIVAR") ?>"
                                                 tooltip-placement="top" ng-click="eliminar(con)"
                                                 style="cursor: pointer; text-align: center" ng-hide="$index>0"></div>
                                            <div id="con_{{con.cont_id}}"  class="eliminar row panel-default">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                    <span class="text-info">
                                                        Desea activar el contrato: {{con.cont_numerodocumento}}
                                                    </span>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 10px; z-index: 8888">
                                                        <button class="btn btn-sm btn-danger"
                                                                ng-click="activar_contrato(con)">
                                                            Aceptar
                                                        </button>
                                                        <button class="btn btn-sm btn-default"
                                                                style="margin-left: 15px"
                                                                ng-click=" cancelarEliminar()">
                                                            Cancelar
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
                        <div style="height: 10px;"></div>
                        <div class="row texto-titulo-contenedor" ng-show="idContrato > 0">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="texto-titulo">
                            <?php texto('PORCENTAJE_RAMO') ?>
                        </span>
                            </div>
                        </div>
                        <div class="menu-generico" ng-show="estado == 1 && idContrato > 0">
                            <div class="fa fa-plus" ng-click="nuevoPorcentaje()">
                                <?php texto('NUEVO') ?>
                            </div>
                        </div>
                        <div style="margin-top: 25px">
                            <table style="margin-top: 10px" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center"><?php texto('RESOLUCION') ?>
                                    </th>
                                    <th style="text-align: center"><?php texto('RAMO') ?>
                                    </th>
                                    <th ng-if="broker != brokerssasesores && broker != brokermilenial" style="text-align: center"><?php texto('VALOR_COMISION') ?>
                                    </th>
                                    <th ng-if="broker == brokerssasesores || broker == brokermilenial" style="text-align: center"><?php texto('NUEVO') ?>
                                    </th>
                                    <th ng-if="broker == brokerssasesores || broker == brokermilenial" style="text-align: center"><?php texto('RENOVACION_COMPLETO') ?>
                                    </th>
                                    <th style="text-align: center"><?php texto('OBSERVACIONES') ?>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat-start="agen in listaAgenciamiento">
                                    <td rowspan="{{agen.contrato.length + 1}}"
                                        style="vertical-align: middle !important;">
                                        {{agen.cont_numeroresolucion}}
                                    </td>
                                </tr>
                                <tr ng-repeat-end ng-repeat="im in agen.contrato">
                                    <td>
                                        <div class="radio">
                                            {{im.ramo_nombre}}
                                        </div>
                                    </td>
                                    <td ng-if="broker != brokerssasesores && broker != brokermilenial">
                                        <div class="radio">
                                            {{im.cont_ramo_valorcomision |number:2}} %
                                        </div>
                                    </td>
                                    <td ng-if="broker == brokerssasesores || broker == brokermilenial">
                                        <div class="radio">
                                            {{im.cont_ramo_porcentajenuevo |number:2}} %
                                        </div>
                                    </td>
                                    <td ng-if="broker == brokerssasesores || broker == brokermilenial">
                                        <div class="radio">
                                            {{im.cont_ramo_porcentajerenovacion |number:2}} %
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio">
                                            {{im.cont_descripcion}}
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
    </section>
</div>
<script language="javascript">
    $(document).ready(function () {
        $('form').keypress(function (e) {
            if (e == 13) {
                return false;
            }
        });
        $('input').keypress(function (e) {
            if (e.which == 13) {
                return false;
            }
        });

    });
</script>
