/**
 * Created by danier on 19/10/15.
 */

/*
 * *  Servicio para la gestion de la seguradora
 * *  dmj
 */
app.service("aseguradora", function ($http, $q, $rootScope) {

    return {
        listar: listar,
        add: add,
        update: update,
        delete: elimnar
    };
    function listar(data) {
        var data = {
            'seguridad': $rootScope.token,
            'idBroker': $rootScope.broker,
            'data': data

        };

        var defered = $q.defer();
        var promise = defered.promise;
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/get',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            defered.resolve(data);
        }).error(function (err) {
            EasyBrok.desbloquear();
            defered.reject(err);
        });
        return promise;
    }

    function add(data) {
        var data = {
            'seguridad': $rootScope.token,
            'data': data
        };
        var defered = $q.defer();
        var promise = defered.promise;
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/post',
            data: data
        }).success(function (data, status) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            defered.resolve(data);
        }).error(function (err) {
            EasyBrok.desbloquear();
            defered.reject(err);
        });
        return promise;
    }
    ;
    function update(data) {
        var data = {
            'seguridad': $rootScope.token,
            'data': data
        };

        var defered = $q.defer();
        var promise = defered.promise;
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/put',
            data: data
        }).success(function (data, status) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            defered.resolve(data);
        }).error(function (err) {
            EasyBrok.desbloquear();
            defered.reject(err);
        });
        return promise;
    }
    ;
    function elimnar(data) {
        var data = {
            'seguridad': $rootScope.token,
            'data': data
        };
        var defered = $q.defer();
        var promise = defered.promise;
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/delete',
            data: data
        }).success(function (data, status) {
            EasyBrok.desbloquear();
            defered.resolve(data);
        }).error(function (err) {
            EasyBrok.desbloquear();
            defered.reject(err);
        });
        return promise;
    }
});


/*
 * *  Controlador para listar las aseguradoras del aps.
 * *  dmj
 */
app.controller('ListaAseguradoraController', function ($scope, $http, $state, $rootScope, aseguradora, $modal) {
    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_LISTAR) == false && $rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }
    $rootScope.idAseguradora = null;
    $scope.listar = function () {
        $rootScope.buscarAseguradora = null;
        $rootScope.buscarAseguradora = $scope.buscar;
        var data = {'buscar': $scope.buscar};
        aseguradora.listar(data)
            .then(function (data) {
                EasyBrok.notificacion(data.status, data.mensaje);
                $scope.lista = data.data.data;
            }).catch(function (err) {
            EasyBrok.notif.error($rootScope.error);
        });
    };
    $scope.listar();

    $scope.verAseguradora = function (as) {
        $rootScope.idAseguradora = as;
        $rootScope.nuevaAgenciamiento = $modal.open({
            templateUrl: '00-entorno/aseguradora/aseguradora_ver.php'
        });

    };

    $scope.eliminarTipoCuenta = function (asg) {
        $('.eliminar').hide();
        $('#fa_' + asg.aseg_id).toggle(100);
    };
    $scope.cancelarEliminar = function (asg) {
        $('#fa_' + asg.aseg_id).toggle(100);
    };


    $scope.deleteAseguradora = function (asg) {
        var data = {
            'idAseguradora': asg.aseg_id
        };
        aseguradora.delete(data).then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.listar();
        }).catch(function (data) {
            EasyBrok.notif.error($rootScope.error);
        });
    };
    $scope.reporte = function () {

        $rootScope.aseguradora_reporte = $modal.open({
            templateUrl: '00-entorno/aseguradora/aseguradora_reporte.php'
        });
    }
});

/*
 * *  Controlador para gestionar las aseguradoras del aps.
 * *  dmj
 */
