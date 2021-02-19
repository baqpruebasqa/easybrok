<?php include_once '../../common/main.php'; ?>
<div ng-app="app" ng-controller="AsegudaroraCuentas">
    <div class="pageheader">
        <h1><i class="fa fa-institution"></i><?php texto('ASEGURADORAS') ?></h1>
    </div>
    <section id="main-content" class="animated fadeInRight">
        <div class="row">
            <div ng-include="'./00-entorno/aseguradora/aseguradora_menu.php'"></div>
            <div id="MyWizard" class="wizard">
                <ul class="steps">
                   <!-- <li ng-click="navForm()" ng-if="getPermiso(PERMISOS.DATOS_GENERALES_ASEGURADORA)">
                        <?php /*texto('DATOS_GENERALES'); */?>
                    </li>
                    <li class="active">
                        <?php /*texto('INFORMACION_FINANCIERA'); */?>
                    </li>
                    <li ng-click="navContacto()" ng-if="getPermiso(PERMISOS.INFORMACION_FINANCIERA_ASEGURADORA)">
                        <?php /*texto('INFORMACION_CONTACTOS'); */?>
                    </li>
                    <li ng-click="navAgenciamiento()" ng-if="getPermiso(PERMISOS.AGENCIAMIENTO_ASEGURADORA)">
                        <?php /*texto('AGENCIAMIENTO'); */?>
                    </li>-->
                    <li ng-click="navForm()" >
                        <?php texto('DATOS_GENERALES'); ?>
                    </li>
                    <li class="active">
                        <?php texto('INFORMACION_FINANCIERA'); ?>
                    </li>
                    <li ng-click="navContacto()" >
                        <?php texto('INFORMACION_CONTACTOS'); ?>
                    </li>
                    <li ng-click="navAgenciamiento()" >
                        <?php texto('AGENCIAMIENTO'); ?>
                    </li>
                </ul>
            </div>
            <div class="fuelux">
                <div class="row texto-titulo-contenedor">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="texto-titulo">
                                <?php texto('CUENTA_TARJETAS') ?></span>
                    </div>
                </div>

                <div ng-include="'./common/cuenta_list.php'"></div>
            </div>
        </div>
    </section>
</div>