<?php include '../../common/main.php'; ?>
<div ng-app="app" ng-controller="nuevaAsegudaroraAgenciamiento">
    <div class="pageheader">
        <h2>
            <i class="fa fa-sign-in"></i>
            <?php texto('INGRESO_CONTRATO_AGENCIAMIENTO'); ?>
            <i class="actions pull-right fa  fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>

    <div class="panel-body" style="padding: -15px">
        <section id="main-content" class="animated fadeInRight">
            <form ng-submit="addAgenciamiento()" id="idAgenciamiento1" novalidate>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <?php texto('NO_TRAMITE') ?></label>
                            <input class="form-control mayuscula" title="<?php texto('NUEMERO_TRAMITE') ?>"
                                   ng-model="numeroTramite">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label form="idProceso">
                                <?php texto('FECHA_INGRESO') ?></label>

                            <div class="datepicker"
                                 date-format="dd-MM-yyyy"
                                 button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                 button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                <input id="agen_fechaingreso" ng-model="datFechaIngreso"
                                       data-mask="99/99/9999" placeholder="__/__/____"
                                       title="<?php texto('FECHA_INGRESO') ?>"
                                       type="text" class="angular-datepicker-input form-control"
                                       name="agen_fechaingreso"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <?php texto('NO_DOCUMENTO') ?></label>
                            <input  class="form-control mayuscula" title="<?php texto('NUMERO_DOCUMENTO') ?>"
                                   ng-model="numeroDocumento">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label form="idProceso">
                                </li><?php texto('FECHA_DOCUMETO') ?></label>

                            <div class="datepicker"
                                 date-format="dd-MM-yyyy"
                                 button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                 button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                <input id="agen_fechadocumento" ng-model="datFechaDocumento"
                                       data-mask="99/99/9999" placeholder="__/__/____"
                                       title="<?php texto('FECHA_DOCUMETO') ?>"
                                       type="text" class="angular-datepicker-input form-control"
                                       name="aseg_aniversario"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <li class="fa fa-asterisk"></li><?php texto('RESOLUCION') ?></label>
                            <input required class="form-control mayuscula" title="<?php texto('RESOLUCION') ?>"
                                   ng-model="resolucion">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label form="idProceso">
                                <li class="fa fa-asterisk"></li><?php texto('FECHA_RESOLUCION') ?></label>

                            <div class="datepicker"
                                 date-format="dd-MM-yyyy"
                                 button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                 button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                <input required id="agen_fecharesolucion" ng-model="datResolucion"
                                       data-mask="99/99/9999" placeholder="__/__/____"
                                       title="<?php texto('FECHA_RESOLUCION') ?>"
                                       type="text" class="angular-datepicker-input form-control"
                                       name="aseg_aniversario"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="cont_id">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label form="idProceso">
                               <?php texto('FECHA_CANCELACION') ?></label>

                            <div class="datepicker"
                                 date-format="dd-MM-yyyy"
                                 button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                 button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                <input  id="agen_fechacancelacion" ng-model="datCancelacion"
                                       data-mask="99/99/9999" placeholder="__/__/____"
                                       title="<?php texto('FECHA_CANCELACION') ?>"
                                       type="text" class="angular-datepicker-input form-control"
                                       name="aseg_aniversario"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row pie-flotante">

                </div>
                <div class="row">
                    <div class="col-md-12 obligatorio-class" style="margin-top: 10px">
                        <label class="actions pull-left">
                            <li class="fa fa-asterisk"></li> <?php texto('CAMPO_OBLIGATORIO') ?>
                        </label>
                        <button type="submit"
                                class="btn btn-sm btn-danger actions pull-right"><?php texto('GUARDAR') ?></button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>