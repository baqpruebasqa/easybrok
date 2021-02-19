<?php include '../../common/main.php'; ?>

<div ng-hide="$state.current.name== 'aseguradora.listar' ? false: true"
     class="menu-generico" style="cursor: default">
   <span ui-sref="aseguradora.form({idAseguradora:null})" style="cursor: pointer">
    <i class="fa fa-plus"></i>
       <?php texto('NUEVO') ?>
       </span>
</div>
<div ng-hide="$state.current.name!='aseguradora.listar'? false: true" class="menu-generico"
     style="cursor: default">
    <span ui-sref="aseguradora.listar" style="cursor: pointer">
    <i class="fa fa-plus"></i>
        <?php texto('LISTAR') ?>
    </span>

</div>
<div style="height: 10px"></div>