<?php include '../../common/main.php'; ?>
<div ng-app="app" ng-controller="nuevaAsegudaroraAgenciamiento">
    <div class="pageheader">
        <h2>
            <i class="fa fa-sign-in"></i>
            <?php texto('INFORMACION_CONTRATO_AGENCIAMIENTO'); ?>
            <i class="actions pull-right fa  fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>
    <section id="main-content" class="animated fadeInRight">
        <div class="panel-default">
            <div class="panel-body">
                <form id="idAgenciamiento" novalidate>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label>
                                    <?php texto('NUEMERO_TRAMITE') ?></label>
                                <input class="form-control" title="<?php texto('NUEMERO_TRAMITE') ?>"
                                       ng-model="numeroTramite" readonly>
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
                                           name="agen_fechaingreso" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>
                                    <?php texto('NUMERO_DOCUMENTO') ?></label>
                                <input readonly class="form-control" title="<?php texto('NUMERO_DOCUMENTO') ?>"
                                       ng-model="numeroDocumento">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label form="idProceso">
                                    <?php texto('FECHA_DOCUMETO') ?></label>
                                <div class="datepicker"
                                     date-format="dd-MM-yyyy"
                                     button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                     button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                    <input readonly required id="agen_fechadocumento" ng-model="datFechaDocumento"
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
                                    <?php texto('RESOLUCION') ?></label>
                                <input readonly class="form-control" title="<?php texto('RESOLUCION') ?>"
                                       ng-model="resolucion">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">

                                <label form="idProceso">
                                    <?php texto('FECHA_RESOLUCION') ?></label>
                                <div class="datepicker"
                                     date-format="dd-MM-yyyy"
                                     button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                     button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                    <input readonly required id="agen_fecharesolucion" ng-model="datResolucion"
                                           data-mask="99/99/9999" placeholder="__/__/____"
                                           title="<?php texto('FECHA_RESOLUCION') ?>"
                                           type="text" class="angular-datepicker-input form-control"
                                           name="aseg_aniversario"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pie-flotante">
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>