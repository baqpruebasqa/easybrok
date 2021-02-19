<?php include '../../common/main.php'; ?>
<div ng-app="app" ng-controller="AseguradoraVer">
    <div class="pageheader">
        <h2>
            <i class="icon-doc"></i>
            <?php texto('INFORMACION_ASEGURADORA'); ?>
            <i class="actions pull-right fa  fa-times cerrar" ng-click="cerrar()"></i>
        </h2>
    </div>
    <section id="main-content" class="animated fadeInRight" style="padding: 5px;">
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">
                            <?php texto('IDENTIFICACION') ?>
                        </label>
                        <input type="text" ng-model="strIdentificacion" class="form-control"
                               id="strIdentificacion" readonly
                               name="strIdentificador" required title="<?php texto('IDENTIFICACION') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('RAZON_SOCIAL') ?></label>
                    <input type="text" ng-model="strIdentificacion" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">

                            <?php texto('NOMBRE_COMERCIAL') ?>
                        </label>
                        <input type="text" ng-model="srtNombreComercial" class="form-control"
                               id="strIdentificacion" readonly
                               name="srtNombreComercial" required title="<?php texto('NOMBRE_COMERCIAL') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('REPRESENTANTE_LEGAL') ?></label>
                    <input type="text" ng-model="strRepresentante" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">

                            <?php texto('CONTADOR_GENERAL') ?>
                        </label>
                        <input type="text" ng-model="srtContadorGeneral" class="form-control"
                               id="strIdentificacion" readonly
                               name="srtNombreComercial" required title="<?php texto('CONTADOR_GENERAL') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('ANIVERSARIO') ?></label>
                    <input type="text" ng-model="strAniversario" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">

                            <?php texto('CORREO_ELECTRONICO') ?>
                        </label>
                        <input type="text" ng-model="strCorreo" class="form-control"
                               id="strIdentificacion" readonly
                               name="srtNombreComercial" required title="<?php texto('CONTADOR_GENERAL') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('PAGINA_WEB') ?></label>
                    <input type="text" ng-model="strPaginaWeb" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">

                            <?php texto('TIPO_CONTRIBUYENTE') ?>
                        </label>
                        <input type="text" ng-model="tipoContribuyente" class="form-control"
                               id="strIdentificacion" readonly
                               name="srtNombreComercial" required title="<?php texto('CONTADOR_GENERAL') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('PAIS') ?></label>
                    <input type="text" ng-model="strPais" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>

            </div>

        </div>

        <div class="pageheader">
            <h2>
                <i class="icon-doc"></i>
                <?php texto('INFRORMACION_UBICACION'); ?>
            </h2>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">
                            <?php texto('TIPO_OFICINA') ?>
                        </label>
                        <input type="text" ng-model="agencia.regi_nombre" class="form-control"
                               id="strIdentificacion" readonly
                               name="strIdentificador" required title="<?php texto('IDENTIFICACION') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('NOMBRE') ?></label>
                    <input type="text" ng-model="agencia.agen_nombre" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">
                            <?php texto('CONTACTO') ?>
                        </label>
                        <input type="text" ng-model="contacto" class="form-control mayuscula"
                               id="strContacto" readonly
                               name="strContacto" required title="<?php texto('CONTACTO') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('REGION') ?></label>
                    <input type="text" ng-model="agencia.agen_region" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="strIdentificacion">
                            <?php texto('DIRECCION') ?>
                        </label>
                        <input type="text" ng-model="agencia.agen_direccioncalleprincipal" class="form-control"
                               id="strIdentificacion" readonly
                               name="strIdentificador" required title="<?php texto('DIRECCION') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">
                            <?php texto('TELEFONO') ?>1
                        </label>
                        <input type="text" ng-model="agencia.agen_telefono1" class="form-control"
                               id="strIdentificacion" readonly
                               name="strIdentificador" required title="<?php texto('TELEFONO') ?>1">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for='strrazonsocial'>
                        <?php texto('TELEFONO') ?>2</label>
                    <input type="text" ng-model="agencia.agen_telefono2" class="form-control"
                           id="strIdentificacion" readonly
                           name="strRazonsocial">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="strIdentificacion">
                            <?php texto('TELEFONO') ?>3
                        </label>
                        <input type="text" ng-model="agencia.agen_celular" class="form-control"
                               id="strIdentificacion" readonly
                               name="strIdentificador" required title="<?php texto('TELEFONO') ?>1">
                    </div>
                </div>
            </div>
        </div>
        <div class="pageheader">
            <h2>
                <i class="icon icon-doc"></i>
                <?php texto('INFORMACION_FINANCIERA_VER'); ?>
            </h2>
        </div>
        <div class="content">
            <table id="aseguradora_financiera_ver" class="table table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>
                        <?php texto('FORMA_PAGO') ?>
                    </th>
                    <th><?php texto('INSTITUCION') ?></th>
                    <th><?php texto('TIPO_CUENTA') ?></th>
                    <th><?php texto('TIPO_TARJETA') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="c in cuentas" class="{{$index %2!==0 ?'active':'no-active'}}">
                    <td>
                        {{c.formpago_nombre}}
                    </td>
                    <td>
                        {{c.instfinan_nombre}}
                    </td>
                    <td>
                        {{c.tipocuen_nombre}}
                    </td>
                    <td>
                        {{c.tipotarjeta_nombre}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pageheader">
            <h2>
                <i class="icon-doc"></i>
                <?php texto('INFORMACION_CONTACTO'); ?>
            </h2>
        </div>
        <div class="content">
            <table id="aseguradora_contacto_ver" class="table table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>
                        <?php texto('NOMBRE') ?>
                    </th>
                    <th><?php texto('CARGO') ?></th>
                    <th><?php texto('TELEFONO') ?></th>
                    <th><?php texto('EXTENSION') ?></th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="c in contactos" class="{{$index %2!==0 ?'active':'no-active'}}">
                    <td>
                        {{c.cont_nombre}}
                    </td>
                    <td>
                        {{c.cont_cargo}}
                    </td>
                    <td>
                        {{c.cont_telefono}}
                    </td>
                    <td>
                        {{c.cont_extension}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