app.controller('AseguradoraController', function ($scope, $http, $state, $stateParams, $rootScope, catalogo, persona, aseguradora) {
    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }
    $scope.a = Math.random();
    $rootScope.idPersona = $stateParams.idAseguradora;
    $scope.cuotas = $rootScope.EasyBrok.defecto.liberacionComision;

    $scope.navCuentas = function () {
        if ($stateParams.idAseguradora != null && $stateParams.idAseguradora != undefined) {
            $state.go('aseguradora.cuentas', {'idAseguradora': $stateParams.idAseguradora});
        }
        return false;
    };
    $scope.navContacto = function () {
        if ($stateParams.idAseguradora != null && $stateParams.idAseguradora != undefined) {
            $state.go('aseguradora.contacto', {'idAseguradora': $stateParams.idAseguradora});
        }
        return false;
    };

    $scope.navAgenciamiento = function () {
        if ($stateParams.idAseguradora != null && $stateParams.idAseguradora != undefined) {
            $state.go('aseguradora.agenciamiento', {'idAseguradora': $stateParams.idAseguradora});
        }
        return false;
    };


    if ($stateParams.idAseguradora != null && $stateParams.idAseguradora != undefined) {
        $rootScope.idAseguradora = $stateParams.idAseguradora;

    }
    ;
    $('#cuota_id').hide();
    $scope.cambiocuota = function () {
        if ($scope.intLiberacion == $scope.cuotas) {
            $('#cuota_id').show();
        } else {
            $('#cuota_id').hide();
        }
    }

    $scope.intTipoDocumento = $rootScope.EasyBrok.defecto.tipoIdentificacion;
    $scope.intPais = $rootScope.EasyBrok.defecto.pais;

    catalogo.catalogos($rootScope.catalogo.tipo_identificacion)
        .then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.lisTipoIden = data.data.data;
        }).catch(function (err) {
        EasyBrok.notif.error($rootScope.error);
    });

    catalogo.catalogos($rootScope.catalogo.aseguradora)
        .then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.lisAseguradora = data.data.data;
        }).catch(function (err) {
        EasyBrok.notif.error($rootScope.error);
    });

    catalogo.catalogos($rootScope.catalogo.tipo_contribuyente)
        .then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.lisTipocontribullente = data.data.data;
        }).catch(function (err) {
        EasyBrok.notif.error($rootScope.error);
    });

    catalogo.catalogos($rootScope.catalogo.gestioncobro)
        .then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.listGestionCobro = data.data.data;
        }).catch(function (err) {
        EasyBrok.notif.error($rootScope.error);
    });

    catalogo.catalogos($rootScope.catalogo.liberacioncomision)
        .then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.listLiberacion = data.data.data;
        }).catch(function (err) {
        EasyBrok.notif.error($rootScope.error);
    });

    catalogo.catalogos($rootScope.catalogo.tipocompania)
        .then(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.listTipocompania = data.data.data;
        }).catch(function (err) {
        EasyBrok.notif.error($rootScope.error);
    });

    var data = {
        'seguridad': $rootScope.token
    };
    $http({
        method: 'POST',
        url: $rootScope.url + 'pais/get',
        data: data
    }).success(function (data, status) {
        EasyBrok.notificacion(data.status, data.mensaje);
        $scope.lisPaises = data.data.data;
    }).error(function () {
        EasyBrok.notif.error($rootScope.error);
    });
    $scope.mostar = false;
    if ($stateParams.idAseguradora !== null && $stateParams.idAseguradora !== undefined) {
        var data = {
            'idAseguradora': $stateParams.idAseguradora
        }
        aseguradora.listar(data)
            .then(function (data) {
                $('#int_tipoident1').attr('disabled', true);
                $('#strIdentificacion').attr('disabled', true);
                EasyBrok.notificacion(data.status, data.mensaje);
                var dato = data.data.data[0];
                $scope.intTipoDocumento = dato.tipoiden_id;
                $scope.strIdentificacion = dato.aseg_iden;
                $scope.old = dato.aseg_iden;
                $scope.intAseguradora = dato.idaseguradora_catalogo;
                $scope.srtNombreComercial = dato.aseg_nombrecomercial;
                $rootScope.contacto_id = dato.contacto_id;
                $scope.strPersonaContacto = (dato.contacto_nombre1 != null ? dato.contacto_nombre1 + ' ' : '') + (dato.contacto_nombre2 !== null ? dato.contacto_nombre2 + ' ' : '') + (dato.contacto_apellido1 != null ? dato.contacto_apellido1 + ' ' : '') + (dato.contacto_apellido2 !== null ? dato.contacto_apellido2 + ' ' : '');
                $rootScope.gerente_id = dato.gerente_id;
                $scope.strGerentegenearal = (dato.gerente_nombre1 != null ? dato.gerente_nombre1 + ' ' : '') + (dato.gerente_nombre2 !== null ? dato.gerente_nombre2 + ' ' : '') + (dato.gerente_apellido1 != null ? dato.gerente_apellido1 + ' ' : '') + (dato.gerente_apellido2 !== null ? dato.gerente_apellido2 + ' ' : '');
                $scope.datAniversario = dato.aseg_aniversario;
                $scope.strCorreoElectronico = dato.aseg_correoeletronico;
                $scope.strPaginaWeb = dato.aseg_paginaweb;
                $scope.intTipoContribuyente = dato.tipocontribuyente_id;
                $scope.intPais = dato.pais_id;
                $scope.intGestionCobro = dato.aseg_gestioncobro;
                $scope.intLiberacion = dato.aseg_liberacioncomi;
                $scope.intCuota = dato.aseg_cuota;
                $scope.intTipoCompania = (dato.aseg_tipocompania != null)?dato.aseg_tipocompania:'';
                $scope.mostar = true;
                if ($scope.intLiberacion == $scope.cuotas) {
                    $('#cuota_id').show();
                } else {
                    $('#cuota_id').hide();
                }

            }).catch(function (err) {
            EasyBrok.notif.error($rootScope.error);
        });
    } else {
        $rootScope.gerente_id = null;
        $rootScope.contacto_id = null;
        $scope.intTipoDocumento = $rootScope.EasyBrok.defecto.tipoIdentificacion;
        $scope.intPais = $rootScope.EasyBrok.defecto.pais;
        $scope.mostar = true;
    }
    $scope.comprarIdentificacionesEnter = function (e) {
        var charCode = e.keyCode || e.which;
        if (charCode === 13 || charCode === 9) {
            $scope.comprarIdentificaciones();
        }

    }
    $scope.comprarIdentificaciones = function () {

        if (EasyBrok.check_identificacion($rootScope.EasyBrok.identificacion.ruc, $scope.strIdentificacion)) {
            if ($scope.old !== $scope.strIdentificacion) {
                var data = {
                    'pers_numeroidentificacion': $scope.strIdentificacion
                }
                $scope.old = $scope.strIdentificacion;
                aseguradora.listar(data)
                    .then(function (data) {
                        if (data.data.data[0] !== undefined && data.data.data[0] !== null) {
                            $state.go('aseguradora.form', {idAseguradora: data.data.data[0].aseg_id});
                        }
                    }).catch(function (err) {
                    EasyBrok.notif.error($rootScope.error);
                });
            }
        }
    }


    $scope.guardar = function () {

        if (!EasyBrok.check_identificacion($scope.intTipoDocumento, $scope.strIdentificacion)) {
            return false;
        }
        if (validar("aseguradora_broker") === false) {
            return false;
        }
        var fecha1 = $scope.datAniversario;
        var d1 = fecha1.substr(6, 4) + '/' + fecha1.substr(3, 2) + '/' + fecha1.substr(0, 2);
        var date1 = new Date(d1);
        var date2 = new Date();
        if (date1 > date2) {
            EasyBrok.notif.error("Campo Aniversario valor incorrecto");
            return false;
        }

        var cuota = null;
        if ($scope.intLiberacion == $scope.cuotas) {
            cuota = $scope.intCuota;
            if ($scope.intCuota == null || $scope.intCuota == undefined || $scope.intCuota == '') {
                EasyBrok.notif.error('Se debe registrar el campo Cuota');
                return false;
            }

        } else {
            cuota = null
        }

        var _data = {
            'intTipoIdentificacion': $scope.intTipoDocumento,
            'intAseguradora': $scope.intAseguradora,
            'strIdentificador': $scope.strIdentificacion,
            'srtNombreComercial': $scope.srtNombreComercial,
            'srtNombreCorto': $scope.srtNombreCorto,
            'intGerentegenearal': $rootScope.gerente_id,
            'intPersonaContacto': $rootScope.contacto_id,
            'strCorreoElectronico': $scope.strCorreoElectronico,
            'strPaginaWeb': $scope.strPaginaWeb,
            'datAniversario': $scope.datAniversario,
            'intPais': $scope.intPais,
            'intTipoContribuyente': $scope.intTipoContribuyente,
            'idBroker': $rootScope.broker,
            'idAseguradora': $stateParams.idAseguradora,
            'intGestionCobro': $scope.intGestionCobro,
            'intLiberacionComision': $scope.intLiberacion,
            'intCuota': cuota,
            'intTipoCompanias': $scope.intTipoCompania,
        };
        var data = {
            'seguridad': $rootScope.token,
            'data': _data
        };
        if ($stateParams.idAseguradora !== null && $stateParams.idAseguradora !== undefined) {
            aseguradora.update(_data).then(function (data) {
                $rootScope.guardar_imagen($stateParams.idAseguradora, 'aseguradora');
            }).catch(function (err) {
                EasyBrok.notif.error($rootScope.error);
            });
        }
        else {
            aseguradora.add(_data).then(function (data) {
                $rootScope.guardar_imagen(data.id, 'aseguradora');
                $rootScope.idPersona = data.id;
                $stateParams.idAseguradora = data.id;
                $scope.idAseguradora = data.id;

            }).catch(function (err) {
                EasyBrok.notif.error($rootScope.error);
            });
        }
    };

    $scope.cambio_cont_gerente = false;
    $scope.cambio_cont_contacto = false;

    $scope.cambiar_persona = function (tipo) {
        if (tipo == 1) {
            $scope.cambio_cont_gerente = true;
            $rootScope.strGerentegenearal = null;
        } else if (tipo == 2) {
            $scope.cambio_cont_contacto = true;
            $rootScope.contacto_id = null;
        }
    };
    $scope.buscar_cabio = function (tipo) {
        if ($scope.tab) {
            $scope.tab = false;
            return;
        } else {
            if (tipo == 1 && $scope.cambio_cont_gerente) {
                $scope.buscarContacto(tipo);

            }
            if (tipo == 2 && $scope.cambio_cont_contacto) {
                $scope.buscarContacto(tipo);
            }
        }

    };
    $scope.tab = false;
    $scope.buscarEnter = function (e, tipo) {
        var charCode = e.keyCode || e.which;
        if (charCode === 9) {
            $scope.tab = true;
            $scope.cambio_cont_gerente = false;
            $scope.cambio_cont_contacto = false;
            $rootScope.tipo = tipo;
            $scope.buscarContacto(tipo);
            return false;
        }
    };

    var buscar = true;
    $scope.buscarContacto = function (tipo) {
        if (!buscar) {
            return false;
        }
        buscar = false;
        $scope.tab = false;
        $rootScope.tipo = tipo;
        if (tipo === 1) {
            $scope.strContactoBuscar = $scope.strGerentegenearal;
            $scope.strGerentegenearal = null;
        }
        else if (tipo === 2) {
            $scope.strContactoBuscar = $scope.strPersonaContacto;
            $scope.strPersonaContacto = null;
        }
        if ($scope.strContactoBuscar !== undefined && $scope.strContactoBuscar !== null) {
            persona.loadCedula($scope.strContactoBuscar)
                .then(function (data) {
                    if (data !== undefined) {
                        buscar = true
                        if (tipo === 1) {
                            $rootScope.gerente_id = data.pers_id;
                            $scope.strGerentegenearal = data.pers_apellido1 + ' ' + (data.pers_apellido2 !== null ? data.pers_apellido2 + ' ' : '') + data.pers_nombre1 + ' ' + (data.pers_nombre2 !== null ? data.pers_nombre2 + ' ' : '');
                        }
                        else {
                            $scope.strPersonaContacto = data.pers_apellido1 + ' ' + (data.pers_apellido2 !== null ? data.pers_apellido2 + ' ' : '') + data.pers_nombre1 + ' ' + (data.pers_nombre2 !== null ? data.pers_nombre2 + ' ' : '');
                            $rootScope.contacto_id = data.pers_id;
                        }
                    }
                    else {
                        if (EasyBrok.check_cedula($scope.strContactoBuscar)) {
                            $rootScope.strCedulaPasaporte = $scope.strContactoBuscar;
                            persona.nuevo($scope.strContactoBuscar);
                        }
                        else {
                            persona.buscar();
                        }
                        buscar = true
                    }
                }).catch(function (err) {
                buscar = true
            });

        }
        else {
            persona.buscar();
            buscar = true
        }
    };
})
;
/*
 * *  Controlador para gestionar las cuentas de la aseguradora del aps.
 * *  dmj
 */

