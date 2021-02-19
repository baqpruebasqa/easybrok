<?php include '../../common/main.php'; ?>
<div ng-app="app" ng-controller="PorcentajeRamo">
    <div class="pageheader">
        <h2>
            <i class="fa fa-sign-in"></i>
            <?php texto('INGRESO_COMISION_RAMO'); ?>
            <i class="actions pull-right fa  fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>
    <section id="main-content" class="animated fadeInRight" style="padding: -15px;">
        <div class="panel-default">
            <div class="panel-body">
                <form id="idPorcentaje" novalidate>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>
                                    <li class="fa fa-asterisk"></li>
                                    <?php texto('RAMO') ?></label>
                                <input class="form-control" ng-model="valores_comision.ramo_nombre" ng-disabled="true"
                                       ng-if="idPorcentaje">
                                <select class="form-control" ng-model="valores_comision.ramo" required ng-show="idPorcentaje==undefined"
                                        title="<?php texto('RAMO') ?>">
                                    <option value=""><?php texto('SELECCIONE') ?></option>
                                    <option ng-repeat="co in listaRamo" ng-selected="co.ramo_id == valores_comision.ramo"
                                            value="{{co.ramo_id}}">
                                        {{co.ramo_nombre}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="aprobacion">
                                    <li class="fa fa-asterisk"></li><?php texto('FECHA_APROBACION') ?></label>
                                <div class="datepicker"
                                     date-format="dd-MM-yyyy"
                                     button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                     button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                    <input required id="aprobacion" ng-model="valores_comision.fecha_aprobacion"
                                           ng-disabled="idPorcentaje && (valores_comision.fecha_fin == undefined || valores_comision.fecha_fin == '')"
                                           data-mask="99/99/9999" placeholder="__/__/____"
                                           title="<?php texto('FECHA_APROBACION') ?>"
                                           type="text" class="angular-datepicker-input form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" ng-if="broker == brokerssasesores || broker == brokermilenial">
                            <div class="form-group">
                                <label for="nuevo">
                                    <li class="fa fa-asterisk"></li><?php texto('NUEVO') ?>(%)
                                </label>
                                <input class="form-control" title="<?php texto('NUEVO') ?>" id="nuevo"
                                       ng-disabled="idPorcentaje && (valores_comision.fecha_fin == undefined || valores_comision.fecha_fin == '')"
                                       placeholder="0.00" ng-model="valores_comision.comision_nuevo" required>
                            </div>
                        </div>
                        <div class="col-lg-6" ng-if="broker == brokerssasesores || broker == brokermilenial">
                            <div class="form-group">
                                <label for="renovacion">
                                    <li class="fa fa-asterisk"></li><?php texto('RENOVACION') ?>(%)
                                </label>
                                <input class="form-control" title="<?php texto('RENOVACION') ?>"
                                       ng-disabled="idPorcentaje && (valores_comision.fecha_fin==undefined || valores_comision.fecha_fin == '')" placeholder="0.00" id="renovacion"
                                       ng-model="valores_comision.comision_renovacion" required onkeypress="return numeroFloat(event,this);">
                            </div>
                        </div>
                        <div class="col-lg-6" ng-if="broker != brokerssasesores && broker != brokermilenial">
                            <div class="form-group">
                                <label for="comision">
                                    <li class="fa fa-asterisk"></li><?php texto('VALOR_COMISION') ?>(%)
                                </label>
                                <input class="form-control" title="<?php texto('VALOR_COMISION') ?>" id="comision"
                                       ng-disabled="idPorcentaje && (valores_comision.fecha_fin==undefined || valores_comision.fecha_fin == '')" placeholder="0.00"
                                       ng-model="valores_comision.comision" required onkeypress="return numeroFloat(event,this);">
                            </div>
                        </div>
                        <div class="col-lg-6" ng-show="idPorcentaje">
                            <div class="form-group">
                                <label for="fecha_fin">
                                    <?php texto('FECHA_FIN') ?>
                                </label>
                                <div class="datepicker"
                                     date-format="dd-MM-yyyy"
                                     button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                     button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                    <input id="fecha_fin" ng-model="valores_comision.fecha_fin" data-mask="99/99/9999" placeholder="__/__/____" title="<?php texto('FECHA_FIN') ?>" type="text" class="angular-datepicker-input form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label><li class="fa fa-asterisk"></li>
                                <?php texto('OBSERVACIONES') ?></label>
                        <textarea class="form-control" style="resize: none" title="<?php texto('OBSERVACIONES') ?>"
                                  ng-model="valores_comision.descripcion" required
                                  ng-disabled="idPorcentaje && (valores_comision.fecha_fin==undefined || valores_comision.fecha_fin == '')"> </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pie-flotante">
                        </div>
                        <div class="col-md-12 obligatorio-class" style="margin-top: 10px">
                            <label class="actions pull-left">
                                <li class="fa fa-asterisk"></li> <?php texto('CAMPO_OBLIGATORIO') ?>
                            </label>
                            <button ng-click="guardarPorncentajeRamo()"
                                    class="btn btn-sm btn-danger actions pull-right"><?php texto('GUARDAR') ?></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
