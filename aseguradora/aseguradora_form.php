<?php include '../../common/main.php'; ?>
<div ng-app="app">
    <div class="pageheader">
        <h1>
            <h1><i class="fa fa-institution"></i> <?php texto('ASEGURADORAS') ?></h1>
        </h1>
    </div>
    <section id="main-content" ng-controller="AseguradoraController" ng-show="mostar">
        <div style="margin-left: -15px" ng-include="'./00-entorno/aseguradora/aseguradora_menu.php'"></div>
        <div class="row">
            <div id="MyWizard" class="wizard">
                <ul class="steps">
                    <!--<li class="active">
                        <?php /*texto('DATOS_GENERALES'); */?>
                    </li>
                    <li ng-click="navCuentas()" ng-if="getPermiso(PERMISOS.INFORMACION_FINANCIERA_ASEGURADORA)">
                        <?php /*texto('INFORMACION_FINANCIERA'); */?>
                    </li>
                    <li ng-click="navContacto()" ng-if="getPermiso(PERMISOS.CONTACTOS_ASEGURADORA)">
                        <?php /*texto('INFORMACION_CONTACTOS'); */?>
                    </li>
                    <li ng-click="navAgenciamiento()" ng-if="getPermiso(PERMISOS.AGENCIAMIENTO_ASEGURADORA)">
                        <?php /*texto('AGENCIAMIENTO'); */?>
                    </li>-->
                    <li class="active">
                        <?php texto('DATOS_GENERALES'); ?>
                    </li>
                    <li ng-click="navCuentas()">
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
            <form name='aseguradora_broker' id="aseguradora_broker" novalidate ng-submit="guardar()">
                <div class="fuelux">
                    <div class="row texto-titulo-contenedor">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span class="texto-titulo">
                                <?php texto('INFORMACION_GENERAL') ?>
                            </span>
                        </div>
                    </div>
                    <div style="height: 10px;"></div>
                    <div class="row row-cuerpo">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>
                                    <li class="fa fa-asterisk"></li>
                                    <?php texto('TIPO_DOCUMENTO') ?>
                                </label>
                                <input type="text" id="int_tipoident1" name="int_tipoident"
                                       class="form-control" title="<?php texto('TIPO_DOCUMENTO') ?>"
                                       value="RUC" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="strIdentificacion">
                                    <li class="fa fa-asterisk"></li>
                                    <?php texto('IDENTIFICACION') ?>
                                </label>
                                <input type="text" ng-model="strIdentificacion" class="form-control"
                                       ng-blur="comprarIdentificaciones()"
                                       id="strIdentificacion" onkeypress="return numeroIdentificacion(event,1217);"
                                       name="strIdentificador" required title="<?php texto('IDENTIFICACION') ?>">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img id="logo_temp" class="contenedor-logo"
                                      src="./imagenes/aseguradora/{{idPersona}}.jpg?a={{a}}"
                                     onerror="this.onerror=null;this.src='./imagenes/user/default.jpg';">
                                <div style="margin-left: 50px;margin-top: -35px"
                                     ng-include="'./upload/index.php'"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cuerpo">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='strrazonsocial'>
                                    <li class="fa fa-asterisk"></li><?php texto('RAZON_SOCIAL') ?></label>

                                <select class="form-control" style="cursor: pointer" ng-disabled="!old"
                                        required id="intrazonsocial" ng-model="intAseguradora"
                                        name="strrazonsocial" id="intrazonsocial"
                                        title="<?php texto('RAZON_SOCIAL') ?>">
                                    <option value="" ng-selected="true"><?php texto('RAZON_SOCIAL') ?>
                                    </option>
                                    <option ng-repeat="as in lisAseguradora" ng-selected="intAseguradora == as.regi_id"
                                            value="{{as.regi_id}}">{{as.regi_nombre}}
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='nombre_comercial'>
                                    <li class="fa fa-asterisk"></li>
                                    <?php texto('NOMBRE_COMERCIAL') ?>
                                </label>
                                <input type="text" class="form-control mayuscula" ng-disabled="!old"
                                       required id="nombre_comercial" ng-model="srtNombreComercial"
                                       name="nombre_comercial" title=" <?php texto('NOMBRE_COMERCIAL') ?>"
                                >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group ">
                                <label for='persona_contacto'><?php texto('REPRESENTANTE_LEGAL') ?></label>
                                <input type="search" class="form-control"
                                       id="persona_contacto" ng-model="strPersonaContacto" ng-disabled="!old"
                                       name="persona_contacto" title="<?php texto('REPRESENTANTE_LEGAL') ?>"
                                       placeholder="<?php texto('IDENTIFICACION') ?>"
                                       tooltip-placement="top"
                                       tooltip="Ingrese la identificación"
                                       ng-change="cambiar_persona(2)"
                                       ng-blur="buscar_cabio(2)"
                                       ng-keypress=" buscarEnter($event, 2)">
                                <i ng-click="buscarContacto(2)"
                                   class="fa fa-search" style="float: right;margin-top: -28px;position: relative;
                                   margin-right: 10px;color: #e25d5d;cursor: pointer;z-index: 8899"></i>
                            </div>

                        </div>
                    </div>

                    <div class="row row-cuerpo">

                        <div class="col-lg-4">

                            <label for='gerente_general'><?php texto('CONTADOR_GENERAL') ?></label>
                            <input type="search" class="form-control"
                                   id="gerente_general" ng-model="strGerentegenearal"
                                   name="gerente_general" title="<?php texto('CONTADOR_GENERAL') ?>"
                                   ng-keypress=" buscarEnter($event, 1)"
                                   placeholder="<?php texto('IDENTIFICACION') ?>"
                                   tooltip-placement="top"
                                   tooltip="Ingrese la identificación"
                                   ng-change="cambiar_persona(1)"
                                   ng-disabled="!old"
                                   ng-blur="buscar_cabio(1)">
                            <i ng-click="buscarContacto(1)"
                               class="fa fa-search icon-buscador"></i>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='aseg_aniversario' style="width: 200px">
                                    <li class="fa fa-asterisk"></li><?php texto('ANIVERSARIO') ?></label>

                                <div class="datepicker"
                                     date-format="dd-MM-yyyy"
                                     button-prev='<i class="fa fa-arrow-circle-left"></i>'
                                     button-next='<i class="fa fa-arrow-circle-right"></i>'>
                                    <input required id="aseg_aniversario" ng-model="datAniversario"
                                           data-mask="99/99/9999" placeholder="__/__/____" ng-disabled="!old"
                                           title="<?php texto('ANIVERSARIO') ?>"
                                           type="text" class="angular-datepicker-input form-control"
                                           name="aseg_aniversario"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group ">
                                <label for='correo_electronico'>
                                    <li class="fa fa-asterisk"></li> <?php texto('CORREO_ELECTRONICO') ?></label>
                                <input type="text" class="form-control" correo ng-disabled="!old"
                                       title="<?php texto('CORREO_ELECTRONICO') ?>"
                                       required id="correo_electronico" ng-model="strCorreoElectronico"
                                       placeholder="______@__._"
                                       name="correo_electronico"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="row row-cuerpo">

                        <div class="col-lg-4">
                            <div class="form-group ">
                                <label for='pagina_web'>
                                    <li class="fa fa-asterisk"></li><?php texto('PAGINA_WEB') ?></label>
                                <input type="text" class="form-control" required ng-disabled="!old"
                                       id="pagina_web" ng-model="strPaginaWeb"
                                       name="pagina_web" title="<?php texto('PAGINA_WEB') ?>">
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='tipo_contribuyente'>
                                    <li class="fa fa-asterisk"></li>
                                    <?php texto('TIPO_CONTRIBUYENTE') ?></label>
                                <select type="text" class="form-control" ng-disabled="!old"
                                        required id="tipo_contribuyente" ng-model="intTipoContribuyente"
                                        name="tipo_contribuyente" title="<?php texto('TIPO_CONTRIBUYENTE') ?>">
                                    <option value=""
                                            ng-selected="true"><?php texto('SELECCIONE') ?></option>
                                    <option ng-repeat="c in lisTipocontribullente"
                                            ng-selected="intTipoContribuyente == c.regi_id"
                                            value="{{c.regi_id}}">{{c.regi_nombre}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='idpais'>
                                    <li class="fa fa-asterisk"></li><?php texto('PAIS') ?></label>
                                <select type="text" class="form-control" ng-disabled="!old"
                                        required id="idpais" ng-model="intPais" title="<?php texto('PAIS') ?>"
                                        name="idpais" ng-change="actualizarmoneda()">
                                    <option ng-repeat="pais in lisPaises"
                                            ng-selected="pais.intpais_id == intPais"
                                            value="{{pais.intpais_id}}">{{pais.strpaisnombre}}
                                    </option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="row row-cuerpo">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='gestion_cobro'>
                                    <li class="fa fa-asterisk"></li>
                                    <?php texto('GESTION_COBRO') ?></label>
                                <select type="text" class="form-control" ng-disabled="!old"
                                        required id="tipo_contribuyente" ng-model="intGestionCobro"
                                        name="gestion_cobro" title="<?php texto('GESTION_COBRO') ?>">
                                    <option value=""
                                            ng-selected="true"><?php texto('SELECCIONE') ?></option>
                                    <option ng-repeat="c in listGestionCobro"
                                            ng-selected="intGestionCobro == c.regi_id"
                                            value="{{c.regi_id}}">{{c.regi_nombre}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for='idLiberacion'>
                                    <li class="fa fa-asterisk"></li><?php texto('LIBERACION_COMISION') ?></label>
                                <select type="text" class="form-control" ng-disabled="!old"
                                        required id="idLiberacion" ng-model="intLiberacion"
                                        title="<?php texto('LIBERACION_COMISION') ?>"
                                        name="" ng-change="cambiocuota()">
                                    <option value=""
                                            ng-selected="true"><?php texto('SELECCIONE') ?></option>
                                    <option ng-repeat="c in listLiberacion"
                                            ng-selected="intLiberacion == c.regi_id"
                                            value="{{c.regi_id}}">{{c.regi_nombre}}
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="col-lg-4" id="cuota_id">
                            <div class="form-group ">
                                <label for='cuota'>
                                    <li class="fa fa-asterisk"></li><?php texto('CUOTA') ?></label>
                                <input type="text" class="form-control" ng-disabled="!old" ng-required="intLiberacion==EasyBrok.defecto.liberacionComision"
                                       id="cuota" ng-model="intCuota" onkeypress="return soloNumeros(event);"
                                       name="cuota" title="<?php texto('CUOTA') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row row-cuerpo">
                        <div class="col-lg-12" style="margin-top: 10px">
                            <label class="actions pull-left">
                                <li class="fa fa-asterisk"></li> <?php texto('CAMPO_OBLIGATORIO') ?>
                            </label>
                            <button type="submit" ng-disabled="!old"
                                    class="btn btn-danger actions pull-right"><?php texto('GUARDAR') ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top: 5px;" ng-if="idAseguradora">
            <div class="fuelux">
                <div class="row texto-titulo-contenedor">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="texto-titulo">
                            <?php texto('OFICINA_SUCURSALES_AGENCIAS') ?>
                        </span>
                    </div>
                </div>
                <div ng-include="'common/sucursales_list.php'"></div>
            </div>
        </div>
        <div style="height: 150px;"></div>

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