app.controller('AsegudaroraCuentas', function ($scope, $http, $state, $stateParams, $rootScope) {
    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }
    $scope.navContacto = function () {
        $state.go('aseguradora.contacto', {'idAseguradora': $stateParams.idAseguradora});
        return false;
    };

    if ($stateParams.idAseguradora == undefined || $stateParams.idAseguradora == null) {
        $state.go('aseguradora.listar');
    }
    $scope.navForm = function () {
        $state.go('aseguradora.form', {'idAseguradora': $stateParams.idAseguradora});
        return false;
    };
    $scope.navAgenciamiento = function () {
        $state.go('aseguradora.agenciamiento', {'idAseguradora': $stateParams.idAseguradora});
        return false;
    };
    $rootScope.idPersona = $stateParams.idAseguradora;

    // $rootScope.idPer
});

/*
 * *  Controlador para gestionar los contactos de la aseguradora desde el aps. .
 * *  dmj
 */
app.controller('AsegudaroraContacto', function ($scope, $http, $state, $stateParams, $rootScope, $modal, persona) {
    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }
    if ($stateParams.idAseguradora == null || $stateParams.idAseguradora == undefined) {
        $state.go('aseguradora.listar');
        return;
    }
    $scope.navCuentas = function () {
        $state.go('aseguradora.cuentas', {'idAseguradora': $stateParams.idAseguradora});
        return false;
    };
    $scope.navForm = function () {
        $state.go('aseguradora.form', {'idAseguradora': $stateParams.idAseguradora});
        return false;
    };
    $scope.navAgenciamiento = function () {
        $state.go('aseguradora.agenciamiento', {'idAseguradora': $stateParams.idAseguradora});
        return false;
    };

    $rootScope.idPersona = $stateParams.idAseguradora;

    $scope.nuevo_contacto = function () {
        persona.buscar();
    };

    $scope.nuevo_contactoGenerico = function () {
       persona.contactoGenerico();
    };

    $scope.nuevo_contactoVanguardia = function (agencia_id) {
        $rootScope.nuevoContactoVanguardiaModal = $modal.open({
            templateUrl: 'common/contacto_nuevo_vanguardia.php',
            controller: 'contactosVanguardiaController',
            resolve: {
                aseg_id: function () {
                    return $stateParams.idAseguradora;
                },
                agen_id: function () {
                    return agencia_id;
                },
                id: function () {
                    return null;
                }
            }
        });
     };

    $scope.editar_contactoVanguardia = function (ejecutivo_id) {
        $rootScope.nuevoContactoVanguardiaModal = $modal.open({
            templateUrl: 'common/contacto_nuevo_vanguardia.php',
            controller: 'contactosVanguardiaController',
            resolve: {
                aseg_id: function () {
                    return null;
                },
                agen_id: function () {
                    return null;
                },
                id: function () {
                    return ejecutivo_id;
                }
            }
        });
    };

    $scope.listar = function (tipo) {
        var data = {
            'seguridad': $rootScope.token,
            'tipo':tipo,
            'where': {
                'idAseguradora': $rootScope.idPersona,

            }
        };
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'actor/listarcontactos',
            data: data
        }).success(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje);
            EasyBrok.desbloquear();
            $rootScope.contactosAseglist = data.data.data;
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    }
    if($rootScope.broker == $rootScope.brokervanguardia){
        $scope.listar(2);
    } else{
        $scope.listar(1);
    }
    $scope.ver = function (p) {
        $rootScope.idContacto = p.cont_id;
        $rootScope.idPersona = $stateParams.idAseguradora;
        $rootScope.modalInstance = $modal.open({
            templateUrl: 'common/contacto_general_info.php'
        });
    };
    $scope.deleteContacto = function (contacto) {
        $('.eliminar').hide(0);
        $('#co_' + contacto.cont_id).toggle(100);
    };
    $scope.deleteContactoProceso = function (proceso) {
        $('.eliminar').hide(0);
        $('#co_' + proceso).toggle(100);
    };
    $scope.cancelarEliminar = function (contacto) {
        $('.eliminar').hide(0);
        $('#co_' + contacto.cont_id).fadeOut(100);
    };

    $scope.cancelarEliminarProceso = function (proceso) {
        $('.eliminar').hide(0);
        $('#co_' + proceso).fadeOut(100);
    };

    $scope.deleteContactoVanguardia = function (id) {
        $('.eliminar').hide(0);
        $('#cont_' + id).toggle(100);
    };
    $scope.cancelarEliminarVanguardia = function (id) {
        $('.eliminar').hide(0);
        $('#cont_' + id).fadeOut(100);
    };

    $scope.eliminarContactoBroker = function (contacto) {
        var data = {
            'seguridad': $rootScope.token,
            'data': {'intId': contacto.cont_id}
        };
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'actor/deletecontacto',
            data: data
        }).success(function (data, status) {
            EasyBrok.notificacion(data.status, data.mensaje);
            if($rootScope.broker == $rootScope.brokervanguardia){
                $scope.listar(2);
            } else{
                $scope.listar(1);
            }
            EasyBrok.desbloquear();
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };

    $scope.selectProcesos = function (contacto) {
        $rootScope.contactoproceso = $modal.open({
            templateUrl: '00-entorno/aseguradora/aseguradora_proceso.php',
            controller: 'contactoProceso',
            resolve: {
                contacto: function () {
                    return contacto.cont_id;
                },
                procesos: function () {
                    return contacto.procesos;
                }
            }
        });
        $rootScope.contactoproceso.result.then(function (params) {
            if (params.guardar === false)
            {
                if($rootScope.broker == $rootScope.brokervanguardia){
                    $scope.listar(2);
                }else{
                    $scope.listar(1);
                }
            }
        });
    };

    $scope.eliminarProceso = function (par) {
        var data = {
            'seguridad': $rootScope.token,
            'data': {'intId': par}
        };
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'actor/deleteprocesocontacto',
            data: data
        }).success(function (data, status) {
            EasyBrok.notificacion(data.status, data.mensaje);
            if($rootScope.broker == $rootScope.brokervanguardia){
                $scope.listar(2);
            }else{
                $scope.listar(1);
            }
            EasyBrok.desbloquear();
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };

    $scope.exportarEjecutivos = function () {
        var data = {
            seguridad: $rootScope.token,
            'data': {
                'aseg_id': $rootScope.idPersona,
            }
        };
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'actor/exportarejecutivosaseguradora',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            window.open($rootScope.url+'xlsx/'+data.data);
        }).error(function (data) {
            EasyBrok.notificacion(data.status, data.mensaje)
            EasyBrok.desbloquear();
        });
    }


});

