<?php include '../../common/main.php'; ?>
<div ng-app="app" ng-controller="PorcentajeRamo">
    <div class="pageheader">
        <h2>
            <i class="fa fa-sign-in"></i>
            <?php texto('INFORMACION_CONTRATO'); ?>
            <i class="actions pull-right fa  fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>
    <section id="main-content" class="animated fadeInRight" >
        <div class="panel-body">
            <div class="dataTables_wrapper form-inline">
                <div style="margin-top: 25px" class="dataTables_wrapper form-inline">
                    <table id="example" class="table table-bordered" datatable="ng"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><?php texto('RAMO') ?>
                            </th>
                            <th><?php texto('FECHA_APROBACION') ?>
                            </th>
                            <th ng-if="broker != brokerssasesores && broker != brokermilenial" style="text-align: center"><?php texto('COMISION') ?>
                            </th>
                            <th ng-if="broker == brokerssasesores || broker == brokermilenial" style="text-align: center"><?php texto('NUEVO') ?>
                            </th>
                            <th ng-if="broker == brokerssasesores || broker == brokermilenial" style="text-align: center"><?php texto('RENOVACION_COMPLETO') ?>
                            </th>
                            <th><?php texto('FECHA_FIN') ?>
                            </th>
                            <th><?php texto('OBSERVACIONES') ?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="por in listaHistorico"
                            class="{{$index %2!==0 ?'active':'no-active'}}">
                            <td>
                                {{por.ramo_nombre}}
                            </td>
                            <td>
                                {{por.cont_ramo_fechaaprobacion}}
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
                                {{por.cont_fechafin}}
                            </td>
                            <td>
                                {{por.cont_descripcion}}
                            </td>
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
        $('.modal-dialog').addClass('pantalla_xxl');
    });
</script>
