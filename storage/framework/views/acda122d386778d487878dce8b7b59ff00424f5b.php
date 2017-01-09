<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.search')); ?>..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <li class="active"><a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span><?php echo e(trans('adminlte_lang::message.home')); ?></span></a></li>
            
            <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart'></i><span><?php echo e(trans('adminlte_lang::message.menu17')); ?></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/misestadisticas"><?php echo e(Config::get('constants.areas.0')); ?></a></li>
                    <li><a href="/misestadisticascentralizacion"><?php echo e(Config::get('constants.areas.1')); ?></a></li>
                    <li><a href="/misestadisticasdigitacion"><?php echo e(Config::get('constants.areas.2')); ?></a></li>
                </ul>
                </li>
            
            <!-- MENU INSTALACIONES-->
            <li class="header"><i class='fa fa-user-plus'></i> - <?php echo e(trans('adminlte_lang::message.titulomenu1')); ?></li>
            <!-- SUBMENU Coordinacion-->
            <li class="active">
                <a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.INSTALACION')); ?>/<?php echo e(Config::get('constants.areasnumero.COORDINACION')); ?>"><i class='fa fa-user-plus'></i><i class='fa fa-phone'></i> <span><?php echo e(trans('adminlte_lang::message.menu2')); ?></span></a>
                
            </li>

            <!-- SUBMENU Centralizacion-->
            <li class="active">
                <a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.INSTALACION')); ?>/<?php echo e(Config::get('constants.areasnumero.CENTRALIZACION')); ?>"><i class='fa fa-user-plus'></i><i class='fa fa-tachometer'></i> <span><?php echo e(trans('adminlte_lang::message.menu3')); ?></span></a>
                
            </li>

            <!-- SUBMENU Digitacion-->
            <li class="active">
                <a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.INSTALACION')); ?>/<?php echo e(Config::get('constants.areasnumero.DIGITACION')); ?>"><i class='fa fa-user-plus'></i><i class='fa fa-keyboard-o'></i> <span><?php echo e(trans('adminlte_lang::message.menu4')); ?></span></a>
            </li>

            <!-- MENU RETIROS-->
            <li class="header"><i class='fa fa-user-times'></i> - <?php echo e(trans('adminlte_lang::message.titulomenu2')); ?></li>
            <!-- SUBMENU Coordinacion-->
            <li class="treeview">
                <a href="#"><i class='fa fa-user-times'></i><i class='fa fa fa-phone'></i> <span><?php echo e(trans('adminlte_lang::message.menu5')); ?></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.RETIROS_SOLICITADOS')); ?>/<?php echo e(Config::get('constants.areasnumero.COORDINACION')); ?>"><?php echo e(Config::get('constants.tipotrabajo.200')); ?></a></li>
                    <li><a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.RETIROS_GENERADOS')); ?>/<?php echo e(Config::get('constants.areasnumero.COORDINACION')); ?>"><?php echo e(Config::get('constants.tipotrabajo.400')); ?></a></li>
                </ul>
            </li>

            <!-- SUBMENU Centralizacion-->
            <li class="treeview">
                <a href="#"><i class='fa fa-user-times'></i><i class='fa fa-tachometer'></i> <span><?php echo e(trans('adminlte_lang::message.menu6')); ?></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.RETIROS_SOLICITADOS')); ?>/<?php echo e(Config::get('constants.areasnumero.CENTRALIZACION')); ?>"><?php echo e(Config::get('constants.tipotrabajo.200')); ?></a></li>
                    <li><a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.RETIROS_GENERADOS')); ?>/<?php echo e(Config::get('constants.areasnumero.CENTRALIZACION')); ?>"><?php echo e(Config::get('constants.tipotrabajo.400')); ?></a></li>
                </ul>
            </li>

            <!-- SUBMENU Digitacion-->
            <li class="treeview">
                <a href="#"><i class='fa fa-user-times'></i><i class='fa fa-keyboard-o'></i> <span><?php echo e(trans('adminlte_lang::message.menu7')); ?></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.RETIROS_SOLICITADOS')); ?>/<?php echo e(Config::get('constants.areasnumero.DIGITACION')); ?>"><?php echo e(Config::get('constants.tipotrabajo.200')); ?></a></li>
                    <li><a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.RETIROS_GENERADOS')); ?>/<?php echo e(Config::get('constants.areasnumero.DIGITACION')); ?>"><?php echo e(Config::get('constants.tipotrabajo.400')); ?></a></li>
                </ul>
            </li>
            
            <!-- MENU ASISTENCIAS-->
            <li class="header"><i class='fa fa-ambulance'></i> - <?php echo e(trans('adminlte_lang::message.titulomenu3')); ?></li>
            <!-- SUBMENU Coordinacion-->
            <li class="active">
                <a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.ASISTENCIAS')); ?>/<?php echo e(Config::get('constants.areasnumero.COORDINACION')); ?>"><i class='fa fa-ambulance'></i><i class='fa fa fa-phone'></i> <span><?php echo e(trans('adminlte_lang::message.menu8')); ?></span></a>
            </li>

            <!-- SUBMENU Centralizacion-->
            <li class="active">
                <a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.ASISTENCIAS')); ?>/<?php echo e(Config::get('constants.areasnumero.CENTRALIZACION')); ?>"><i class='fa fa-ambulance'></i><i class='fa fa-tachometer'></i> <span><?php echo e(trans('adminlte_lang::message.menu9')); ?></span></a>
            </li>

            <!-- SUBMENU Digitacion-->
            <li class="active">
                <a href="/trabajos/<?php echo e(Config::get('constants.tipotrabajonumero.ASISTENCIAS')); ?>/<?php echo e(Config::get('constants.areasnumero.DIGITACION')); ?>"><i class='fa fa-ambulance'></i><i class='fa fa-keyboard-o'></i> <span><?php echo e(trans('adminlte_lang::message.menu10')); ?></span></a>
            </li>
            <!--  Menu Reportes -->
            <li class="header"><?php echo e(trans('adminlte_lang::message.titulomenu5')); ?></li>

                <li><a href="/reportes/cerrados"><i class='fa fa-file-text-o'></i> <span><?php echo e(trans('adminlte_lang::message.menu13')); ?></span></a></li>
                <li><a href="/producciongeneralgrafico"><i class='fa fa-bar-chart'></i> <span><?php echo e(trans('adminlte_lang::message.menu19')); ?></span></a></li>
                <li><a href="#"><i class='fa  fa-check-square-o'></i> <span><?php echo e(trans('adminlte_lang::message.menu14')); ?></span></a></li>

            <!--  Menu CONFIGURACION -->
            <li class="header"><?php echo e(trans('adminlte_lang::message.titulomenu4')); ?></li>

            <?php if(Auth::user()->estado== 0 and Auth::user()->tipo== 'ADMIN'): ?>
           
                <li><a href="#"><i class='fa fa-wrench'></i> <span><?php echo e(trans('adminlte_lang::message.menu1')); ?></span></a></li>
                
                <li class="treeview">
                <a href="#"><i class='fa fa-download'></i><span><?php echo e(trans('adminlte_lang::message.menu12')); ?></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/importar"><?php echo e(trans('adminlte_lang::message.submenu4')); ?></a></li>
                    <li><a href="/importardatos/historial"><?php echo e(trans('adminlte_lang::message.submenu7')); ?></a></li>
                    <li><a href="/trabajos/create"><?php echo e(trans('adminlte_lang::message.submenu8')); ?></a></li>
                </ul>
                </li>
                <li><a href="/cerrarjornada"><i class='fa  fa-times-circle'></i> <span><?php echo e(trans('adminlte_lang::message.menu16')); ?></span></a></li>



                <li><a href="/user"><i class='fa fa-users'></i> <span><?php echo e(trans('adminlte_lang::message.menu11')); ?></span></a></li>
                <li><a href="/tecnicos"><i class='fa fa-male'></i> <span><?php echo e(trans('adminlte_lang::message.menu15')); ?></span></a></li>
                <li><a href="/zonas"><i class='fa fa-map-marker'></i> <span><?php echo e(trans('adminlte_lang::message.menu18')); ?></span></a></li>

                
              <?php endif; ?>  
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