/*
 * *  Controlador para gestionar los contraros de agenciamiento
 * *  dmj
 */

app.controller('AsegudaroraAgenciamiento', function ($scope, $http, $state, $stateParams, $rootScope, $modal) {
        if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
            logaut();
            return false;
        }
        $scope.navContacto = function () {
            $state.go('aseguradora.contacto', {'idAseguradora': $stateParams.idAseguradora});
            return false;
        };

        $scope.navCuentas = function () {
            $state.go('aseguradora.cuentas', {'idAseguradora': $stateParams.idAseguradora});
            return false;
        };
        $scope.navForm = function () {
            $state.go('aseguradora.form', {'idAseguradora': $stateParams.idAseguradora});
            return false;
        };

        if ($stateParams.idAseguradora == undefined || $stateParams.idAseguradora == null) {
            $state.go('aseguradora.listar');
            return false;
        }
        $scope.estado = 1;

        $scope.listarAgenciamientos = function () {
            EasyBrok.bloquear();
            $rootScope.idContrato = null;
            var data = {
                'seguridad': $rootScope.token,
                'data': {
                    'aseg_id': $stateParams.idAseguradora,
                    'brok_id': $rootScope.broker,
                    'cont_id': $scope.idContrato,
                    'estado': $scope.estado
                }
            };
            $rootScope.listaPorcentaje = null;
            $rootScope.listaAgenciamiento = null;
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/getagenciamientos',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                $rootScope.listaAgenciamiento = data.data;
                try {
                    if ($rootScope.listaAgenciamiento.length > 0) {
                        $rootScope.listaPorcentaje = $rootScope.listaAgenciamiento[0].contrato;
                        $rootScope.idContrato = $rootScope.listaAgenciamiento[0].cont_id;
                        $rootScope.fechaResolucion = $rootScope.listaAgenciamiento[0].cont_fecharesolucion;
                    }
                }
                catch (e) {

                }
            }).error(function (err) {
                EasyBrok.desbloquear();
                EasyBrok.notif.error($rootScope.error);
            });
        }
        $scope.listarAgenciamientos();

