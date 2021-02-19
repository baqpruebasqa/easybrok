<?php include '../../common/main.php'; ?>
<div ng-app="app" ng-controller="AseguradoraReporte">
    <div class="pageheader">
        <h2>
            <i class="fa fa-sign-in"></i>
            <?php texto('DATOS_ASEGURADORA') ?>
            <i class="actions pull-right fa fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>

    <section id="main-content" class="animated fadeInRight">
        <div class="row" style="margin-left: 3px;margin-right: 3px">
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div class="icheckbox_flat-grey checked" ng-click="iden($event)"
                                     id="tidentificacion"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('TIPO_DOCUMENTO') ?></label>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div
                                    class="icheckbox_flat-grey checked" ng-click="iden($event)"
                                    id="tipo_contribuyente"
                                    style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px;
                                         opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('TIPO_CONTRIBUYENTE') ?></label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div id="identificacion" ng-click="iden($event)" class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('IDENTIFICACION') ?>
                            </label>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div id="pais" ng-click="iden($event)" class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('PAIS') ?>
                            </label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div ng-click="iden($event)" id="razon_social"
                                     class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px;
                                         opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('RAZON_SOCIAL') ?></label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div id="nombre_comercial" ng-click="iden($event)"
                                     class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('NOMBRE_COMERCIAL') ?>
                            </label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div id="representante_legal" ng-click="iden($event)"
                                     class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('REPRESENTANTE_LEGAL') ?>
                            </label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div id="contador_general" ng-click="iden($event)"
                                     class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('CONTADOR_GENERAL') ?>
                            </label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div id="aniversario" ng-click="iden($event)"
                                     class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('ANIVERSARIO') ?>
                            </label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div ng-click="iden($event)" id="correo_electonico"
                                     class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px;
                                         opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('CORREO_ELECTRONICO') ?>
                            </label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <label class="checkbox-inline">
                                <div ng-click="iden($event)" id="pagina_web" class="icheckbox_flat-grey checked"
                                     style="position: relative;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block;
                                         width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px;
                                         opacity: 0; background: rgb(255, 255, 255);"></ins>
                                </div>
                                <?php texto('PAGINA_WEB') ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pie-flotante">
        </div>

        <div class="row" style="margin-left:3px; margin-right:3px">
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="row" style="margin-left:3px; margin-right: 3px" >
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <button ng-click="exportCsvGeneral()"
                                    title="<?php texto('exportar_pdf') ?>"
                                    class="btn btn-sm btn-danger"><?php texto('EXPORTAR_CSV') ?>
                                <i class="fa fa-file-pdf-o"></i>
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <button ng-click="exportExcelGeneral()" style="margin-left: 50%"
                                    title="<?php texto('exportar_exel') ?>"
                                    class="btn btn-sm btn-danger"><?php texto('EXPORTAR_EXEL') ?>
                                <i class="fa fa-file-excel-o"></i>
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <button ng-click="exportPdfGeneral()" style="margin-left: 100%"
                                    title="<?php texto('exportar_pdf') ?>"
                                    class="btn btn-sm btn-danger"><?php texto('EXPORTAR_PDF') ?>
                                <i class="fa fa-file-pdf-o"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>