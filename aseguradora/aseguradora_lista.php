<?php include_once '../../common/main.php'; ?>
<div ng-app="app" ng-controller="ListaAseguradoraController">
    <div class="pageheader">
        <h1><i class="fa fa-institution"></i> <?php texto('ASEGURADORAS') ?></h1>
    </div>
    <section id="main-content">
        <div class="row">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="contenedor-buscador">
                        <input ng-model="buscar"
                               placeholder="<?php texto('BUSCAR') ?>"
                               class="form-control" type="search"
                               title="busqueda"
                        />
                        <i ng-click="listar()"
                           class="fa fa-search"></i>
                    </div>
                </div>
            </div>
            <div class="fuelux" style="margin-top: 5px;">
                <div class="row">
                    <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 menu-contenedor" ng-show="getPermiso(PERMISOS.ASEGURADORA_GESTIONAR)">
                        <div ng-include="'./00-entorno/aseguradora/aseguradora_menu.php'"></div>
                    </div>
                    <div class="form-inline pull-right" style="margin-right: 15px;">
                        <div ng-click="reporte()">
                            <div class="fa fa-sign-in" style="color: #cc3333;cursor: pointer"></div>
                            <span style="cursor: pointer"><?php texto('EXPORTAR') ?></span>
                        </div>
                    </div>
                </div>

                <div class="row texto-titulo-contenedor">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="texto-titulo">
                            <?php texto('ASEGURADORA_LISTA') ?>
                        </span>
                    </div>
                </div>
                <div class="panel paginate_button previous">
                    <table id="idAseguradora" datatable="ng" class="table table-bordered"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="no-ordenable with-fijo" style="pointer-events: none">
                            </th>
                            <th style="text-align: center"><?php texto('IDENTIFICACION') ?></th>
                            <th style="text-align: center"><?php texto('NOMBRE_COMERCIAL') ?></th>
                            <th style="text-align: center"><?php texto('ANIVERSARIO') ?></th>
                            <th style="text-align: center"><?php texto('CORREO_ELECTRONICO') ?></th>
                            <th class="no-ordenable with-fijo" style="text-align: center;width: 80px" ng-show="getPermiso(PERMISOS.ASEGURADORA_GESTIONAR)"></th>
                           <!-- <th class="no-ordenable with-fijo" style="text-align: center;width: 80px"></th>  -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="asg in lista" class="{{$index %2!==0 ?'active':'no-active'}}">
                            <td style="text-align: center">
                                <i class="icon icon-doc"
                                   tooltip-placement="top" tooltip="<?php texto('VER') ?>"
                                   ng-click="verAseguradora(asg.aseg_id)"></i>
                            </td>
                            <td>
                                <div>
                                    {{asg.aseg_iden}}
                                </div>
                            </td>
                            <td>
                                {{asg.aseg_nombrecomercial}}
                            </td>
                            <td>
                                {{asg.aseg_aniversario}}
                            </td>
                            <td>{{asg.aseg_correoeletronico}}</td>
                            <td style="text-align: center"  ng-show="getPermiso(PERMISOS.ASEGURADORA_GESTIONAR)">
                                <div class="fa fa-pencil"
                                     tooltip-placement="top" tooltip="<?php texto('EDITAR') ?>"
                                     ui-sref="aseguradora.form({idAseguradora:'{{asg.aseg_id}}'})"></div>
                            </td>
<!--  FUNCIONALIDAD ELIMINAR -->
<!--                            <td style="text-align: center">
                                <div class="fa fa-trash"
                                     tooltip-placement="top" tooltip="<?php texto('ELIMINAR') ?>"
                                     ng-click="eliminarTipoCuenta(asg)"></div>

                                <div id="fa_{{asg.aseg_id}}" class="eliminar row panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <span class="text-info">Desea eliminar la aseguradora:  {{asg.aseg_nombrecomercial}}</span>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 15px;z-index: 8888">
                                            <button class="btn btn-sm btn-danger"
                                                    ng-click="deleteAseguradora(asg)">
                                                Aceptar
                                            </button>
                                            <button class="btn btn-sm btn-default" style="margin-left: 15px"
                                                    ng-click=" cancelarEliminar(asg)">Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dataTables_length').addClass("ocultar");
        $('.dataTables_filter').addClass("ocultar");
    });
</script>