//*porcentajes

        $scope.nuevoPorcentaje = function () {
            $rootScope.porcenteje = null;
            if ($scope.estado != 1) {
                EasyBrok.notif.error("Acción incorrecta");
                return false;
            }
            if ($rootScope.idContrato == null || $rootScope.idContrato == undefined) {
                EasyBrok.notif.error("Seleccione un contrato");
                return false;
            }

            $rootScope.nuevaAgenciamiento = $modal.open({
                templateUrl: '00-entorno/aseguradora/porcentajeramo_form.php'
            });

        }
        ;
        $scope.verPorcentaje = function (por) {
            $rootScope.porcenteje = por;
            $rootScope.nuevaAgenciamiento = $modal.open({
                templateUrl: '00-entorno/aseguradora/porcentajeramo_ver.php'
            });

        };
        $scope.updatePorcentaje = function (por) {
            $rootScope.porcenteje = por;
            $rootScope.nuevaAgenciamiento = $modal.open({
                templateUrl: '00-entorno/aseguradora/porcentajeramo_form.php'
            });

        };
        $scope.cancelarEliminar = function () {
            $(".eliminar").hide();
        }
        $scope.eliminar = function (par) {
            $(".eliminar").hide();
            $('#con_' + par.cont_id).toggle(100);
        }
        $scope.eliminarPorcentaje = function (por) {
            $(".eliminar").hide();
            $('#por_' + por.cont_ramo_id).toggle(100);
        }

        $scope.eliminarPorcentajeRamo = function (con) {
            var data = {
                'seguridad': $rootScope.token,
                'data': {
                    'cont_ramo_id': con.cont_ramo_id
                }
            };
            EasyBrok.bloquear();
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/deleteporcentajeramo',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                $rootScope.listaPorcentaje.splice($rootScope.listaPorcentaje.indexOf(con), 1);
            }).error(function (err) {
                EasyBrok.desbloquear();
                EasyBrok.notif.error($rootScope.error);
            });
        }
//**porcentaje


        // activa contrato
        $scope.activar_contrato = function (con) {
            var data = {
                'seguridad': $rootScope.token,
                'data': {
                    'cont_id': con.cont_id,
                    estado: 0,
                    aseg_id: $stateParams.idAseguradora
                }
            };
            EasyBrok.bloquear();
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/deleteagenciamientos',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                if (data.status === 201) {
                    $scope.listarAgenciamientos();
                }
                $scope.cancelarEliminar()
            }).error(function (err) {
                EasyBrok.desbloquear();
                $scope.cancelarEliminar()
                EasyBrok.notif.error($rootScope.error);
            });
        }

        $scope.nuevoAgenciamiento = function () {
            if ($scope.estado != 1) {
                EasyBrok.notif.error("Acci�n incorrecta");
                return false;
            }
            $rootScope.Agenciamiento = null;
            $rootScope.idAseguradora = $stateParams.idAseguradora;
            $rootScope.nuevaAgenciamiento = $modal.open({
                templateUrl: '00-entorno/aseguradora/agenciamiento_form.php'
            });

        };
        $scope.updateAgenciamiento = function (agen) {
            $rootScope.Agenciamiento = agen;
            $rootScope.idAseguradora = $stateParams.idAseguradora;
            $rootScope.nuevaAgenciamiento = $modal.open({
                templateUrl: '00-entorno/aseguradora/agenciamiento_form.php'
            });


        };
        $scope.infoAgenciamiento = function (agen) {
            $rootScope.Agenciamiento = agen;
            $rootScope.idAseguradora = $stateParams.idAseguradora;
            $rootScope.nuevaAgenciamiento = $modal.open({
                templateUrl: '00-entorno/aseguradora/agenciamiento_ver.php'
            });

        };
        $scope.cerrar = function () {
            $rootScope.nuevaAgenciamiento.close();
        };

    }
);
/*
 * *  Controlador para crear un nuevo contraro de agenciamiento
 * *  dmj
 */

app.controller('nuevaAsegudaroraAgenciamiento', function ($scope, $http, $state, $stateParams, $rootScope, $modal) {

    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }

    $scope.cerrar = function () {
        $rootScope.nuevaAgenciamiento.close();
    };

    $scope.listarAgenciamientos = function () {
        EasyBrok.bloquear();
        $rootScope.idContrato = null;
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'aseg_id': $stateParams.idAseguradora,
                'brok_id': $rootScope.broker,
                'cont_id': $scope.idContrato,
                'estado': 1
            }
        };
        $rootScope.listaPorcentaje = null;
        $rootScope.listaAgenciamiento = null;
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/getagenciamientos',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            $rootScope.listaAgenciamiento = data.data;
            try {
                if ($rootScope.listaAgenciamiento.length > 0) {
                    $rootScope.listaPorcentaje = $rootScope.listaAgenciamiento[0].contrato;
                    $rootScope.idContrato = $rootScope.listaAgenciamiento[0].cont_id;
                }
            }
            catch (e) {

            }
        }).error(function (err) {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    }
    var ultContrato = null;
    $scope.listarAgenciamientosExiste = function () {
        EasyBrok.bloquear();
        $rootScope.idContrato = null;
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'aseg_id': $stateParams.idAseguradora,
                'brok_id': $rootScope.broker,
                'cont_id': $scope.idContrato,
                'estado': 0
            }
        };
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/getagenciamientos',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.listaExiste = data.data;
            try {
                //  $scope.datResolucion = $scope.listaExiste[0].cont_fecharesolucion;
                $scope.ultContrato = $scope.listaExiste[0].cont_fechacancelacion;
            } catch (e) {
            }
        }).error(function (err) {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    }


    $scope.cargarAgenciamiento = function () {
        $scope.numeroTramite = $rootScope.Agenciamiento.cont_numerotramite;
        $scope.datFechaIngreso = $rootScope.Agenciamiento.cont_fechaingreso;
        $scope.numeroDocumento = $rootScope.Agenciamiento.cont_numerodocumento;
        $scope.datFechaDocumento = $rootScope.Agenciamiento.cont_fechadocumento;
        $scope.resolucion = $rootScope.Agenciamiento.cont_numeroresolucion;
        $scope.datResolucion = $rootScope.Agenciamiento.cont_fecharesolucion;
        $scope.cont_id = $rootScope.Agenciamiento.cont_id;
        $scope.datCancelacion = $rootScope.Agenciamiento.cont_fechacancelacion;
    }
    if ($rootScope.Agenciamiento !== undefined && $rootScope.Agenciamiento !== null) {
        $scope.cargarAgenciamiento();
        $rootScope.Agenciamiento = null;
    } else {
        $scope.listarAgenciamientosExiste();
    }

    $scope.addAgenciamiento = function () {
        if (validar('idAgenciamiento1') === false)
            return false;
        var date = new Date();
        var fecha2 = $scope.datResolucion;
        var d2 = fecha2.substr(6, 4) + '/' + fecha2.substr(3, 2) + '/' + fecha2.substr(0, 2);
        var f2 = new Date(d2);

        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'cont_id': $scope.cont_id,
                'brok_id': $rootScope.broker,
                'aseg_id': $rootScope.idAseguradora,
                'numeroTramite': $scope.numeroTramite,
                'fechaIngreso': $scope.datFechaIngreso,
                'numeroDocumento': $scope.numeroDocumento,
                'fechaDocumento': $scope.datFechaDocumento,
                'resolucion': $scope.resolucion,
                'fechaResolucion': $scope.datResolucion,
                fechaCancelacion: $scope.datCancelacion
            }
        };

        if ($scope.cont_id !== undefined && $scope.cont_id !== null) {

            if ($scope.datCancelacion != undefined && $scope.datCancelacion != null) {
                var fecha3 = $scope.datCancelacion;
                var d3 = fecha3.substr(6, 4) + '/' + fecha3.substr(3, 2) + '/' + fecha3.substr(0, 2);
                var f3 = new Date(d3);
                if (f2 >= f3) {
                    EasyBrok.notif.error("La Fecha de Cancelación debe ser mayor a la Fecha de Resulución");
                    return;
                }
            }
            EasyBrok.bloquear();
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/putagenciamientos',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                $rootScope.listaAgenciamiento = null;
                $rootScope.listaAgenciamiento = data.data;
                $scope.listarAgenciamientos();
                if (data.status == 201) {
                    $scope.cerrar();
                }

            }).error(function (err) {
                EasyBrok.desbloquear();
                EasyBrok.notif.error($rootScope.error);
            });
        }
        else {
            if (f2 > date) {
                EasyBrok.notif.error("La Fecha de Resolución debe ser menor o igual a la Fecha actual");
                return;
            }
            if ($scope.ultContrato != null && $scope.ultContrato != undefined) {
                var ulc = $scope.ultContrato.substr(6, 4) + '/' + $scope.ultContrato.substr(3, 2) + '/' + $scope.ultContrato.substr(0, 2);
                var ulc1 = new Date(ulc);
                if (ulc1 > f2) {
                    EasyBrok.notif.error("La Fecha de Resolución debe ser mayor que la Fecha del contrato anterior");
                    return;
                }
            }
            EasyBrok.bloquear();
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/postagenciamientos',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                $rootScope.listaAgenciamiento = null;
                $rootScope.listaAgenciamiento = data.data;
                if (data.status == 201) {
                    $scope.listarAgenciamientos();
                    $scope.cerrar();
                }
            }).error(function (err) {
                EasyBrok.desbloquear();
                EasyBrok.notif.error($rootScope.error);
            });
        }
    }
});

/*
 * *  Controlador para calcular el porcentaje del los ramos asociados.
 * *  dmj
 */
app.controller('PorcentajeRamo', function ($scope, $http, $state,$stateParams, $rootScope, $modal, catalogo) {
    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }

    $scope.valores_comision = {};

    $scope.listarAgenciamientos = function () {
        EasyBrok.bloquear();
        $rootScope.idContrato = null;
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'aseg_id': $stateParams.idAseguradora,
                'brok_id': $rootScope.broker,
                'cont_id': $scope.idContrato,
                'estado': 1
            }
        };
        $rootScope.listaPorcentaje = null;
        $rootScope.listaAgenciamiento = null;
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/getagenciamientos',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            $rootScope.listaAgenciamiento = data.data;
            try {
                if ($rootScope.listaAgenciamiento.length > 0) {
                    $rootScope.listaPorcentaje = $rootScope.listaAgenciamiento[0].contrato;
                    $rootScope.idContrato = $rootScope.listaAgenciamiento[0].cont_id;
                }
            }
            catch (e) {

            }
        }).error(function (err) {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    }

    $scope.listarProcentajeRamo = function () {
        EasyBrok.bloquear();
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                agen_id: $rootScope.idContrato,
                ramo_id: $scope.valores_comision.ramo
            }
        };
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/getporcentajeramo',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            $rootScope.listaHistorico = data.data;
        }).error(function (err) {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    }


    $scope.cargar = function () {
        $scope.porc = $rootScope.porcenteje;
        $scope.strcomicion = $scope.porc.tipocontrato;
        $scope.strresolucion = $scope.porc.cont_numerodocumento;
        $scope.strramo = $scope.porc.ramo_nombre;
        $scope.valores_comision.fecha_aprobacion = $scope.porc.cont_ramo_fechaaprobacion;
        $scope.valores_comision.comision = $scope.porc.cont_ramo_valorcomision;
        $scope.valores_comision.comision_nuevo = $scope.porc.cont_ramo_porcentajenuevo;
        $scope.valores_comision.comision_renovacion = $scope.porc.cont_ramo_porcentajerenovacion;
        $scope.valores_comision.comision_nombramiento = $scope.porc.cont_ramo_porcentajenombramiento;
        $scope.valores_comision.comision_fee = $scope.porc.cont_ramo_porcentajefee;
        $scope.resolucion = $scope.porc.cont_id;
        $scope.valores_comision.ramo = $scope.porc.ramo_id;
        $scope.valores_comision.ramo_nombre = $scope.porc.ramo_nombre;
        $scope.valores_comision.tipo_contrato = $scope.porc.regi_tipocontratoagenciamiento_id;
        $scope.idPorcentaje = $scope.porc.cont_ramo_id;
        $scope.valores_comision.descripcion = $scope.porc.cont_descripcion;

    };

    if ($rootScope.porcenteje !== undefined && $rootScope.porcenteje !== null) {
        $scope.cargar();
        $scope.listarProcentajeRamo();
    }

    $scope.listaRamos = function () {
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                brok_id: $rootScope.broker,
                agen_id: $rootScope.idContrato
            }
        };
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/listramos',
            data: data
        }).success(function (data, status) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $rootScope.listaRamo = data.data;
        }).error(function () {
            EasyBrok.notif.error($rootScope.error);
        });

    };
    $scope.listaRamos();

    $scope.guardarPorncentajeRamo = function () {
        if (validar('idPorcentaje') === false) {
            return false;
        }
        if ($scope.valores_comision.comision > 100) {
            EasyBrok.notif.error('El valor ingresado debe estar en el rango de 0% a 100%');
            return false;
        }

        var da = new Date();

        var fecha2 = $scope.valores_comision.fecha_aprobacion;
        var d2 = fecha2.substr(6, 4) + '/' + fecha2.substr(3, 2) + '/' + fecha2.substr(0, 2);
        var f2 = new Date(d2);
        if (f2 > da) {
            EasyBrok.notif.error("La Fecha de Aprobación debe ser menor que la fecha actual");
            return;
        }
        $scope.valores_comision.fecha_aprobacion = d2;
        if ($rootScope.fechaResolucion != undefined && $rootScope.fechaResolucion != null) {
            var date = $rootScope.fechaResolucion;
            var d1 = date.substr(6, 4) + '/' + date.substr(3, 2) + '/' + date.substr(0, 2);
            var f1 = new Date(d1);

            if (f2 < f1) {
                EasyBrok.notif.error("La Fecha de Aprobación debe ser mayor o igual a la Fecha de Resolución del contrato");
                return;
            }
        }
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'cont_id': $rootScope.idContrato,
                'ramo_id': $scope.valores_comision.ramo,
                'cont_ramo_fechaaprobacion': $scope.valores_comision.fecha_aprobacion,
                'cont_ramo_valorcomision': $scope.valores_comision.comision,
                'cont_ramo_porcentajenuevo': $scope.valores_comision.comision_nuevo,
                'cont_ramo_porcentajerenovacion': $scope.valores_comision.comision_renovacion,
                'cont_ramo_porcentajenombramiento': $scope.valores_comision.comision_nombramiento,
                'cont_ramo_porcentajefee': $scope.valores_comision.comision_fee,
                'cont_ramo_id': $scope.idPorcentaje,
                'fechafin': $scope.valores_comision.fecha_fin,
                'descripcion': $scope.valores_comision.descripcion,
                'brok_id': $rootScope.broker
            }
        };
        if ($scope.idPorcentaje !== null && $scope.idPorcentaje !== undefined) {
            if($scope.valores_comision.fecha_fin == undefined || $scope.valores_comision.fecha_fin == ''){
                EasyBrok.notif.error("La Fecha Fin es requerida");
                return;
            }
            var fecha3 = $scope.valores_comision.fecha_fin;
            var d3 = fecha3.substr(6, 4) + '/' + fecha3.substr(3, 2) + '/' + fecha3.substr(0, 2);
            var f3 = new Date(d3);

            if (f3 < f2) {
                EasyBrok.notif.error("La Fecha Fin debe ser mayor o igual a la Fecha de Aprobación");
                return;
            }
            EasyBrok.bloquear();
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/putporcentajeramo',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                $scope.listarAgenciamientos();
                if (data.status == 201)
                    $scope.cerrar();
            }).error(function (err) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
            });
        }
        else {
            EasyBrok.bloquear();
            $http({
                method: 'POST',
                url: $rootScope.url + 'aseguradora/postporcentajeramo',
                data: data
            }).success(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
                $rootScope.listaPorcentaje = data.data;
                $scope.listarAgenciamientos();
                if (data.status == 201)
                    $scope.cerrar();
            }).error(function (data) {
                EasyBrok.desbloquear();
                EasyBrok.notificacion(data.status, data.mensaje);
            });
        }
    }
    $scope.cerrar = function () {
        $rootScope.nuevaAgenciamiento.close();
    };

});

/*
 * *  Controlador para visualizar las aseguradoras
 * *  dmj
 */
app.controller('AseguradoraVer', function ($scope, $http, $state, $rootScope, aseguradora, cuentas) {
    if ($rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_LISTAR) == false && $rootScope.getPermiso($rootScope.PERMISOS.ASEGURADORA_GESTIONAR) == false) {
        logaut();
        return false;
    }
    $scope.cerrar = function () {
        $rootScope.nuevaAgenciamiento.close();
    }
    $scope.cargarAseguradora = function () {
        var data = {
            'idAseguradora': $rootScope.idAseguradora
        };
        aseguradora.listar(data).then(function (data) {
            var aseg = data.data.data[0];
            $scope.strIdentificacion = aseg.aseg_iden;
            $scope.strRazonsocial = aseg.razon_social;
            $scope.srtNombreComercial = aseg.aseg_nombrecomercial;
            $scope.strRepresentante = aseg.gerente_apellido1 + " " + aseg.gerente_nombre1;
            $scope.srtContadorGeneral = ((aseg.contacto_apellido1 != null) ? aseg.contacto_apellido1 : '') + " " + ((aseg.contacto_nombre1 != null) ? aseg.contacto_nombre1 : '');
            $scope.strAniversario = aseg.aseg_aniversario;
            $scope.strCorreo = aseg.aseg_correoeletronico;
            $scope.strPaginaWeb = aseg.aseg_paginaweb;
            $scope.tipoContribuyente = aseg.tipocontribuyene_nombre;
            $scope.strPais = aseg.pais;
            $scope.strRepresentante = ((aseg.gerente_apellido1 != null) ? aseg.gerente_apellido1 : '') + " " + ((aseg.gerente_nombre1 != null) ? aseg.gerente_nombre1 : '');
        }).catch(function (err) {
            EasyBrok.notif.error($rootScope.error);
        });

        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'pers_id': $rootScope.idAseguradora,
            }
        }
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'agencia/buscaragencias',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            if (data.data[0] != undefined) {
                $scope.agencia = data.data[0];
                $scope.contacto = (($scope.agencia.pers_apellido1 != null) ? $scope.agencia.pers_apellido1 : '') + ' ' + (($scope.agencia.pers_nombre1 != null) ? $scope.agencia.pers_nombre1 : '');
            }

        }).error(function (err) {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
        var data = {'pers_id': $rootScope.idAseguradora};
        cuentas.listar(data).then(function (data) {
            $scope.cuentas = data.data.data;
        }).catch(function (er) {
            EasyBrok.notif.error($rootScope.error);
        })

        var data = {
            'seguridad': $rootScope.token,
            'where': {
                'idAseguradora': $rootScope.idAseguradora
            }
        };
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'actor/listarcontactos',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            $scope.contactos = data.data.data;
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    }
    $scope.cargarAseguradora();
});

/*
 * *  Controlador para generar los reportes de la aseguradora
 * *  dmj
 */
app.controller('AseguradoraReporte', function ($scope, $http, $state, $rootScope, $modal) {
    $scope.cerrar = function () {
        $rootScope.aseguradora_reporte.close();
    }

    var select = {};
    select.tidentificacion = true;
    select.tipo_contribuyente = true;
    select.identificacion = true;
    select.pais = true;
    select.razon_social = true;
    select.nombre_comercial = true;
    select.representante_legal = true;
    select.contador_general = true;
    select.aniversario = true;
    select.correo_electonico = true;
    select.pagina_web = true;
    select.tipo_compania = true;


    $scope.iden = function (event) {
        var a = event.currentTarget.id;
        switch (a) {
            case 'tidentificacion':
                select.tidentificacion = !select.tidentificacion;
                select.tidentificacion ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'tipo_contribuyente':
                select.tipo_contribuyente = !select.tipo_contribuyente;
                select.tipo_contribuyente ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'identificacion':
                select.identificacion = !select.identificacion;
                select.identificacion ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'pais':
                select.pais = !select.pais;
                select.pais ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'razon_social':
                select.razon_social = !select.razon_social;
                select.razon_social ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'nombre_comercial':
                select.nombre_comercial = !select.nombre_comercial;
                select.nombre_comercial ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'representante_legal':
                select.representante_legal = !select.representante_legal;
                select.representante_legal ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'contador_general':
                select.contador_general = !select.contador_general;
                select.contador_general ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'aniversario':
                select.aniversario = !select.aniversario;
                select.aniversario ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'correo_electonico':
                select.correo_electonico = !select.correo_electonico;
                select.correo_electonico ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'pagina_web':
                select.pagina_web = !select.pagina_web;
                select.pagina_web ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
            case 'tipo_compania':
                select.tipo_compania = !select.tipo_compania;
                select.tipo_compania ? $("#" + a).addClass('checked') : $("#" + a).removeClass('checked');
                break;
        }

    };

    var data = {
        'seguridad': $rootScope.token,
        'data': select,
        'where': {
            'buscar': $rootScope.buscarAseguradora,
            'brok_id': $rootScope.broker
        },
    };

    $scope.exportExcelGeneral = function () {
        EasyBrok.bloquear();
        data.tipo = 'xls';
        $http({
            method: 'POST',
            url: $rootScope.url + 'reporte/aseguradoraexel',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            if (data.status == 200) {
                window.open($rootScope.url + 'reportes/xls/' + data.nombre + '.xls');
            }
            $scope.cerrar();
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };
    $scope.exportCsvGeneral = function () {
        EasyBrok.bloquear();
        data.tipo = 'csv';
        $http({
            method: 'POST',
            url: $rootScope.url + 'reporte/aseguradoraexel',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            if (data.status == 200) {
                window.open($rootScope.url + 'reportes/csv/' + data.nombre + '.csv');
            }
            $scope.cerrar();
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };
    $scope.exportPdfGeneral = function () {
        EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'reporte/aseguradorapdf',
            data: data
        }).success(function (data) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            if (data.status == 200) {
                $rootScope.url_descarga = $rootScope.url +'reportes/pdf/'+ data.nombre;
                $rootScope.descarga_tipo = 'application/pdf';
                $rootScope.documento_info = $modal.open({
                    templateUrl: 'common/descargar_doc.php'
                });
                //window.open($rootScope.url + data.nombre);
            }
            $scope.cerrar();
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };

});

app.controller('contactoProceso', function ($scope, $http, $state, $rootScope, contacto, procesos) {
      $scope.procesoContacto = function () {
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'brok_id': $rootScope.broker,
                'contacto_id' : contacto,
                'proceso_id': procesos,
            }
        };
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/getproceso',
            data: data
        }).success(function (data, status) {
            EasyBrok.notificacion(data.status, data.mensaje);
            $rootScope.listaModulos = data.data;
        }).error(function () {
            EasyBrok.notif.error($rootScope.error);
        });
    };

        $scope.procesoContacto();

    $scope.ma_todo = false;
    $scope.marcarTodos = function () {
        $scope.ma_todo = !$scope.ma_todo;
        $.each($rootScope.listaModulos, function (i, data) {
            data.marca = $scope.ma_todo;
        });
    }

    $('#idBuscarProceso').keypress(function (e) {
    });
    $scope.buscar_proceso = function () {
        $rootScope.listaModulos = null;
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'brok_id': $rootScope.broker,
                'contacto_id' : contacto,
                'buscar': $scope.buscar
            }
        };
        /// EasyBrok.bloquear();
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/getproceso',
            data: data
        }).success(function (data, status) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            $rootScope.listaModulos = data.data;
        }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };
    $scope.modProducto = function (p) {
        try {
            p.marca == 1 ? p.marca = 0 : p.marca = 1;
        } catch (e) {

        }
    };
    $scope.cerrar = function () {
        $rootScope.contactoproceso.close({'guardar':false});
    };
    $scope.guardarProceso = function () {
            $scope.listaprocesos=[];
            $scope.listaprocesos = $scope.listaModulos.filter(item => item.marca == 1)
                .map(item => item.modu_id);
        var data = {
            'seguridad': $rootScope.token,
            'data': {
                'idBroker': $rootScope.broker,
                'listaProcesos': $scope.listaprocesos,
                'contacto': contacto,
                'usuario' : $rootScope.idPersona,
            }
        };
        $http({
            method: 'POST',
            url: $rootScope.url + 'aseguradora/insertprocesocontacto',
            data: data
        }).success(function (data, status) {
            EasyBrok.desbloquear();
            EasyBrok.notificacion(data.status, data.mensaje);
            if (data.status == 201){
                $scope.cerrar();
            }
         }).error(function () {
            EasyBrok.desbloquear();
            EasyBrok.notif.error($rootScope.error);
        });
    };
});
